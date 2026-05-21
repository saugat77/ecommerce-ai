namespace App\Services\Inventory;

use App\Models\StoreStock;
use App\Models\InventoryMovement;
use Illuminate\Support\Facades\DB;

class InventoryService
{
    /**
     * ADD STOCK (PURCHASE / RESTOCK)
     */
    public function stockIn($storeId, $productId, $quantity, $referenceType = null, $referenceId = null)
    {
        return DB::transaction(function () use ($storeId, $productId, $quantity, $referenceType, $referenceId) {

            if ($quantity <= 0) {
                throw new \Exception("Quantity must be greater than 0");
            }

            // 1. CREATE MOVEMENT (HISTORY)
            InventoryMovement::create([
                'store_id' => $storeId,
                'product_id' => $productId,
                'type' => 'in',
                'quantity' => $quantity,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
            ]);

            // 2. UPDATE STORE STOCK (CACHE)
            $stock = StoreStock::firstOrCreate([
                'store_id' => $storeId,
                'product_id' => $productId,
            ]);

            $stock->quantity += $quantity;
            $stock->save();

            return $stock;
        });
    }

    /**
     * REMOVE STOCK (SALE / DAMAGE / ORDER)
     */
    public function stockOut($storeId, $productId, $quantity, $referenceType = null, $referenceId = null)
    {
        return DB::transaction(function () use ($storeId, $productId, $quantity, $referenceType, $referenceId) {

            if ($quantity <= 0) {
                throw new \Exception("Quantity must be greater than 0");
            }

            $stock = StoreStock::where([
                'store_id' => $storeId,
                'product_id' => $productId,
            ])->first();

            if (!$stock || $stock->quantity < $quantity) {
                throw new \Exception("Insufficient stock");
            }

            // 1. CREATE MOVEMENT
            InventoryMovement::create([
                'store_id' => $storeId,
                'product_id' => $productId,
                'type' => 'out',
                'quantity' => $quantity,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
            ]);

            // 2. UPDATE CACHE STOCK
            $stock->quantity -= $quantity;
            $stock->save();

            return $stock;
        });
    }

    /**
     * GET CURRENT STOCK
     */
    public function getStock($storeId, $productId)
    {
        return StoreStock::where([
            'store_id' => $storeId,
            'product_id' => $productId,
        ])->value('quantity') ?? 0;
    }
}