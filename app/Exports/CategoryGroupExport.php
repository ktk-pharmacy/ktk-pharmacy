<?php

namespace App\Exports;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoryGroupExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    function __construct(protected $category_groups){

    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Name_mm',
            'Status',
            'Deleted_at'
        ];
    }

    public function map($item): array
    {
        $status = $item->status == 1?'Acitve':'Inactive';
        if ($item->deleted_at) {
           $status = "Deleted";
           $deleted_at = date("Y-m-d H:i A",strtotime($item->deleted_at));
        }
        return [
            $item->id,
            $item->name,
            $item->name_mm,
            $status,
            $item->deleted_at?$deleted_at:""
        ];
    }

    public function collection()
    {
        return $this->category_groups;

    }

    // public function setImage($workSheet) {
    //     $this->collection()->each(function($product,$index) use($workSheet) {
    //         $orgPath = explode('/',$product['feature_image']);
    //         $delPath = array_splice($orgPath, 3, 5);
    //         $realPath = implode('/',$delPath);

    //         $drawing = new Drawing();
    //         $drawing->setName($product->name);
    //         $drawing->setDescription($product->name);
    //         $drawing->setPath(public_path($realPath));
    //         $drawing->setWidth(80);
    //         $drawing->setHeight(80);
    //         $index+=2;
    //         $drawing->setCoordinates("H$index");
    //         $drawing->setWorksheet($workSheet);
    //     });
    // }

    // public function registerEvents():array {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $event->sheet->getDefaultRowDimension()->setRowHeight(60);
    //             $workSheet = $event->sheet->getDelegate();
    //             $this->setImage($workSheet);
    //         },
    //     ];
    // }
    public function styles(Worksheet $sheet) {
        $count = count($this->category_groups);
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000'],
                ],
            ],

        ]);
    }
}
