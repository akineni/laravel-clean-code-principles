<?php

namespace App\Services\Report;

use App\Services\Report\Interfaces\ReportFormatInterface;

class ReportService
{
    protected ReportFormatInterface $formatter;

    public function __construct(ReportFormatInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    public function generate(array $data): string
    {
        return $this->formatter->export($data);
    }
}
