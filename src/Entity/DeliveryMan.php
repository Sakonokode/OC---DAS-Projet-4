<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DeliveryMan
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\DeliveryManRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var null|int $dishCurrentStock
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dishCurrentStock;

    /**
     * @var null|int $dishTotalStock
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dishTotalStock;

    /**
     * @var null|int $dessertCurrentStock
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dessertCurrentStock;

    /**
     * @var null|int $dessertTotalStock
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dessertTotalStock;

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

    /**
     * @return int|null
     */
    public function getDishCurrentStock(): ?int
    {
        return $this->dishCurrentStock;
    }

    /**
     * @param int|null $dishCurrentStock
     */
    public function setDishCurrentStock(?int $dishCurrentStock): void
    {
        $this->dishCurrentStock = $dishCurrentStock;
    }

    /**
     * @return int|null
     */
    public function getDishTotalStock(): ?int
    {
        return $this->dishTotalStock;
    }

    /**
     * @param int|null $dishTotalStock
     */
    public function setDishTotalStock(?int $dishTotalStock): void
    {
        $this->dishTotalStock = $dishTotalStock;
    }

    /**
     * @return int|null
     */
    public function getDessertCurrentStock(): ?int
    {
        return $this->dessertCurrentStock;
    }

    /**
     * @param int|null $dessertCurrentStock
     */
    public function setDessertCurrentStock(?int $dessertCurrentStock): void
    {
        $this->dessertCurrentStock = $dessertCurrentStock;
    }

    /**
     * @return int|null
     */
    public function getDessertTotalStock(): ?int
    {
        return $this->dessertTotalStock;
    }

    /**
     * @param int|null $dessertTotalStock
     */
    public function setDessertTotalStock(?int $dessertTotalStock): void
    {
        $this->dessertTotalStock = $dessertTotalStock;
    }
}