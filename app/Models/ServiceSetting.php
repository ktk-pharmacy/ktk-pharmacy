<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_mm',
        'image_url',
        'description',
        'bg_url',
        'status',
        'deleted_at'
    ];

    public const UPLOAD_PATH = 'upload/serviceSettings';

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
    protected function bgUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset($value),
        );
    }

    protected function titleFilter(): Attribute
    {
        return Attribute::make(
            get: fn () => session()->get('locale') == 'en' ? $this->title : $this->title_mm ?? $this->title,
        );
    }

    protected function shortDesc(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::limit(strip_tags($this->description), 220, '...')
        );
    }
}
