<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Services\Report\Formats\CsvReport;
use App\Services\Report\Formats\PdfReport;
use App\Services\Report\ReportService;

class OCPReportController extends Controller
{
    /**
     * ✅ The controller and ReportService use the ReportFormatInterface.
     * To support new formats, like HTML or XML, just add a new class that implements the interface.
     * No changes are needed in the existing service or controller — fulfilling the Open/Closed Principle.
    */
    public function export()
    {
        $data = ['title' => 'User Report']; // Sample data

        // You can swap CsvReport with PdfReport, ExcelReport, etc.
        $formatter = new PdfReport();
        $reportService = new ReportService($formatter);

        return response()->json([
            'message' => $reportService->generate($data)
        ]);
    }

    /**
     * ❌ This method violates the Open/Closed Principle (OCP).
     *
     * It uses conditional logic to handle different export formats.
     * Every time a new format (e.g., HTML, XML) is needed,
     * this method must be modified — making it fragile and harder to maintain.
     *
     * This design is not scalable and tightly couples logic to the format values.
     *
     * ✅ A better approach is to define a ReportFormatInterface and create
     * separate classes (e.g., PdfReport, CsvReport) that implement it.
     * This allows adding new formats without changing existing logic,
     * fully complying with OCP — open for extension, closed for modification.
    */
    public function export2(string $format, $data)
    {
        if ($format === 'pdf') {
            // Export as PDF
        } elseif ($format === 'csv') {
            // Export as CSV
        } elseif ($format === 'excel') {
            // Export as Excel
        }
    }

}
