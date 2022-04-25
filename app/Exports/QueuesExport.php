<?php

namespace App\Exports;

use App\Models\Queue;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class QueuesExport implements FromCollection, WithMapping, WithStyles, WithColumnWidths, WithHeadings, WithColumnFormatting
{
    public function __construct(Collection $queues)
    {
        $this->queues = $queues;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->queues;
    }

    public function headings(): array
    {
        return ['Nama', 'NIK', 'Desa', 'RW', 'RT', 'Vaksin', 'Kloter', 'Nomer Antrian', 'Dibuat'];
    }

    public function map($queue): array
    {
        return [
            $queue->name,
            $queue->nik,
            $queue->village,
            $queue->hamlet,
            $queue->neighbourhood,
            $queue->vaccine,
            $queue->batch->order,
            $queue->order,
            $queue->created_at->format('d F Y - h:i'),
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'H' => 15,
            'I' => 25
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => '0000000000000000',
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
