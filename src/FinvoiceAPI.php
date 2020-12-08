<?php

namespace EDATA;

use EDATA\Customer\Customer;
use EDATA\Customer\CustomerHelper;
use EDATA\Invoice\InvoiceHelper;
use EDATA\Item\ItemHelper;
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
     * @var Client
     */
    private $httpClient;

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
        $this->setProjectUrl($projectUrl);
        $this->setHttpClient(new Client([
            'base_uri' => $projectUrl,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        ]));
        $this->setCustomers(new CustomerHelper($this));
        $this->setItems(new ItemHelper($this));
        $this->setInvoices(new InvoiceHelper($this));
        $this->setApiKey($apiKey);
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
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    /**
     * @param Client $httpClient
     */
    public function setHttpClient(Client $httpClient)
    {
        $this->httpClient = $httpClient;
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
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function secureRequest(string $method, string $url, array $data)
    {
        $url = "api" . $url . "?login_token=" . $this->getApiKey();

        return $this->getHttpClient()->request($method, $url, $data);
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
