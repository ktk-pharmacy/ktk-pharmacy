<?php

use App\Models\CategoryGroup;
use App\Models\MainCategory;
use App\Models\Settings;
use App\Models\SubCategory;


function getStatusBadge($status)
{
    return $status == true ? "<label class='badge badge-success'>Active</label>" : "<label class='badge badge-danger'>Inactive</label>";
}


function getAvaliableBadge($v)
{
    return $v == true ? "<label class='badge badge-success'>Avaliable</label>" : "<label class='badge badge-danger'>Unavaliable</label>";
}

function getGroupCategories()
{
    $categrygroups = CategoryGroup::publish()->get();
    // dd($categorygroups);
    return $categrygroups;
}

function getMenuCategories($groupid)
{

    $main_categories = MainCategory::with('group', 'children')->where('group_id', $groupid)->get();

    // $categorygroups = CategoryGroup::publish()->get();
    dd($main_categories);
    die();
    return $main_categories;
}

function site_settings()
{
    foreach (Settings::all() as $setting) {
        $data[$setting->key] = $setting->value;
    }

    return $data;
}
