<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Chef;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Yaml\Yaml;

class ChefFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface $passEncoder */
    private $passEncoder;

    /**
     * ChefFixtures constructor.
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
        $chefs = Yaml::parseFile(__DIR__ . '/fixtures/chefs.yaml');

        foreach ($chefs['chefs'] as $nickName => $chef) {

            $chef = $this->instantiate(
                $chef['email'],
                $chef['password'],
                $chef['roles']
            );

            $manager->persist($chef);
        }

        $manager->flush();
    }

    /**
     * @param string|null $email
     * @param string|null $password
     * @param array|null $roles
     * @return Chef
     */
    public function instantiate(
        string $email = null,
        string $password = null,
        array $roles = null
    ): Chef
    {
        $chef = new Chef();
        $chef->setEmail($email);
        $chef->setPassword($this->passEncoder->encodePassword($chef, $password));
        $chef->setRoles($roles);

        return $chef;
    }
}