<?php

namespace Wrapper\Objects;

class BillingDetails 
{
    private string $customerId = "";
    private string $invoiceId  = "";
    private string $invoiceDescription  = "";
    private string $contactFirstName  = "";
    private string $contactLastName  = "";
    private string $contactCompany  = "";
    private string $contactNumber  = "";
    private string $contactEmail  = "";
    private string $address1  = "";
    private string $address2  = "";
    private string $address3  = "";
    private string $suburb  = "";
    private string $city  = "";
    private string $postalCode  = "";
    private string $country  = "";

    public function __construct(string $customerId = "", string $invoiceId = "", string $invoiceDescription = "", string $contactFirstName = "", string $contactLastName = "", string $contactCompany = "", string $contactNumber = "", string $contactEmail = "", string $address1 = "", string $address2 = "", string $address3 = "", string $suburb = "", string $city = "", string $postalCode = "", string $country = "")
    {
        $this->customerId = $customerId;
        $this->invoiceId = $invoiceId;
        $this->invoiceDescription = $invoiceDescription;
        $this->contactFirstName = $contactFirstName;
        $this->contactLastName = $contactLastName;
        $this->contactCompany = $contactCompany;
        $this->contactNumber = $contactNumber;
        $this->contactEmail = $contactEmail;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }

    /**
     * Get the value of customerId
     */ 
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * Set the value of customerId
     *
     * @return  self
     */ 
    public function setCustomerId(string $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get the value of invoiceId
     */ 
    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    /**
     * Set the value of invoiceId
     *
     * @return  self
     */ 
    public function setInvoiceId(string $invoiceId): self
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * Get the value of invoiceDescription
     */ 
    public function getInvoiceDescription(): string
    {
        return $this->invoiceDescription;
    }

    /**
     * Set the value of invoiceDescription
     *
     * @return  self
     */ 
    public function setInvoiceDescription(string $invoiceDescription): self
    {
        $this->invoiceDescription = $invoiceDescription;

        return $this;
    }

    /**
     * Get the value of contactFirstName
     */ 
    public function getContactFirstName(): string
    {
        return $this->contactFirstName;
    }

    /**
     * Set the value of contactFirstName
     *
     * @return  self
     */ 
    public function setContactFirstName(string $contactFirstName): self
    {
        $this->contactFirstName = $contactFirstName;

        return $this;
    }

    /**
     * Get the value of contactLastName
     */ 
    public function getContactLastName(): string
    {
        return $this->contactLastName;
    }

    /**
     * Set the value of contactLastName
     *
     * @return  self
     */ 
    public function setContactLastName(string $contactLastName): self
    {
        $this->contactLastName = $contactLastName;

        return $this;
    }

    /**
     * Get the value of contactCompany
     */ 
    public function getContactCompany(): string
    {
        return $this->contactCompany;
    }

    /**
     * Set the value of contactCompany
     *
     * @return  self
     */ 
    public function setContactCompany(string $contactCompany): self
    {
        $this->contactCompany = $contactCompany;

        return $this;
    }

    /**
     * Get the value of contactNumber
     */ 
    public function getContactNumber(): string
    {
        return $this->contactNumber;
    }

    /**
     * Set the value of contactNumber
     *
     * @return  self
     */ 
    public function setContactNumber(string $contactNumber): self
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get the value of contactEmail
     */ 
    public function getContactEmail(): string
    {
        return $this->contactEmail;
    }

    /**
     * Set the value of contactEmail
     *
     * @return  self
     */ 
    public function setContactEmail(string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * Get the value of address1
     */ 
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * Set the value of address1
     *
     * @return  self
     */ 
    public function setAddress1(string $address1): self
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get the value of address2
     */ 
    public function getAddress2(): string
    {
        return $this->address2;
    }

    /**
     * Set the value of address2
     *
     * @return  self
     */ 
    public function setAddress2(string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get the value of address3
     */ 
    public function getAddress3(): string
    {
        return $this->address3;
    }

    /**
     * Set the value of address3
     *
     * @return  self
     */ 
    public function setAddress3(string $address3): self
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * Get the value of suburb
     */ 
    public function getSuburb(): string
    {
        return $this->suburb;
    }

    /**
     * Set the value of suburb
     *
     * @return  self
     */ 
    public function setSuburb(string $suburb): self
    {
        $this->suburb = $suburb;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of postalCode
     */ 
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @return  self
     */ 
    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
}