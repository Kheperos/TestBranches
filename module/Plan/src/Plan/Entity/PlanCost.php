<?php

namespace Plan\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanCost
 *
 * @ORM\Table(name="plan_cost")
 * @ORM\Entity
 */
class PlanCost
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
     * @var integer
     *
     * @ORM\Column(name="plan_coverage_type_id", type="integer", nullable=false)
     */
    private $planCoverageTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="monthly_premium", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $monthlyPremium = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="annual_deductible", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $annualDeductible = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="included_limit", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $includedLimit = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="treshold", type="decimal", precision=11, scale=2, nullable=false)
     */
    private $threshold = '0.00';


    /**
     * @var \Plan\Entity\Plan
     *
     * @ORM\ManyToOne(targetEntity="Plan\Entity\Plan", inversedBy="planCost", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="plan_id", referencedColumnName="id")
     * })
     */
    private $plan;

    /**
     * @var \Plan\Entity\Contract
     *
     * @ORM\ManyToOne(targetEntity="Plan\Entity\Contract", inversedBy="planCost", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contract_id", referencedColumnName="id")
     * })
     */
    private $contract;

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
     * Set planCoverageTypeId
     *
     * @param integer $planCoverageTypeId
     *
     * @return PlanCost
     */
    public function setPlanCoverageTypeId($planCoverageTypeId)
    {
        $this->planCoverageTypeId = $planCoverageTypeId;

        return $this;
    }

    /**
     * Get planCoverageTypeId
     *
     * @return integer
     */
    public function getPlanCoverageTypeId()
    {
        return $this->planCoverageTypeId;
    }

    /**
     * Set monthlyPremium
     *
     * @param string $monthlyPremium
     *
     * @return PlanCost
     */
    public function setMonthlyPremium($monthlyPremium)
    {
        $this->monthlyPremium = $monthlyPremium;

        return $this;
    }

    /**
     * Get monthlyPremium
     *
     * @return string
     */
    public function getMonthlyPremium()
    {
        return $this->monthlyPremium;
    }

    /**
     * Set annualDeductible
     *
     * @param string $annualDeductible
     *
     * @return PlanCost
     */
    public function setAnnualDeductible($annualDeductible)
    {
        $this->annualDeductible = $annualDeductible;

        return $this;
    }

    /**
     * Get annualDeductible
     *
     * @return string
     */
    public function getAnnualDeductible()
    {
        return $this->annualDeductible;
    }

    /**
     * Set includedLimit
     *
     * @param string $includedLimit
     *
     * @return PlanCost
     */
    public function setIncludedLimit($includedLimit)
    {
        $this->includedLimit = $includedLimit;

        return $this;
    }

    /**
     * Get includedLimit
     *
     * @return string
     */
    public function getIncludedLimit()
    {
        return $this->includedLimit;
    }

    /**
     * Set threshold
     *
     * @param string $threshold
     *
     * @return PlanCost
     */
    public function setThreshold($threshold)
    {
        $this->threshold = $threshold;

        return $this;
    }

    /**
     * Get threshold
     *
     * @return string
     */
    public function getThreshold()
    {
        return $this->threshold;
    }
}
