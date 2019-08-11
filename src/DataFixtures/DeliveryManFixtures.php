<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\DeliveryMan;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Yaml\Yaml;

class DeliveryManFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface $passEncoder */
    private $passEncoder;

    /**
     * DeliveryManFixtures constructor.
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
        $deliveryMen = Yaml::parseFile(__DIR__ . '/fixtures/delivery-men.yaml');

        foreach ($deliveryMen['delivery-men'] as $nickName => $deliveryMan) {

            $deliveryMan = $this->instantiate(
                $deliveryMan['email'],
                $deliveryMan['password'],
                $deliveryMan['roles'],
                $deliveryMan['status'],
                $deliveryMan['lat'],
                $deliveryMan['lng'],
                $deliveryMan['dish-total'],
                $deliveryMan['dish-current'],
                $deliveryMan['dessert-current'],
                $deliveryMan['dessert-total']
            );

            $manager->persist($deliveryMan);
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
     * @return DeliveryMan
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
    ): DeliveryMan
    {
        $deliveryMan = new DeliveryMan();
        $deliveryMan->setEmail($email);
        $deliveryMan->setPassword($this->passEncoder->encodePassword($deliveryMan, $password));
        $deliveryMan->setRoles($roles);
        $deliveryMan->setStatus($status);
        $deliveryMan->setLat($lat);
        $deliveryMan->setLng($lng);
        $deliveryMan->setDishTotalStock($dishTotalStock);
        $deliveryMan->setDishCurrentStock($dishCurrentStock);
        $deliveryMan->setDessertTotalStock($dessertTotalStock);
        $deliveryMan->setDessertCurrentStock($dessertCurrentStock);

        return $deliveryMan;
    }
}