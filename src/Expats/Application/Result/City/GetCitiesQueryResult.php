<?php

declare(strict_types=1);

namespace App\Expats\Application\Result\City;

use App\Expats\Application\DTO\CityDTO;

readonly class GetCitiesQueryResult
{
    /** @param array<CityDTO> $cities */
    public function __construct(
        public array $cities,
    ) {
    }
}
