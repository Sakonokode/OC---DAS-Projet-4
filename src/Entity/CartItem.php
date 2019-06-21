<?php

declare(strict_types=1);

namespace App\Entity;

use App\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CartItem
 * @ORM\Entity(repositoryClass="App\Repository\CartItemRepository")
 * @package App\Entity
 */
class CartItem
{
    use EntityTrait;

    /**
     * @var Product $product
     */
    private $product;

    /**
     * @var null|int $number
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     */
    public function setNumber(?int $number): void
    {
        $this->number = $number;
    }
}