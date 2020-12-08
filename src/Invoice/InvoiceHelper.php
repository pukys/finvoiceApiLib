<?php


namespace EDATA\Invoice;


use EDATA\FinvoiceAPI;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

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

    /**
     * @return ?Invoice[]
     * @throws Exception
     */
    public function fetch(): ?iterable
    {
        try {
            $response = $this->getFinvoiceApi()->secureRequest('GET', '/customers', [
                'json' => array_merge(['limit' => -1], $this->where)
            ]);
        } catch (GuzzleException $e) {
            $this->getFinvoiceApi()->setErrorInfo(['message' => $e->getMessage()]);
            return null;
        }

        $invoices = json_decode($response->getBody()->getContents(), true)->invoices;

        return array_map(function ($invoice) {
            return Invoice::make((array) $invoice, $this->getFinvoiceApi());
        }, $invoices);
    }

    /**
     * @return FinvoiceAPI
     */
    public function getFinvoiceApi(): FinvoiceAPI
    {
        return $this->finvoiceApi;
    }

    /**
     * @param FinvoiceAPI $finvoiceApi
     */
    public function setFinvoiceApi(FinvoiceAPI $finvoiceApi): void
    {
        $this->finvoiceApi = $finvoiceApi;
    }
}
