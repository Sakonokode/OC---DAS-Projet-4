<?php

declare(strict_types=1);

namespace App\Entity;

use App\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Payment
 * @ORM\Entity(repositoryClass="App\Repository\PaymentRepository")
 * @ORM\Table(name="payments")
 * @ORM\HasLifecycleCallbacks()
 * @package App\Entity
 */
class Payment
{
    use EntityTrait;

    /**
     * @var null|float $total
     * @ORM\Column(type="float", nullable=true)
     */
    private $total;

    /**
     * @var string $status
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $status;

    /**
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float|null $total
     */
    public function setTotal(?float $total): void
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}