<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InventoryService;

class InventoryController extends Controller
{
    public $inventory_service;
    public function __construct(InventoryService $inventoryService)
    {
        $this->inventory_service = $inventoryService;
    }
    public function addStock(Request $request)
    {
        $request->validate([
            'store_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $this->inventory_service->addStock(
            $request->store_id,
            $request->product_id,
            $request->quantity,
            'Manual stock add'
        );

        return response()->json([
            'message' => 'Stock added successfully'
        ]);
    }
}
