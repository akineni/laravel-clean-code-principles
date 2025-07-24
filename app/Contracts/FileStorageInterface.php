<?php

namespace App\Contracts;

interface FileStorageInterface
{
    /**
     * ✅ This interface follows the Dependency Inversion Principle (DIP)
     *
     * ✅ Reason:
     * - High-level modules (like DIPFileUploadService) will depend on this abstraction instead of a concrete storage class.
     * - Promotes flexibility: different storage implementations (e.g., Local, S3, Google Drive) can implement this interface.
     * - Encourages loose coupling and makes it easy to swap, mock, or extend storage logic without changing the core logic.
     * - Enhances testability and maintainability of the application.
    */
    public function upload($file): string;
}
