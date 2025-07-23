<?php

namespace App\Services\MediaPlayers;

use App\Contracts\AudioPlayable;
use App\Contracts\VideoPlayable;

/**
 * SmartPlayer class that implements both AudioPlayable and VideoPlayable interfaces.
 *
 * This class adheres to the Interface Segregation Principle (ISP) by implementing
 * only the methods relevant to its functionality, allowing it to play both audio and video.
 */
class SmartPlayer implements AudioPlayable, VideoPlayable
{
    public function playAudio()
    {
        return"🎶 SmartPlayer: Playing audio.";
    }

    public function playVideo()
    {
        return "🎬 SmartPlayer: Playing video.";
    }
}
