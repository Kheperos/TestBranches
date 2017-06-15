<?php

/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 14/06/2017
 * Time: 10:34
 */

namespace Plan\Mapper;

use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class PlanInfo
{
    protected $type;
    protected $typeDescription;

    protected $contractId;
    protected $year;

    protected $organisationName;
    protected $webAddress;

    protected $planId;
    protected $segmentId;
    protected $name;
    protected $geoName;
    protected $subsidyLevel100;
    protected $subsidyLevel75;
    protected $subsidyLevel50;
    protected $subsidyLevel25;

    protected $statusCode;
    protected $statusDescription;

    protected $hydrator;

    public function __construct()
    {
        $this->hydrator = new ClassMethodsHydrator();
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
     * @return PlanInfo
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
     * @return PlanInfo
     */
    public function setTypeDescription($typeDescription)
    {
        $this->typeDescription = $typeDescription;

        return $this;
    }

    /**
     * Get the values of ContractId
     *
     * @return mixed
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * Sets the value of ContractId
     *
     * @param mixed $contractId
     *
     * @return PlanInfo
     */
    public function setContractId($contractId)
    {
        $this->contractId = $contractId;

        return $this;
    }

    /**
     * Get the values of Year
     *
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets the value of Year
     *
     * @param mixed $year
     *
     * @return PlanInfo
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the values of OrganisationName
     *
     * @return mixed
     */
    public function getOrganisationName()
    {
        return $this->organisationName;
    }

    /**
     * Sets the value of OrganisationName
     *
     * @param mixed $organisationName
     *
     * @return PlanInfo
     */
    public function setOrganisationName($organisationName)
    {
        $this->organisationName = $organisationName;

        return $this;
    }

    /**
     * Get the values of WebAddress
     *
     * @return mixed
     */
    public function getWebAddress()
    {
        return $this->webAddress;
    }

    /**
     * Sets the value of WebAddress
     *
     * @param mixed $webAddress
     *
     * @return PlanInfo
     */
    public function setWebAddress($webAddress)
    {
        $this->webAddress = $webAddress;

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
     * @return PlanInfo
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
     * @return PlanInfo
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
     * @return PlanInfo
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
     * @return PlanInfo
     */
    public function setGeoName($geoName)
    {
        $this->geoName = $geoName;

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
     * @return PlanInfo
     */
    public function setSubsidyLevel100($subsidyLevel100)
    {
        $this->subsidyLevel100 = str_replace('$', '', $subsidyLevel100);

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
     * @return PlanInfo
     */
    public function setSubsidyLevel75($subsidyLevel75)
    {
        $this->subsidyLevel75 = str_replace('$', '', $subsidyLevel75);

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
     * @return PlanInfo
     */
    public function setSubsidyLevel50($subsidyLevel50)
    {
        $this->subsidyLevel50 = str_replace('$', '', $subsidyLevel50);

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
     * @return PlanInfo
     */
    public function setSubsidyLevel25($subsidyLevel25)
    {
        $this->subsidyLevel25 = str_replace('$', '', $subsidyLevel25);

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
     * @return PlanInfo
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
     * @return PlanInfo
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;

        return $this;
    }

    public function set0($data)
    {
        $this->setContractId($data);

        return $this;
    }

    public function set1($data)
    {
        $this->setPlanId($data);

        return $this;
    }

    public function set2($data)
    {
        $this->setSegmentId($data);

        return $this;
    }

    public function set3($data)
    {
        $this->setYear($data);

        return $this;
    }

    public function set4($data)
    {
        $this->setOrganisationName($data);

        return $this;
    }

    public function set5($data)
    {
        $this->setName($data);

        return $this;
    }

    public function set7($data)
    {
        $this->setGeoName($data);

        return $this;
    }

    public function set8($data)
    {
        $this->setStatusCode($data);

        return $this;
    }

    public function set9($data)
    {
        $this->setStatusDescription($data);

        return $this;
    }

    public function set11($data)
    {
        $this->setType($data);

        return $this;
    }

    public function set12($data)
    {
        $this->setTypeDescription($data);

        return $this;
    }

    public function set13($data)
    {
        $this->setWebAddress($data);

        return $this;
    }

    public function set69($data)
    {
        $this->setSubsidyLevel100($data);

        return $this;
    }

    public function set70($data)
    {
        $this->setSubsidyLevel75($data);

        return $this;
    }

    public function set71($data)
    {
        $this->setSubsidyLevel50($data);

        return $this;
    }

    public function set72($data)
    {
        $this->setSubsidyLevel25($data);

        return $this;
    }

    public function hydrate($planInfoRow)
    {
        $this->hydrator->hydrate($planInfoRow, $this);

        return $this;
    }

    public function extract()
    {
        return $this->hydrator->extract($this);
    }


}