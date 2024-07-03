<?php

/**
 * Vonage Client Library for PHP
 *
 * @copyright Copyright (c) 2024 SR Apps, Inc. (https://reachtheapp.com)
 * @copyright Copyright (c) 2024 Andrei Shuvalov
 * @license https://github.com/Vonage/vonage-php-sdk-core/blob/master/LICENSE.txt Apache License 2.0
 */

declare(strict_types=1);

namespace Vonage\DLC;

use DateTimeImmutable;
use Vonage\Entity\Hydrator\ArrayHydrateInterface;

class Brand implements ArrayHydrateInterface
{
    // "account_id": "abcd1234",
    //            "primary_account_id": "abcd1234",
    //            "entity_type": "PUBLIC_PROFIT",
    //            "first_name": "John",
    //            "last_name": "Smith",
    //            "display_name": "Vonage",
    //            "company_name": "Vonage",
    //            "ein": "20-1111111",
    //            "ein_issuing_country": "US",
    //            "universal_ein": "20-1111111",
    //            "alt_business_id_type": "DUNS",
    //            "alt_business_id": "150483782",
    //            "phone": "+15556660001",
    //            "street": "23 Main Street",
    //            "city": "Holmdel",
    //            "state": "NJ",
    //            "postal_code": "07733",
    //            "country": "US",
    //            "email": "devrel@vonage.com",
    //            "stock_symbol": "VG",
    //            "stock_exchange": "NASDAQ",
    //            "website": "https://vonage.com",
    //            "vertical": "TECHNOLOGY",
    //            "mobile_phone": "12023339999",
    //            "campaign_count": 5,
    //            "carrier_suspensions": [
    //               {
    //                  "category": "string",
    //                  "explanation": "string"
    //               }
    //            ],
    //            "brand_relationship": "BASIC_ACCOUNT",
    //            "partner": true,
    //            "shared": true,
    //            "owner": true,
    //            "status": "string",
    //            "reference_id": "string",
    //            "verified_date": "2019-08-24T14:15:22Z",
    //            "brand_id": "BLQKOPK",
    //            "created_date": "2020-01-02 05:12:14",
    //            "last_updated": "2020-02-02 14:12:00",

    protected $data = [];

    public function getBrandId(): string
    {
        return $this->data['brand_id'];
    }

    public function getCountryOfRegistration(): string
    {
        return $this->getData('country');
    }

    public function getName(): string
    {
        return $this->getData('display_name');
    }

    public function getPhone(): string
    {
        return $this->getData('phone');
    }

    public function getOrganizationVerticalType(): string
    {
        return $this->getData('vertical');
    }

    public function getDisplayName(): string
    {
        return $this->getData('display_name');
    }

    public function getOrganizationLegalForm(): string
    {
        return $this->getData('entity_type');
    }

    public function getCompanyName(): string
    {
        return $this->getData('company_name');
    }

    public function getFirstName(): string
    {
        return $this->getData('first_name');
    }

    public function getLastName(): string
    {
        return $this->getData('last_name');
    }

    public function getAddressStreet(): string
    {
        return $this->getData('street');
    }

    public function getAddressCity(): string
    {
        return $this->getData('city');
    }

    public function getAddressState(): string
    {
        return $this->getData('state');
    }

    public function getEmail(): string
    {
        return $this->getData('email');
    }

    public function getAddressPostalCode(): string
    {
        return $this->getData('postal_code');
    }

    public function getEin(): string
    {
        return $this->getData('ein');
    }

    public function getEinIssuingCountry(): string
    {
        return $this->getData('ein_issuing_country');
    }

    public function getUniversalEin(): string
    {
        return $this->getData('universal_ein');
    }

    public function getAltBusinessIdType(): string
    {
        return $this->getData('alt_business_id_type');
    }

    public function getAltBusinessId(): string
    {
        return $this->getData('alt_business_id');
    }

    public function getStockSymbol(): string
    {
        return $this->getData('stock_symbol');
    }

    public function getStockExchange(): string
    {
        return $this->getData('stock_exchange');
    }

    public function getWebsite(): string
    {
        return $this->getData('website');
    }

    public function getVertical(): string
    {
        return $this->getData('vertical');
    }

    public function getMobilePhone(): string
    {
        return $this->getData('mobile_phone');
    }

    public function getVerifiedDate(): string
    {
        return $this->getData('verified_date');
    }

    /**
     * @throws \Exception
     */
    public function getCreationDate(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->getData('created_date'));
    }

    public function getCampaignsCount(): int
    {
        return $this->getData('campaign_count');
    }

    public function getCountry(): string
    {
        return $this->getData('country');
    }

    public function getStatus(): string
    {
        return $this->getData('status');
    }

    public function fromArray(array $data): void
    {
        $this->data = $data;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    private function getData($key): mixed
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return '';
    }
}
