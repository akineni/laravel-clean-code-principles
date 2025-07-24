<?php
namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Services\Animals\Cat;
use App\Services\Animals\Cow;

class LSPAnimalController extends Controller
{
    public function testAnimalSound()
    {
        $cow = new Cow();
        $cat = new Cat();

        $sounds = [];

        foreach ([$cow, $cat] as $animal) {
            $sounds[] = $animal->makeSound(); // ✅ Always works
        }

        return response()->json($sounds);
    }
}
