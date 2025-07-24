<?php

namespace App\Services\Animals;

use App\Contracts\SoundMakingAnimalInterface;

class Cow implements SoundMakingAnimalInterface
{
    public function makeSound(): string
    {
        return 'Moo!';
    }
}
