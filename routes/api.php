<?php

use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/placeOrder', function (Request $request) {
    // Validate input
    $validated = $request->validate([
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.quantity' => 'required|integer|min:1',
    ]);

    DB::beginTransaction();

    try {
        // Organize items by merchant
        $merchantOrders = [];
        $productIds = [];

        // Collect product IDs for bulk fetching
        foreach ($request->input('items') as $item) {
            $productIds[] = $item['product_id'];
        }

        // Fetch products with locking in a single query
        $products = Products::whereIn('id', $productIds)->lockForUpdate()->get();

        // Check stock and organize items
        foreach ($request->input('items') as $item) {
            $product = $products->firstWhere('id', $item['product_id']);
            if (!$product || $product->stock < $item['quantity']) {
                // Handle out of stock or invalid product
                DB::rollBack();
                return response()->json(['error' => 'Invalid product or insufficient stock'], 400);
            }

            $merchantId = $product->user_id;
            if (!isset($merchantOrders[$merchantId])) {
                $merchantOrders[$merchantId] = [];
            }

            $merchantOrders[$merchantId][] = [
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ];

            // Track the quantities for batch update
            $product->decrement('stock', $item['quantity']);
        }

        $orders = [];
        $orderItems = [];
        // Create orders for each merchant
        foreach ($merchantOrders as $merchantId => $items) {
            $order = Orders::create([
                'user_id' => $merchantId,
                'status' => 'pending',
            ]);
            
            
            foreach ($items as $item) {
                $orderItems[] = [
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ];
            }
        }


        // Insert all order items in one go
        OrderItems::insert($orderItems);

        DB::commit();
        return response()->json(['message' => 'Orders placed successfully'], 200);
    } catch (Exception $e) {
        DB::rollBack();
        dd($e);
        return response()->json(['error' => 'An error occurred while placing the order: ' . $e->getMessage()], 500);
    }
});
