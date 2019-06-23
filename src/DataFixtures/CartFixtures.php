<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Cart;
use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

/**
 * Class CartFixtures
 * @package App\DataFixtures
 */
class CartFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $carts = Yaml::parseFile(__DIR__ . '/fixtures/carts.yaml');
        $itemRepository = $manager->getRepository(Item::class);

        foreach ($carts['carts'] as $cartRef => $cart) {

            $entity = new Cart();

            foreach ($cart['cart-items'] as $item) {
                /** @var Item $cartItem */
                $cartItem = $itemRepository->find($item);
                $entity->addCartItem($cartItem);
            }

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
        ];
    }
}