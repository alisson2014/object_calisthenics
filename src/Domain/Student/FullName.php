<?php

declare(strict_types=1);

namespace Alura\Calisthenics\Domain\Student;

final class FullName
{
    public function __construct(
        private string $firstName, 
        private string $lastName, 
    ){
    }

    public function __toString(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }
}
