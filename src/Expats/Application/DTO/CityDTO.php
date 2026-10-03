<?php

declare(strict_types=1);

namespace App\Expats\Application\DTO;

use App\Expats\Domain\Entity\City;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[Map(source: City::class)]
final readonly class CityDTO
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }
}
