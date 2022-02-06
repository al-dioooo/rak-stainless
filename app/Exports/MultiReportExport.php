<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class MultiReportExport implements WithMultipleSheets
{
    use Exportable;

    private $year;
    private $month;

    public function sheets(): array {
        $sheets = [];

        $months = Order::selectRaw("MONTH(created_at) as month")->distinct()->get();

        for($i = 0; $i < count($months); $i++) {
            $sheets[] = new ReportExport(13, $months[$i]->month);
        }

        return $sheets;
    }
}
