<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MultiReportExport;
use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Order::select('status_id', 'total_price', 'created_at')->get()->groupBy(function ($d) {
            return Carbon::parse($d->created_at)->format('m');
        });

        $data = [
            'monthly_income' => 0,
            'reports' => $reports
        ];

        return view('admin.report.index', $data);
    }

    private $excel;

    public function __construct(Excel $excel) {
        $this->excel = $excel;
    }

    public function export(Request $request) {
        return $this->excel->download(new ReportExport($request->year, $request->month), $request->monthName . ' ' . $request->year . ' Report.xlsx');
    }

    public function multiExport(Request $request) {
        return $this->excel->download(new MultiReportExport($request->year), $request->year . ' Report.xlsx');
    }
}
