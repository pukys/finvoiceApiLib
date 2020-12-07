<?php

namespace EDATA\Item;

use EDATA\FinvoiceAPI;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class ItemHelper {
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
        $validKeys = ['id', 'name'];
        if (!in_array($key, $validKeys)) {
            throw new Exception("$key is not valid. Valid keys are " . join(",", $validKeys));
        }

        $this->where[$key] = $value;
        return $this;
    }

    /**
     * @return ?Item[]
     */
    public function fetch(): ?iterable
    {
        try {
            $response = $this->finvoiceAPI->secureRequest('GET', '/items', [
                'json' => array_merge(['limit' => -1], $this->where)
            ]);
        } catch (GuzzleException $e) {
            $this->finvoiceAPI->setErrorInfo(['message' => $e->getMessage()]);
            return null;
        }

        $data = json_decode($response->getBody()->getContents(), true);

        $items = $data['items'];
        $this->setTaxes($data['taxTypes']);

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
