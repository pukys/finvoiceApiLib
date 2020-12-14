<?php


namespace EDATA\Item;


use JsonSerializable;

class Item implements JsonSerializable
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
    private $description;
    /**
     * @var ?numeric
     */
    private $price;
    /**
     * @var ?string
     */
    private $discount_type;
    /**
     * @var ?numeric
     */
    private $discount_val;
    /**
     * @var ?numeric
     */
    private $discount;
    /**
     * @var int
     */
    private $quantity;
    /**
     * @var ?string
     */
    private $type;
    /**
     * @var ?int
     */
    private $company_id;
    /**
     * @var ?int
     */
    private $unit_id;
    /**
     * @var ?string
     */
    private $created_at;
    /**
     * @var ?string
     */
    private $updated_at;
    /**
     * @var ?string
     */
    private $formattedCreatedAt;
    /**
     * @var ?array
     */
    private $unit;
    /**
     * @var int[]
     */
    private $taxes;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Item
     */
    public function setId(?int $id): Item
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
     * @return Item
     */
    public function setName(?string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Item
     */
    public function setDescription(?string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float|int|string|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float|int|string|null $price
     * @return Item
     */
    public function setPrice($price): Item
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float|int|string|null
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param float|int|string|null $discount
     * @return Item
     */
    public function setDiscount($discount): Item
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Item
     */
    public function setQuantity(int $quantity): Item
    {
        $this->quantity = $quantity;
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
     * @return Item
     */
    public function setType(?string $type): Item
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCompanyId(): ?int
    {
        return $this->company_id;
    }

    /**
     * @param int|null $company_id
     * @return Item
     */
    public function setCompanyId(?int $company_id): Item
    {
        $this->company_id = $company_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnitId(): ?int
    {
        return $this->unit_id;
    }

    /**
     * @param int|null $unit_id
     * @return Item
     */
    public function setUnitId(?int $unit_id): Item
    {
        $this->unit_id = $unit_id;
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
     * @return Item
     */
    public function setCreatedAt(?string $created_at): Item
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
     * @return Item
     */
    public function setUpdatedAt(?string $updated_at): Item
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormattedCreatedAt(): ?string
    {
        return $this->formattedCreatedAt;
    }

    /**
     * @param string|null $formattedCreatedAt
     * @return Item
     */
    public function setFormattedCreatedAt(?string $formattedCreatedAt): Item
    {
        $this->formattedCreatedAt = $formattedCreatedAt;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getUnit(): ?array
    {
        return $this->unit;
    }

    /**
     * @param array|null $unit
     * @return Item
     */
    public function setUnit(?array $unit): Item
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    /**
     * @param int[] $taxes
     * @return Item
     */
    public function setTaxes(array $taxes): Item
    {
        $this->taxes = $taxes;
        return $this;
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
        $array = json_decode(json_encode($this), true);
        $array['item_id'] = $this->getId();

        if (!$this->getDescription()) {
            $array['description'] = "aa";
        }

        unset($array['finvoiceApi']);

        return $array;
    }

    /**
     * @param array $data
     * @return Item
     */
    public static function make(array $data): Item
    {
        return (new Item())
            ->setId($data['id'])
            ->setName($data['name'])
            ->setDescription($data['description'])
            ->setPrice($data['price'])
            ->setType($data['type'])
            ->setQuantity($data['quantity'] ?? 1)
            ->setCompanyId($data['company_id'])
            ->setUnitId($data['unit_id'])
            ->setCreatedAt($data['created_at'])
            ->setUpdatedAt($data['updated_at'])
            ->setFormattedCreatedAt($data['formattedCreatedAt'])
            ->setUnit($data['unit']);
    }

    /**
     * @return string|null
     */
    public function getDiscountType(): ?string
    {
        return $this->discount_type;
    }

    /**
     * @param string|null $discount_type
     * @return Item
     */
    public function setDiscountType(?string $discount_type): Item
    {
        $this->discount_type = $discount_type;
        return $this;
    }

    /**
     * @return float|int|string|null
     */
    public function getDiscountVal()
    {
        return $this->discount_val;
    }

    /**
     * @param float|int|string|null $discount_val
     * @return Item
     */
    public function setDiscountVal($discount_val): Item
    {
        $this->discount_val = $discount_val;
        return $this;
    }
}
