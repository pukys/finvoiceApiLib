<?php


namespace EDATA\Invoice;


use EDATA\Customer\Customer;
use EDATA\FinvoiceAPI;
use EDATA\Item\Item;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use JsonSerializable;

class Invoice implements JsonSerializable
{
    /**
     * @var ?FinvoiceApi
     */
    private $finvoiceApi;
    /**
     * @var ?int
     */
    private $id;
    /**
     * @var ?string
     */
    private $type;
    /**
     * @var ?string
     */
    private $invoice_date;
    /**
     * @var ?string
     */
    private $due_date;
    /**
     * @var ?string
     */
    private $invoice_number;
    /**
     * @var ?string
     */
    private $reference_number;
    /**
     * @var ?string
     */
    private $status;
    /**
     * @var ?string
     */
    private $paid_status;
    /**
     * @var ?string
     */
    private $tax_per_item;
    /**
     * @var ?string
     */
    private $discount_per_item;
    /**
     * @var ?string
     */
    private $notes;
    /**
     * @var ?string
     */
    private $discount_type;
    /**
     * @var ?numeric
     */
    private $discount;
    /**
     * @var ?numeric
     */
    private $discount_val;
    /**
     * @var ?numeric
     */
    private $sub_total;
    /**
     * @var ?numeric
     */
    private $total;
    /**
     * @var ?numeric
     */
    private $tax;
    /**
     * @var ?numeric
     */
    private $due_amount;
    /**
     * @var bool
     */
    private $sent;
    /**
     * @var bool
     */
    private $viewed;
    /**
     * @var ?string
     */
    private $unique_hash;
    /**
     * @var ?int
     */
    private $serie_id;
    /**
     * @var ?int
     */
    private $invoice_template_id;
    /**
     * @var ?int
     */
    private $customer_id;
    /**
     * @var Customer $customer
     */
    private $customer;
    /**
     * @var ?int
     */
    private $author_id;
    /**
     * @var ?int
     */
    private $company_id;
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
    private $viewed_at;
    /**
     * @var ?string
     */
    private $name;
    /**
     * @var ?string
     */
    private $formattedCreatedAt;
    /**
     * @var ?string
     */
    private $formattedInvoiceDate;
    /**
     * @var ?string
     */
    private $formattedDueDate;
    /**
     * @var ?string
     */
    private $pdf_url;
    /**
     * @var Item[]
     */
    private $items;
    /**
     * @var array
     */
    private $invoice_template;

