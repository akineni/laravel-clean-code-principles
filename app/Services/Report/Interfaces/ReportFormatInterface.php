<?php

namespace App\Services\Report\Interfaces;

interface ReportFormatInterface
{
    public function export(array $data): string;
}
