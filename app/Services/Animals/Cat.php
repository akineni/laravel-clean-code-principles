<?php

namespace App\Services\Animals;

use App\Contracts\SoundMakingAnimalInterface;

class Cat implements SoundMakingAnimalInterface
{
    public function makeSound(): string
    {
        return 'Meow!';
    }
}