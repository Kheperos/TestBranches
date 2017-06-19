<?php
/**
 * Created by PhpStorm.
 * User: insxcloud
 * Date: 19/06/2017
 * Time: 11:21
 */

namespace Plan\Mapper;

use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class PlanCost
{


    private $id;
    private $planCoverageTypeId;
    private $monthlyPremium;
    private $annualDeductible;
    private $includedLimit;
    private $threshold;
    private $plan;
    private $contract;

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
     * @return PlanCost
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the values of PlanCoverageTypeId
     *
     * @return mixed
     */
    public function getPlanCoverageTypeId()
    {
        return $this->planCoverageTypeId;
    }

    /**
     * Sets the value of PlanCoverageTypeId
     *
     * @param mixed $planCoverageTypeId
     *
     * @return PlanCost
     */
    public function setPlanCoverageTypeId($planCoverageTypeId)
    {
        $this->planCoverageTypeId = $planCoverageTypeId;

        return $this;
    }

    /**
     * Get the values of MonthlyPremium
     *
     * @return string
     */
    public function getMonthlyPremium()
    {
        return $this->monthlyPremium;
    }

    /**
     * Sets the value of MonthlyPremium
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
     * Get the values of AnnualDeductible
     *
     * @return string
     */
    public function getAnnualDeductible()
    {
        return $this->annualDeductible;
    }

    /**
     * Sets the value of AnnualDeductible
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
     * Get the values of IncludedLimit
     *
     * @return string
     */
    public function getIncludedLimit()
    {
        return $this->includedLimit;
    }

    /**
     * Sets the value of IncludedLimit
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
     * Get the values of Threshold
     *
     * @return string
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * Sets the value of Threshold
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
     * Get the values of Plan
     *
     * @return mixed
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Sets the value of Plan
     *
     * @param mixed $plan
     *
     * @return PlanCost
     */
    public function setPlan($plan)
    {
        $this->plan = $plan->getId();

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
     * @return PlanCost
     */
    public function setContract($contract)
    {
        $this->contract = $contract->getId();

        return $this;
    }



    public function setPlanCvrgTypId($data)
    {
        $this->setPlanCoverageTypeId($data);

        return $this;
    }

    public function setMnthlyPrm($data)
    {
        $this->setMonthlyPremium($data);

        return $this;
    }

    public function setAnnDdctbl($data)
    {
        $this->setAnnualDeductible($data);

        return $this;
    }

    public function setIclLmt($data)
    {
        $this->setIncludedLimit($data);

        return $this;
    }

    public function setThrshld($data)
    {
        $this->setThreshold($data);

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