<?php

namespace App\Services\FileStorage;

use App\Contracts\FileStorageInterface;
use Illuminate\Support\Facades\Storage;

class S3FileStorage implements FileStorageInterface
{
    public function upload($file): string
    {
        return Storage::disk('s3')->put('uploads', $file);
    }
}
