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

use Psr\Container\ContainerInterface;
use Vonage\Client\APIResource;
use Vonage\Client\Credentials\Handler\BasicHandler;

class ClientFactory
{
    public function __invoke(ContainerInterface $container): Client
    {
        $api = $container->make(APIResource::class);
        $api->setBaseUrl('https://api-eu.vonage.com')
            ->setAuthHandler(new BasicHandler());

        return new Client($api);
    }
}
