<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'sale_price',
        'quantity',
        'discount_amount',
        'discount_type',
        'discount_total',
        'order_product_total',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function completeOrder()
    {
        return $this->belongsTo(Order::class, 'order_id')->status(Order::COMPLETED,Order::DELIVER);
    }
}
