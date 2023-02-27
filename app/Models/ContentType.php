<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
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
}
