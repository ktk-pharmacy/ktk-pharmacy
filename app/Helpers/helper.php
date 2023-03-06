<?php

use App\Models\CategoryGroup;
use App\Models\MainCategory;
use App\Models\Settings;
use App\Models\SubCategory;
use App\Models\ServiceSetting;
use App\Models\ContentType;
use App\Models\Products;

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
    // dd($main_categories);
    // die();
    return $main_categories;
}


function site_settings()
{
    foreach (Settings::all() as $setting) {
        $data[$setting->key] = $setting->valueFilter;
    }
    // dd($data);
    // die();
    return $data;
}
function getCategory(){
    $categories = SubCategory::with('parent')->get();
    return $categories;
}
function get_product_count(){
  $product=  Products::with('brand','sub_category')->get();
  return $product;
}

function get_product_instock(){
    $in_stock_product=Products::where('availability',1)->get();
    return $in_stock_product;
}
function get_product_outstock(){
    $out_stock_product=Products::where('availability',0)->get();
    return $out_stock_product;
}
function getContentType()
{
    return ContentType::publish()->get();
}
function get_service_setting()
{
    $services = ServiceSetting::publish()->get();
    return $services;
}
