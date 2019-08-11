<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Chef;
use App\Entity\User;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

/**
 * @package App\DataFixtures
 */
final class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $chefRep = $manager->getRepository(Chef::class);

        $products = Yaml::parseFile(__DIR__ . '/fixtures/products.yaml');

        foreach ($products['products'] as $productRef => $product) {

            $chef = $chefRep->find($product['chef']);

            if ($product !== null) {
                $product = $this->instantiate(
                    $product['type'],
                    $product['name'],
                    $product['description'],
                    $product['price'],
                    $chef
                );

                $manager->persist($product);
            }
        }

        $manager->flush();
    }

    /**
     * @param string $type
     * @param string $name
     * @param string $description
     * @param float $price
     * @param Chef $chef
     * @return Product
     */
    public function instantiate(
        string $type,
        string $name,
        string $description,
        float $price,
        Chef $chef
    ): Product
    {
        $product = new Product();
        $product->setType($type);
        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);
        $product->setChef($chef);

        return $product;
    }

    public function getDependencies(): array
    {
        return [
            DeliveryManFixtures::class,
            ClientFixtures::class,
            ChefFixtures::class,
        ];
    }
}
