<?php

namespace EDATA\Customer;

use EDATA\FinvoiceAPI;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use JsonSerializable;

class Customer implements JsonSerializable
{
    /**
     * @var FinvoiceAPI
     */
    private $finvoiceApi;
    /**
     * @var ?integer
     */
    private $id;
    /**
     * @var ?string
     */
    private $name;
    /**
     * @var ?string
     */
    private $phone;
    /**
     * @var ?string
     */
    private $role;
    /**
     * @var ?integer
     */
    private $facebook_id;
    /**
     * @var ?integer
     */
    private $google_id;
    /**
     * @var ?integer
     */
    private $github_id;
    /**
     * @var ?string
     */
    private $contact_name;
    /**
     * @var ?string
     */
    private $company_name;
    /**
     * @var ?string
     */
    private $website;
    /**
     * @var ?string
     */
    private $type;
    /**
     * @var ?integer
     */
    private $company_code;
    /**
     * @var ?string
     */
    private $language;
    /**
     * @var ?integer
     */
    private $vat_code;
    /**
     * @var boolean
     */
    private $enable_portal;
    /**
     * @var ?integer
     */
    private $customer_group_id;
    /**
     * @var ?integer
     */
    private $currency_id;
    /**
     * @var ?integer
     */
    private $company_id;
    /**
     * @var ?array
     */
    private $permissions;
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
    private $login_token;
    /**
     * @var ?integer
     */
    private $due_amount;
    /**
     * @var ?string
     */
    private $formattedCreatedAt;
    /**
     * @var ?string
     */
    private $avatar;
    /**
     * @var ?array
     */
    private $currency;
    /**
     * @var ?array
     */
    private $emails;
    /**
     * @var ?array
     */
    private $media;
    /**
     * @var ?array
     */
    private $addresses;

