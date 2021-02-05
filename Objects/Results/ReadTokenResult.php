<?php

namespace Wrapper\Objects\Results;

use stdClass;

class ReadTokenResult
{
    private string $status;
    private string $uidTransactionIndex;
    private string $transactionDateTime;
    private string $token;
    private string $dataCardHolder;
    private string $dataCardNumberMasked;
    private string $dataCardNumberHash;
    private string $dataCardNumberEncrypt;
    private string $dataExpiryMonth;
    private string $dataExpiryYear;
    private string $dateTokenStatus;

    public function __construct(stdClass $response)
    {
        $this->status = $response->status;
        $this->uidTransactionIndex = $response->uidTransactionIndex;
        $this->transactionDateTime = $response->TransactionDateTime;
        $this->token = $response->token;
        $this->dataCardHolder = $response->extraData->tokenData->cardHolder;
        $this->dataCardNumberMasked = $response->extraData->tokenData->cardNumber_Masked;
        $this->dataCardNumberHash = $response->extraData->tokenData->cardNumber_Hash;
        $this->dataCardNumberEncrypt = $response->extraData->tokenData->cardNumber_Encrypt;
        $this->dataExpiryMonth = $response->extraData->tokenData->expiryMonth;
        $this->dataExpiryYear = $response->extraData->tokenData->expiryYear;
        $this->dataTokenStatus = $response->extraData->tokenData->tokenStatus;
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
     * Get the value of dataCardHolder
     */ 
    public function getDataCardHolder(): string
    {
        return $this->dataCardHolder;
    }

    /**
     * Set the value of dataCardHolder
     *
     * @return  self
     */ 
    public function setDataCardHolder(string $dataCardHolder): self
    {
        $this->dataCardHolder = $dataCardHolder;

        return $this;
    }

    /**
     * Get the value of dataCardNumberMasked
     */ 
    public function getDataCardNumberMasked(): string
    {
        return $this->dataCardNumberMasked;
    }

    /**
     * Set the value of dataCardNumberMasked
     *
     * @return  self
     */ 
    public function setDataCardNumberMasked(string $dataCardNumberMasked): self
    {
        $this->dataCardNumberMasked = $dataCardNumberMasked;

        return $this;
    }

    /**
     * Get the value of dataCardNumberHash
     */ 
    public function getDataCardNumberHash(): string
    {
        return $this->dataCardNumberHash;
    }

    /**
     * Set the value of dataCardNumberHash
     *
     * @return  self
     */ 
    public function setDataCardNumberHash(string $dataCardNumberHash): self
    {
        $this->dataCardNumberHash = $dataCardNumberHash;

        return $this;
    }

    /**
     * Get the value of dataCardNumberEncrypt
     */ 
    public function getDataCardNumberEncrypt(): string
    {
        return $this->dataCardNumberEncrypt;
    }

    /**
     * Set the value of dataCardNumberEncrypt
     *
     * @return  self
     */ 
    public function setDataCardNumberEncrypt(string $dataCardNumberEncrypt): self
    {
        $this->dataCardNumberEncrypt = $dataCardNumberEncrypt;

        return $this;
    }

    /**
     * Get the value of dataExpiryMonth
     */ 
    public function getDataExpiryMonth(): string
    {
        return $this->dataExpiryMonth;
    }

    /**
     * Set the value of dataExpiryMonth
     *
     * @return  self
     */ 
    public function setDataExpiryMonth(string $dataExpiryMonth): self
    {
        $this->dataExpiryMonth = $dataExpiryMonth;

        return $this;
    }

    /**
     * Get the value of dataExpiryYear
     */ 
    public function getDataExpiryYear(): string
    {
        return $this->dataExpiryYear;
    }

    /**
     * Set the value of dataExpiryYear
     *
     * @return  self
     */ 
    public function setDataExpiryYear(string $dataExpiryYear): self
    {
        $this->dataExpiryYear = $dataExpiryYear;

        return $this;
    }

    /**
     * Get the value of dateTokenStatus
     */ 
    public function getDateTokenStatus(): string
    {
        return $this->dateTokenStatus;
    }

    /**
     * Set the value of dateTokenStatus
     *
     * @return  self
     */ 
    public function setDateTokenStatus(string $dateTokenStatus): self
    {
        $this->dateTokenStatus = $dateTokenStatus;

        return $this;
    }
}