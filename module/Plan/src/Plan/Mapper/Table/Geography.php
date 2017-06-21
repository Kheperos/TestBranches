<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 21/06/2017
 * Time: 15:47
 */

namespace Plan\Mapper\Table;

use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class Geography
{
    protected $id;
    private $countyFipsCode;
    private $zipCode;
    private $stateCode;
    private $stateName;
    private $countyName;

    protected $hydrator;

    public function __construct()
    {
        $this->hydrator = new ClassMethodsHydrator();

    }

    /**
     * Get the values of id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the values of CountyFipsCode
     *
     * @return mixed
     */
    public function getCountyFipsCode()
    {
        return $this->countyFipsCode;
    }

    /**
     * Sets the value of CountyFipsCode
     *
     * @param mixed $countyFipsCode
     *
     * @return Geography
     */
    public function setCountyFipsCode($countyFipsCode)
    {
        $this->countyFipsCode = $countyFipsCode;

        return $this;
    }

    /**
     * Get the values of ZipCode
     *
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Sets the value of ZipCode
     *
     * @param mixed $zipCode
     *
     * @return Geography
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get the values of StateCode
     *
     * @return mixed
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * Sets the value of StateCode
     *
     * @param mixed $stateCode
     *
     * @return Geography
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    /**
     * Get the values of StateName
     *
     * @return mixed
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * Sets the value of StateName
     *
     * @param mixed $stateName
     *
     * @return Geography
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;

        return $this;
    }

    /**
     * Get the values of CountyName
     *
     * @return mixed
     */
    public function getCountyName()
    {
        return $this->countyName;
    }

    /**
     * Sets the value of CountyName
     *
     * @param mixed $countyName
     *
     * @return Geography
     */
    public function setCountyName($countyName)
    {
        $this->countyName = $countyName;

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