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
    $categrygroups = CategoryGroup::publish()->active()->get();
    // dd($categorygroups);
    return $categrygroups;
}

function getMenuCategories($groupid)
{

    $main_categories = MainCategory::with('group', 'children')->where('group_id', $groupid)->active()->get();

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
function getCategory()
{
    $categories = SubCategory::with('parent')->get();
    return $categories;
}
function get_product_count()
{
    $product =  Products::with('brand', 'sub_category')->get();
    return $product;
}

function get_product_instock()
{
    $in_stock_product = Products::where('availability', 1)->get();
    return $in_stock_product;
}
function get_product_outstock()
{
    $out_stock_product = Products::where('availability', 0)->get();
    return $out_stock_product;
}
function getContentType()
{
    return ContentType::publish()->get();
}
function get_service_setting()
{
    $services = ServiceSetting::publish()->active()->get();
    return $services;
}

function splitDateRange($date)
{
    $date_range = explode(" to ", $date);
    $end_date = new DateTime(array_key_exists(1, $date_range) ? $date_range[1] : $date_range[0], new DateTimeZone('Asia/Yangon'));
    $data['to'] = $end_date->modify('+1 day');
    $data['from'] = new DateTime($date_range[0], new DateTimeZone('Asia/Yangon'));
    return $data;
}

function calculateCouponAmount($totalCart, $coupon)
{
    $coupon_amount = $coupon->type == 'percent' ? $totalCart * ($coupon->amount / 100) : $coupon->amount;
    return $coupon_amount;
}

function getDiscount($sale_price, $discount_amount, $discount_type)
{
    if ($discount_type == "PERCENT") {
        $discount = ($sale_price / 100) * $discount_amount;
    } else {
        $discount = $discount_amount;
    }

    return $discount;
}

function ordersFilter($query, $request)
{
    if ($request->search) {
        $keyword = $request->search;
        $query = $query->whereHas('customer', function ($q) use ($keyword) {
            $q->where('name', 'like', "%$keyword%");
        })->orWhere('id', $keyword);
    }
    if ($request->filter) {
        $date = splitDateRange($request->filter);
        $query = $query->whereBetween('created_at', [$date['from'], $date['to']]);
    }
    if ($request->status) {
        $query = $query->where('status', $request->status);
    }
    return $query;
}
