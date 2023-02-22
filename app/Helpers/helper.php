<?php

use App\Models\CategoryGroup;


function getStatusBadge($status){
    return $status == true ? "<label class='badge badge-success'>Active</label>" : "<label class='badge badge-danger'>Inactive</label>";
}


function getMenuCategories()
{
    $categorygroups = CategoryGroup::publish()->get();
    // dd($categorygroups);
    return $categorygroups;
}