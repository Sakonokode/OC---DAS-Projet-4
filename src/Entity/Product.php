<?php

declare(strict_types=1);

namespace App\Entity;

use App\Traits\EntityTrait;
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
     * @var null|Client $chef
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     */
    private $chef;

    /**
     * @var null|float $price
     * @ORM\Column(type="float")
     */
    private $price;

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
     * @return Client|null
     */
    public function getChef(): ?Client
    {
        return $this->chef;
    }

    /**
     * @param Client|null $chef
     */
    public function setChef(?Client $chef): void
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
}