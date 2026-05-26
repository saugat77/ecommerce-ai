<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreStock extends Model
{
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getAvailableAttribute()
    {
         return $this->quantity - $this->reserved_quantity;
    }
}
