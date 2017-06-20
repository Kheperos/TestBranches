<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 20/06/2017
 * Time: 12:59
 */

namespace Plan\Mapper;

use Doctrine\Common\Persistence\ObjectManager;

interface EntityMapperInterface
{
    public function __construct(ObjectManager $objectManager);
    public function hydrate($entity);
    public function extract();
}