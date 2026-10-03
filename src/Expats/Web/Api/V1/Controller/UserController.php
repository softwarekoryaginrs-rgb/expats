<?php

declare(strict_types=1);

namespace App\Expats\Web\Api\V1\Controller;

use App\Expats\Application\Query\User\GetUserByEmailQuery;
use App\Expats\Application\Query\User\GetUsersQuery;
use App\Shared\Application\Query\QueryBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route("users", name: 'users_')]
final class UserController extends AbstractController
{
    public function __construct(
        private readonly QueryBusInterface $queryBus
    ) {
    }

    #[Route("", name: 'all')]
    public function getAll(): JsonResponse
    {
        $users = $this->queryBus->ask(new GetUsersQuery());

        return $this->json($users);
    }

    #[Route("/by-email/{email}", name: 'by_email')]
    public function getByEmail(string $email): JsonResponse
    {
        $user = $this->queryBus->ask(new GetUserByEmailQuery($email));

        return $this->json($user);
    }
}
