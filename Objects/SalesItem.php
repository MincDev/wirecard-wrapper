<?php

namespace Wrapper\Objects;

class SalesItem 
{
    private string $description;
    private float $unitPrice;
    private int $quantity;
    private float $totalAmount;

    public function __construct(string $description, float $unitPrice, int $quantity, float $totalAmount)
    {
        $this->description  = $description;
        $this->unitPrice    = $unitPrice;
        $this->quantity     = $quantity;
        $this->totalAmount  = $totalAmount;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of unitPrice
     */ 
    public function getUnitPrice(): string
    {
        return number_format($this->unitPrice, 2, ".", "");
    }

    /**
     * Set the value of unitPrice
     *
     * @return  self
     */ 
    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity(): string
    {
        return strval($this->quantity);
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of totalAmount
     */ 
    public function getTotalAmount(): string
    {
        return number_format($this->totalAmount, 2, ",", "");
    }

    /**
     * Set the value of totalAmount
     *
     * @return  self
     */ 
    public function setTotalAmount(float $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }
}