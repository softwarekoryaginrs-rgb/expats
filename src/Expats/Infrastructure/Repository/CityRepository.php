<?php

declare(strict_types=1);

namespace App\Expats\Infrastructure\Repository;

use App\Expats\Domain\Entity\City;
use App\Expats\Domain\Repository\CityRepositoryInteface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<City>
 */
class CityRepository extends ServiceEntityRepository implements CityRepositoryInteface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, City::class);
    }
}
