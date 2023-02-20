<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_url',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'mediable_id',
        'mediable_type'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function imageUrl():Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset($value),
        );
    }

    public function mediable()
    {
        return $this->morphTo();
    }
}
