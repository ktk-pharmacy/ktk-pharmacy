<?php

use App\Models\CategoryGroup;
use App\Models\MainCategory;
use App\Models\Settings;
use App\Models\SubCategory;
use App\Models\ServiceSetting;
use App\Models\ContentType;

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
    dd($main_categories);
    die();
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
    $coupon_amount = $coupon->type == 'percent' ? $totalCart * ($coupon->amount/100) : $coupon->amount;
    return $coupon_amount;
}
