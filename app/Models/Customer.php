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

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => asset($this->image_url ?? "/assets/images/ktk_icon.jpg"),
        );
    }
}
