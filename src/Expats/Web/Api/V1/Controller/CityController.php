<?php

declare(strict_types=1);

namespace App\Expats\Web\Api\V1\Controller;

use App\Expats\Application\Query\City\GetCitiesQuery;
use App\Shared\Application\Query\QueryBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route("cities", name: 'cities_')]
final class CityController extends AbstractController
{
    public function __construct(
        private readonly QueryBusInterface $queryBus,
    ) {
    }

    #[Route("", name: 'all')]
    public function getAll(): JsonResponse
    {
        $cities = $this->queryBus->ask(new GetCitiesQuery());

        return $this->json($cities);
    }
}