    public function __construct(FinvoiceAPI $finvoiceAPI)
    {
        $this->finvoiceApi = $finvoiceAPI;
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param ?int $id
     * @return Customer
     */
    public function setId(?int $id): Customer
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $name
     * @return Customer
     */
    public function setName(?string $name): Customer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param ?string $phone
     * @return Customer
     */
    public function setPhone(?string $phone): Customer
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param ?string $role
     * @return Customer
     */
    public function setRole(?string $role): Customer
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFacebookId(): ?int
    {
        return $this->facebook_id;
    }

    /**
     * @param ?int $facebook_id
     * @return Customer
     */
    public function setFacebookId(?int $facebook_id): Customer
    {
        $this->facebook_id = $facebook_id;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getGoogleId(): ?int
    {
        return $this->google_id;
    }

    /**
     * @param ?int $google_id
     * @return Customer
     */
    public function setGoogleId(?int $google_id): Customer
    {
        $this->google_id = $google_id;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getGithubId(): ?int
    {
        return $this->github_id;
    }

    /**
     * @param ?int $github_id
     * @return Customer
     */
    public function setGithubId(?int $github_id): Customer
    {
        $this->github_id = $github_id;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getContactName(): ?string
    {
        return $this->contact_name;
    }

    /**
     * @param ?string $contact_name
     * @return Customer
     */
    public function setContactName(?string $contact_name): Customer
    {
        $this->contact_name = $contact_name;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    /**
     * @param ?string $company_name
     * @return Customer
     */
    public function setCompanyName(?string $company_name): Customer
    {
        $this->company_name = $company_name;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param ?string $website
     * @return Customer
     */
    public function setWebsite(?string $website): Customer
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $type
     * @return Customer
     */
    public function setType(?string $type): Customer
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCompanyCode(): ?int
    {
        return $this->company_code;
    }

    /**
     * @param ?int $company_code
     * @return Customer
     */
    public function setCompanyCode(?int $company_code): Customer
    {
        $this->company_code = $company_code;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param ?string $language
     * @return Customer
     */
    public function setLanguage(?string $language): Customer
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVatCode(): ?int
    {
        return $this->vat_code;
    }

    /**
     * @param ?int $vat_code
     * @return Customer
     */
    public function setVatCode(?int $vat_code): Customer
    {
        $this->vat_code = $vat_code;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEnablePortal(): bool
    {
        return $this->enable_portal;
    }

    /**
     * @param bool $enable_portal
     * @return Customer
     */
    public function setEnablePortal(bool $enable_portal): Customer
    {
        $this->enable_portal = $enable_portal;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCustomerGroupId(): ?int
    {
        return $this->customer_group_id;
    }

    /**
     * @param ?int $customer_group_id
     * @return Customer
     */
    public function setCustomerGroupId(?int $customer_group_id): Customer
    {
        $this->customer_group_id = $customer_group_id;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCurrencyId(): ?int
    {
        return $this->currency_id;
    }

    /**
     * @param ?int $currency_id
     * @return Customer
     */
    public function setCurrencyId(?int $currency_id): Customer
    {
        $this->currency_id = $currency_id;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCompanyId(): ?int
    {
        return $this->company_id;
    }

    /**
     * @param ?int $company_id
     * @return Customer
     */
    public function setCompanyId(?int $company_id): Customer
    {
        $this->company_id = $company_id;
        return $this;
    }

    /**
     * @return ?array
     */
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    /**
     * @param ?array $permissions
     * @return Customer
     */
    public function setPermissions(?array $permissions): Customer
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @param ?string $created_at
     * @return Customer
     */
    public function setCreatedAt(?string $created_at): Customer
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    /**
     * @param ?string $updated_at
     * @return Customer
     */
    public function setUpdatedAt(?string $updated_at): Customer
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLoginToken(): ?string
    {
        return $this->login_token;
    }

    /**
     * @param ?string $login_token
     * @return Customer
     */
    public function setLoginToken(?string $login_token): Customer
    {
        $this->login_token = $login_token;
        return $this;
    }

    /**
     * @return int
     */
    public function getDueAmount(): int
    {
        return $this->due_amount;
    }

    /**
     * @param int $due_amount
     * @return Customer
     */
    public function setDueAmount(int $due_amount): Customer
    {
        $this->due_amount = $due_amount;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFormattedCreatedAt(): ?string
    {
        return $this->formattedCreatedAt;
    }

    /**
     * @param ?string $formattedCreatedAt
     * @return Customer
     */
    public function setFormattedCreatedAt(?string $formattedCreatedAt): Customer
    {
        $this->formattedCreatedAt = $formattedCreatedAt;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param ?string $avatar
     * @return Customer
     */
    public function setAvatar(?string $avatar): Customer
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return ?array
     */
    public function getCurrency(): ?array
    {
        return $this->currency;
    }

    /**
     * @param ?array $currency
     * @return Customer
     */
    public function setCurrency(?array $currency): Customer
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return ?array
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }

    /**
     * @param ?array $emails
     * @return Customer
     */
    public function setEmails(?array $emails): Customer
    {
        $this->emails = $emails;
        return $this;
    }

    /**
     * @return ?array
     */
    public function getMedia(): ?array
    {
        return $this->media;
    }

    /**
     * @param ?array $media
     * @return Customer
     */
    public function setMedia(?array $media): Customer
    {
        $this->media = $media;
        return $this;
    }

    /**
     * @param int $index
     * @return Address[]|Address|null
     */
    public function getAddresses(int $index = 0): ?iterable
    {
        if ($index > -1) {
            return $this->addresses[$index];
        }

        return $this->addresses;
    }

    /**
     * @param array|null $addresses
     * @return Customer
     */
    public function setAddresses(?array $addresses): Customer
    {
        $this->addresses = $addresses;
        return $this;
    }

    /**
     * @return array|mixed
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

        unset($array['finvoiceApi']);
        unset($array['login_token']);

        return $array;
    }

    /**
     * @return Customer
     */
    public function save(): Customer
    {
        try {
            $response = $this->finvoiceApi->secureRequest($this->getId() ? 'PUT' : 'POST', "/customers" . ($this->getId() ? '/' . $this->getId() : null), [
                'json' => $this->toArray(),
            ]);

            $content = json_decode($response->getBody()->getContents());

            $this->setId($content->customer->id);
            return $this;
        } catch (GuzzleException $e) {
            $this->finvoiceApi->setErrorInfo(['message' => $e->getMessage()]);
            return $this;
        }
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        $this->setCurrencyId(1);
        try {
            $this->finvoiceApi->secureRequest("DELETE", "/customers/" . $this->getId(), []);

            return true;
        } catch (GuzzleException $e) {
            $this->finvoiceApi->setErrorInfo(['message' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * @param string $email
     * @return $this
     */
    public function addEmail(string $email): Customer
    {
        $this->emails[] = ['unique' => rand(0, 9999999999), 'text' => $email];
        return $this;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function removeEmail(string $email): Customer
    {
        $tmp = [];

        foreach ($this->emails as $e) {
            if ($e['text'] != $email) {
                $tmp[] = $e;
            }
        }

        $this->emails = $tmp;

        return $this;
    }

    /**
     * @param $data
     * @param FinvoiceAPI $finvoiceAPI
     * @return Customer
     */
    public static function make($data, FinvoiceAPI $finvoiceAPI): Customer
    {
        $customer = new Customer($finvoiceAPI);

        $customer
            ->setId($data['id'])
            ->setName($data['name'])
            ->setPhone($data['phone'] ?? '')
            ->setRole($data['role'])
            ->setFacebookId($data['facebook_id'] ?? 0)
            ->setGoogleId($data['google_id'] ?? 0)
            ->setGithubId($data['github_id'] ?? 0)
            ->setContactName($data['contact_name'] ?? '')
            ->setCompanyName($data['company_name'] ?? '')
            ->setWebsite($data['website'] ?? '')
            ->setType($data['type'] ?? '')
            ->setCompanyCode($data['company_code'] ?? 0)
            ->setLanguage($data['language'] ?? '')
            ->setVatCode($data['vat_code'] ?? 0)
            ->setEnablePortal($data['enable_portal'] ?? false)
            ->setCustomerGroupId($data['customer_group_id'] ?? 0)
            ->setCurrencyId($data['currency_id'] ?? 0)
            ->setCompanyId($data['company_id'] ?? 0)
            ->setPermissions($data['permissions'] ?? [])
            ->setCreatedAt($data['created_at'] ?? '')
            ->setUpdatedAt($data['updated_at'] ?? '')
            ->setLoginToken($data['login_token'] ?? '')
            ->setDueAmount($data['due_amount'] ?? 0)
            ->setFormattedCreatedAt($data['formattedCreatedAt'] ?? '')
            ->setAvatar($data['avatar'] ?? '')
            ->setCurrency((array)$data['currency'] ?? [])
            ->setEmails((array)$data['emails'] ?? [])
            ->setMedia((array)$data['media'] ?? [])
            ->setAddresses(array_map(function ($address) {
                return Address::make((array) $address);
            }, (array) $data['addresses']));

        return $customer;
    }
}
