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


class UpdateDb
{
    protected $hydrator;
    protected $contracts;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->hydrator      = new DoctrineObject($objectManager);

        $this->contracts     = [];

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
            echo ($index . "\n");
        }

        foreach ($this->contracts as $contract){
            $this->objectManager->persist($this->hydrator->hydrate($contract->extract($contract), new ContractEntity()));
        }
        $this->objectManager->flush();
    }

}