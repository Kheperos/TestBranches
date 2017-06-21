<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 20/06/2017
 * Time: 18:05
 */

namespace Plan\Mapper\Json;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Plan\Mapper\EntityMapperInterface;

class Contract implements EntityMapperInterface
{
    protected $id;
    protected $contractId;
    protected $year;
    protected $organisation;

    protected $objectManager;
    protected $doctrineHydrator;
    protected $hydrator;

    public function __construct(ObjectManager $objectManager)
    {
        $this->hydrator = new ClassMethodsHydrator();
        $this->objectManager = $objectManager;
        $this->doctrineHydrator = new DoctrineObject($objectManager);
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
     * Get the values of organisation
     *
     * @return mixed
     */
    public function getorganisation()
    {
        return $this->organisation;
    }

    /**
     * Sets the value of Organisation
     *
     * @param mixed $organisation
     *
     * @return Contract
     */
    public function setOrganisation($organisation)
    {
        $this->organisation = (new Organisation($this->objectManager))->hydrate($organisation)->extract();

        return $this;
    }

    public function hydrate($data)
    {
        $this->hydrator->hydrate($this->doctrineHydrator->extract($data), $this);

        return $this;
    }

    public function extract()
    {
        return $this->hydrator->extract($this);
    }
}