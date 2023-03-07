<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'birthday',
        'gender',
        'contact_phone_no',
        'profile_image',
        'billing_address',
        'shipping_address',
        'order_note',
        'status',
        'verified_at'
    ];

    public const UPLOAD_PATH = 'upload/customers';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username',
        'password',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    protected function profileImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset($value ?? "/assets/images/ktk_icon.jpg"),
        );
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function completedOrders()
    {
        return $this->hasMany(Order::class)->status('Completed')->orderBy('id', 'DESC');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
