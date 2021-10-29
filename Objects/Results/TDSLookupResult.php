<?php

namespace Wrapper\Objects\Results;

use stdClass;

class TDSLookupResult
{
    private string $status;
    private string $uidTransactionIndex;
    private string $transactionDateTime;
    private string $tdsLookupCode;
    private string $tdsLookupMessage;
    private string $tdsLookupAuthRequired;
    private string $tdsLookupLiabilityShift;
    private string $tdsLookupCcAuthAllowed;
    private string $tdsLookupEciFlag;
    private string $tdsLookupEnrolled;
    private string $tdsLookupAcsUrl;
    private string $tdsLookupPayload;
    private string $tdsLookupAction;

    public function __construct(stdClass $response)
    {
        $this->status = $response->status;
        $this->uidTransactionIndex = $response->uidTransactionIndex;
        $this->transactionDateTime = $response->TransactionDateTime;
        $this->tdsLookupCode = $response->tdsLookup->code ?? "";
        $this->tdsLookupMessage = $response->tdsLookup->message;
        $this->tdsLookupAuthRequired = $response->tdsLookup->authRequired;
        $this->tdsLookupLiabilityShift = $response->tdsLookup->liabilityShift;
        $this->tdsLookupCcAuthAllowed = $response->tdsLookup->ccAuthAllowed;
        $this->tdsLookupEciFlag = $response->tdsLookup->eciFlag;
        $this->tdsLookupEnrolled = $response->tdsLookup->enrolled ?? "";
        $this->tdsLookupAcsUrl = $response->tdsLookup->acsUrl ?? "";
        $this->tdsLookupPayload = $response->tdsLookup->payload ?? "";
        $this->tdsLookupAction = $response->tdsLookup->action ?? "";
    }

    /**
     * Get the value of status
     */ 
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of uidTransactionIndex
     */ 
    public function getUidTransactionIndex(): string
    {
        return $this->uidTransactionIndex;
    }

    /**
     * Set the value of uidTransactionIndex
     *
     * @return  self
     */ 
    public function setUidTransactionIndex(string $uidTransactionIndex): self
    {
        $this->uidTransactionIndex = $uidTransactionIndex;

        return $this;
    }

    /**
     * Get the value of transactionDateTime
     */ 
    public function getTransactionDateTime(): string
    {
        return $this->transactionDateTime;
    }

    /**
     * Set the value of transactionDateTime
     *
     * @return  self
     */ 
    public function setTransactionDateTime(string $transactionDateTime): self
    {
        $this->transactionDateTime = $transactionDateTime;

        return $this;
    }

    /**
     * Get the value of tdsLookupCode
     */ 
    public function getTdsLookupCode(): string
    {
        return $this->tdsLookupCode;
    }

    /**
     * Set the value of tdsLookupCode
     *
     * @return  self
     */ 
    public function setTdsLookupCode(string $tdsLookupCode): self
    {
        $this->tdsLookupCode = $tdsLookupCode;

        return $this;
    }

    /**
     * Get the value of tdsLookupMessage
     */ 
    public function getTdsLookupMessage(): string
    {
        return $this->tdsLookupMessage;
    }

    /**
     * Set the value of tdsLookupMessage
     *
     * @return  self
     */ 
    public function setTdsLookupMessage(string $tdsLookupMessage): self
    {
        $this->tdsLookupMessage = $tdsLookupMessage;

        return $this;
    }

    /**
     * Get the value of tdsLookupAuthRequired
     */ 
    public function getTdsLookupAuthRequired(): string
    {
        return $this->tdsLookupAuthRequired;
    }

    /**
     * Set the value of tdsLookupAuthRequired
     *
     * @return  self
     */ 
    public function setTdsLookupAuthRequired(string $tdsLookupAuthRequired): self
    {
        $this->tdsLookupAuthRequired = $tdsLookupAuthRequired;

        return $this;
    }

    /**
     * Get the value of tdsLookupLiabilityShift
     */ 
    public function getTdsLookupLiabilityShift(): string
    {
        return $this->tdsLookupLiabilityShift;
    }

    /**
     * Set the value of tdsLookupLiabilityShift
     *
     * @return  self
     */ 
    public function setTdsLookupLiabilityShift(string $tdsLookupLiabilityShift): self
    {
        $this->tdsLookupLiabilityShift = $tdsLookupLiabilityShift;

        return $this;
    }

    /**
     * Get the value of tdsLookupCcAuthAllowed
     */ 
    public function getTdsLookupCcAuthAllowed(): string
    {
        return $this->tdsLookupCcAuthAllowed;
    }

    /**
     * Set the value of tdsLookupCcAuthAllowed
     *
     * @return  self
     */ 
    public function setTdsLookupCcAuthAllowed(string $tdsLookupCcAuthAllowed): self
    {
        $this->tdsLookupCcAuthAllowed = $tdsLookupCcAuthAllowed;

        return $this;
    }

    /**
     * Get the value of tdsLookupEciFlag
     */ 
    public function getTdsLookupEciFlag(): string
    {
        return $this->tdsLookupEciFlag;
    }

    /**
     * Set the value of tdsLookupEciFlag
     *
     * @return  self
     */ 
    public function setTdsLookupEciFlag(string $tdsLookupEciFlag): self
    {
        $this->tdsLookupEciFlag = $tdsLookupEciFlag;

        return $this;
    }

    /**
     * Get the value of tdsLookupEnrolled
     */ 
    public function getTdsLookupEnrolled(): string
    {
        return $this->tdsLookupEnrolled;
    }

    /**
     * Set the value of tdsLookupEnrolled
     *
     * @return  self
     */ 
    public function setTdsLookupEnrolled(string $tdsLookupEnrolled): self
    {
        $this->tdsLookupEnrolled = $tdsLookupEnrolled;

        return $this;
    }

    /**
     * Get the value of tdsLookupAcsUrl
     */ 
    public function getTdsLookupAcsUrl(): string
    {
        return $this->tdsLookupAcsUrl;
    }

    /**
     * Set the value of tdsLookupAcsUrl
     *
     * @return  self
     */ 
    public function setTdsLookupAcsUrl(string $tdsLookupAcsUrl): self
    {
        $this->tdsLookupAcsUrl = $tdsLookupAcsUrl;

        return $this;
    }

    /**
     * Get the value of tdsLookupPayload
     */ 
    public function getTdsLookupPayload(): string
    {
        return $this->tdsLookupPayload;
    }

    /**
     * Set the value of tdsLookupPayload
     *
     * @return  self
     */ 
    public function setTdsLookupPayload(string $tdsLookupPayload): self
    {
        $this->tdsLookupPayload = $tdsLookupPayload;

        return $this;
    }

    /**
     * Get the value of tdsLookupAction
     */ 
    public function getTdsLookupAction(): string
    {
        return $this->tdsLookupAction;
    }

    /**
     * Set the value of tdsLookupAction
     *
     * @return  self
     */ 
    public function setTdsLookupAction(string $tdsLookupAction): self
    {
        $this->tdsLookupAction = $tdsLookupAction;

        return $this;
    }
}