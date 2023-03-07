<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryCharge extends Model
{
    use HasFactory;
    protected $fillable = [
        'logistic_id',
        'type',
        'amount'
    ];

    public function scopeValid($query)
    {
        return $query->whereNotNull('amount')->where('amount', '>', 0);
    }

    public function scopeOnlyPremium($query)
    {
        return $query->where('type','premium');
    }

    public function logistic(){
        return $this->belongsTo(Logistic::class ,'logistic_id');
    }
}
