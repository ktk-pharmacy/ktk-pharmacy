<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact_phone_no',
        'city',
        'township',
        'billing_address',
        'shipping_address',
        'order_note'
     ];
     public function cityInfo(){
         return $this->belongsTo(Location::class, 'city' );
     }
     public function townshipInfo(){
         return $this->belongsTo(Location::class, 'township' );
     }
}
