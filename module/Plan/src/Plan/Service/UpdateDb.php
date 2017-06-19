<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 15/06/2017
 * Time: 23:32
 */

namespace Plan\Service;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Plan\Entity\Contract as ContractEntity;
use Plan\Entity\Geography as GeographyEntity;
use Plan\Mapper\Contract as ContractMapper;
use Plan\Mapper\Organisation as OrganisationMapper;
use Plan\Mapper\Plan as PlanMapper;
use Plan\Entity\Organisation as OrganisationEntity ;
use Plan\Entity\Plan as PlanEntity;

class UpdateDb
{
    protected $hydrator;
    protected $contracts;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->hydrator      = new DoctrineObject($objectManager);

        $this->contracts     = [];
        $this->plans         = [];
        $this->organisations = [];

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
        $keys = [];
        foreach ($file as $index => $row) {
            if ($index == 0) {
                $keys = str_getcsv($row);
                continue;
            }
            if ($index > 1) {
                $array = array_combine($keys, str_getcsv($row));

                if (!isset($this->plans[$array['plan_id'] . $array['segment_id'] . $array['contract_id']])) {
                    $mapper                                                                        = new PlanMapper();
                    $this->plans[$array['plan_id'] . $array['segment_id'] . $array['contract_id']] = $mapper->hydrate($array);;
                }

                $this->plans[$array['plan_id'] . $array['segment_id'] . $array['contract_id']]->setContractId($array['contract_id']);

                if (!isset($this->organisations[$array['org_name']])) {
                    $mapper                                  = new OrganisationMapper();
                    $this->organisations[$array['org_name']] = $mapper->hydrate($array);
                }

                $this->organisations[$array['org_name']]->setContractId($array['contract_id']);
            }

        }

        foreach ($this->plans as $plan) {
            $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $plan->getContractId()]);
            if ($result) {
                $plan->setContract($result);
                $this->objectManager->persist($this->hydrator->hydrate($plan->extract(), new PlanEntity()));
            }
        }
        foreach ($this->organisations as $organisation) {
            $result = $this->objectManager->getRepository(ContractEntity::class)->findby(['contractId' => $organisation->getContractId()]);
            if ($result) {
                $organisation->setContract($result);
                $this->objectManager->persist($this->hydrator->hydrate($organisation->extract(),
                    new OrganisationEntity()));
            }
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

            $array = array_combine($keys, str_getcsv($row));
            $mapper = new PlanCostMapper();
            dump ($array);die();
        }
    }

}