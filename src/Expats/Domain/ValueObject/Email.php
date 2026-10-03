<?php

declare(strict_types=1);

namespace App\Expats\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use Stringable;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Embeddable]
class Email implements Stringable
{
    public function __construct(
        #[Assert\Email(message: 'The email {{ value }} is not a valid email.',)]
        #[ORM\Column(name: 'email', type: 'string', length: 255)]
        private string $value
    ) {
    }

    public static function create(string $value): self
    {
        return new self($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
