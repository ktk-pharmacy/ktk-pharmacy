<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_mm',
        'slug',
        'description',
        'product_details',
        'image_url',
        'UOM',
        'packaging',
        'availability',
        'brand_id',
        'sub_category_id',
        'other_information',
        'status',
        'product_code',
        'manufacturer',
        'distributed_by',
        'deleted_at',
        //
        'price',
        'sale_price',
        'discount_amount',
        'discount_type',
        'discount_from',
        'discount_to',
        'stock',
        'is_new'
    ];

    public const UPLOAD_PATH = 'upload/products';

    public function scopePublish($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset($value),
        );
    }

    protected function nameFilter(): Attribute
    {
        return Attribute::make(
            get: fn () => session()->get('locale') == 'en' ? $this->name : $this->name_mm ?? $this->name,
        );
    }

    public function getIsPromotionAttribute()
    {
        return $this->price > $this->sale_price;
    }

    public function getDiscountToAttribute($value)
    {
        $date = new DateTime($value);
        return $date->modify('-1 day')->format('Y-m-d');
    }

    public function hasDiscount()
    {
        return $this->discount_amount && $this->discount_from <= today() && $this->discount_to >= today()->format('Y-m-d');
    }

    public function getDiscountAttribute()
    {
        if ($this->hasDiscount()) {
            if ($this->discount_type == "PERCENT") {
                $discount = ($this->sale_price / 100) * $this->discount_amount;
            } else {
                $discount = $this->discount_amount;
            }
            $discount = $this->sale_price - $discount;

            return $discount;
        }
        return null;
    }
}
