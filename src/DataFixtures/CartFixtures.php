<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Cart;
use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class CartFixtures
 * @package App\DataFixtures
 */
class CartFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $repository = $manager->getRepository(Item::class);

        $item1  = $repository->find(1);
        $item2  = $repository->find(2);

        $cart = new Cart();
        $cart->addCartItem($item1);
        $cart->addCartItem($item2);

        $manager->persist($cart);
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
            ItemFixtures::class,
        ];
    }
}