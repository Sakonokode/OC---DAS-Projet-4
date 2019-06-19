<?php

declare(strict_types=1);

namespace App\Entity;

use App\Traits\EntityTrait;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 * @package App\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "delivery_men" = "App\Entity\DeliveryMan"})
 */
Abstract class User
{
    use EntityTrait;

    /**
     * @var null|string $firstName
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $firstName;

    /**
     * @var null|string $surname
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $surname;

    /**
     * @var null|string $email
     * @ORM\Column(type="string", unique=true)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = false
     * )
     */
    protected $email;

    /**
     * @var string $password
     * @ORM\Column(type="string")
     * @Assert\Length(max=4096)
     */
    protected $password;

    /**
     * @var array roles
     * @ORM\Column(type="json")
     */
    private $roles;

    /**
     * @param string|null $firstName
     * @param string|null $surname
     * @param string|null $password
     * @param array $roles
     */
    public function __construct(string $firstName = null, string $surname = null, string $password = null, array $roles = [])
    {
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->password = $password;
        $this->roles = $roles;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }


}