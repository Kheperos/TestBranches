<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 13/06/2017
 * Time: 15:20
 */

namespace Plan\Service;

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Plan\Entity\Contract as ContractEntity;
use Plan\Entity\Geography as GeographyEntity;
use Plan\Entity\Organisation as OrganisationEntity ;
use Plan\Entity\Plan as PlanEntity;
use Plan\Entity\PlanType as PlanTypeEntity;
use Plan\Entity\TaskStatus as TaskStatusEntity;
use Plan\Mapper\Contract as ContractMapper;
use Plan\Mapper\PlanInfo;
use Zend\Hydrator\ClassMethods;
use Zend\View\Model\JsonModel;


class Plan
{

    protected $objectManager;
    protected $hydratorl;

    protected $contracts;
    protected $plans;
    protected $organisations;
    protected $taskStatus;
    protected $planType;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->hydrator      = new DoctrineObject($objectManager);

        $this->contracts     = [];
        $this->plans         = new \Doctrine\Common\Collections\ArrayCollection;
        $this->organisations = new \Doctrine\Common\Collections\ArrayCollection;
        $this->taskStatus    = new \Doctrine\Common\Collections\ArrayCollection;
        $this->planType      = new \Doctrine\Common\Collections\ArrayCollection;
    }


    public function save($file)
    {
        ini_set('max_execution_time', "0");
        ini_set("memory_limit", "6G");
        $keys = [
            'StateCode',
            'StateName',
            'CountyName',
            'CountyFipsCode',
            'ZipCode',
        ];

        foreach ($file as $index => $row) {
            if ($index > 1) {
                $entity = $this->hydrator->hydrate(array_combine($keys, str_getcsv($row)), new GeographyEntity());
                $this->objectManager->persist($entity);
            }
        }
        $this->objectManager->flush();
    }

    public function getOne($planId)
    {
        return $this->objectManager->getRepository(PlanEntity::class)->find($planId);
    }

//    public function getPaginated(Params $params)
//    {
//        $paginator = $this->objectManager->getRepository(RuleEntity::class)->getPaginated($params);
//
//        return $paginator;
//    }

    public function delete($planId)
    {
        $planEntity = $this->getOne($planId);
        $this->objectManager->remove($planEntity);

        $this->objectManager->flush();
    }

    public function create($data)
    {
        $planEntity = $this->hydrator->hydrate($data, new PlanEntity());

        $this->objectManager->persist($planEntity);
        $this->objectManager->flush();

        die();
    }

    public function update($id, $data)
    {
        $planEntity = $this->getOne($id);
        $planEntity = $this->hydrator->hydrate($data, $planEntity);

        $this->objectManager->persist($planEntity);
        $this->objectManager->flush();

        die();
    }

    public function updatePlan($file)
    {
        ini_set('max_execution_time', "0");
        ini_set("memory_limit", "6G");
        $mapper = new PlanInfo();

        foreach ($file as $index => $row) {
            if ($index > 1) {
                $mapper->hydrate(str_getcsv($row));

                $criteria = Criteria::create()->where(
                    Criteria::expr()->andX(
                        Criteria::expr()->eq('contractId', $mapper->getContractId()),
                        Criteria::expr()->eq('year', $mapper->getYear())
                    )
                );

                $result = $this->contracts->matching($criteria);
                if ($result->isEmpty()) {
                    $contractEntity = $this->hydrator->hydrate($mapper->extract(), new ContractEntity());
                    $this->contracts->add($contractEntity);
                    $this->objectManager->persist($contractEntity);
                } else {
                    $contractEntity = $result->first();
                }

                $criteria = Criteria::create()->where(
                    Criteria::expr()->andX(
                        Criteria::expr()->eq('planId', $mapper->getPlanId()),
                        Criteria::expr()->eq('segmentId', $mapper->getSegmentId()),
                        Criteria::expr()->eq('name', $mapper->getName()),
                        Criteria::expr()->eq('geoName', $mapper->getGeoName())
                    )
                );

                $result = $this->plans->matching($criteria);
                if ($result->isEmpty()) {
                    $planEntity = $this->hydrator->hydrate($mapper->extract(), new PlanEntity());
                    $this->plans->add($planEntity);
                    $this->objectManager->persist($planEntity);
                } else {
                    $planEntity = $result->first();
                }

                if (!$planEntity->getContract()->contains($contractEntity)) {
                    $planEntity->addContract($contractEntity);
                }


                $criteria = Criteria::create()->where(
                    Criteria::expr()->andX(
                        Criteria::expr()->eq('organisationName', $mapper->getOrganisationName()),
                        Criteria::expr()->eq('webAddress', $mapper->getWebAddress())

                    )
                );

                $result = $this->organisations->matching($criteria);
                if ($result->isEmpty()) {
                    $organisationEntity = $this->hydrator->hydrate($mapper->extract(), new OrganisationEntity());
                    $this->organisations->add($organisationEntity);
                    $this->objectManager->persist($organisationEntity);
                } else {
                    $organisationEntity = $result->first();
                }

                $contractEntity->setOrganisation($organisationEntity);

                //plantype

                $criteria = Criteria::create()->where(
                    Criteria::expr()->andX(
                        Criteria::expr()->eq('type', $mapper->getType()),
                        Criteria::expr()->eq('typeDescription', $mapper->getTypeDescription())

                    )
                );

                $result = $this->planType->matching($criteria);
                if ($result->isEmpty()) {
                    $planTypeEntity = $this->hydrator->hydrate($mapper->extract(), new PlanTypeEntity());
                    $this->planType->add($planTypeEntity);
                    $this->objectManager->persist($planTypeEntity);
                } else {
                    $planTypeEntity = $result->first();
                }

                $planEntity->setPlanType($planTypeEntity);

                //task status

                $criteria = Criteria::create()->where(
                    Criteria::expr()->andX(
                        Criteria::expr()->eq('statusCode', $mapper->getStatusCode()),
                        Criteria::expr()->eq('statusDescription', $mapper->getStatusDescription())

                    )
                );

                $result = $this->taskStatus->matching($criteria);
                if ($result->isEmpty()) {
                    $taskStatusEntity = $this->hydrator->hydrate($mapper->extract(), new TaskStatusEntity());
                    $this->taskStatus->add($taskStatusEntity);
                    $this->objectManager->persist($taskStatusEntity);
                } else {
                    $taskStatusEntity = $result->first();
                }

                $planEntity->setTaskStatus($taskStatusEntity);

            }

            if ($index > 100000) {
                break;
            }

        }

        $this->objectManager->flush();
        die('bored');

    }

    public function updateContract($file)
    {
        $keys = [];
        foreach ($file as $index => $row) {
            if ($index == 0) {
                $keys = str_getcsv($row);
                continue;
            }
            $array = array_combine($keys, str_getcsv($row));
            $mapper = new ContractMapper();

            if (!isset($this->contracts[$array['Contract_ID'] . $array['Contract_Year']])){
                $mapper->hydrate($array);
                $this->contracts[$array['Contract_ID'] . $array['Contract_Year']] = $mapper;
            }

            $result = $this->objectManager->getRepository(GeographyEntity::class)->findby(['zipCode' => $array['Zip_Code']]);
            if ($result){
                $this->contracts[$array['Contract_ID'] . $array['Contract_Year']]->setGeography($result);
            }
            if ($index > 10) {
                dump($this->contracts);
                die ();
            }
            echo ($index . "\n");
        }

        foreach ($this->contracts as $contract){
            $this->objectManager->persist($this->hydrator->hydrate($contract->extract(), new ContractEntity()));
        }
        $this->objectManager->flush();
    }


}