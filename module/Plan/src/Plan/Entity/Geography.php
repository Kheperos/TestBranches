<?php

namespace Plan\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geography
 *
 * @ORM\Table(name="geography")
 * @ORM\Entity
 */
class Geography
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="county_fips_code", type="integer", nullable=false)
     */
    private $countyFipsCode;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=11, nullable=false)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="state_code", type="string", length=4, nullable=false)
     */
    private $stateCode;

    /**
     * @var string
     *
     * @ORM\Column(name="state_name", type="string", length=20, nullable=false)
     */
    private $stateName;

    /**
     * @var string
     *
     * @ORM\Column(name="county_name", type="string", length=20, nullable=false)
     */
    private $countyName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plan\Entity\Contract", mappedBy="geography")
     */
    private $constract;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->constract = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set countyFipsCode
     *
     * @param integer $countyFipsCode
     *
     * @return Geography
     */
    public function setCountyFipsCode($countyFipsCode)
    {
        $this->countyFipsCode = $countyFipsCode;

        return $this;
    }

    /**
     * Get countyFipsCode
     *
     * @return integer
     */
    public function getCountyFipsCode()
    {
        return $this->countyFipsCode;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Geography
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set stateCode
     *
     * @param string $stateCode
     *
     * @return Geography
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    /**
     * Get stateCode
     *
     * @return string
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * Set stateName
     *
     * @param string $stateName
     *
     * @return Geography
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;

        return $this;
    }

    /**
     * Get stateName
     *
     * @return string
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * Set countyName
     *
     * @param string $countyName
     *
     * @return Geography
     */
    public function setCountyName($countyName)
    {
        $this->countyName = $countyName;

        return $this;
    }

    /**
     * Get countyName
     *
     * @return string
     */
    public function getCountyName()
    {
        return $this->countyName;
    }

    /**
     * Add constract
     *
     * @param \Plan\Entity\Contract $constract
     *
     * @return Geography
     */
    public function addConstract(\Plan\Entity\Contract $constract)
    {
        $this->constract[] = $constract;

        return $this;
    }

    /**
     * Remove constract
     *
     * @param \Plan\Entity\Contract $constract
     */
    public function removeConstract(\Plan\Entity\Contract $constract)
    {
        $this->constract->removeElement($constract);
    }

    /**
     * Get constract
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConstract()
    {
        return $this->constract;
    }
}