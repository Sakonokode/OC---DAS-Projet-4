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

        $client = $userRepository->find(2);
        $deliveryMan = $userRepository->find(3);
        $payment = $paymentRepository->find(1);
        $cart = $cartRepository->find(1);

        $order = new Order();
        $order->setDeliveryAddress('9 Boulevard de Belleville, 75011 Paris');
        $order->setUser($client);
        $order->setDeliveryMan($deliveryMan);
        $order->setPayment($payment);
        $order->setCart($cart);
        $order->setStatus('order complete');
        $manager->persist($order);
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
            CartFixtures::class,
            PaymentFixtures::class,
        ];
    }
}