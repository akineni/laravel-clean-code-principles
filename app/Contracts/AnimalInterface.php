<?php

namespace App\Contracts;

/**
 * ❌ BAD: Violates Liskov Substitution Principle (LSP)
 *
 * This interface assumes that **every Animal must make a sound**.
 * However, not all animals can logically implement this behavior 
 * (e.g., Fish, Snake). Forcing all animals to implement this method 
 * will lead to broken implementations (e.g., throwing exceptions), 
 * which violates LSP.
 *
 * 👉 FIX: Create a separate interface for animals that make sounds, 
 * e.g., SoundMakingAnimalInterface. Only sound-capable animals 
 * should implement it.
*/
interface AnimalInterface
{
    public function makeSound(): string;
}
