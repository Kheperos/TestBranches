<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 13/06/2017
 * Time: 15:20
 */

namespace Plan\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Plan\Entity\Contract as ContractEntity;
use Plan\Entity\Contract;
use Plan\Entity\Geography as GeographyEntity;
use Plan\Entity\Organisation as OrganisationEntity;
use Plan\Entity\Plan as PlanEntity;
use Plan\Entity\PlanCost as PlanCostEntity;
use Plan\Mapper\Table\Contract as ContractMapper;
use Plan\Mapper\Table\Organisation as OrganisationMapper;
use Plan\Mapper\Paginated as PaginatedMapper;
use Plan\Mapper\Table\Plan as PlanMapper;
use Plan\Mapper\Table\PlanCost as PlanCostMapper;
use Zend\View\Model\JsonModel;
use JMS\Serializer\SerializerBuilder;
use Plan\Mapper\Json\Plan as JsonPlanMapper;


class Plan
{

    protected $objectManager;
    protected $hydratorl;

    protected $contracts     = [];
    protected $plans         = [];
    protected $organisations = [];
    protected $geography     = [];

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->hydrator      = new DoctrineObject($objectManager);
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

    public function getPaginated($page)
    {
        $paginator = $this->objectManager->getRepository(PlanEntity::class)->getPaginated($page);

        $map    = new JsonPlanMapper($this->objectManager);
        $mapper = new PaginatedMapper($map);

        $mapper->hydrate($paginator);

        return $mapper->extract();
    }

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

    public function getJson($id)
    {
        $entity = $this->getOne($id);

        $array = $this->hydrator->extract($entity);

        dump($array);

        return json_encode($array);
    }

    public function getJson1($id)
    {
        $entity = $this->getOne($id);

        $serializer  = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($entity, 'json');

        return $jsonContent;
    }

    public function updateContract($file)
    {
        $keys = [];
        foreach ($file as $index => $row) {
            if ($index == 0) {
                $keys = str_getcsv($row);
                continue;
            }
            $array  = array_combine($keys, str_getcsv($row));
            $mapper = new ContractMapper();

            if (!isset($this->contracts[$array['Contract_ID'] . $array['Contract_Year']])) {
                $mapper->hydrate($array);
                $this->contracts[$array['Contract_ID'] . $array['Contract_Year']] = $mapper;
            }

            $result = $this->objectManager->getRepository(GeographyEntity::class)->findby(['zipCode' => $array['Zip_Code']]);
            if ($result) {
                $this->contracts[$array['Contract_ID'] . $array['Contract_Year']]->setGeography($result);
            }
            echo($index . "\n");
        }

        foreach ($this->contracts as $contract) {
            $this->objectManager->persist($this->hydrator->hydrate($contract->extract(), new ContractEntity()));
        }
        $this->objectManager->flush();
    }

