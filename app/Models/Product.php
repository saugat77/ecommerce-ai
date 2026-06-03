<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'cost_price',
        'discount_amount',
        'discount_type',
        'is_taxable',
        'stock',
        'is_active',
    ];
    public function bestSelling(){
        return $this->hasMany(Cart::class);
    }
    public function stocks()
    {
        return $this->hasMany(StoreStock::class);
    }

    public function movements()
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
