<?php


namespace EDATA\Customer;


use JsonSerializable;

class Address implements JsonSerializable
{
    /**
     * @var ?int
     */
    private $id;
    /**
     * @var ?string
     */
    private $name;
    /**
     * @var ?string
     */
    private $address_street_1;
    /**
     * @var ?string
     */
    private $additional_info;
    /**
     * @var ?string
     */
    private $city;
    /**
     * @var ?string
     */
    private $state;
    /**
     * @var ?int
     */
    private $country_id;
    /**
     * @var ?string
     */
    private $zip;
    /**
     * @var ?string
     */
    private $phone;
    /**
     * @var ?string
     */
    private $fax;
    /**
     * @var ?string
     */
    private $type = "billing";
    /**
     * @var ?int
     */
    private $user_id;
    /**
     * @var ?string
     */
    private $created_at;
    /**
     * @var ?string
     */
    private $updated_at;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Address
     */
    public function setId(?int $id): Address
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Address
     */
    public function setName(?string $name): Address
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressStreet1(): ?string
    {
        return $this->address_street_1;
    }

    /**
     * @param string|null $address_street_1
     * @return Address
     */
    public function setAddressStreet1(?string $address_street_1): Address
    {
        $this->address_street_1 = $address_street_1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdditionalInfo(): ?string
    {
        return $this->additional_info;
    }

    /**
     * @param string|null $additional_info
     * @return Address
     */
    public function setAdditionalInfo(?string $additional_info): Address
    {
        $this->additional_info = $additional_info;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Address
     */
    public function setCity(?string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return Address
     */
    public function setState(?string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCountryId(): ?int
    {
        return $this->country_id;
    }

    /**
     * @param int|null $country_id
     * @return Address
     */
    public function setCountryId(?int $country_id): Address
    {
        $this->country_id = $country_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param string|null $zip
     * @return Address
     */
    public function setZip(?string $zip): Address
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return Address
     */
    public function setPhone(?string $phone): Address
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     * @return Address
     */
    public function setFax(?string $fax): Address
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Address
     */
    public function setType(?string $type): Address
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param int|null $user_id
     * @return Address
     */
    public function setUserId(?int $user_id): Address
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @param string|null $created_at
     * @return Address
     */
    public function setCreatedAt(?string $created_at): Address
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    /**
     * @param string|null $updated_at
     * @return Address
     */
    public function setUpdatedAt(?string $updated_at): Address
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @param array $address
     * @return Address
     */
    public static function make(array $address): Address
    {
        return (new self)
            ->setId($address['id'])
            ->setName($address['name'])
            ->setAddressStreet1($address['address_street_1'])
            ->setAdditionalInfo($address['additional_info'])
            ->setCity($address['city'])
            ->setState($address['state'])
            ->setCountryId($address['country_id'])
            ->setZip($address['zip'])
            ->setPhone($address['phone'])
            ->setFax($address['fax'])
            ->setType($address['type'])
            ->setUserId($address['user_id'])
            ->setCreatedAt($address['created_at'])
            ->setUpdatedAt($address['updated_at']);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
         return json_decode(json_encode($this), true);
    }
}
