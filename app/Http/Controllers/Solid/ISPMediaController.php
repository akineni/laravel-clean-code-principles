<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Services\MediaPlayers\AudioPlayer;
use App\Services\MediaPlayers\ISPAudioPlayer;
use App\Services\MediaPlayers\SmartPlayer;

class ISPMediaController extends Controller
{
    public function audio()
    {
        $player = new AudioPlayer();
        // return response()->json(['message' => $player->playVideo()]);
        return response()->json(['message' => $player->playAudio()]);
    }

    public function ispAudio()
    {
        $player = new ISPAudioPlayer();
        return response()->json(['message' => $player->playAudio()]);
    }

    public function smart()
    {
        $player = new SmartPlayer();
        return response()->json([
            'audio' => $player->playAudio(),
            'video' => $player->playVideo(),
        ]);
    }
}
