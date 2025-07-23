<?php

namespace App\Contracts;

/**
 * 📘 Interface Segregation Principle (ISP) - SOLID Principle 'I'
 *
 * "Clients should not be forced to depend on methods they do not use."
 *
 * Meaning:
 * - A class should only be required to implement methods that are relevant to it.
 * - Interfaces should be small and specific, not large and general-purpose.
 *
 * Benefit:
 * - Leads to cleaner, more maintainable, and flexible code.
 * - Encourages separating concerns and reducing unnecessary dependencies.
*/

/**
 * ❌ This interface violates the Interface Segregation Principle (ISP).
 *
 * Reason:
 * - It forces all implementing classes to define both `playAudio()` and `playVideo()`,
 *   even if they don't need one of them.
 * - For example, a basic audio player would have to implement `playVideo()` unnecessarily.
 *
 * Consequence:
 * - Leads to bloated classes with unused or empty methods.
 * - Reduces code flexibility and increases the risk of runtime errors (e.g., unimplemented logic).
 *
 * ✅ Instead, split this into smaller, more specific interfaces like:
 *   - AudioPlayable
 *   - VideoPlayable
*/
interface MediaPlayerInterface
{
    public function playAudio();
    public function playVideo();
}
