<?php

namespace App\Services\Animals;

use App\Contracts\AnimalInterface;

class Dog implements AnimalInterface
{
    public function makeSound(): string
    {
        return 'Bark!';
    }
}