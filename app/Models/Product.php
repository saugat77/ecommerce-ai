<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function stocks()
    {
        return $this->hasMany(StoreStock::class);
    }

    public function movements()
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
