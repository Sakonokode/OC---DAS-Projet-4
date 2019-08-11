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
 * @ORM\HasLifecycleCallbacks()
 * @package App\Entity
 */
class Cart
{
    use EntityTrait;

    /**
     * @var Item[]|ArrayCollection $cartItems
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Item")
     * @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     */
    private $cartItems;

    public function __construct()
    {
        $this->cartItems = new ArrayCollection();
    }

    /**
     * @param Item $cartItem
     */
    public function addCartItem(Item $cartItem): void
    {
        if (!$this->cartItems->contains($cartItem)) {
            $this->cartItems->add($cartItem);
        }
    }

    /**
     * @param Item $cartItem
     */
    public function removeCartItem(Item $cartItem): void
    {
        if ($this->cartItems->contains($cartItem)) {
            $this->cartItems->removeElement($cartItem);
        }
    }

    /**
     * @return Item[]|ArrayCollection
     */
    public function getCartItems()
    {
        return $this->cartItems;
    }

    /**
     * @param Item[]|ArrayCollection $cartItems
     */
    public function setCartItems($cartItems): void
    {
        $this->cartItems = $cartItems;
    }
}