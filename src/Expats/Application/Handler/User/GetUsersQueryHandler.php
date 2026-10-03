<?php

declare(strict_types=1);

namespace App\Expats\Application\Handler\User;

use App\Expats\Application\DTO\UserDTO;
use App\Expats\Application\Query\User\GetUsersQuery;
use App\Expats\Application\Result\User\GetUsersQueryResult;
use App\Expats\Domain\Entity\User;
use App\Expats\Domain\Repository\UserRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

final readonly class GetUsersQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private ObjectMapperInterface $objectMapper,
    ) {
    }

    public function __invoke(GetUsersQuery $query): GetUsersQueryResult
    {
        $users = array_map(
            fn (User $user): UserDTO => $this->objectMapper->map($user, UserDTO::class),
            $this->userRepository->findAll(),
        );

        return new GetUsersQueryResult($users);
    }
}
