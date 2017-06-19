<?php

namespace DoctrineORMModule\Proxy\__CG__\Plan\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Plan extends \Plan\Entity\Plan implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'id', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'planId', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'segmentId', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'name', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'geoName', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'type', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'typeDescription', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'statusCode', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'statusDescription', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'subsidyLevel100', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'subsidyLevel75', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'subsidyLevel50', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'subsidyLevel25', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'contract', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'planCost'];
        }

        return ['__isInitialized__', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'id', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'planId', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'segmentId', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'name', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'geoName', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'type', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'typeDescription', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'statusCode', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'statusDescription', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'subsidyLevel100', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'subsidyLevel75', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'subsidyLevel50', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'subsidyLevel25', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'contract', '' . "\0" . 'Plan\\Entity\\Plan' . "\0" . 'planCost'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Plan $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlanId($planId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlanId', [$planId]);

        return parent::setPlanId($planId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlanId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlanId', []);

        return parent::getPlanId();
    }

    /**
     * {@inheritDoc}
     */
    public function setSegmentId($segmentId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSegmentId', [$segmentId]);

        return parent::setSegmentId($segmentId);
    }

    /**
     * {@inheritDoc}
     */
    public function getSegmentId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSegmentId', []);

        return parent::getSegmentId();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setGeoName($geoName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGeoName', [$geoName]);

        return parent::setGeoName($geoName);
    }

    /**
     * {@inheritDoc}
     */
    public function getGeoName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGeoName', []);

        return parent::getGeoName();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubsidyLevel100($subsidyLevel100)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubsidyLevel100', [$subsidyLevel100]);

        return parent::setSubsidyLevel100($subsidyLevel100);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubsidyLevel100()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubsidyLevel100', []);

        return parent::getSubsidyLevel100();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubsidyLevel75($subsidyLevel75)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubsidyLevel75', [$subsidyLevel75]);

        return parent::setSubsidyLevel75($subsidyLevel75);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubsidyLevel75()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubsidyLevel75', []);

        return parent::getSubsidyLevel75();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubsidyLevel50($subsidyLevel50)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubsidyLevel50', [$subsidyLevel50]);

        return parent::setSubsidyLevel50($subsidyLevel50);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubsidyLevel50()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubsidyLevel50', []);

        return parent::getSubsidyLevel50();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubsidyLevel25($subsidyLevel25)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubsidyLevel25', [$subsidyLevel25]);

        return parent::setSubsidyLevel25($subsidyLevel25);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubsidyLevel25()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubsidyLevel25', []);

        return parent::getSubsidyLevel25();
    }

    /**
     * {@inheritDoc}
     */
    public function addContract($contract)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addContract', [$contract]);

        return parent::addContract($contract);
    }

    /**
     * {@inheritDoc}
     */
    public function removeContract($contract)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeContract', [$contract]);

        return parent::removeContract($contract);
    }

    /**
     * {@inheritDoc}
     */
    public function getContract()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContract', []);

        return parent::getContract();
    }

    /**
     * {@inheritDoc}
     */
    public function setType($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setTypeDescription($typeDescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTypeDescription', [$typeDescription]);

        return parent::setTypeDescription($typeDescription);
    }

    /**
     * {@inheritDoc}
     */
    public function getTypeDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTypeDescription', []);

        return parent::getTypeDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusCode($statusCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatusCode', [$statusCode]);

        return parent::setStatusCode($statusCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatusCode', []);

        return parent::getStatusCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusDescription($statusDescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatusDescription', [$statusDescription]);

        return parent::setStatusDescription($statusDescription);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatusDescription', []);

        return parent::getStatusDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function getPlanCost()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlanCost', []);

        return parent::getPlanCost();
    }

    /**
     * {@inheritDoc}
     */
    public function addPlanCost($planCost)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPlanCost', [$planCost]);

        return parent::addPlanCost($planCost);
    }

    /**
     * {@inheritDoc}
     */
    public function removePlanCost($planCost)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePlanCost', [$planCost]);

        return parent::removePlanCost($planCost);
    }

}
