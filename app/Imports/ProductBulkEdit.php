<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductBulkEdit implements WithHeadingRow,ToModel
{

    public function model(array $row)
    {
        $availability = (bool) $row['stock'];
        Products::find($row['id'])
            ->update([
                'stock'        => $row['stock'],
                'availability' => $availability
            ]);
    }
}
