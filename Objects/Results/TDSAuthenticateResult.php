<?php

namespace Wrapper\Objects\Results;

use stdClass;

class TDSAuthenticateResult
{
    private string $status;
    private string $uidTransactionIndex;
    private string $transactionDateTime;
    private string $tdsAuthCode;
    private string $tdsAuthMessage;
    private string $tdsAuthLiabilityShift;
    private string $tdsAuthCcAuthAllowed;
    private string $tdsAuthEciFlag;
    private string $tdsAuthParesStatus;
    private string $tdsAuthSignatureVerification;
    private string $tdsAuthXid;
    private string $tdsAuthCavv;
    private string $tdsAuthAction;

    public function __construct(stdClass $response)
    {
        $this->status = $response->status;
        $this->uidTransactionIndex = $response->uidTransactionIndex;
        $this->transactionDateTime = $response->TransactionDateTime;
        $this->tdsAuthCode = $response->tdsAuth->code;
        $this->tdsAuthMessage = $response->tdsAuth->message;
        $this->tdsAuthLiabilityShift = $response->tdsAuth->liabilityShift;
        $this->tdsAuthCcAuthAllowed = $response->tdsAuth->ccAuthAllowed;
        $this->tdsAuthEciFlag = $response->tdsAuth->eciFlag;
        $this->tdsAuthParesStatus = $response->tdsAuth->paresStatus;
        $this->tdsAuthSignatureVerification = $response->tdsAuth->signatureVerification;
        $this->tdsAuthXid = $response->tdsAuth->xid;
        $this->tdsAuthCavv = $response->tdsAuth->cavv;
        $this->tdsAuthAction = $response->tdsAuth->action;
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
     * Get the value of tdsAuthCode
     */ 
    public function getTdsAuthCode(): string
    {
        return $this->tdsAuthCode;
    }

    /**
     * Set the value of tdsAuthCode
     *
     * @return  self
     */ 
    public function setTdsAuthCode(string $tdsAuthCode): self
    {
        $this->tdsAuthCode = $tdsAuthCode;

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
     * Get the value of tdsAuthMessage
     */ 
    public function getTdsAuthMessage(): string
    {
        return $this->tdsAuthMessage;
    }

    /**
     * Set the value of tdsAuthMessage
     *
     * @return  self
     */ 
    public function setTdsAuthMessage(string $tdsAuthMessage): self
    {
        $this->tdsAuthMessage = $tdsAuthMessage;

        return $this;
    }

    /**
     * Get the value of tdsAuthLiabilityShift
     */ 
    public function getTdsAuthLiabilityShift(): string
    {
        return $this->tdsAuthLiabilityShift;
    }

    /**
     * Set the value of tdsAuthLiabilityShift
     *
     * @return  self
     */ 
    public function setTdsAuthLiabilityShift(string $tdsAuthLiabilityShift): self
    {
        $this->tdsAuthLiabilityShift = $tdsAuthLiabilityShift;

        return $this;
    }

    /**
     * Get the value of tdsAuthCcAuthAllowed
     */ 
    public function getTdsAuthCcAuthAllowed(): string
    {
        return $this->tdsAuthCcAuthAllowed;
    }

    /**
     * Set the value of tdsAuthCcAuthAllowed
     *
     * @return  self
     */ 
    public function setTdsAuthCcAuthAllowed(string $tdsAuthCcAuthAllowed): self
    {
        $this->tdsAuthCcAuthAllowed = $tdsAuthCcAuthAllowed;

        return $this;
    }

    /**
     * Get the value of tdsAuthEciFlag
     */ 
    public function getTdsAuthEciFlag(): string
    {
        return $this->tdsAuthEciFlag;
    }

    /**
     * Set the value of tdsAuthEciFlag
     *
     * @return  self
     */ 
    public function setTdsAuthEciFlag(string $tdsAuthEciFlag): self
    {
        $this->tdsAuthEciFlag = $tdsAuthEciFlag;

        return $this;
    }

    /**
     * Get the value of tdsAuthParesStatus
     */ 
    public function getTdsAuthParesStatus(): string
    {
        return $this->tdsAuthParesStatus;
    }

    /**
     * Set the value of tdsAuthParesStatus
     *
     * @return  self
     */ 
    public function setTdsAuthParesStatus(string $tdsAuthParesStatus): self
    {
        $this->tdsAuthParesStatus = $tdsAuthParesStatus;

        return $this;
    }

    /**
     * Get the value of tdsAuthSignatureVerification
     */ 
    public function getTdsAuthSignatureVerification(): string
    {
        return $this->tdsAuthSignatureVerification;
    }

    /**
     * Set the value of tdsAuthSignatureVerification
     *
     * @return  self
     */ 
    public function setTdsAuthSignatureVerification(string $tdsAuthSignatureVerification): self
    {
        $this->tdsAuthSignatureVerification = $tdsAuthSignatureVerification;

        return $this;
    }

    /**
     * Get the value of tdsAuthXid
     */ 
    public function getTdsAuthXid(): string
    {
        return $this->tdsAuthXid;
    }

    /**
     * Set the value of tdsAuthXid
     *
     * @return  self
     */ 
    public function setTdsAuthXid(string $tdsAuthXid): self
    {
        $this->tdsAuthXid = $tdsAuthXid;

        return $this;
    }

    /**
     * Get the value of tdsAuthCavv
     */ 
    public function getTdsAuthCavv(): string
    {
        return $this->tdsAuthCavv;
    }

    /**
     * Set the value of tdsAuthCavv
     *
     * @return  self
     */ 
    public function setTdsAuthCavv(string $tdsAuthCavv): self
    {
        $this->tdsAuthCavv = $tdsAuthCavv;

        return $this;
    }

    /**
     * Get the value of tdsAuthAction
     */ 
    public function getTdsAuthAction(): string
    {
        return $this->tdsAuthAction;
    }

    /**
     * Set the value of tdsAuthAction
     *
     * @return  self
     */ 
    public function setTdsAuthAction(string $tdsAuthAction): self
    {
        $this->tdsAuthAction = $tdsAuthAction;

        return $this;
    }
}