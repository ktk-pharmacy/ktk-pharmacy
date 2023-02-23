<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'product_details',
        'image_url',
        'MOU',
        'packaging',
        'availability',
        'brand_id',
        'sub_category_id',
        'other_information',
        'status',
        'manufacturer',
        'distributed_by',
        'deleted_at'
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

    protected function imageUrl():Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset($value),
        );
    }
}
