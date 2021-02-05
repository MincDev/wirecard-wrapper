<?php

namespace Wrapper\Objects;

class Transaction
{
    private string $merchantRef = "N/A";
    private string $terminal = "N/A";
    private float $amount;
    private bool $doFraudValidation = false;
    private string $uci = 'uci1';
    private string $notificationEmail = "";
    private string $notificationMobile = "";

    private BillingDetails $billingDetails;
    private ShippingDetails $shippingDetails;

    private string $transactionIndex;
    private string $token;
    private string $cvv;

    public function __construct(float $amount, string $merchantRef = "N/A", string $terminal = "N/A", string $notificationEmail = "", string $notificationMobile = "", bool $doFraudValidation = false, string $uci = "uci1")
    {
        $this->amount = $amount;
        $this->merchantRef = $merchantRef;
        $this->terminal = $terminal;
        $this->doFraudValidation = $doFraudValidation;
        $this->uci = $uci;
        $this->notificationEmail = $notificationEmail;
        $this->notificationMobile = $notificationMobile;

        $this->billingDetails = new BillingDetails();
        $this->shippingDetails = new ShippingDetails();
    }

    /**
     * Get the value of merchantRef
     */ 
    public function getMerchantRef(): string
    {
        return $this->merchantRef;
    }

    /**
     * Set the value of merchantRef
     *
     * @return  self
     */ 
    public function setMerchantRef(string $merchantRef): self
    {
        $this->merchantRef = $merchantRef;

        return $this;
    }

    /**
     * Get the value of terminal
     */ 
    public function getTerminal(): string
    {
        return $this->terminal;
    }

    /**
     * Set the value of terminal
     *
     * @return  self
     */ 
    public function setTerminal(string $terminal): self
    {
        $this->terminal = $terminal;

        return $this;
    }

    /**
     * Get the value of doFraudValidation
     */ 
    public function getDoFraudValidation(): string
    {
        return strval($this->doFraudValidation);
    }

    /**
     * Set the value of doFraudValidation
     *
     * @return  self
     */ 
    public function setDoFraudValidation(bool $doFraudValidation): self
    {
        $this->doFraudValidation = $doFraudValidation;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount(): string
    {
        return number_format($this->amount, 2);
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of uci
     */ 
    public function getUci(): string
    {
        return $this->uci;
    }

    /**
     * Set the value of uci
     *
     * @return  self
     */ 
    public function setUci(string $uci): self
    {
        $this->uci = $uci;

        return $this;
    }

    /**
     * Get the value of billingDetails
     */ 
    public function getBillingDetails(): BillingDetails
    {
        return $this->billingDetails;
    }

    /**
     * Set the value of billingDetails
     *
     * @return  self
     */ 
    public function setBillingDetails(BillingDetails $billingDetails): self
    {
        $this->billingDetails = $billingDetails;

        return $this;
    }

    /**
     * Get the value of shippingDetails
     */ 
    public function getShippingDetails(): ShippingDetails
    {
        return $this->shippingDetails;
    }

    /**
     * Set the value of shippingDetails
     *
     * @return  self
     */ 
    public function setShippingDetails(ShippingDetails $shippingDetails): self
    {
        $this->shippingDetails = $shippingDetails;

        return $this;
    }

    /**
     * Get the value of notificationEmail
     */ 
    public function getNotificationEmail(): string
    {
        return $this->notificationEmail;
    }

    /**
     * Set the value of notificationEmail
     *
     * @return  self
     */ 
    public function setNotificationEmail(string $notificationEmail): self
    {
        $this->notificationEmail = $notificationEmail;

        return $this;
    }

    /**
     * Get the value of notificationMobile
     */ 
    public function getNotificationMobile(): string
    {
        return $this->notificationMobile;
    }

    /**
     * Set the value of notificationMobile
     *
     * @return  self
     */ 
    public function setNotificationMobile(string $notificationMobile): self
    {
        $this->notificationMobile = $notificationMobile;

        return $this;
    }

    /**
     * Get the value of transactionIndex
     */ 
    public function getTransactionIndex(): string
    {
        return $this->transactionIndex;
    }

    /**
     * Set the value of transactionIndex
     *
     * @return  self
     */ 
    public function setTransactionIndex(string $transactionIndex): self
    {
        $this->transactionIndex = $transactionIndex;

        return $this;
    }

    /**
     * Get the value of token
     */ 
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of cvv
     */ 
    public function getCvv(): string
    {
        return $this->cvv;
    }

    /**
     * Set the value of cvv
     *
     * @return  self
     */ 
    public function setCvv(string $cvv): self
    {
        $this->cvv = $cvv;

        return $this;
    }
}