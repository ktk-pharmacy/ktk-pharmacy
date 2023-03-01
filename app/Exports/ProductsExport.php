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

class ProductsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithEvents, WithStyles
{
    function __construct(protected $products)
    {
    }
    public function headings(): array
    {
        return [
            'Name',
            'Name MM',
            'Product Code',
            'Brand',
            'Category',
            'Description',
            'Packaging',
            ' MOU ',
            'Availability',
            'Distributed By',
            'Manufacturer',
            'status',
            'Product Detail',
            'Other Information',
            'Deleted_at',
            ' Image '
        ];
    }

    public function map($item): array
    {

        $status = $item->status == 1 ? 'Acitve' : 'Inactive';
        if ($item->deleted_at) {
            $status = "Deleted";
            $deleted_at = date("Y-m-d H:i A", strtotime($item->deleted_at));
        }

        return [
            $item->name,
            $item->name_mm,
            $item->product_code,
            $item->brand->name,
            $item->sub_category->name,
            $item->description,
            $item->packaging,
            $item->MOU,
            $item->availability,
            $item->distributed_by,
            $item->manufacturer,
            $status,
            strip_tags(preg_replace("/&#?[a-z0-9]+;/i", "", $item->product_details)),
            strip_tags(preg_replace("/&#?[a-z0-9]+;/i", "", $item->other_information)),
            $item->deleted_at ? $deleted_at : "",
            // strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$item->other_information)),
            "",
        ];
    }

    public function collection()
    {
        return $this->products;
    }

    public function setImage($workSheet)
    {
        $this->collection()->each(function ($product, $index) use ($workSheet) {
            $orgPath = explode('/', $product['image_url']);
            $delPath = array_splice($orgPath, 3, 5);
            $realPath = implode('/', $delPath);

            $drawing = new Drawing();
            $drawing->setName($product->name);
            $drawing->setDescription($product->name);
            $drawing->setPath(public_path($realPath));
            $drawing->setWidth(80);
            $drawing->setHeight(80);
            $index += 2;
            $drawing->setCoordinates("P$index");
            $drawing->setWorksheet($workSheet);
        });
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDefaultRowDimension()->setRowHeight(60);
                $workSheet = $event->sheet->getDelegate();
                $this->setImage($workSheet);
            },
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $count = count($this->products);
        $sheet->getStyle('A1:P1')->getFont()->setBold(true);
        $sheet->getStyle('A1:P1')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000'],
                ],
            ],

        ]);
    }
}
