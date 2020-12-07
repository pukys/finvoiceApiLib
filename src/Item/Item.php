<?php


namespace EDATA\Item;


class Item implements \JsonSerializable
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
     * @var ?string
     */
    private $unit;
    /**
     * @var int[]
     */
    private $taxes;

    /**
     * Item constructor.
     * @param int|null $id
     * @param string|null $name
     * @param string|null $description
     * @param float|int|string|null $price
     * @param int $quantity
     * @param string|null $type
     * @param int|null $company_id
     * @param int|null $unit_id
     * @param string|null $created_at
     * @param string|null $updated_at
     * @param string|null $formattedCreatedAt
     * @param string|null $unit
     */
    public function __construct(?int $id, ?string $name, ?string $description, $price, int $quantity, ?string $type, ?int $company_id, ?int $unit_id, ?string $created_at, ?string $updated_at, ?string $formattedCreatedAt, ?string $unit)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->type = $type;
        $this->company_id = $company_id;
        $this->unit_id = $unit_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->formattedCreatedAt = $formattedCreatedAt;
        $this->unit = $unit;

        $this->setTaxes([]);
    }

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
        return new self($data['id'], $data['name'], $data['description'], $data['discount'] ?? 0, $data['quantity'] ?? 1, $data['type'], $data['company_id'], $data['unit_id'] ?? 0, $data['created_at'], $data['updated_at'], $data['formattedCreatedAt'], $data['unit']);
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
     */
    public function setTaxes(array $taxes): void
    {
        $this->taxes = $taxes;
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
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
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
     */
    public function setDiscount($discount): void
    {
        $this->discount = $discount;
    }
}
