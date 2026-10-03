<?php

declare(strict_types=1);

namespace App\Expats\Application\Result\User;

use App\Expats\Application\DTO\UserDTO;

final readonly class GetUsersQueryResult
{
    /** @param list<UserDTO> $users */
    public function __construct(
        public array $users,
    ) {
    }
}
