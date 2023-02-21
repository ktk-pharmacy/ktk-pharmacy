<?php

namespace App\Imports;

use App\Traits\GenerateSlug;
use App\Models\CategoryGroup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CategoryGroupsImport implements ToModel, WithHeadingRow
{
    use GenerateSlug;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function sheets(): array
    // {
    //     return [
    //         'CategoryGroups' => $this
    //     ];
    // }

    public function model(array $row)
    {
        $lastCategoryGroup = CategoryGroup::orderBy('id','desc')->first();
        $lastSorting = $lastCategoryGroup->sorting??0;
        return new CategoryGroup([
            'name' => $row['name'],
            'name_mm' => $row['name_mm']??Null,
            'slug' => $this->generateSlug($row['name'], 'category_groups'),
            'sorting' => $row['sorting']??$lastSorting+1
        ]);
    }
}
