<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_mm',
        'slug',
        'status',
        'category_group_id',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'slug',
        'status',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function scopePublish($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function group()
    {
        return $this->belongsTo(CategoryGroup::class, 'category_group_id')->publish();
    }

    public function children()
    {
        return $this->hasMany(SubCategory::class)->publish();
    }
    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class)->publish();
    }

    protected function nameFilter(): Attribute
    {
        return Attribute::make(
            get: fn () => session()->get('locale') == 'en' ? $this->name : $this->name_mm ?? $this->name,
        );
    }
}
