<?php

namespace App\Services\Report\Formats;

use App\Services\Report\Interfaces\ReportFormatInterface;

class CsvReport implements ReportFormatInterface
{
    public function export(array $data): string
    {
        return 'CSV Report Generated';
    }
}
