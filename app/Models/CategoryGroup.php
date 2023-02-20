<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'slug',
        'sorting',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'status',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public const UPLOAD_PATH = 'upload/categories';

    public function scopePublish($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }

}
