<?php

namespace Plan\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contract
 *
 * @ORM\Table(name="contract", indexes={@ORM\Index(name="IDX_E98F28599E6B1585", columns={"organisation_id"}), @ORM\Index(name="contract_index", columns={"contract_id"})})
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
     * @ORM\ManyToOne(targetEntity="Plan\Entity\Organisation", inversedBy="contract", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisation_id", referencedColumnName="id")
     * })
     */
    private $organisation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plan\Entity\Plan", mappedBy="contract")
     */
    private $plan;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plan\Entity\Geography")
     * @ORM\JoinTable(name="contract_geography",
     *   joinColumns={
     *     @ORM\JoinColumn(name="contract_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="geography_id", referencedColumnName="id")
     *   }
     * )
     */
    private $geography;

    /**
     * One Contract has Many Plan Costs.
     * @ORM\OneToMany(targetEntity="PlanCost", mappedBy="contract")
     */
    private $planCost;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->geography = new \Doctrine\Common\Collections\ArrayCollection();
        $this->planCost  = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param $geography
     *
     * @return Contract
     */
    public function addGeography($geography)
    {
        if ($geography instanceof \Doctrine\Common\Collections\ArrayCollection) {
            foreach ($geography as $singleGeography) {
                $this->geography[] = $singleGeography;
            }
        } else {
            $this->geography[] = $geography;
        }

        return $this;
    }

    /**
     * Remove geography
     *
     * @param $geography
     */
    public function removeGeography($geography)
    {
        if ($geography instanceof \Doctrine\Common\Collections\ArrayCollection) {
            foreach ($geography as $singleGeography) {
                $this->geography->removeElement($singleGeography);
            }
        } else {
            $this->geography->removeElement($geography);
        }
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


    /**
     * Add plan
     *
     * @param \Plan\Entity\Plan $plan
     *
     * @return Contract
     */
    public function addPlan(\Plan\Entity\Plan $plan)
    {
        $this->plan[] = $plan;

        return $this;
    }

    /**
     * Remove plan
     *
     * @param \Plan\Entity\Plan $plan
     */
    public function removePlan(\Plan\Entity\Plan $plan)
    {
        $this->plan->removeElement($plan);
    }

    /**
     * Get plan
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Get the values of PlanCost
     *
     * @return mixed
     */
    public function getPlanCost()
    {
        return $this->planCost;
    }

    /**
     * Sets the value of PlanCost
     *
     * @param mixed $planCost
     *
     * @return Contract
     */
    public function addPlanCost($planCost)
    {
        if ($planCost instanceof \Doctrine\Common\Collections\ArrayCollection) {
            foreach ($planCost as $singlePlanCost) {
                $singlePlanCost->setContract($this);
                $this->planCost[] = $singlePlanCost;
            }
        } else {
            $planCost->setContract($this);
            $this->planCost[] = $planCost;
        }

        return $this;
    }

    /**
     * Remove planCost
     *
     * @param $planCost
     */
    public function removePlanCost($planCost)
    {
        if ($planCost instanceof \Doctrine\Common\Collections\ArrayCollection) {
            foreach ($planCost as $singlePlanCost) {
                $this->planCost->removeElement($singlePlanCost);
            }
        } else {
            $this->planCost->removeElement($planCost);
        }
    }


}
