<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 15/06/2017
 * Time: 22:24
 */

namespace Plan\Mapper;

use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class Contract
{
    protected $id;
    protected $contractId;
    protected $year;
    protected $geography = [];

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

    /**id
     * Sets the value of id
     *
     * @param mixed $id
     *
     * @return Contract
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the values of contractId
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
     * @return Contract
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
     * @return Contract
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the values of Geography
     *
     * @return array
     */
    public function getGeography()
    {
        return $this->geography;
    }

    /**
     * Sets the value of Geography
     *
     * @param array $geography
     *
     * @return Contract
     */
    public function setGeography($geography)
    {
        foreach ($geography as $location) {
            $this->geography[$location->getId()] = $location->getId();
        }

        return $this;
    }

    public function setContractYear($data)
    {
        $this->setYear($data);
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