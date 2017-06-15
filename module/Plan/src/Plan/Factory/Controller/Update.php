<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 13/06/2017
 * Time: 13:11
 */

namespace Plan\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Plan\Controller\UpdateController;
use Plan\Service\Plan as PlanService;

class Update implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $service = $container->get(PlanService::class);
        return new UpdateController($service);
    }
}