<?php

namespace Wrapper\Objects;

class Card 
{
    private string $cardHolder;
    private string $cardNumber;
    private string $expiryMonth;
    private string $expiryYear;
    private string $cvv;

    public function __construct(string $cardHolder, string $cardNumber, string $expiryMonth, string $expiryYear, string $cvv)
    {
        $this->cardHolder = $cardHolder;
        $this->cardNumber = $cardNumber;
        $this->expiryMonth = $expiryMonth;
        $this->expiryYear = $expiryYear;
        $this->cvv = $cvv;

        return $this;
    }

    /**
     * Get the value of cardHolder
     */ 
    public function getCardHolder(): string
    {
        return $this->cardHolder;
    }

    /**
     * Set the value of cardHolder
     *
     * @return  self
     */ 
    public function setCardHolder(string $cardHolder): self
    {
        $this->cardHolder = $cardHolder;

        return $this;
    }

    /**
     * Get the value of cardNumber
     */ 
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    /**
     * Set the value of cardNumber
     *
     * @return  self
     */ 
    public function setCardNumber(string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get the value of expiryMonth
     */ 
    public function getExpiryMonth(): string
    {
        return $this->expiryMonth;
    }

    /**
     * Set the value of expiryMonth
     *
     * @return  self
     */ 
    public function setExpiryMonth(string $expiryMonth): self
    {
        $this->expiryMonth = $expiryMonth;

        return $this;
    }

    /**
     * Get the value of expiryYear
     */ 
    public function getExpiryYear(): string
    {
        return $this->expiryYear;
    }

    /**
     * Set the value of expiryYear
     *
     * @return  self
     */ 
    public function setExpiryYear(string $expiryYear): self
    {
        $this->expiryYear = $expiryYear;

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