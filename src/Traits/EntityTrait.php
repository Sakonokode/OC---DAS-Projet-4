<?php

declare(strict_types=1);

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Trait EntityTrait
 * @ORM\HasLifecycleCallbacks()
 * @package App\Traits
 */
trait EntityTrait
{
    /**
     * @var int $id
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var DateTime $created
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @var DateTime $updated
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @var null|DateTime $deleted
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deleted;

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function autoUpdateDates(): void
    {
        if ($this->created === null) {
            $this->created = new DateTime('NOW');
        }

        $this->updated = new DateTime('NOW');
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|DateTime
     */
    public function getCreated(): ?DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return null|DateTime
     */
    public function getUpdated(): ?DateTime
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     */
    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }

    /**
     * @return null|DateTime
     */
    public function getDeleted(): ?DateTime
    {
        return $this->deleted;
    }

    /**
     * @param null|DateTime $deleted
     */
    public function setDeleted(?DateTime $deleted = null): void
    {
        $this->deleted = $deleted;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->id;
    }
}