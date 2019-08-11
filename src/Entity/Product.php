<?php

declare(strict_types=1);

namespace App\Entity;

use App\Traits\EntityTrait;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\Table(name="products")
 * @ORM\HasLifecycleCallbacks()
 * @package App\Entity
 */
class Product
{
    use EntityTrait;

    /**
     * @var null|string $type
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @var null|string $name
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var null|string $description
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var null|Chef $chef
     * @ORM\ManyToOne(targetEntity="App\Entity\Chef")
     */
    private $chef;

    /**
     * @var null|float $price
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var null|int $availableStock
     * @ORM\Column(type="integer", nullable=true)
     */
    private $availableStock;

    /**
     * @var null|DateTime $date
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Chef|null
     */
    public function getChef(): ?Chef
    {
        return $this->chef;
    }

    /**
     * @param Chef|null $chef
     */
    public function setChef(?Chef $chef): void
    {
        $this->chef = $chef;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int|null
     */
    public function getAvailableStock(): ?int
    {
        return $this->availableStock;
    }

    /**
     * @param int|null $availableStock
     */
    public function setAvailableStock(?int $availableStock): void
    {
        $this->availableStock = $availableStock;
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime|null $date
     */
    public function setDate(?DateTime $date): void
    {
        $this->date = $date;
    }
}