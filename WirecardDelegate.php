<?php

namespace Wrapper;

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Wrapper\Error::errorHandler');
set_exception_handler('Wrapper\Error::exceptionHandler');

use stdClass;
use Exception;
use SoapHeader;
use Wrapper\Helpers\App;
use Wrapper\Objects\Card;
use Wrapper\Objects\Transaction;
use Wrapper\Objects\Results\CaptureResult;
use Wrapper\Objects\Results\CreateTokenResult;
use Wrapper\Objects\Results\TDSLookupResult;
use Wrapper\Objects\Results\AuthoriseSaleResult;
use Wrapper\Objects\Results\AuthReversalResult;
use Wrapper\Objects\Results\CreditResult;
use Wrapper\Objects\Results\DeleteTokenResult;
use Wrapper\Objects\Results\ReadTokenResult;
use Wrapper\Objects\Results\TDSAuthenticateResult;

/**
 * This class aims to ease the integration into Wirecard (Previously MyGate) Enterprise API.
 * 
 * @author Christopher Smit <chris@imagin8.co.za>
 * @version 1.0.0
 * @license MIT
 * @copyright 2021 Minc Development
 */
class WirecardDelegate
{
    /**
     * The merchant's UID
     * @var string
     */
    private string $merchantUID;

    /**
     * The merchant's application UID;
     * @var string
     */
    private string $applicationUID;

    /**
     * The mode of this transaction (0 = Test, 1 = Live)
     * @var integer
     */
    private int $mode;

    /**
     * Reference to the core App Class
     * @var App
     */
    private App $app;

    /**
     * Reference to the Card Class
     * @var Card
     */
    private Card $card;

    /**
     * Holds the sales items for this transaction
     * @var SalesItem[]
     */
    private iterable $salesItems;

    /**
     * Holds the current transaction details
     * @var Transaction
     */
    private Transaction $transaction;

    /**
     * Constructor class for the WirecardDelegate
     *
     * @param array $config The configuration for this delegate
     */
    public function __construct(array $config)
    {
        if (!isset($config['applicationUID']) || !isset($config['merchantUID'])) {
            throw new Exception("Missing required config parameters", 412);
        }

        $this->merchantUID      = $config['merchantUID'];
        $this->applicationUID   = $config['applicationUID'];
        $this->mode             = isset($config['mode']) ? $config['mode'] : Constants::WIRECARD_MODE_TEST;
        $this->app              = new App();
    }

