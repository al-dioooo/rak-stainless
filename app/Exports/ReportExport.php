<?php

namespace App\Exports;

use App\Models\Order;
use DateTime;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithTitle;

class ReportExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents, WithCustomStartCell, WithTitle
{
    use Exportable;

    private $year;
    private $month;

    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->year == 13) {
            $order = Order::with('status')->whereMonth('created_at', $this->month)->get();
        } else {
            $order = Order::with('status')->whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->get();
        }
        return $order;
    }

    public function map($order): array
    {
        return [
            $order->invoice,
            $order->total_price,
            $order->status->name,
            $order->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'Invoice',
            'Price',
            'Status',
            'Created At'
        ];
    }

    public function title(): string
    {
        return DateTime::createFromFormat('!m', $this->month)->format('F');
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('B2:E2')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                ]);
            }
        ];
    }

    public function startCell(): string
    {
        return 'B2';
    }
}
