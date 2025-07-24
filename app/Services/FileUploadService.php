<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function upload($file)
    {
        // ❌ This implementation violates the Dependency Inversion Principle (DIP)

        // 🔴 Reason:
        // This class (a high-level module) directly depends on a low-level module (Laravel's Storage::disk('local')).
        // It is tightly coupled to the "local" storage driver, making it hard to:
        // - Switch to another storage type (e.g., S3, Google Drive)
        // - Unit test the upload logic (since it's tied to Laravel's storage layer)
        // - Extend or scale the upload logic without modifying this class

        return Storage::disk('local')->put('uploads', $file);
    }
}
