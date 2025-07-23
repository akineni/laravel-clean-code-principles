<?php

namespace App\Contracts;

/**
 * ✅ This interface follows the Interface Segregation Principle (ISP).
 *
 * Reason:
 * - It defines a single, focused responsibility: the ability to play audio.
 * - Only classes that actually need audio functionality will implement this interface.
 *
 * Benefit:
 * - Promotes clean, modular design.
 * - Prevents classes from being forced to implement irrelevant methods.
 */
interface AudioPlayable
{
    public function playAudio();
}
