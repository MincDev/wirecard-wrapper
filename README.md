# Adumo Payment Gateway Wrapper
A wrapper class to ease integration into Adumo (previously Wirecard / MyGate) webservices. 

## 🚨 Deprecation Warning ⚠️

This repository is deprecated and no longer being maintained. The documentation used to create this project is no longer available and integration from new projects are no longer available.

## Documentation
This wrapper is built around the Enterprise integration documentation found on the Adumo Online website here: https://developers.adumoonline.com/enterprise.php

## Composer

To use the package in your project, install it with Composer
```
composer require mincdev/wirecard-wrapper
```

# Example

Initialise the service
```php
$adumo = new WirecardDelegate([
    'merchantUID'     => '9BA5008C-08EE-4286-A349-54AF91A621B0', // Your Merchant UID
    'applicationUID'  => '23ADADC0-DA2D-4DAC-A128-4845A5D71293', // Your Application UID
    'mode'            => Constants::WIRECARD_MODE_TEST // Specify Test or Live mode
]);
```

Set the transaction information and the card. You can use test cards in the testing environment.
```php
// Create the transaction
$transaction = new Transaction(9.95, "Your Merchant Reference");
$adumo->setTransaction($transaction);

// To use a test card, call one of the functions in the TestCards class
$card = (new TestCards())->visa3DSecure();

// To use a real card, assign it using the below
$card = new Card("Joe Soap", "4111111111111111", "10", "2027", 001);
```

Do a 3D Secure Lookup to see if 3D Secure is required for this card
```php
$tdsLookupResult = $adumo->setCard($card)
                         ->lookup3DSecure();

if ($tdsLookupResult->getTdsLookupAuthRequired() == "Y") {
    $token = $adumo->createToken(); // Store this where you can access it from your return URL

    $adumo->requireAuthentication($tdsLookupResult->getTdsLookupAcsUrl(), 
                                    $tdsLookupResult->getTdsLookupPayload(), 
                                    "https://www.yourcallbackurl.com");
}
```

On your return URL capture the POST variables and do the following
```php
$tdsAuthenticateResult = $adumo->tdsAuthenticate($_POST["MD"], $_POST["PaRes"]);

if ($tdsAuthenticateResult->getTdsAuthCcAuthAllowed() == "Y" && 
    $tdsAuthenticateResult->getTdsAuthParesStatus() == "Y" && 
    $tdsAuthenticateResult->getTdsAuthSignatureVerification() == "Y") {
        $authorise = $adumo->setSalesItems($items) // Make sure you stored your items somewhere before calling the authentication
                            ->authoriseSale($tdsAuthenticateResult->getUidTransactionIndex(), Constants::ACTION_AUTHORISE, true);

        $capture = $adumo->capture($authorise->getUidTransactionIndex()); // Capture the sale

        $deleteToken = $adumo->deleteToken(); // Optional - Remove the token
}
```

If the card did not require 3D Secure Authentication, you can continue with the capture step.

## All Functions
For a full description of each action, please refer to the documentation.

Action 14 : lookup3DSecure();  
requireAuthentication() // This posts to the third party bank  
Action 1, 5 : authoriseSale();  
Action 3 : capture();  
Action 2 : authReversal();  
Action 15 : tdsAuthenticate();  
Action 4, 12 : credit();  
Action 21 : createToken();  
Action 22 : readToken();  
Action 23 : deleteToken();  

### DISCLAIMER : This repository is not owned nor maintained by Adumo (Wirecard / MyGate) and should be used at own risk. 
