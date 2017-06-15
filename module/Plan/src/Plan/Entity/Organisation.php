<?php

namespace Plan\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organisation
 *
 * @ORM\Table(name="organisation")
 * @ORM\Entity
 */
class Organisation
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
     * @ORM\Column(name="organisation_name", type="string", length=100, nullable=true)
     */
    private $organisationName;

    /**
     * @var string
     *
     * @ORM\Column(name="web_address", type="string", length=100, nullable=true)
     */
    private $webAddress;



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
     * Set organisationName
     *
     * @param string $organisationName
     *
     * @return Organisation
     */
    public function setOrganisationName($organisationName)
    {
        $this->organisationName = $organisationName;

        return $this;
    }

    /**
     * Get organisationName
     *
     * @return string
     */
    public function getOrganisationName()
    {
        return $this->organisationName;
    }

    /**
     * Set webAddress
     *
     * @param string $webAddress
     *
     * @return Organisation
     */
    public function setWebAddress($webAddress)
    {
        $this->webAddress = $webAddress;

        return $this;
    }

    /**
     * Get webAddress
     *
     * @return string
     */
    public function getWebAddress()
    {
        return $this->webAddress;
    }
}