    /**
     * Sets the transaction for this request
     *
     * @param Transaction $transaction The transaction object
     * @return self
     */
    public function setTransaction(Transaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Set the card details to be used throughout this session
     *
     * @param Card $cardDetails The card object to be set
     * @return self
     */
    public function setCard(Card $cardDetails): self
    {
        $this->card = $cardDetails;

        return $this;
    }

    /**
     * Sets the array of sales items for a transaction
     *
     * @param SalesItem[] $salesItems The array of sales items
     * @return self
     */
    public function setSalesItems(iterable $salesItems): self 
    {
        $this->salesItems = $salesItems;

        return $this;
    }

    /**
     * Retrieves the header to be used for the SOAP Call
     *
     * @param integer $actionType The action type to use
     * @return SoapHeader
     */
    private function getHeader(int $actionType): SoapHeader
    {
        $auth = new \stdClass();

        $auth->merchantUID = $this->merchantUID;
        $auth->merchantToken = $this->merchantUID;
        $auth->actionTypeID = $actionType;

        $auth_vals = new \SoapVar($auth, SOAP_ENC_OBJECT);
        return new \SoapHeader("https://api.mygateglobal.com/", 'authenticate', $auth_vals, false);
    }

    /**
     * Initiatates an action on wirecard. 
     *
     * @param integer $actionId The action to initiate
     * @param string $xmlBody The XML body to be passed
     * @return stdClass
     */
    private function initiateAction(int $actionId, string $xmlBody): stdClass
    {
        $client = $this->app->initializeSoapClient(Constants::WSDL);
        $client->__setSoapHeaders($this->getHeader($actionId));
        $response = $client->execRequest($xmlBody);

        if (isset($response->errors)) {
            foreach ($response->errors as $exception) {
                if (is_array($exception)) {
                    foreach ($exception as $innerException) {
                        throw new Exception(html_entity_decode($innerException->description, ENT_QUOTES | ENT_HTML5));
                    }
                } else {
                    if (isset($exception->error)) {
                        throw new Exception(html_entity_decode($exception->error->description, ENT_QUOTES | ENT_HTML5));
                    } else {
                        throw new Exception(html_entity_decode($exception->description, ENT_QUOTES | ENT_HTML5));
                    }
                }
            }
        }

        return $response;
    }

    /**
     * (Action 14)
     * This message is used to verify if the issuer and cardholder participates in 3D Secure program.
     *
     * @return TDSLookupResult
     */
    public function lookup3DSecure(): TDSLookupResult
    {
        $action14 = [
            'mode'              => $this->mode,
            'applicationUID'    => $this->applicationUID,
            'merchantReference' => $this->transaction->getMerchantRef(),
            'terminal'          => $this->transaction->getTerminal(),
            'cardDetails'       => [
                'cardHolder'        => $this->card->getCardHolder(),
                'cardNumber'        => $this->card->getCardNumber(),
                'expiryMonth'       => $this->card->getExpiryMonth(),
                'expiryYear'        => $this->card->getExpiryYear()  
            ],
            'amount'            => $this->transaction->getAmount(),
            'billingDetails'    => [
                'invoiceDescription'=> $this->transaction->getBillingDetails()->getInvoiceDescription(),
                'contact'       => [
                    'firstName'         => $this->transaction->getBillingDetails()->getContactFirstName(),
                    'lastName'          => $this->transaction->getBillingDetails()->getContactLastName(),
                    'company'           => $this->transaction->getBillingDetails()->getContactCompany(),
                    'contactNumber'     => $this->transaction->getBillingDetails()->getContactNumber(),
                    'email'             => $this->transaction->getBillingDetails()->getContactEmail()
                ],
                'address'       => [
                    'address1'          => $this->transaction->getBillingDetails()->getAddress1(),
                    'address2'          => $this->transaction->getBillingDetails()->getAddress2(),
                    'address3'          => $this->transaction->getBillingDetails()->getAddress3(),
                    'suburb'            => $this->transaction->getBillingDetails()->getSuburb(),
                    'city'              => $this->transaction->getBillingDetails()->getCity(),
                    'postalCode'        => $this->transaction->getBillingDetails()->getPostalCode(),
                    'country'           => $this->transaction->getBillingDetails()->getCountry()
                ]
            ],
            'browserDetails'    => [
                'userAgent'             => $_SERVER['HTTP_USER_AGENT'],
                'browserHeader'         => '',
                'ipAddressv4'           => $this->app->getIpAddress()
            ]
        ];
        $action14 = $this->app->toXML($action14, "<xmlField/>");

        $tdsLookupResult = new TDSLookupResult($this->initiateAction(Constants::ACTION_3DS_LOOKUP, $action14));
        $this->transaction->setTransactionIndex($tdsLookupResult->getUidTransactionIndex());
        return $tdsLookupResult;
    }

    /**
     * Posts to the ACS Url for authentication at bank
     *
     * @param string $acsUrl The url returned from the 3DS Lookup
     * @param string $paReq The payload from the 3DS Lookup
     * @param string $returnUrl The url to return to once done
     * @return void
     */
    public function requireAuthentication(string $acsUrl, string $paReq, string $returnUrl): void
    {
        ?>
        <html>
            <head>
                <title>Please wait...</title>
            </head>
            <body>
                <p>Please wait...</p>
                <form id="frmLaunchACS" name="frmLaunchACS" method="POST" action="<?= $acsUrl; ?>">
                    <input type="hidden" name="PaReq" value="<?= $paReq; ?>" />
                    <input type="hidden" name="TermUrl" value="<?= $returnUrl; ?>" />
                    <input type="hidden" name="MD" value="<?= $this->transaction->getTransactionIndex() ?>"/>
                </form>

                <script>
                    window.onload = function() {
                        document.forms['frmLaunchACS'].submit();
                    }
                </script>
            </body>
        </html>
        <?php
        exit();
    }

    /**
     * (Action 1,5)
     * The Authorise message creates a request to hold the requested amount and mark it as unavailable from the customer's card until it is either 
     * Captured or the hold terminates, thus rendering the amount available again.
     * A sale is a bundled authorization and capture. You can use a Sale instead of a separate Authorise and Capture if there is no delay between takin 
     * a customer's order and shipping the goods.
     * NOTE: Action 5(Sale) currently only works with VISA Africa. For all other banks use an Action 1 (Authorize) followed by an Action 3(Capture) 
     *
     * @return AuthoriseSaleResult
     */
    public function authoriseSale(string $transactionIndex, int $actionId, bool $tokenized = false): AuthoriseSaleResult
    {
        $items = "";
        foreach ($this->salesItems as $item) {
            $itemArr = [
                'description'   => $item->getDescription(),
                'unitPrice'     => $item->getUnitPrice(),
                'quantity'      => $item->getQuantity(),
                'totalAmount'   => $item->getTotalAmount()
            ];
            $items .= $this->app->toXML($itemArr, "<item/>");
        }
       

        $action1_5 = [
            'mode'              => $this->mode,
            'applicationUID'    => $this->applicationUID,
            'transactionAuth'   => [
                'transactionIndex'      => $transactionIndex
            ],
            'merchantReference' => $this->transaction->getMerchantRef(),
            'terminal'          => $this->transaction->getTerminal(),
            'amount'            => $this->transaction->getAmount(),
            'billingDetails'    => [
                'customerID'            => $this->transaction->getBillingDetails()->getCustomerId(),
                'invoiceID'             => $this->transaction->getBillingDetails()->getInvoiceId(),
                'invoiceDescription'    => $this->transaction->getBillingDetails()->getInvoiceDescription(),
                'contact'               => [
                    'firstName'     => $this->transaction->getBillingDetails()->getContactFirstName(),
                    'lastName'      => $this->transaction->getBillingDetails()->getContactLastName(),
                    'company'       => $this->transaction->getBillingDetails()->getContactCompany(),
                    'contactNumber' => $this->transaction->getBillingDetails()->getContactNumber(),
                    'email'         => $this->transaction->getBillingDetails()->getContactEmail()
                ],
                'address'               => [
                    'address1'      => $this->transaction->getBillingDetails()->getAddress1(),
                    'address2'      => $this->transaction->getBillingDetails()->getAddress2(),
                    'address3'      => $this->transaction->getBillingDetails()->getAddress3(),
                    'suburb'        => $this->transaction->getBillingDetails()->getSuburb(),
                    'city'          => $this->transaction->getBillingDetails()->getCity(),
                    'postalCode'    => $this->transaction->getBillingDetails()->getPostalCode(),
                    'country'       => $this->transaction->getBillingDetails()->getCountry()
                ]
            ],
            'shippingDetails'   => [
                'contact'   => [
                    'firstName'     => $this->transaction->getShippingDetails()->getContactFirstName(),
                    'lastName'      => $this->transaction->getShippingDetails()->getContactLastName(),
                    'company'       => $this->transaction->getShippingDetails()->getContactCompany(),
                    'contactNumber' => $this->transaction->getShippingDetails()->getContactNumber(),
                    'email'         => $this->transaction->getShippingDetails()->getContactEmail()
                ],
                'address'   => [
                    'address1'      => $this->transaction->getShippingDetails()->getAddress1(),
                    'address2'      => $this->transaction->getShippingDetails()->getAddress2(),
                    'address3'      => $this->transaction->getShippingDetails()->getAddress3(),
                    'suburb'        => $this->transaction->getShippingDetails()->getSuburb(),
                    'city'          => $this->transaction->getShippingDetails()->getCity(),
                    'postalCode'    => $this->transaction->getShippingDetails()->getPostalCode(),
                    'country'       => $this->transaction->getShippingDetails()->getCountry()
                ]
            ],
            'notification'      => [
                'email'             => $this->transaction->getNotificationEmail(),
                'mobile'            => $this->transaction->getNotificationMobile()
            ],
            'salesItems'        => '{salesItems}',
            'browserDetails'    => [
                'userAgent'             => $_SERVER['HTTP_USER_AGENT'],
                'browserHeader'         => '',
                'ipAddressv4'           => $this->app->getIpAddress()
            ],
            'fraudDetails'      => [
                'uci'   => 'uci1'
            ],
            'businessRules'     => [
                'doFraudValidation' => 'false'
            ]    
        ];

        if ($tokenized) {
            $action1_5['tokenData']   = [
                'token'     => $this->transaction->getToken(),
                'cvvNumber' => $this->transaction->getCvv()
            ];
        } else {
            $action1_5['cardDetails']   = [
                'cardHolder'        => $this->card->getCardHolder(),
                'cardNumber'        => $this->card->getCardNumber(),
                'expiryMonth'       => $this->card->getExpiryMonth(),
                'expiryYear'        => $this->card->getExpiryYear(),
                'cvvNumber'         => $this->card->getCvv()
            ];
        }

        $action1_5 = $this->app->toXML($action1_5, "<xmlField/>");
        $action1_5 = str_replace("{salesItems}", $items, $action1_5);

        
        return new AuthoriseSaleResult($this->initiateAction($actionId, $action1_5));
    }

    /**
     * (Action 3)
     * When you are ready to fulfil a customer's order, Capture the Authorisation for that order.
     *
     * @return CaptureResult
     */
    public function capture(string $transactionIndex): CaptureResult
    {
        $items = "";
        foreach ($this->salesItems as $item) {
            $itemArr = [
                'description'   => $item->getDescription(),
                'unitPrice'     => $item->getUnitPrice(),
                'quantity'      => $item->getQuantity(),
                'totalAmount'   => $item->getTotalAmount()
            ];
            $items .= $this->app->toXML($itemArr, "<item/>");
        }
       
        $action3 = [
            'applicationUID'    => $this->applicationUID,
            'transactionAuth'   => [
                'transactionIndex'      => $transactionIndex
            ],
            'merchantReference' => $this->transaction->getMerchantRef(),
            'terminal'          => $this->transaction->getTerminal(),
            'amount'            => $this->transaction->getAmount(),
            'billingDetails'    => [
                'customerID'            => $this->transaction->getBillingDetails()->getCustomerId(),
                'invoiceID'             => $this->transaction->getBillingDetails()->getInvoiceId(),
                'invoiceDescription'    => $this->transaction->getBillingDetails()->getInvoiceDescription(),
                'contact'               => [
                    'firstName'     => $this->transaction->getBillingDetails()->getContactFirstName(),
                    'lastName'      => $this->transaction->getBillingDetails()->getContactLastName(),
                    'company'       => $this->transaction->getBillingDetails()->getContactCompany(),
                    'contactNumber' => $this->transaction->getBillingDetails()->getContactNumber(),
                    'email'         => $this->transaction->getBillingDetails()->getContactEmail()
                ],
                'address'               => [
                    'address1'      => $this->transaction->getBillingDetails()->getAddress1(),
                    'address2'      => $this->transaction->getBillingDetails()->getAddress2(),
                    'address3'      => $this->transaction->getBillingDetails()->getAddress3(),
                    'suburb'        => $this->transaction->getBillingDetails()->getSuburb(),
                    'city'          => $this->transaction->getBillingDetails()->getCity(),
                    'postalCode'    => $this->transaction->getBillingDetails()->getPostalCode(),
                    'country'       => $this->transaction->getBillingDetails()->getCountry()
                ]
            ],
            'shippingDetails'   => [
                'contact'   => [
                    'firstName'     => $this->transaction->getShippingDetails()->getContactFirstName(),
                    'lastName'      => $this->transaction->getShippingDetails()->getContactLastName(),
                    'company'       => $this->transaction->getShippingDetails()->getContactCompany(),
                    'contactNumber' => $this->transaction->getShippingDetails()->getContactNumber(),
                    'email'         => $this->transaction->getShippingDetails()->getContactEmail()
                ],
                'address'   => [
                    'address1'      => $this->transaction->getShippingDetails()->getAddress1(),
                    'address2'      => $this->transaction->getShippingDetails()->getAddress2(),
                    'address3'      => $this->transaction->getShippingDetails()->getAddress3(),
                    'suburb'        => $this->transaction->getShippingDetails()->getSuburb(),
                    'city'          => $this->transaction->getShippingDetails()->getCity(),
                    'postalCode'    => $this->transaction->getShippingDetails()->getPostalCode(),
                    'country'       => $this->transaction->getShippingDetails()->getCountry()
                ]
            ],
            'salesItems'        => '{salesItems}'  
        ];
        $action3 = $this->app->toXML($action3, "<xmlField/>");
        $action3 = str_replace("{salesItems}", $items, $action3);

        return new CaptureResult($this->initiateAction(Constants::ACTION_CAPTURE, $action3));
    }

    /**
     * (Action 2)
     * The Authorise – Reversal Message releases the hold that the Authorize placed on the customer's credit card funds. Use this service to reverse an 
     * unnecessary or undesired Authorisation. You can use full Authorise – Reversal only for an authorisation that has not been captured.
     *
     * @param string $transactionIndex The transaction index for the reversal
     * @return AuthReversalResult
     */
    public function authReversal(string $transactionIndex): AuthReversalResult
    {
        $action2 = [
            'applicationUID'    => $this->applicationUID,
            'transactionAuth'   => [
                'transactionIndex'  => $transactionIndex
            ],
            'merchantReference' => isset($this->transaction) ? $this->transaction->getMerchantRef() : '',
            'terminal'          => isset($this->transaction) ? $this->transaction->getTerminal() : ''
        ];
        $action2 = $this->app->toXML($action2, "<xmlField/>");

        return new AuthReversalResult($this->initiateAction(Constants::ACTION_AUTH_REVERSAL, $action2));
    }

    /**
     * (Action 15)
     * This message is used direct the card holder to their banks authentication page where they will validate the transaction using their secret 
     * password.
     *
     * @param string $transactionIndex The transaction index received from the original transaction
     * @param string $paresPayload The payload received from the bank page
     * @return TDSAuthenticateResult
     */
    public function tdsAuthenticate(string $transactionIndex, string $paresPayload): TDSAuthenticateResult
    {
        $action15 = [
            'applicationUID'    => $this->applicationUID,
            'transactionAuth'   => [
                'transactionIndex'      => $transactionIndex,
                'paresPayload'      => $paresPayload
            ],
            'merchantReference' => '',
            'terminal'          => ''
        ];
        $action15 = $this->app->toXML($action15, "<xmlField/>");

        return new TDSAuthenticateResult($this->initiateAction(Constants::ACTION_AUTHENTICATE, $action15));
    }

    /**
     * Action(4, 12)
     * A Follow-On Credit is linked to a Capture in the system. You can request multiple Follow-On Credits against a single Capture. This action would 
     * reverse a Capture – Action 3.
     * Credit Request messages are generated when a merchant wants to return the funds after a transaction that has been captured (refund of a Sale - 
     * action 5).
     *
     * @param string $transactionIndex The transaction index received from the original transaction
     * @return CreditResult
     */
    public function credit(string $transactionIndex): CreditResult
    {
        $action4_12 = [
            'applicationUID'    => $this->applicationUID,
            'transactionAuth'   => [
                'transactionIndex'      => $transactionIndex
            ],
            'merchantReference' => $this->transaction->getMerchantRef(),
            'terminal'          => $this->transaction->getTerminal(),
            'amount'            => $this->transaction->getAmount()
        ];
        $action4_12 = $this->app->toXML($action4_12, "<xmlField/>");

        return new CreditResult($this->initiateAction(Constants::ACTION_CREDIT, $action4_12));
    }

    /**
     * (Action 21)
     * This message is used when creating a token.
     *
     * @return CreateTokenResult
     */
    public function createToken(): CreateTokenResult
    {
        $action21 = [
            'applicationUID'        => $this->applicationUID,
            'merchantReference'     => $this->transaction->getMerchantRef(),
            'cardDetails'           => [
                'cardHolder'    => $this->card->getCardHolder(),
                'cardNumber'    => $this->card->getCardNumber(),
                'expiryMonth'   => $this->card->getExpiryMonth(),
                'expiryYear'    => $this->card->getExpiryYear()
            ]
        ];
        $action21 = $this->app->toXML($action21, "<xmlField/>");

        return new CreateTokenResult($this->initiateAction(Constants::ACTION_CREATE_TOKEN, $action21));
    }

    /**
     * (Action 22)
     * This message is used when reading a token. This action can be used to check if a supplied token exists or to validate the cards expiry date.
     *
     * @return ReadTokenResult
     */
    public function readToken(): ReadTokenResult
    {
        $action22 = [
            'applicationUID'    => $this->applicationUID,
            'token'             => $this->transaction->getToken(),
            'merchantReference' => $this->transaction->getMerchantRef()
        ];
        $action22 = $this->app->toXML($action22, "<xmlField/>");

        return new ReadTokenResult($this->initiateAction(Constants::ACTION_READ_TOKEN, $action22));
    }

    /**
     * (Action 23)
     * This message is used when deleting a token.
     * Note: To get a successful result from this action, first call action 21 (createToken).
     *
     * @return DeleteTokenResult
     */
    public function deleteToken(): DeleteTokenResult
    {
        $action23 = [
            'applicationUID'    => $this->applicationUID,
            'token'             => $this->transaction->getToken(),
            'merchantReference' => $this->transaction->getMerchantRef()
        ];
        $action23 = $this->app->toXML($action23, "<xmlField/>");

        return new DeleteTokenResult($this->initiateAction(Constants::ACTION_DELETE_TOKEN, $action23));
    }
}