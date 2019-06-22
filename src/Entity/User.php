<?php

declare(strict_types=1);

namespace App\Entity;

use App\Traits\EntityTrait;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 * @package App\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface, EquatableInterface
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

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername(): string
    {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * The equality comparison should neither be done by referential equality
     * nor by comparing identities (i.e. getId() === getId()).
     *
     * However, you do not need to compare every attribute, but only those that
     * are relevant for assessing whether re-authentication is required.
     *
     * @param UserInterface $user
     * @return bool
     */
    public function isEqualTo(UserInterface $user): bool
    {
        if (!$user instanceof self) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->email !== $user->getEmail()) {
            return false;
        }

        return true;
    }
}