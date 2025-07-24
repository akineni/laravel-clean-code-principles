<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Services\Animals\Fish;
use App\Services\Animals\Dog;

class AnimalController extends Controller
{
    public function testAnimalSound()
    {
        $dog = new Dog();
        $fish = new Fish();

        $sounds = [];

        foreach ([$dog, $fish] as $animal) {
            $sounds[] = $animal->makeSound(); // ❌ Fish throws exception!
        }

        return response()->json($sounds);
    }
}
