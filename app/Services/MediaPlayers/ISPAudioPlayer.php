<?php

namespace App\Services\MediaPlayers;

use App\Contracts\AudioPlayable;

/**
 * ✅ This class now follows the Interface Segregation Principle (ISP).
 *
 * Reason:
 * - It implements only the `AudioPlayable` interface, which is relevant to its functionality.
 * - It no longer has to implement `playVideo()`, which it does not support.
 *
 * Benefit:
 * - Reduces complexity and potential for errors.
 * - Makes the class easier to understand and maintain.
*/
class ISPAudioPlayer implements AudioPlayable
{
    public function playAudio()
    {
        return "Playing audio...";
    }
}
