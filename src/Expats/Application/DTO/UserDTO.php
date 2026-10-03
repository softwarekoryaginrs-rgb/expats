<?php

declare(strict_types=1);

namespace App\Expats\Application\DTO;

use App\Expats\Domain\Entity\User;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[Map(source: User::class)]
final readonly class UserDTO
{
    /**
     * @param array<string> $roles
     */
    public function __construct(
        public int $id,
        public string $firstname,
        public string $lastname,
        public string $fullname,
        #[Map(source: 'email', transform: 'strval')]
        public string $email,
    ) {
    }
}
