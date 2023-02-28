<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content_type_id',
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


    public function scopeTypeIn($query, $value)
    {
        return $query->where('content_type_id', $value);
    }

    public function type()
    {
        return $this->belongsTo(ContentType::class, 'content_type_id');
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($v) => asset($v),
        );
    }

    protected function shortDesc(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::limit(strip_tags($this->description), 180, '...')
        );
    }
}
