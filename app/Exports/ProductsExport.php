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

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    function __construct(protected $products)
    {
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Name MM',
            'Product Code',
            'Brand',
            'Category',
            'Description',
            'Packaging',
            'UOM',
            'Distributed By',
            'Manufacturer',
            'status',
            'Product Detail',
            'Other Information',
            'Deleted At',
            'Stock'
        ];
    }

    public function map($item): array
    {

        $status = $item->status == 1 ? 'Acitve' : 'Inactive';
        if ($item->deleted_at) {
            $status = "Deleted";
            $deleted_at = date("Y-m-d H:i A", strtotime($item->deleted_at));
        }

        if($item->stock === null) {
            $stock = $item->availability?1:0;
        } elseif($item->stock === 0) {
            $stock = 0;
        } else {
            $stock = $item->stock;
        }

        return [
            $item->id,
            $item->name,
            $item->name_mm,
            $item->product_code,
            $item->brand->name??"-",
            $item->sub_category->name??"-",
            $item->description,
            $item->packaging,
            $item->UOM,
            $item->distributed_by,
            $item->manufacturer,
            $status,
            strip_tags(preg_replace("/&#?[a-z0-9]+;/i", "", $item->product_details)),
            strip_tags(preg_replace("/&#?[a-z0-9]+;/i", "", $item->other_information)),
            $item->deleted_at ? $deleted_at : "",
            $stock
        ];
    }

    public function collection()
    {
        return $this->products;
    }
}
