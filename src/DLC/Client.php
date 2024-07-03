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

use Psr\Http\Client\ClientExceptionInterface;
use Vonage\Client\APIClient;
use Vonage\Client\APIResource;
use Vonage\Client\Exception\Exception;
use Vonage\Entity\Filter\FilterInterface;
use Vonage\Entity\Hydrator\ArrayHydrator;

class Client implements APIClient
{
    public function __construct(protected ?APIResource $api = null)
    {
    }

    public function getApiResource(): APIResource
    {
        return $this->api;
    }

    public function getRestUrl(): string
    {
        return 'https://api-eu.vonage.com';
    }

    public function getCampaigns($brand_id): array
    {
        $api = $this->getApiResource();
        $api->setCollectionName('campaigns');
        $hydrator = new ArrayHydrator();
        $response = $api->search(null, '/v1/10dlc/brands/' . $brand_id . '/campaigns');
        $response->setPageIndexKey('page');

        $response->setHydrator(new CampaignHydrator());
        $hydrator->setPrototype(new Campaign());

        $campaigns = [];
        foreach ($response as $rawCampaign) {
            $campaigns[] = $rawCampaign;
        }

        return $campaigns;
    }

    public function getBrands(FilterInterface $options = null): array
    {
        $api = $this->getApiResource();
        $api->setCollectionName('brands');
        $hydrator = new ArrayHydrator();
        $response = $api->search($options, '/v1/10dlc/brands');
        $response->setPageIndexKey('page');

        $response->setHydrator(new BrandHydrator());
        $hydrator->setPrototype(new Brand());

        $brands = [];
        foreach ($response as $rawBrands) {
            $brands[] = $rawBrands;
        }
        return $brands;
    }

    /**
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function newBrand($body): void
    {
        $api = $this->getApiResource();
        $api->create($body, '/v1/10dlc/brands');
    }

    public function updateBrand($brand_id, $body): void
    {
        $api = $this->getApiResource();
        $api->partiallyUpdate('v1/10dlc/brands/' . $brand_id, $body);
    }

    /**
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function getBrand($brand_id): Brand
    {
        $api = $this->getApiResource();
        $response = $api->get('v1/10dlc/brands/' . $brand_id);

        $brand = new Brand();
        $brand->fromArray($response);
        return $brand;
    }

    /**
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function newCampaign($brand_id, $body): void
    {
        $api = $this->getApiResource();
        $api->create($body, '/v1/10dlc/brands/' . $brand_id . '/campaigns');
    }

    public function getResellers(FilterInterface $options = null): array
    {
        $api = $this->getApiResource();
        $api->setCollectionName('resellers');
        $hydrator = new ArrayHydrator();
        $response = $api->search($options, '/v1/10dlc/resellers');
        $response->setPageIndexKey('page');

        $response->setHydrator(new ResellerHydrator());
        $hydrator->setPrototype(new Reseller());

        $resellers = [];
        foreach ($response as $rawResellers) {
            $resellers[] = $rawResellers;
        }
        return $resellers;
    }

    public function newReseller($body): void
    {
        $api = $this->getApiResource();
        $api->create($body, '/v1/10dlc/resellers');
    }
}
