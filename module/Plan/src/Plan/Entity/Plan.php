<?php

namespace Plan\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanController
 *
 * @ORM\Table(name="plan")
 * @ORM\Entity
 */
class Plan
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
     * @ORM\Column(name="plan_id", type="string", length=20, nullable=false)
     */
    private $planId;

    /**
     * @var integer
     *
     * @ORM\Column(name="segment_id", type="integer", nullable=true)
     */
    private $segmentId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="geo_name", type="string", length=100, nullable=true)
     */
    private $geoName;

    /**
     * @var string
     *
     * @ORM\Column(name="subsidy_level_100", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $subsidyLevel100;

    /**
     * @var string
     *
     * @ORM\Column(name="subsidy_level_75", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $subsidyLevel75;

    /**
     * @var string
     *
     * @ORM\Column(name="subsidy_level_50", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $subsidyLevel50;

    /**
     * @var string
     *
     * @ORM\Column(name="subsidy_level_25", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $subsidyLevel25;

    /**
     * @var \Plan\Entity\PlanType
     *
     * @ORM\ManyToOne(targetEntity="Plan\Entity\PlanType", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="plan_type", referencedColumnName="id")
     * })
     */
    private $planType;

    /**
     * @var \Plan\Entity\TaskStatus
     *
     * @ORM\ManyToOne(targetEntity="Plan\Entity\TaskStatus", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_status", referencedColumnName="id")
     * })
     */
    private $taskStatus;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plan\Entity\Contract", inversedBy="plan", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="plan_contract",
     *   joinColumns={
     *     @ORM\JoinColumn(name="plan_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contract_id", referencedColumnName="id")
     *   }
     * )
     */
    private $contract;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contract = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set planId
     *
     * @param string $planId
     *
     * @return Plan
     */
    public function setPlanId($planId)
    {
        $this->planId = $planId;

        return $this;
    }

    /**
     * Get planId
     *
     * @return string
     */
    public function getPlanId()
    {
        return $this->planId;
    }

    /**
     * Set segmentId
     *
     * @param integer $segmentId
     *
     * @return Plan
     */
    public function setSegmentId($segmentId)
    {
        $this->segmentId = $segmentId;

        return $this;
    }

    /**
     * Get segmentId
     *
     * @return integer
     */
    public function getSegmentId()
    {
        return $this->segmentId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Plan
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set geoName
     *
     * @param string $geoName
     *
     * @return Plan
     */
    public function setGeoName($geoName)
    {
        $this->geoName = $geoName;

        return $this;
    }

    /**
     * Get geoName
     *
     * @return string
     */
    public function getGeoName()
    {
        return $this->geoName;
    }

    /**
     * Set subsidyLevel100
     *
     * @param string $subsidyLevel100
     *
     * @return Plan
     */
    public function setSubsidyLevel100($subsidyLevel100)
    {
        $this->subsidyLevel100 = $subsidyLevel100;

        return $this;
    }

    /**
     * Get subsidyLevel100
     *
     * @return string
     */
    public function getSubsidyLevel100()
    {
        return $this->subsidyLevel100;
    }

    /**
     * Set subsidyLevel75
     *
     * @param string $subsidyLevel75
     *
     * @return Plan
     */
    public function setSubsidyLevel75($subsidyLevel75)
    {
        $this->subsidyLevel75 = $subsidyLevel75;

        return $this;
    }

    /**
     * Get subsidyLevel75
     *
     * @return string
     */
    public function getSubsidyLevel75()
    {
        return $this->subsidyLevel75;
    }

    /**
     * Set subsidyLevel50
     *
     * @param string $subsidyLevel50
     *
     * @return Plan
     */
    public function setSubsidyLevel50($subsidyLevel50)
    {
        $this->subsidyLevel50 = $subsidyLevel50;

        return $this;
    }

    /**
     * Get subsidyLevel50
     *
     * @return string
     */
    public function getSubsidyLevel50()
    {
        return $this->subsidyLevel50;
    }

    /**
     * Set subsidyLevel25
     *
     * @param string $subsidyLevel25
     *
     * @return Plan
     */
    public function setSubsidyLevel25($subsidyLevel25)
    {
        $this->subsidyLevel25 = $subsidyLevel25;

        return $this;
    }

    /**
     * Get subsidyLevel25
     *
     * @return string
     */
    public function getSubsidyLevel25()
    {
        return $this->subsidyLevel25;
    }

    /**
     * Set planType
     *
     * @param \Plan\Entity\PlanType $planType
     *
     * @return Plan
     */
    public function setPlanType(\Plan\Entity\PlanType $planType = null)
    {
        $this->planType = $planType;

        return $this;
    }

    /**
     * Get planType
     *
     * @return \Plan\Entity\PlanType
     */
    public function getPlanType()
    {
        return $this->planType;
    }

    /**
     * Set taskStatus
     *
     * @param \Plan\Entity\TaskStatus $taskStatus
     *
     * @return Plan
     */
    public function setTaskStatus(\Plan\Entity\TaskStatus $taskStatus = null)
    {
        $this->taskStatus = $taskStatus;

        return $this;
    }

    /**
     * Get taskStatus
     *
     * @return \Plan\Entity\TaskStatus
     */
    public function getTaskStatus()
    {
        return $this->taskStatus;
    }

    /**
     * Add contract
     *
     * @param $contract
     *
     * @return Plan
     */
    public function addContract($contract)
    {
        if ($contract instanceof \Doctrine\Common\Collections\ArrayCollection) {
            foreach ($contract as $singleContract) {
                $this->contract[] = $singleContract;
            }
        } else {
            $this->contract[] = $contract;
        }

        return $this;
    }

    /**
     * Remove contract
     *
     * @param $contract
     */
    public function removeContract($contract)
    {
        if ($contract instanceof \Doctrine\Common\Collections\ArrayCollection) {
            foreach ($contract as $singleContract) {
                $this->contract->removeElement($singleContract);
            }
        } else {
            $this->contract->removeElement($contract);
        }
    }

    /**
     * Get contract
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContract()
    {
        return $this->contract;
    }

}
