<?php

declare(strict_types=1);

namespace App\Expats\Infrastructure\Fixture;

use App\Expats\Domain\Entity\User;
use App\Expats\Domain\Repository\UserRepositoryInterface;
use App\Expats\Domain\ValueObject\Email;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        if ($this->userRepository->findOneBy(['email.value' => 'test@test.test'])){
            return;
        }

        $user = new User("Firstname", "Lastname", Email::create("test@test.test"));

        $password = $this->hasher->hashPassword($user, 'pass_1234');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
