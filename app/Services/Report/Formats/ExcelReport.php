<?php

namespace App\Services\Report\Formats;

use App\Services\Report\Interfaces\ReportFormatInterface;

class ExcelReport implements ReportFormatInterface
{
    public function export(array $data): string
    {
        // Simulate Excel export
        return 'Excel Report Generated';
    }
}
