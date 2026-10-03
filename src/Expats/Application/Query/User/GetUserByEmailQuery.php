<?php

declare(strict_types=1);

namespace App\Expats\Application\Query\User;

use App\Shared\Application\Query\QueryInterface;

final readonly class GetUserByEmailQuery implements QueryInterface
{
    public function __construct(
        public string $email,
    ) {
    }
}
