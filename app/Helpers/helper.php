<?php

use App\Models\CategoryGroup;
use App\Models\MainCategory;
use App\Models\SubCategory;


function getStatusBadge($status){
    return $status == true ? "<label class='badge badge-success'>Active</label>" : "<label class='badge badge-danger'>Inactive</label>";
}


function getGroupCategories()
{
    $categrygroups = CategoryGroup::publish()->get();
    // dd($categorygroups);
    return $categrygroups;
}

function getMenuCategories($groupid)
{

    $main_categories = MainCategory::with('group','children')->where('group_id',$groupid)->get();

    // $categorygroups = CategoryGroup::publish()->get();
    // dd($categorygroups);
    return $main_categories;
}

