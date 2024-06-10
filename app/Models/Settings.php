<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_mm',
        'value',
        'key'
    ];

    public const UPLOAD_PATH = 'upload/settings';

    protected function valueFilter(): Attribute
    {
        return Attribute::make(
            get: fn () => session()->get('locale') == 'en' ? $this->value : $this->value_mm ?? $this->value,
        );
    }
}
