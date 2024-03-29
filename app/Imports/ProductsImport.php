<?php

namespace App\Imports;

use App\Models\Products;
use App\Traits\GenerateSlug;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProductsImport implements ToModel, WithHeadingRow
{
    use GenerateSlug;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function sheets(): array
    {
        return [
            'Products' => $this
        ];
    }

    public function model(array $row)
    {
        return new Products([
            'name' => $row['name'],
            'name_mm' => $row['name_mm'] ?? Null,
            'product_code' => $row['product_code'],
            'image_url' => "assets/images/ktk_icon.jpg",
            'slug' => $this->generateSlug($row['name'], 'products'),
            'description' => $row['description']??$row['name'],
            'product_details' => $row['product_details'] ?? Null,
            'MOU' => $row['UOM'] ?? Null,
            'packaging' => $row['packaging'] ?? Null,
            'brand_id' => $row['brand_id'] ?? Null,
            'sub_category_id' => $row['sub_category_id'],
            'other_information' => $row['other_information'] ?? Null,
            'manufacturer' => $row['manufacturer'] ?? Null,
            'distributed_by' => $row['distributed_by'] ?? Null,
            'availability' => $row['availability'] ?? 1
        ]);
    }
}
