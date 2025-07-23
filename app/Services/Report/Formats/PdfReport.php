<?php

namespace App\Services\Report\Formats;

use App\Services\Report\Interfaces\ReportFormatInterface;

class PdfReport implements ReportFormatInterface
{
    public function export(array $data): string
    {
        return 'PDF Report Generated';
    }
}
