<?php

namespace App\Contracts;

/**
 * ✅ This interface also follows the Interface Segregation Principle (ISP).
 *
 * Reason:
 * - It cleanly defines the responsibility for video playback only.
 * - Useful for devices or services that handle video without affecting audio logic.
 *
 * Benefit:
 * - Keeps class implementations simple and relevant to their true capabilities.
 * - Makes the system easier to extend and test.
 */
interface VideoPlayable
{
    public function playVideo();
}
