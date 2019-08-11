<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Payment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

/**
 * Class PaymentFixtures
 * @package App\DataFixtures
 */
class PaymentFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $payments = Yaml::parseFile(__DIR__ . '/fixtures/payments.yaml');

        foreach ($payments['payments'] as $paymentRef => $payment) {

            $entity = new Payment();
            $entity->setStatus($payment['status']);
            $entity->setTotal($payment['total']);

            $manager->persist($entity);
        }

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            ChefFixtures::class,
            ClientFixtures::class,
            DeliveryManFixtures::class,
            ProductFixtures::class,
            ItemFixtures::class,
        ];
    }
}