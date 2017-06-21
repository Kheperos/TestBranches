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

class Organisation implements EntityMapperInterface
{
    protected $id;
    protected $organisationName;
    protected $webAddress;
    protected $contract;

    protected $objectManager;
    protected $doctrineHydrator;
    protected $hydrator;

    public function __construct(ObjectManager $objectManager)
    {
        $this->hydrator         = new ClassMethodsHydrator();
        $this->objectManager    = $objectManager;
        $this->doctrineHydrator = new DoctrineObject($objectManager);
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