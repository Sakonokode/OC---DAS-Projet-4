<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Order;
use App\Entity\Payment;
use App\Entity\User;
use App\Entity\Cart;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

/**
 * Class OrderFixtures
 * @package App\DataFixtures
 */
class OrderFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $userRepository = $manager->getRepository(User::class);
        $paymentRepository = $manager->getRepository(Payment::class);
        $cartRepository = $manager->getRepository(Cart::class);

        $orders = Yaml::parseFile(__DIR__ . '/fixtures/orders.yaml');

        foreach ($orders['orders'] as $orderRef => $order) {

            $client = $userRepository->find($order['user']);
            $deliveryMan = $userRepository->find($order['delivery-man']);
            $payment = $paymentRepository->find($order['payment']);
            $cart = $cartRepository->find($order['cart']);

            $entity = new Order();
            $entity->setDeliveryAddress($order['delivery-address']);
            $entity->setUser($client);
            $entity->setDeliveryMan($deliveryMan);
            $entity->setPayment($payment);
            $entity->setCart($cart);
            $entity->setStatus($order['status']);

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
            UserFixtures::class,
            ProductFixtures::class,
            ItemFixtures::class,
            PaymentFixtures::class,
        ];
    }
}