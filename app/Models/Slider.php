<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_url',
        'url',
        'status',
        'deleted_at'
    ];

    public const UPLOAD_PATH = 'upload/sliders';

    public function scopePublish($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset($value),
        );
    }
}
