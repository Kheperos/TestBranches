<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 16/06/2017
 * Time: 14:30
 */

namespace Plan\Mapper\Table;

use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class Organisation
{
    protected $id;
    protected $organisationName;
    protected $webAddress;
    protected $contract = [];
    protected $contractId = [];

    protected $hydrator;

    public function __construct()
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
     * @return Organisation
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * @return Organisation
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
     * @return Organisation
     */
    public function setWebAddress($webAddress)
    {
        $this->webAddress = $webAddress;

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
     * @return Organisation
     */
    public function setContract($contract)
    {
        foreach ($contract as $contractId) {
            $this->contract[$contractId->getId()] = $contractId->getId();
        }

        return $this;
    }

    public function setContractId($contract)
    {
        $this->contractId[$contract] = $contract;

        return $this;
    }

    public function getContractId()
    {
        return $this->contractId;
    }

    public function setOrgName($data)
    {
        $this->setOrganisationName($data);

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