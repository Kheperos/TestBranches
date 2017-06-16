<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 15/06/2017
 * Time: 23:32
 */

namespace Plan\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Plan\Service\UpdateDb as UpdateDbService;

class UpdateDb implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $objectManager = $container->get(\Doctrine\ORM\EntityManager::class);

        return new UpdateDbService($objectManager);
    }
}