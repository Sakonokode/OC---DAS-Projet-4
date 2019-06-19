<?php

declare(strict_types=1);

namespace App\Entity;

use App\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Cart
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 * @ORM\Table(name="carts")
 * @package App\Entity
 */
class Cart
{
    use EntityTrait;

    /**
     * @var ArrayCollection $orderItems
     * @ORM\ManyToMany(targetEntity="App\Entity\CartItem")
     * @ORM\JoinTable(name="cart_items",
     *      joinColumns={@ORM\JoinColumn(name="cart_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="cart_item_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $orderItems;

    /**
     * @param CartItem $cartItem
     */
    public function addCartItem(CartItem $cartItem): void
    {
        if (!$this->orderItems->contains($cartItem)) {
            $this->orderItems->add($cartItem);
        }
    }

    /**
     * @param CartItem $cartItem
     */
    public function removeCartItem(CartItem $cartItem): void
    {
        if ($this->orderItems->contains($cartItem)) {
            $this->orderItems->removeElement($cartItem);
        }
    }

    /**
     * @return ArrayCollection
     */
    public function getOrderItems(): ArrayCollection
    {
        return $this->orderItems;
    }

    /**
     * @param ArrayCollection $orderItems
     */
    public function setOrderItems(ArrayCollection $orderItems): void
    {
        $this->orderItems = $orderItems;
    }
}