<?php

declare(strict_types=1);

namespace App\Expats\Infrastructure\Fixture;

use App\Expats\Domain\Entity\City;
use App\Expats\Domain\Repository\CityRepositoryInteface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixture extends Fixture
{
    public function __construct(
        private readonly CityRepositoryInteface $cityRepository,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        if ($this->cityRepository->findOneBy(['name' => 'Tsingtao'])){
            return;
        }

        $city = new City("Tsingtao");

        $manager->persist($city);
        $manager->flush();
    }
}
