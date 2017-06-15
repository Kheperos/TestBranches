<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 13/06/2017
 * Time: 15:20
 */

namespace Plan\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Plan\Service\Plan as PlanService;

class Plan implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $objectManager = $container->get(\Doctrine\ORM\EntityManager::class);

        return new PlanService($objectManager);
    }
}