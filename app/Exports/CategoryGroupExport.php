<?php

namespace App\Exports;

use App\Models\CategoryGroup;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryGroupExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CategoryGroup::all();
    }
}
