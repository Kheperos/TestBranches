<?php

namespace Plan\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contract
 *
 * @ORM\Table(name="contract", indexes={@ORM\Index(name="IDX_E98F28599E6B1585", columns={"organisation_id"})})
 * @ORM\Entity
 */
class Contract
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="contract_id", type="string", length=11, nullable=true)
     */
    private $contractId;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="smallint", nullable=true)
     */
    private $year;

    /**
     * @var \Plan\Entity\Organisation
     *
     * @ORM\ManyToOne(targetEntity="Plan\Entity\Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisation_id", referencedColumnName="id")
     * })
     */
    private $organisation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plan\Entity\Geography", inversedBy="constract")
     * @ORM\JoinTable(name="contract_geography",
     *   joinColumns={
     *     @ORM\JoinColumn(name="constract_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="geography_id", referencedColumnName="id")
     *   }
     * )
     */
    private $geography;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->geography = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set contractId
     *
     * @param string $contractId
     *
     * @return Contract
     */
    public function setContractId($contractId)
    {
        $this->contractId = $contractId;

        return $this;
    }

    /**
     * Get contractId
     *
     * @return string
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Contract
     */
    public function setYear($year)
    {
        dump ($year);
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set organisation
     *
     * @param \Plan\Entity\Organisation $organisation
     *
     * @return Contract
     */
    public function setOrganisation(\Plan\Entity\Organisation $organisation = null)
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * Get organisation
     *
     * @return \Plan\Entity\Organisation
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Add geography
     *
     * @param \Plan\Entity\Geography $geography
     *
     * @return Contract
     */
    public function addGeography(\Plan\Entity\Geography $geography)
    {
        $this->geography[] = $geography;

        return $this;
    }

    /**
     * Remove geography
     *
     * @param \Plan\Entity\Geography $geography
     */
    public function removeGeography(\Plan\Entity\Geography $geography)
    {
        $this->geography->removeElement($geography);
    }

    /**
     * Get geography
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGeography()
    {
        return $this->geography;
    }
}