<?php

namespace EDATA\Item;

use EDATA\FinvoiceAPI;
use Exception;

class ItemHelper
{
    /**
     * @var FinvoiceAPI
     */
    private $finvoiceAPI;
    /**
     * @var array
     */
    private $where;

    /**
     * @var array
     */
    private $taxes;

    public function __construct(FinvoiceAPI $finvoiceAPI)
    {
        $this->finvoiceAPI = $finvoiceAPI;
    }

    /**
     * @param $key
     * @param $value
     * @return ItemHelper
     * @throws Exception
     */
    public function where($key, $value): ItemHelper
    {
        $this->where[$key] = $value;
        return $this;
    }

    /**
     * @return ?Item[]
     * @throws Exception
     */
    public function fetch(): ?iterable
    {
        $response = $this->finvoiceAPI->secureRequest('GET', '/items', array_merge(['limit' => -1], $this->where));

        $items = $response['items'];
        $this->setTaxes($response['taxTypes']);

        return array_map(function ($item) {
            return Item::make((array) $item);
        }, $items);
    }

    /**
     * @return array
     */
    public function getWhere(): array
    {
        return $this->where;
    }

    /**
     * @param array $where
     */
    public function setWhere(array $where): void
    {
        $this->where = $where;
    }

    /**
     * @return array
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    /**
     * @param array $taxes
     */
    public function setTaxes(array $taxes): void
    {
        $this->taxes = $taxes;
    }
}
