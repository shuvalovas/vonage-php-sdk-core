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

use Vonage\Entity\Hydrator\HydratorInterface;

class ResellerHydrator implements HydratorInterface
{
    public function hydrate(array $data)
    {
        $brand = new Reseller();
        return $this->hydrateObject($data, $brand);
    }

    public function hydrateObject(array $data, $object)
    {
        $object->fromArray($data);
        return $object;
    }
}
