<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $table = 'products';

    public $fillable = [
        'item',
        'name',
        'brand',
        'description',
        'avail',
        'price'
    ];

    protected $casts = [
        'avail' => 'string',
        'item' => 'string',
        'name' => 'string',
        'brand' => 'string',
        'description' => 'string',
        'price' => 'decimal:2'
    ];

    public static array $rules = [
        'avail' => 'nullable|string|max:50',
        'item' => 'nullable|string|max:20',
        'name' => 'nullable|string|max:75',
        'brand' => 'nullable|string|max:20',
        'description' => 'nullable|string|max:250',
        'price' => 'nullable|numeric'
    ];

    public function includedDiscount(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\DiscountCode::class, 'included_discount_id');
    }

    public function setupDiscount(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\DiscountCode::class, 'setup_discount_id');
    }

    public function addChargeDiscount(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\DiscountCode::class, 'add_charge_discount_id');
    }
}
