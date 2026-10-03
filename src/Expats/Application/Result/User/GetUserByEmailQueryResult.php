<?php

declare(strict_types=1);

namespace App\Expats\Application\Result\User;

use App\Expats\Application\DTO\UserDTO;

final readonly class GetUserByEmailQueryResult
{
    public function __construct(
        public UserDTO $user
    ) {
    }
}
