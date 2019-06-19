<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DeliveryMan
 * @ORM\Entity(repositoryClass="App\Repository\DeliveryManRepository")
 * @ORM\Table(name="delivery_men")
 * @package App\Entity
 */
class DeliveryMan extends User
{
    /**
     * @var null|string $status
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $status;

    /**
     * @var null|float $lat
     * @ORM\Column(type="float", nullable=true)
     */
    private $lat;

    /**
     * @var null|float $lng
     * @ORM\Column(type="float", nullable=true)
     */
    private $lng;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return float|null
     */
    public function getLat(): ?float
    {
        return $this->lat;
    }

    /**
     * @param float|null $lat
     */
    public function setLat(?float $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return float|null
     */
    public function getLng(): ?float
    {
        return $this->lng;
    }

    /**
     * @param float|null $lng
     */
    public function setLng(?float $lng): void
    {
        $this->lng = $lng;
    }
}