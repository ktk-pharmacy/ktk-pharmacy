<?php

use App\Models\Settings;
use App\Models\ContentType;
use App\Models\SubCategory;
use App\Models\MainCategory;
use App\Models\CategoryGroup;


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

function getContentType()
{
    return ContentType::publish()->get();
}
