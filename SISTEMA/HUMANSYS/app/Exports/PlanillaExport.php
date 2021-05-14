<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PlanillaExport implements FromArray,  ShouldAutoSize, WithStyles
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function styles(Worksheet $sheet)
    {
       /* return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true], 'borderStyle'=>2],

            // Styling a specific cell by coordinate.
           // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'C'  => ['font' => ['size' => 16]],
        ];*/

        {
            $sheet->getStyle('1')->getFont()->setBold(true)->setBorders('hair');
        }
    }

    
}
