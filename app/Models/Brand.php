<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image_url',
        'status',
        'deleted_at'
    ];

    public const UPLOAD_PATH = 'upload/brands';

    public function scopePublish($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function ImageUrl():Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset($value),
        );
    }
}
