<?php

namespace EDATA;

use EDATA\Customer\Customer;
use EDATA\Customer\CustomerHelper;
use EDATA\Invoice\InvoiceHelper;
use EDATA\Item\ItemHelper;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class FinvoiceAPI
{
    /**
     * @var string
     */
    private $projectUrl;

    /**
     * @var ?array
     */
    private $errorInfo;

    /**
     * @var string
     */
    private $apiKey = '';

    /**
     * @var CustomerHelper
     */
    private $customers;

    /**
     * @var ItemHelper
     */
    private $items;

    /**
     * @var InvoiceHelper
     */
    private $invoices;

    /**
     * FinvoiceAPI constructor.
     * @param string $projectUrl
     * @param string $apiKey
     */
    public function __construct(string $projectUrl, string $apiKey)
    {
        $this->projectUrl = $projectUrl;
        $this->apiKey = $apiKey;
        $this->customers = new CustomerHelper($this);
        $this->setItems(new ItemHelper($this));
        $this->setInvoices(new InvoiceHelper($this));
    }

    /**
     * @return string
     */
    public function getProjectUrl(): string
    {
        return $this->projectUrl;
    }


    /**
     * @param string $projectUrl
     */
    public function setProjectUrl(string $projectUrl)
    {
        $this->projectUrl = $projectUrl;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return CustomerHelper
     */
    public function getCustomers(): CustomerHelper
    {
        $this->customers->clearWhere();
        return $this->customers;
    }

    /**
     * @param CustomerHelper $customers
     * @return FinvoiceAPI
     */
    public function setCustomers(CustomerHelper $customers): FinvoiceAPI
    {
        $this->customers = $customers;
        return $this;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function secureRequest(string $method, string $url, array $data): array
    {
        $url = $this->getProjectUrl() . "/api" . $url . "?login_token=" . $this->getApiKey();
        if ($method == "GET") {
            $query = http_build_query($data);
            $url = $url . "&" . $query;
        }

        $ch = curl_init($url);
        $payload = json_encode($data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type:application/json',
            'Accept:application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $body = substr($response, $header_size);
        curl_close($ch);

        if ($code >= 300) {
            $this->setErrorInfo(['body' => $body]);
            throw new Exception("Couldn't make request. - $method $url ::::::::: " . serialize($data) ."\r\r". $response);
        }

        return json_decode($body, true);
    }

    /**
     * @return array|null
     */
    public function getErrorInfo(): ?array
    {
        return $this->errorInfo;
    }

    /**
     * @param array|null $errorInfo
     */
    public function setErrorInfo(?array $errorInfo): void
    {
        $this->errorInfo = $errorInfo;
    }

    /**
     * @return ItemHelper
     */
    public function getItems(): ItemHelper
    {
        return $this->items;
    }

    /**
     * @param ItemHelper $items
     */
    public function setItems(ItemHelper $items): void
    {
        $items->setWhere([]);
        $this->items = $items;
    }

    /**
     * @return InvoiceHelper
     */
    public function getInvoices(): InvoiceHelper
    {
        return $this->invoices;
    }

    /**
     * @param InvoiceHelper $invoices
     */
    public function setInvoices(InvoiceHelper $invoices): void
    {
        $this->invoices = $invoices;
    }
}
