<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 19/06/2017
 * Time: 16:30
 */

namespace Plan\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Zend\Paginator\Paginator;

class Plan extends EntityRepository
{
    public function getPaginated($page)
    {
        $queryBuilder = $this->createQueryBuilder('Plan');

        $paginator = new Paginator(new DoctrinePaginator(new ORMPaginator($queryBuilder->getQuery())));

        return $paginator->setCurrentPageNumber($page)->setItemCountPerPage(20);
    }
}