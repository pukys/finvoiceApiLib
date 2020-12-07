<?php


namespace EDATA\Invoice;


use EDATA\FinvoiceAPI;
use Exception;

class InvoiceHelper
{
    /**
     * @var FinvoiceAPI
     */
    private $finvoiceApi;
    /**
     * @var array
     */
    private $where;

    /**
     * InvoiceHelper constructor.
     * @param FinvoiceAPI $finvoiceApi
     */
    public function __construct(FinvoiceAPI $finvoiceApi)
    {
        $this->finvoiceApi = $finvoiceApi;
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
     * @param $key
     * @param $value
     * @return InvoiceHelper
     * @throws Exception
     */
    public function where($key, $value): InvoiceHelper
    {
        $validKeys = ['id', 'type', 'customer_id'];
        if (!in_array($key, $validKeys)) {
            throw new Exception("$key is not valid. Valid keys are " . join(",", $validKeys));
        }

        $this->where[$key] = $value;
        return $this;
    }
}
