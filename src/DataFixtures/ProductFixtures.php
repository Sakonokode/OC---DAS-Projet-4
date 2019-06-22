<?php

declare(strict_types=1);

namespace App\DataFixtures;

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
        $products = Yaml::parseFile(__DIR__ . '/fixtures/products.yaml');

        foreach ($products['products'] as $productRef => $product) {

            if ($product !== null) {
                $product = $this->instantiate(
                    $product['type'],
                    $product['name'],
                    $product['description'],
                    $product['price']
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
     * @return Product
     */
    public function instantiate(
        string $type,
        string $name,
        string $description,
        float $price
    ): Product
    {
        $product = new Product();
        $product->setType($type);
        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);
        /** @var User $chef */
        $chef = $this->getReference(UserFixtures::CHEF_REFERENCE);
        $product->setChef($chef);

        return $product;
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
