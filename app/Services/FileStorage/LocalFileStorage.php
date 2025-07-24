<?php

namespace App\Services\FileStorage;

use App\Contracts\FileStorageInterface;
use Illuminate\Support\Facades\Storage;

class LocalFileStorage implements FileStorageInterface
{
    public function upload($file): string
    {
        return Storage::disk('local')->put('uploads', $file);
    }
}
