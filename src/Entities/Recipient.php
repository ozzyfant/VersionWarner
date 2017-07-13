<?php declare(strict_types=1);
/**
 * @author Janek Ostendorf <janek@ostendorf-vechta.de>
 */

namespace ozzyfant\VersionWarner\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Recipient
 * @package ozzyfant\VersionWarner
 *
 * @Entity
 * @Table(name="recipients")
 */
class Recipient
{
    /**
     * @Id
     * @ORM\GeneratedValue
     * @Column(type="integer", unique=true)
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @Column(type="boolean")
     * @var bool
     */
    protected $enabled;

    /**
     * @ORM\ManyToMany(targetEntity="VersionCheck", inversedBy="recipients")
     * @ORM\JoinTable(name="check_recipients",
     *     joinColumns={@ORM\JoinColumn(name="recipient_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="check_id", referencedColumnName="id")}
     * )
     */
    protected $checks;

    public function __construct()
    {
        $this->checks = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Recipient
     */
    public function setName(string $name): Recipient
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Recipient
     */
    public function setEmail(string $email): Recipient
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return Recipient
     */
    public function setEnabled(bool $enabled): Recipient
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChecks()
    {
        return $this->checks;
    }

}