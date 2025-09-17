<?php

namespace App\Http\Controllers\Reports;

use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DownloadReportController extends Controller
{
    public function __invoke()
    {
        return Excel::download(new ReportExport, 'reporte.xlsx');
    }
}
