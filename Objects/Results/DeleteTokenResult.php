<?php

namespace Wrapper\Objects\Results;

use stdClass;

class DeleteTokenResult
{
    private string $status;
    private string $uidTransactionIndex;
    private string $transactionDateTime;
    private string $token;

    public function __construct(stdClass $response)
    {
        $this->status = $response->status;
        $this->uidTransactionIndex = $response->uidTransactionIndex;
        $this->transactionDateTime = $response->TransactionDateTime;
        $this->token = $response->token;
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
}