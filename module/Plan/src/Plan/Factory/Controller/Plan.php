<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 15/06/2017
 * Time: 11:09
 */

namespace Plan\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Plan\Controller\PlanController;
use Plan\Service\Plan as PlanService;

class Plan implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $service = $container->get(PlanService::class);
        return new PlanController($service);
    }
}