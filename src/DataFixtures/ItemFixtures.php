<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Cart;
use App\Entity\Item;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ItemFixtures
 * @package App\DataFixtures
 */
final class ItemFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $cart = new Cart();
        $repository = $manager->getRepository(Product::class);
        $number = 4;

        /** @var Product $dish */
        $dish = $repository->find(1);

        /** @var Product $dessert */
        $dessert = $repository->find(3);

        $item1  = $this->instantiate($dish, $number);
        $item2  = $this->instantiate($dessert, $number);

        $cart->addCartItem($item1);
        $cart->addCartItem($item2);

        $manager->persist($item1);
        $manager->persist($item2);
        $manager->persist($cart);

        $manager->flush();
    }

    /**
     * @param Product|null $product
     * @param int|null $number
     * @return Item
     */
    public function instantiate(Product $product = null, int $number = null): Item
    {
        $item = new Item();
        $item->setProduct($product);
        $item->setNumber($number);
        return $item;
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
            ProductFixtures::class,
        ];
    }
}