<?php

namespace App\Services\FileStorage;

use App\Contracts\FileStorageInterface;

/**
 * This service class adheres to the Dependency Inversion Principle (DIP).
 * It depends on an abstraction (FileStorageInterface) rather than a concrete implementation.
 */
class DIPFileUploadService
{
    protected FileStorageInterface $storage;

    public function __construct(FileStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function handle($file)
    {
        return $this->storage->upload($file);
    }
}
