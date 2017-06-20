<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 16/06/2017
 * Time: 11:01
 */

namespace Plan\Mapper\Json;

use Doctrine\Common\Persistence\ObjectManager;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Plan\Mapper\EntityMapperInterface;

class Plan implements EntityMapperInterface
{
    protected $id;
    protected $planId;
    protected $segmentId;
    protected $name;
    protected $geoName;
    protected $type;
    protected $typeDescription;
    protected $statusCode;
    protected $statusDescription;
    protected $subsidyLevel100;
    protected $subsidyLevel75;
    protected $subsidyLevel50;
    protected $subsidyLevel25;
    protected $contract = [];
    protected $geography = [];

    protected $hydrator;


    public function __construct(ObjectManager $objectManager)
    {
        $this->hydrator = new ClassMethodsHydrator();
    }

    /**
     * Get the values of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of Id
     *
     * @param mixed $id
     *
     * @return Plan
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the values of PlanId
     *
     * @return mixed
     */
    public function getPlanId()
    {
        return $this->planId;
    }

    /**
     * Sets the value of PlanId
     *
     * @param mixed $planId
     *
     * @return Plan
     */
    public function setPlanId($planId)
    {
        $this->planId = $planId;

        return $this;
    }

    /**
     * Get the values of SegmentId
     *
     * @return mixed
     */
    public function getSegmentId()
    {
        return $this->segmentId;
    }

    /**
     * Sets the value of SegmentId
     *
     * @param mixed $segmentId
     *
     * @return Plan
     */
    public function setSegmentId($segmentId)
    {
        $this->segmentId = $segmentId;

        return $this;
    }

    /**
     * Get the values of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of Name
     *
     * @param mixed $name
     *
     * @return Plan
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the values of GeoName
     *
     * @return mixed
     */
    public function getGeoName()
    {
        return $this->geoName;
    }

    /**
     * Sets the value of GeoName
     *
     * @param mixed $geoName
     *
     * @return Plan
     */
    public function setGeoName($geoName)
    {
        $this->geoName = $geoName;

        return $this;
    }

    /**
     * Get the values of Type
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of Type
     *
     * @param mixed $type
     *
     * @return Plan
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the values of TypeDescription
     *
     * @return mixed
     */
    public function getTypeDescription()
    {
        return $this->typeDescription;
    }

    /**
     * Sets the value of TypeDescription
     *
     * @param mixed $typeDescription
     *
     * @return Plan
     */
    public function setTypeDescription($typeDescription)
    {
        $this->typeDescription = $typeDescription;

        return $this;
    }

    /**
     * Get the values of StatusCode
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the value of StatusCode
     *
     * @param mixed $statusCode
     *
     * @return Plan
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Get the values of StatusDescription
     *
     * @return mixed
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Sets the value of StatusDescription
     *
     * @param mixed $statusDescription
     *
     * @return Plan
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;

        return $this;
    }

    /**
     * Get the values of SubsidyLevel100
     *
     * @return mixed
     */
    public function getSubsidyLevel100()
    {
        return $this->subsidyLevel100;
    }

    /**
     * Sets the value of SubsidyLevel100
     *
     * @param mixed $subsidyLevel100
     *
     * @return Plan
     */
    public function setSubsidyLevel100($subsidyLevel100)
    {
        $this->subsidyLevel100 = $subsidyLevel100;

        return $this;
    }

    /**
     * Get the values of SubsidyLevel75
     *
     * @return mixed
     */
    public function getSubsidyLevel75()
    {
        return $this->subsidyLevel75;
    }

    /**
     * Sets the value of SubsidyLevel75
     *
     * @param mixed $subsidyLevel75
     *
     * @return Plan
     */
    public function setSubsidyLevel75($subsidyLevel75)
    {
        $this->subsidyLevel75 = $subsidyLevel75;

        return $this;
    }

    /**
     * Get the values of SubsidyLevel50
     *
     * @return mixed
     */
    public function getSubsidyLevel50()
    {
        return $this->subsidyLevel50;
    }

    /**
     * Sets the value of SubsidyLevel50
     *
     * @param mixed $subsidyLevel50
     *
     * @return Plan
     */
    public function setSubsidyLevel50($subsidyLevel50)
    {
        $this->subsidyLevel50 = $subsidyLevel50;

        return $this;
    }

    /**
     * Get the values of SubsidyLevel25
     *
     * @return mixed
     */
    public function getSubsidyLevel25()
    {
        return $this->subsidyLevel25;
    }

    /**
     * Sets the value of SubsidyLevel25
     *
     * @param mixed $subsidyLevel25
     *
     * @return Plan
     */
    public function setSubsidyLevel25($subsidyLevel25)
    {
        $this->subsidyLevel25 = $subsidyLevel25;

        return $this;
    }

    /**
     * Get the values of Contract
     *
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Sets the value of Contract
     *
     * @param mixed $contract
     *
     * @return Plan
     */
    public function setContract($contract)
    {
        foreach ($contract as $contractId) {
            $this->contract[$contractId->getId()] = $contractId->getId();
        }

        return $this;
    }

    /**
     * Get the values of Geography
     *
     * @return mixed
     */
    public function getGeography()
    {
        return $this->geography;
    }

    /**
     * Sets the value of geography
     *
     * @param mixed $geography
     *
     * @return Plan
     */
    public function setGeography($data)
    {
        foreach ($data as $locationID) {
            $this->geography[$locationID] = $locationID;
        }

        return $this;
    }

    public function hydrate($data)
    {
        $this->hydrator->hydrate($data, $this);

        return $this;
    }

    public function extract()
    {
        return $this->hydrator->extract($this);
    }
}