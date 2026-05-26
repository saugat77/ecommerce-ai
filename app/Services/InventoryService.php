<?php

use App\Models\InventoryMovement;
use App\Models\StoreStock;

class InventoryService
{
    public function addStock($storeId, $productId, $qty, $note = null)
    {
        // 1. Update store stock
        $stock = StoreStock::firstOrCreate([
            'store_id' => $storeId,
            'product_id' => $productId,
        ]);

        $stock->quantity += $qty;
        $stock->save();

        // 2. Log movement
        InventoryMovement::create([
            'store_id' => $storeId,
            'product_id' => $productId,
            'type' => 'in',
            'quantity' => $qty,
            'note' => $note,
        ]);
    }

    public function removeStock($storeId, $productId, $qty, $note = null)
    {
        $stock = StoreStock::where('store_id', $storeId)
            ->where('product_id', $productId)
            ->first();

        if (!$stock || $stock->quantity < $qty) {
            throw new \Exception("Insufficient stock");
        }

        $stock->quantity -= $qty;
        $stock->save();

        InventoryMovement::create([
            'store_id' => $storeId,
            'product_id' => $productId,
            'type' => 'out',
            'quantity' => $qty,
            'note' => $note,
        ]);
    }
}
