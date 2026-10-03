<?php

declare(strict_types=1);

namespace App\Expats\Application\Handler\User;

use App\Expats\Application\DTO\UserDTO;
use App\Expats\Application\Query\User\GetUserByEmailQuery;
use App\Expats\Domain\Repository\UserRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

final readonly class GetUserByEmailQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private ObjectMapperInterface $objectMapper
    ) {
    }

    public function __invoke(GetUserByEmailQuery $query): ?UserDTO
    {
        $user = $this->userRepository->findOneBy(['email.value' => $query->email]);

        return $this->objectMapper->map($user, UserDTO::class);
    }
}
