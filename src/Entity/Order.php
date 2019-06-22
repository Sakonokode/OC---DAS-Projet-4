<?php

declare(strict_types=1);

namespace App\Entity;

use App\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(name="orders")
 * @ORM\HasLifecycleCallbacks()
 * @package App\Entity
 */
class Order
{
    use EntityTrait;

    /**
     * @var null|string $deliveryAddress
     * @ORM\Column(type="string", nullable=true)
     */
    private $deliveryAddress;

    /**
     * @var null|User $user
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $user;

    /**
     * @var null|User $deliveryMan
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="delivery_man_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $deliveryMan;

    /**
     * @var null|Payment $payment
     * @ORM\OneToOne(targetEntity="App\Entity\Payment", cascade={"persist"})
     * @ORM\JoinColumn(name="payment_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $payment;

    /**
     * @var null|Cart $cart
     * @ORM\OneToOne(targetEntity="App\Entity\Cart", cascade={"persist"})
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $cart;

    /**
     * @var null|string $status
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $status;

    /**
     * @return string|null
     */
    public function getDeliveryAddress(): ?string
    {
        return $this->deliveryAddress;
    }

    /**
     * @param string|null $deliveryAddress
     */
    public function setDeliveryAddress(?string $deliveryAddress): void
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return User|null
     */
    public function getDeliveryMan(): ?User
    {
        return $this->deliveryMan;
    }

    /**
     * @param User|null $deliveryMan
     */
    public function setDeliveryMan(?User $deliveryMan): void
    {
        $this->deliveryMan = $deliveryMan;
    }

    /**
     * @return Payment|null
     */
    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment|null $payment
     */
    public function setPayment(?Payment $payment): void
    {
        $this->payment = $payment;
    }

    /**
     * @return Cart|null
     */
    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    /**
     * @param Cart|null $cart
     */
    public function setCart(?Cart $cart): void
    {
        $this->cart = $cart;
    }

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
}