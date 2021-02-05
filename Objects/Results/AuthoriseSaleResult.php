<?php

namespace Wrapper\Objects\Results;

use stdClass;

class AuthoriseSaleResult
{
    private string $status;
    private string $uidTransactionIndex;
    private string $transactionDateTime;
    private string $mgCardCountry;
    private string $mgCurrencyCode;
    private string $mgEciFlag;
    private string $fspCode;
    private string $fspMessage;
    private string $fspAuthorisationCode;
    private string $fspProcessorResponse;

    public function __construct(stdClass $response)
    {
        $this->status = $response->status;
        $this->uidTransactionIndex = $response->uidTransactionIndex;
        $this->transactionDateTime = $response->TransactionDateTime;
        $this->mgCardCountry = $response->mgMessage->cardCountry;
        $this->mgCurrencyCode = $response->mgMessage->currencyCode;
        $this->mgEciFlag = $response->mgMessage->eciFlag;
        $this->fspCode = $response->fspMessage->code;
        $this->fspMessage = $response->fspMessage->message;
        $this->fspAuthorisationCode = $response->fspMessage->authorizationCode;
        $this->fspProcessorResponse = $response->fspMessage->processorResponse;
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
     * Get the value of mgCardCountry
     */ 
    public function getMgCardCountry(): string
    {
        return $this->mgCardCountry;
    }

    /**
     * Set the value of mgCardCountry
     *
     * @return  self
     */ 
    public function setMgCardCountry(string $mgCardCountry): self
    {
        $this->mgCardCountry = $mgCardCountry;

        return $this;
    }

    /**
     * Get the value of mgCurrencyCode
     */ 
    public function getMgCurrencyCode(): string
    {
        return $this->mgCurrencyCode;
    }

    /**
     * Set the value of mgCurrencyCode
     *
     * @return  self
     */ 
    public function setMgCurrencyCode(string $mgCurrencyCode): self
    {
        $this->mgCurrencyCode = $mgCurrencyCode;

        return $this;
    }

    /**
     * Get the value of mgEciFlag
     */ 
    public function getmgEciFlag(): string
    {
        return $this->mgEciFlag;
    }

    /**
     * Set the value of mgEciFlag
     *
     * @return  self
     */ 
    public function setmgEciFlag(string $mgEciFlag): self
    {
        $this->mgEciFlag = $mgEciFlag;

        return $this;
    }

    /**
     * Get the value of fspCode
     */ 
    public function getFspCode(): string
    {
        return $this->fspCode;
    }

    /**
     * Set the value of fspCode
     *
     * @return  self
     */ 
    public function setFspCode(string $fspCode): self
    {
        $this->fspCode = $fspCode;

        return $this;
    }

    /**
     * Get the value of fspMessage
     */ 
    public function getFspMessage(): string
    {
        return $this->fspMessage;
    }

    /**
     * Set the value of fspMessage
     *
     * @return  self
     */ 
    public function setFspMessage(string $fspMessage): self
    {
        $this->fspMessage = $fspMessage;

        return $this;
    }

    /**
     * Get the value of fspAuthorisationCode
     */ 
    public function getFspAuthorisationCode(): string
    {
        return $this->fspAuthorisationCode;
    }

    /**
     * Set the value of fspAuthorisationCode
     *
     * @return  self
     */ 
    public function setFspAuthorisationCode(string $fspAuthorisationCode): self
    {
        $this->fspAuthorisationCode = $fspAuthorisationCode;

        return $this;
    }

    /**
     * Get the value of fspProcessorResponse
     */ 
    public function getFspProcessorResponse(): string
    {
        return $this->fspProcessorResponse;
    }

    /**
     * Set the value of fspProcessorResponse
     *
     * @return  self
     */ 
    public function setFspProcessorResponse(string $fspProcessorResponse): self
    {
        $this->fspProcessorResponse = $fspProcessorResponse;

        return $this;
    }
}