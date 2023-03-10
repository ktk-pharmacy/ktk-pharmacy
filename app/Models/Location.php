<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'parent_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function region()
    {

        return $this->belongsTo(Location::class, 'parent_id', 'id');

    }

    public function townships()
    {
        return $this->hasMany(Location::class, 'parent_id', 'id');

    }

    public function logistic()
    {
        return $this->hasMany(Logistic::class, 'township_id');
    }

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_id');
    }
}
