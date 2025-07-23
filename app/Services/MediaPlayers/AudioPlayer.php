<?php

namespace App\Services\MediaPlayers;

use App\Contracts\MediaPlayerInterface;

/**
 * ❌ This class violates the Interface Segregation Principle (ISP).
 *
 * Problem:
 * - `AudioPlayer` is forced to implement `playVideo()` from `MediaPlayerInterface`,
 *   even though it doesn't support video playback.
 * - The method `playVideo()` throws an exception, which is a sign the class was forced to
 *   depend on functionality it does not use.
 *
 * Why it's bad:
 * - Increases risk of runtime errors.
 * - Breaks the expected behavior of a MediaPlayer (why have a method that always fails?).
 * - Makes the code harder to understand and maintain.
 *
 * ✅ Fix:
 * - Split the interface into smaller ones like `AudioPlayable` and `VideoPlayable`.
 * - Let this class implement only `AudioPlayable`.
*/

class AudioPlayer implements MediaPlayerInterface
{
    public function playAudio()
    {
        return "Playing audio...";
    }

    public function playVideo()
    {
        // ❌ This player doesn't support video
        throw new \Exception("Video not supported");
    }
}
