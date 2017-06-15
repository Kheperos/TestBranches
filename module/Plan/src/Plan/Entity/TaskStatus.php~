<?php

namespace Plan\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskStatus
 *
 * @ORM\Table(name="task_status")
 * @ORM\Entity
 */
class TaskStatus
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
     * @ORM\Column(name="status_code", type="integer", nullable=true)
     */
    private $statusCode;

    /**
     * @var string
     *
     * @ORM\Column(name="status_description", type="string", length=30, nullable=true)
     */
    private $statusDescription;



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
     * Set statusCode
     *
     * @param integer $statusCode
     *
     * @return TaskStatus
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Get statusCode
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set statusDescription
     *
     * @param string $statusDescription
     *
     * @return TaskStatus
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;

        return $this;
    }

    /**
     * Get statusDescription
     *
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }
}
