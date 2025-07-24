<?php

namespace App\Services\Animals;

use App\Contracts\AnimalInterface;

class Fish implements AnimalInterface
{
    /**
     * ❌ BAD: Violates Liskov Substitution Principle (LSP)
     *
     * This class implements AnimalInterface, which requires makeSound().
     * However, Fish cannot make a sound in reality, so it throws an exception.
     * 
     * This breaks LSP because Fish objects **cannot safely replace**
     * other AnimalInterface objects (e.g., Dog, Cat) without causing runtime errors.
     *
     * 👉 FIX: Do not force Fish to implement makeSound().
     * Instead, create a separate SoundMakingAnimalInterface for sound-capable animals.
     */
    public function makeSound(): string
    {
        // ❌ Fish can't make a sound
        throw new \Exception("Fish can't make sound");
    }
}
