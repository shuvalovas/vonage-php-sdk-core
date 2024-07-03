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

use Vonage\Entity\Hydrator\ArrayHydrateInterface;

class Reseller implements ArrayHydrateInterface
{
    protected array $data = [];

    public function fromArray(array $data): void
    {
        $this->data = $data;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