    public function updatePlan($file)
    {
        $start = microtime(true);
        $keys  = [];
        foreach ($file as $index => $row) {
            if ($index == 0) {
                $keys = str_getcsv($row);
                continue;
            }
            if ($index > 1) {
                $array = array_combine($keys, str_getcsv($row));

                if (!isset($this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']])) {
                    $entity                                                                     = $this->hydrator->hydrate((new PlanMapper())->hydrate($array)->extract(),
                        new PlanEntity());
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']] = $entity;
                    $this->objectManager->persist($entity);
                }

                if (!isset($this->organisations[$array['org_name']])) {
                    $entity                                  = $this->hydrator->hydrate((new OrganisationMapper())->hydrate($array)->extract(),
                        new OrganisationEntity());
                    $this->organisations[$array['org_name']] = $entity;
                    $this->objectManager->persist($entity);
                }

                $result = $this->objectManager->getRepository(GeographyEntity::class)->findOneBy(['countyFipsCode' => $array['CountyFIPSCode']]);

                if ($result) {
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']]->addGeography($result);
                }

                $result = $this->objectManager->getRepository(ContractEntity::class)->findOneBy(['contractId' => $array['contract_id']]);

                if ($result && !$this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']]->getContract()->contains($result)) {
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']]->addContract($result);
                }

                if ($result && !$this->organisations[$array['org_name']]->getContract()->contains($result)) {
                    $this->organisations[$array['org_name']]->addContract($result);
                }
                if ($index > 10000) {
                    break;
                }
            }
        }
        $this->objectManager->flush();
        echo 'It all took ' . (microtime(true) - $start) . ' seconds.';

    }

    private function createGeography()
    {
        $result = $this->objectManager->getRepository(GeographyEntity::class)->findAll();
        foreach ($result as $geography) {
            $this->geography[$geography->getCountyFipsCode()][] = $geography;
        }
    }

    private function createContract()
    {
        $result = $this->objectManager->getRepository(ContractEntity::class)->findAll();
        foreach ($result as $contract) {
            $this->contracts[$contract->getContractId()] = $contract;
        }
    }

    public function updatePlanUpdated($file)
    {
        $keys = [];
        foreach ($file as $index => $row) {
            if ($index == 0) {
                $keys = str_getcsv($row);
                continue;
            }
            if ($index > 1) {
                $array = array_combine($keys, str_getcsv($row));

                if (!isset($this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']])) {
                    $mapper                                                                     = new PlanMapper();
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']] = $mapper->hydrate($array);
                }

                $result = $this->objectManager->getRepository(GeographyEntity::class)->findby(['countyFipsCode' => $array['CountyFIPSCode']]);

                if ($result) {
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']]->setGeography($result);
                }

                $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $array['contract_id']]);
                if ($result) {
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']]->setContract($result);
                }

//                $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']]
//                    ->setContractId($array['contract_id'])
//                    ->setCountyFIPSCode($array['CountyFIPSCode']);

                if (!isset($this->organisations[$array['org_name']])) {
                    $mapper                                  = new OrganisationMapper();
                    $this->organisations[$array['org_name']] = $mapper->hydrate($array);
                }

                $this->organisations[$array['org_name']]->setContractId($array['contract_id']);

                if ($index > 2) {
                    break;
                }

                echo $index . "\n";
            }
        }

        foreach ($this->plans as $plan) {
            $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $plan->getContractId()]);
            if ($result) {
                $plan->setContract($result);
            }
            $result = $this->objectManager->getRepository(GeographyEntity::class)->findby(['countyFipsCode' => $plan->getCountyFIPSCode()]);
            if ($result) {
                $plan->setGeography($result);
            }
            $this->objectManager->persist($this->hydrator->hydrate($plan->extract(), new PlanEntity()));
        }
        foreach ($this->organisations as $organisation) {
            $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $organisation->getContractId()]);
            if ($result) {
                $organisation->setContract($result);
            }
            $this->objectManager->persist($this->hydrator->hydrate($organisation->extract(), new OrganisationEntity()));
        }

        $this->objectManager->flush();
    }

    public function updatePlan1($file)
    {
        $start = microtime(true);
        $keys  = [];
        foreach ($file as $index => $row) {
            if ($index == 0) {
                $keys = str_getcsv($row);
                continue;
            }
            if ($index > 1) {
                $array = array_combine($keys, str_getcsv($row));

                if (!isset($this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']])) {
                    $mapper                                                                     = new PlanMapper();
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']] = $mapper->hydrate($array);
                }

                $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']]
                    ->setContractId($array['contract_id']);
//                    ->setCountyFIPSCode($array['CountyFIPSCode']);

                if (!isset($this->organisations[$array['org_name']])) {
                    $mapper                                  = new OrganisationMapper();
                    $this->organisations[$array['org_name']] = $mapper->hydrate($array);
                }

                $this->organisations[$array['org_name']]->setContractId($array['contract_id']);
            }
        }
        $end  = microtime(true);
        $time = $end - $start;
        echo "Did nothing in $time seconds\n";
        $index1         = 0;
        $timpTotalStart = microtime(true);
        foreach ($this->plans as $index => $plan) {
            $start = microtime(true);

            $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $plan->getContractId()]);
            if ($result) {
                $plan->setContract($result);
            }
//            $result = $this->objectManager->getRepository(GeographyEntity::class)->findby(['countyFipsCode' => $plan->getCountyFIPSCode()]);
//            if ($result) {
//                $plan->setGeography($result);
//            }
            $this->objectManager->persist($this->hydrator->hydrate($plan->extract(), new PlanEntity()));


            $end  = microtime(true);
            $time = $end - $start;
            $index1++;
            echo $index1 . '  ' . $index . ' plan terminat in ' . $time . ' secunde' . "\n";
            if ($index1 == 10) {
                dump($plan);
                dump($this->hydrator->hydrate($plan->extract(), new PlanEntity()));
                die('dsadsa');
            }

        }
        foreach ($this->organisations as $organisation) {
            $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $organisation->getContractId()]);
            if ($result) {
                $organisation->setContract($result);
            }
            $this->objectManager->persist($this->hydrator->hydrate($organisation->extract(), new OrganisationEntity()));
        }

        $this->objectManager->flush();
        $timpTotalEnd = microtime(true);
    }

    public function updatePlanOriginal($file)
    {
        $keys = [];
        foreach ($file as $index => $row) {
            if ($index == 0) {
                $keys = str_getcsv($row);
                continue;
            }
            if ($index > 1) {
                $array = array_combine($keys, str_getcsv($row));

                if (!isset($this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']])) {
                    $mapper                                                                     = new PlanMapper();
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']] = $mapper->hydrate($array);
                }

                $this->plans[$array['plan_id'] . $array['segment_id'] . $array['geo_name']]
                    ->setContractId($array['contract_id']);

                if (!isset($this->organisations[$array['org_name']])) {
                    $mapper                                  = new OrganisationMapper();
                    $this->organisations[$array['org_name']] = $mapper->hydrate($array);
                }

                $this->organisations[$array['org_name']]->setContractId($array['contract_id']);
            }
        }
        foreach ($this->plans as $index => $plan) {
            $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $plan->getContractId()]);
            if ($result) {
                $plan->setContract($result);
            }
            $this->objectManager->persist($this->hydrator->hydrate($plan->extract(), new PlanEntity()));
        }
        foreach ($this->organisations as $organisation) {
            $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $organisation->getContractId()]);
            if ($result) {
                $organisation->setContract($result);
            }
            $this->objectManager->persist($this->hydrator->hydrate($organisation->extract(), new OrganisationEntity()));
        }

        $this->objectManager->flush();
    }


    public function updatePlanCost($file)
    {
        $keys = [];
        foreach ($file as $index => $row) {
            if ($index == 0) {
                $keys = str_getcsv($row);
                continue;
            }

            $array  = array_combine($keys, str_getcsv($row));
            $mapper = new PlanCostMapper();
            $mapper->hydrate($array);
            $result = $this->objectManager->getRepository(ContractEntity::class)->findOneBy(['contractId' => $array['contract_id']]);
            if ($result) {
                $mapper->setContract($result);
            }
            $result = $this->objectManager->getRepository(PlanEntity::class)->findOneBy([
                'planId'    => $array['plan_id'],
                'segmentId' => $array['segment_id'],
            ]);
            if ($result) {
                $mapper->setPlan($result);
            }
            $this->objectManager->persist($this->hydrator->hydrate($mapper->extract(), new PlanCostEntity()));
        }

        $this->objectManager->flush();
    }
}