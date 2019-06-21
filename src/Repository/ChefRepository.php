<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Chef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Chef|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chef|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chef[]    findAll()
 * @method Chef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChefRepository extends ServiceEntityRepository
{
    /** @param RegistryInterface $registry */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Chef::class);
    }
}