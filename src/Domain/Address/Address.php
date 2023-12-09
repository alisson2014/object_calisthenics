<?php

declare(strict_types=1);

namespace Alura\Calisthenics\Domain\Address;

final class Address
{
    public function __construct(
        public string $street,
        public string $number,
        public string $province,
        public string $city,
        public string $state,
        public string $country
    ){
    }

    public function __toString(): string
    {
        return "Street: {$this->street}, Number: {$this->number}" . PHP_EOL
                . "Province: {$this->province}" . PHP_EOL
                . "City: {$this->city}, State: {$this->state}" . PHP_EOL
                . "Country: {$this->country}";
    }
}
