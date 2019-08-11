<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * @package App\DataFixtures
 */
final class ClientFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface $passEncoder */
    private $passEncoder;

    /**
     * ClientFixtures constructor.
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
        $clients = Yaml::parseFile(__DIR__ . '/fixtures/clients.yaml');

        foreach ($clients['clients'] as $nickName => $client) {

            $client = $this->instantiate(
                $client['email'],
                $client['password'],
                $client['roles']
            );

            $manager->persist($client);
        }

        $manager->flush();
    }

    /**
     * @param string|null $email
     * @param string|null $password
     * @param array|null $roles
     * @return Client
     */
    public function instantiate(
        string $email = null,
        string $password = null,
        array $roles = null
    ): Client
    {
        $client = new Client();
        $client->setEmail($email);
        $client->setPassword($this->passEncoder->encodePassword($client, $password));
        $client->setRoles($roles);

        return $client;
    }
}
