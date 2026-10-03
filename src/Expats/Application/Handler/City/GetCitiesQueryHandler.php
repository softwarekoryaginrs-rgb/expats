<?php

declare(strict_types=1);

namespace App\Expats\Application\Handler\City;

use App\Expats\Application\DTO\CityDTO;
use App\Expats\Application\Query\City\GetCitiesQuery;
use App\Expats\Application\Result\City\GetCitiesQueryResult;
use App\Expats\Domain\Entity\City;
use App\Expats\Domain\Repository\CityRepositoryInteface;
use App\Shared\Application\Query\QueryHandlerInterface;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

final readonly class GetCitiesQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private CityRepositoryInteface $cityRepository,
        private ObjectMapperInterface $objectMapper,
    ) {
    }

    public function __invoke(GetCitiesQuery $query): GetCitiesQueryResult
    {
        $cities = array_map(
            fn (City $user): CityDTO => $this->objectMapper->map($user, CityDTO::class),
            $this->cityRepository->findAll(),
        );

        return new GetCitiesQueryResult($cities);
    }
}