    public function __construct(FinvoiceAPI $finvoiceAPI)
    {
        $this->finvoiceApi = $finvoiceAPI;
        // todo: ...
        $this->setSerieId(2);
        $this->setDueDate(date("Y-m-d", time() + (60 * 60 * 24 * 7)));
        $this->setItems([]);
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
     * @return Invoice
     */
    public function setId(?int $id): Invoice
    {
        $this->id = $id;
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
     * @return Invoice
     */
    public function setType(?string $type): Invoice
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoiceDate(): ?string
    {
        return $this->invoice_date;
    }

    /**
     * @param string|null $invoice_date
     * @return Invoice
     */
    public function setInvoiceDate(?string $invoice_date): Invoice
    {
        $this->invoice_date = $invoice_date;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDueDate(): ?string
    {
        return $this->due_date;
    }

    /**
     * @param string|null $due_date
     * @return Invoice
     */
    public function setDueDate(?string $due_date): Invoice
    {
        $this->due_date = $due_date;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoice_number;
    }

    /**
     * @param string|null $invoice_number
     * @return Invoice
     */
    public function setInvoiceNumber(?string $invoice_number): Invoice
    {
        $this->invoice_number = $invoice_number;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReferenceNumber(): ?string
    {
        return $this->reference_number;
    }

    /**
     * @param string|null $reference_number
     * @return Invoice
     */
    public function setReferenceNumber(?string $reference_number): Invoice
    {
        $this->reference_number = $reference_number;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return Invoice
     */
    public function setStatus(?string $status): Invoice
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaidStatus(): ?string
    {
        return $this->paid_status;
    }

    /**
     * @param string|null $paid_status
     * @return Invoice
     */
    public function setPaidStatus(?string $paid_status): Invoice
    {
        $this->paid_status = $paid_status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxPerItem(): ?string
    {
        return $this->tax_per_item;
    }

    /**
     * @param string|null $tax_per_item
     * @return Invoice
     */
    public function setTaxPerItem(?string $tax_per_item): Invoice
    {
        $this->tax_per_item = $tax_per_item;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscountPerItem(): ?string
    {
        return $this->discount_per_item;
    }

    /**
     * @param string|null $discount_per_item
     * @return Invoice
     */
    public function setDiscountPerItem(?string $discount_per_item): Invoice
    {
        $this->discount_per_item = $discount_per_item;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     * @return Invoice
     */
    public function setNotes(?string $notes): Invoice
    {
        $this->notes = $notes;
        return $this;
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
     * @return Invoice
     */
    public function setDiscountType(?string $discount_type): Invoice
    {
        $this->discount_type = $discount_type;
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
     * @return Invoice
     */
    public function setDiscount($discount): Invoice
    {
        $this->discount = $discount;
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
     * @return Invoice
     */
    public function setDiscountVal($discount_val): Invoice
    {
        $this->discount_val = $discount_val;
        return $this;
    }

    /**
     * @return float|int|string|null
     */
    public function getSubTotal()
    {
        return $this->sub_total;
    }

    /**
     * @param float|int|string|null $sub_total
     * @return Invoice
     */
    public function setSubTotal($sub_total): Invoice
    {
        $this->sub_total = $sub_total;
        return $this;
    }

    /**
     * @return float|int|string|null
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param float|int|string|null $total
     * @return Invoice
     */
    public function setTotal($total): Invoice
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return float|int|string|null
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param float|int|string|null $tax
     * @return Invoice
     */
    public function setTax($tax): Invoice
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return float|int|string|null
     */
    public function getDueAmount()
    {
        return $this->due_amount;
    }

    /**
     * @param float|int|string|null $due_amount
     * @return Invoice
     */
    public function setDueAmount($due_amount): Invoice
    {
        $this->due_amount = $due_amount;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSent(): bool
    {
        return $this->sent;
    }

    /**
     * @param bool $sent
     * @return Invoice
     */
    public function setSent(bool $sent): Invoice
    {
        $this->sent = $sent;
        return $this;
    }

    /**
     * @return bool
     */
    public function isViewed(): bool
    {
        return $this->viewed;
    }

    /**
     * @param bool $viewed
     * @return Invoice
     */
    public function setViewed(bool $viewed): Invoice
    {
        $this->viewed = $viewed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUniqueHash(): ?string
    {
        return $this->unique_hash;
    }

    /**
     * @param mixed $unique_hash
     * @return Invoice
     */
    public function setUniqueHash($unique_hash): Invoice
    {
        $this->unique_hash = $unique_hash;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSerieId(): ?int
    {
        return $this->serie_id;
    }

    /**
     * @param int|null $serie_id
     * @return Invoice
     */
    public function setSerieId(?int $serie_id): Invoice
    {
        $this->serie_id = $serie_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInvoiceTemplateId(): ?int
    {
        return $this->invoice_template_id;
    }

    /**
     * @param int|null $invoice_template_id
     * @return Invoice
     */
    public function setInvoiceTemplateId(?int $invoice_template_id): Invoice
    {
        $this->invoice_template_id = $invoice_template_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param int|null $customer_id
     * @return Invoice
     */
    public function setCustomerId(?int $customer_id): Invoice
    {
        $this->customer_id = $customer_id;
        return $this;
    }

    /**
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer(Customer $customer): Invoice
    {
        $this->setCustomerId($customer->getId());
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAuthorId(): ?int
    {
        return $this->author_id;
    }

    /**
     * @param int|null $author_id
     * @return Invoice
     */
    public function setAuthorId(?int $author_id): Invoice
    {
        $this->author_id = $author_id;
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
     * @return Invoice
     */
    public function setCompanyId(?int $company_id): Invoice
    {
        $this->company_id = $company_id;
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
     * @return Invoice
     */
    public function setCreatedAt(?string $created_at): Invoice
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
     * @return Invoice
     */
    public function setUpdatedAt(?string $updated_at): Invoice
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getViewedAt(): ?string
    {
        return $this->viewed_at;
    }

    /**
     * @param string|null $viewed_at
     * @return Invoice
     */
    public function setViewedAt(?string $viewed_at): Invoice
    {
        $this->viewed_at = $viewed_at;
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
     * @return Invoice
     */
    public function setName(?string $name): Invoice
    {
        $this->name = $name;
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
     * @return Invoice
     */
    public function setFormattedCreatedAt(?string $formattedCreatedAt): Invoice
    {
        $this->formattedCreatedAt = $formattedCreatedAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormattedInvoiceDate(): ?string
    {
        return $this->formattedInvoiceDate;
    }

    /**
     * @param string|null $formattedInvoiceDate
     * @return Invoice
     */
    public function setFormattedInvoiceDate(?string $formattedInvoiceDate): Invoice
    {
        $this->formattedInvoiceDate = $formattedInvoiceDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormattedDueDate(): ?string
    {
        return $this->formattedDueDate;
    }

    /**
     * @param string|null $formattedDueDate
     * @return Invoice
     */
    public function setFormattedDueDate(?string $formattedDueDate): Invoice
    {
        $this->formattedDueDate = $formattedDueDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPdfUrl(): ?string
    {
        return $this->pdf_url;
    }

    /**
     * @param string|null $pdf_url
     * @return Invoice
     */
    public function setPdfUrl(?string $pdf_url): Invoice
    {
        $this->pdf_url = $pdf_url;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @return Invoice
     */
    public function setItems(array $items): Invoice
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): Invoice
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @return array
     */
    public function getInvoiceTemplate(): array
    {
        return $this->invoice_template;
    }

    /**
     * @param array $invoice_template
     * @return Invoice
     */
    public function setInvoiceTemplate(array $invoice_template): Invoice
    {
        $this->invoice_template = $invoice_template;
        return $this;
    }

    /**
     * @return FinvoiceAPI
     */
    public function getFinvoiceApi(): FinvoiceAPI
    {
        return $this->finvoiceApi;
    }

    /**
     * @param mixed $finvoiceApi
     */
    public function setFinvoiceApi($finvoiceApi): void
    {
        $this->finvoiceApi = $finvoiceApi;
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

        $array['items'] = [];

        foreach ($this->getItems() as $item) {
            $array['items'][] = $item->toArray();
        }

        unset($array['finvoiceApi']);

        return $array;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        try {
            $response = $this->finvoiceApi->secureRequest($this->getId() ? 'PUT' : 'POST', "/invoices" . ($this->getId() ? '/' . $this->getId() : null), [
                'json' => $this->toArray(),
            ]);

            $content = json_decode($response->getBody()->getContents());

            $this
                ->setId($content->invoice->id)
                ->setTotal($content->invoice->total)
                ->setInvoiceNumber($content->invoice->invoice_number)
                ->setSubTotal($content->invoice->sub_total)
                ->setDueAmount($content->invoice->due_amount)
                ->setCreatedAt($content->invoice->created_at)
                ->setUpdatedAt($content->invoice->updated_at)
                ->setViewedAt($content->invoice->viewed_at)
                ->setFormattedCreatedAt($content->invoice->formattedCreatedAt)
                ->setFormattedInvoiceDate($content->invoice->formattedInvoiceDate)
                ->setFormattedDueDate($content->invoice->formattedDueDate)
                ->setPdfUrl($content->invoice->pdf_url)
                ->setAuthorId($content->invoice->author_id);

            return true;
        } catch (GuzzleException $e) {
            $this->finvoiceApi->setErrorInfo(['message' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * @param string|null $email
     * @return bool
     */
    public function send(?string $email = null): bool
    {
        try {
            $emails = $email ? [$email] : array_map(function ($e) {
                return $e->email;
            }, $this->getCustomer()->getEmails());

            $this->finvoiceApi->secureRequest('POST', "/invoices/send", [
                'json' => [
                    'id' => $this->getId(),
                    'emails' => $emails
                ],
            ]);

            return true;
        } catch (GuzzleException $e) {
            $this->finvoiceApi->setErrorInfo(['message' => $e->getMessage()]);
            return false;
        }
    }


    /**
     * @param string $payment_type
     * @param float $amount
     * @return bool
     */
    public function addPayment(string $payment_type, float $amount): bool
    {
        try {
            $this->finvoiceApi->secureRequest('POST', "/payments", [
                'json' => [
                    'invoice_id' => $this->getId(),
                    'customer_id' => $this->getCustomerId(),
                    'payment_type_title' => $payment_type,
                    'amount' => $amount
                ],
            ]);
            return true;
        } catch (GuzzleException $e) {
            $this->finvoiceApi->setErrorInfo(['message' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * @param array $invoice
     * @param FinvoiceAPI $finvoiceAPI
     * @return Invoice
     * @throws Exception
     */
    public static function make(array $invoice, FinvoiceAPI $finvoiceAPI): Invoice
    {
        $newInvoice = new self($finvoiceAPI);

        $newInvoice
            ->setId($invoice['id'])
            ->setType($invoice['type'])
            ->setInvoiceDate($invoice['invoice_date'])
            ->setDueDate($invoice['due_date'])
            ->setInvoiceNumber($invoice['invoice_number'])
            ->setReferenceNumber($invoice['reference_number'])
            ->setStatus($invoice['status'])
            ->setPaidStatus($invoice['paid_status'])
            ->setTaxPerItem($invoice['tax_per_item'])
            ->setDiscountPerItem($invoice['discount_per_item'])
            ->setNotes($invoice['notes'])
            ->setDiscountType($invoice['discount_type'])
            ->setDiscount($invoice['discount'])
            ->setDiscountVal($invoice['discount_val'])
            ->setSubTotal($invoice['sub_total'])
            ->setTotal($invoice['total'])
            ->setTax($invoice['tax'])
            ->setDueAmount($invoice['due_amount'])
            ->setSent($invoice['sent'])
            ->setViewed($invoice['viewed'])
            ->setUniqueHash($invoice['unique_hash'])
            ->setSerieId($invoice['serie_id'])
            ->setInvoiceTemplateId($invoice['invoice_template_id'])
            ->setCustomerId($invoice['customer_id'])
            ->setCustomer($finvoiceAPI->getCustomers()->where('id', $invoice['customer_id'])->fetch()[0])
            ->setAuthorId($invoice['author_id'])
            ->setCompanyId($invoice['company_id'])
            ->setCreatedAt($invoice['created_at'])
            ->setUpdatedAt($invoice['updated_at'])
            ->setViewedAt($invoice['viewed_at'])
            ->setName($invoice['name'])
            ->setFormattedInvoiceDate($invoice['formattedCreatedAt'])
            ->setFormattedCreatedAt($invoice['formattedInvoiceDate'])
            ->setFormattedDueDate($invoice['formattedDueDate'])
            ->setPdfUrl($invoice['pdf_url'])
            ->setInvoiceTemplate($invoice['invoice_template']);


        foreach ($invoice['items'] as $_item) {
            $item = $finvoiceAPI->getItems()->where('id', $_item['item_id'])->fetch()[0]
                ->setDiscount($_item['discount'])
                ->setDiscountType($_item['discount_type'])
                ->setDiscountVal($_item['discount']);
            $newInvoice->addItem($item);
        }

        return $newInvoice;
    }
}
