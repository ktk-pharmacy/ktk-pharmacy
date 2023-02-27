<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $filable = [
        'title',
        'slug',
        'description',
        'image_url',
        'status',
        'deleted_at'
    ];

    const UPLOAD_PATH = 'upload/contents';

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
            get: fn ($v) => asset($v),
        );
    }
}
