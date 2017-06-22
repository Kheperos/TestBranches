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
    public function getPaginated($page, $zipCode)
    {
        $queryBuilder = $this->createQueryBuilder('Plan')
            ->leftJoin('Plan.geography', 'Geography');

        if (isset($zipCode)) {
            $queryBuilder->where(
                $queryBuilder->expr()->eq('Geography.zipCode', ':zipCode')
            )
                ->setParameter('zipCode', $zipCode);
        }

        $paginator = new Paginator(new DoctrinePaginator(new ORMPaginator($queryBuilder->getQuery())));

        return $paginator->setCurrentPageNumber($page)->setItemCountPerPage(20);
    }
}