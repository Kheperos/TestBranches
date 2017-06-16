<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 15/06/2017
 * Time: 23:30
 */

namespace Plan\Factory\Controller\Console;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Plan\Controller\Console\UpdateDbController;
use Plan\Service\UpdateDb as UpdateDbService;

class UpdateDb implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $service = $container->get(UpdateDbService::class);
        return new UpdateDbController($service);
    }
}