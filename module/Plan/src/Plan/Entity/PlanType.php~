<?php

namespace Plan\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanType
 *
 * @ORM\Table(name="plan_type")
 * @ORM\Entity
 */
class PlanType
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
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="type_description", type="string", length=100, nullable=true)
     */
    private $typeDescription;



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
     * Set type
     *
     * @param integer $type
     *
     * @return PlanType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set typeDescription
     *
     * @param string $typeDescription
     *
     * @return PlanType
     */
    public function setTypeDescription($typeDescription)
    {
        $this->typeDescription = $typeDescription;

        return $this;
    }

    /**
     * Get typeDescription
     *
     * @return string
     */
    public function getTypeDescription()
    {
        return $this->typeDescription;
    }
}
