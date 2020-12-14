<?php


namespace EDATA\Customer;


use EDATA\FinvoiceAPI;
use GuzzleHttp\Exception\GuzzleException;

class CustomerHelper
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
     * CustomerHelper constructor.
     * @param FinvoiceAPI $finvoiceAPI
     */
    public function __construct(FinvoiceAPI $finvoiceAPI)
    {
        $this->setFinvoiceAPI($finvoiceAPI);
    }

    /**
     * @return FinvoiceAPI
     */
    public function getFinvoiceAPI(): FinvoiceAPI
    {
        return $this->finvoiceAPI;
    }

    /**
     * @param FinvoiceAPI $finvoiceAPI
     */
    public function setFinvoiceAPI(FinvoiceAPI $finvoiceAPI)
    {
        $this->finvoiceAPI = $finvoiceAPI;
    }

    public function clearWhere()
    {
        $this->where = [];
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function where($key, $value): CustomerHelper
    {
        $this->where[$key] = $value;
        return $this;
    }

    /**
     * @return ?Customer[]
     * @throws \Exception
     */
    public function fetch(): ?iterable
    {
        $response = $this->finvoiceAPI->secureRequest('GET', '/customers', array_merge(['limit' => -1], $this->where));

        $customers = $response['customers'];

        return array_map(function ($customer) {
            return Customer::make((array)$customer, $this->finvoiceAPI);
        }, $customers);
    }
}
