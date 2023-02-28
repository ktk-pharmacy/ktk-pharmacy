<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_mm',
        'slug',
        'deleted_at'
    ];

    public function scopePublish($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function blogs()
    {
        return $this->hasMany(Content::class)->publish();
    }

    protected function nameFilter(): Attribute
    {
        return Attribute::make(
            get: fn () => session()->get('locale') == 'en' ? $this->name : $this->name_mm ?? $this->name,
        );
    }
}
