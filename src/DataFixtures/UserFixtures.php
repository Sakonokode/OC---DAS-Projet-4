<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * @package App\DataFixtures
 */
final class UserFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface $passEncoder */
    private $passEncoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $users = Yaml::parseFile(__DIR__ . '/fixtures/users.yaml');

        foreach ($users['users'] as $nickName => $user) {

            $user = $this->instantiate(
                $user['email'],
                $user['password'],
                $user['roles'],
                $user['status'],
                $user['lat'],
                $user['lng'],
                $user['dish-total'],
                $user['dish-current'],
                $user['dessert-total'],
                $user['dessert-current']
            );

            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * @param string|null $email
     * @param string|null $password
     * @param array|null $roles
     * @param string|null $status
     * @param float|null $lat
     * @param float|null $lng
     * @param int|null $dishTotalStock
     * @param int|null $dishCurrentStock
     * @param int|null $dessertTotalStock
     * @param int|null $dessertCurrentStock
     * @return User
     */
    public function instantiate(
        string $email = null,
        string $password = null,
        array $roles = null,
        string $status = null,
        float $lat = null,
        float $lng = null,
        int $dishTotalStock = null,
        int $dishCurrentStock = null,
        int $dessertTotalStock = null,
        int $dessertCurrentStock = null
    ): User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->passEncoder->encodePassword($user, $password));
        $user->setRoles($roles);
        $user->setStatus($status);
        $user->setLat($lat);
        $user->setLng($lng);
        $user->setDishTotalStock($dishTotalStock);
        $user->setDishCurrentStock($dishCurrentStock);
        $user->setDessertTotalStock($dessertTotalStock);
        $user->setDessertCurrentStock($dessertCurrentStock);

        return $user;
    }
}
