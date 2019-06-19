<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\DeliveryMan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DeliveryMan|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeliveryMan|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeliveryMan[]    findAll()
 * @method DeliveryMan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveryManRepository extends ServiceEntityRepository
{
    /** @param RegistryInterface $registry */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DeliveryMan::class);
    }
}