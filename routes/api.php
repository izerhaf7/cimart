<?php

use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use App\Models\ShoppingCart;
use App\Models\WebsitePerson;
use App\Models\WebsiteSettings;
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
        'user_order_id' => 'string',
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
                'product_name' => $product->name, // Assume the product name is stored in a 'name' field
            ];

            // Track the quantities for batch update
            $product->decrement('stock', $item['quantity']);
        }

        $orders = [];
        $orderItems = [];
        $allProductDetails = ''; // To store product details for WhatsApp message

        // Create orders for each merchant
        foreach ($merchantOrders as $merchantId => $items) {
            $totalPrice = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $items));

            $order = Orders::create([
                'user_id' => $merchantId,
                'user_order_id' => $request->user_order_id,
                'status' => 'pending',
                'total_price' => $totalPrice
            ]);

            foreach ($items as $item) {
                $orderItems[] = [
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ];
                $allProductDetails .= "Product: " . $item['product_name'] . ", Quantity: " . $item['quantity'] . "\n";
            }
        }

        // Insert all order items in one go
        OrderItems::insert($orderItems);

        // Delete items from shopping cart after successful order placement
        ShoppingCart::whereIn('product_id', $productIds)->delete();

        DB::commit();

        // Build WhatsApp message
        $message = urlencode("Your order (Order ID: " . $order->id . ") has been placed successfully.\n\nTotal Price: Rp" . $totalPrice . "\n\nProducts:\n" . $allProductDetails . "Thank you for shopping with us!");
        $data = WebsiteSettings::first();

        // Generate WhatsApp link
        $whatsappUrl = "https://wa.me/" . $data->phone_number . "?text=" . $message;

        // Redirect to WhatsApp
        return redirect($whatsappUrl);
    } catch (Exception $e) {
        DB::rollBack();
        return response()->json(['error' => 'An error occurred while placing the order: ' . $e->getMessage()], 500);
    }
});

Route::post('/checkout', function (Request $request) {
    // Retrieve the product and user information from the request
    $product_id = $request->input('product_id');

    // Find the product details from the database
    $product = Products::find($product_id);

    // Construct the WhatsApp message
    $message = urlencode("Hello, I would like to order the following product:\n\n"
        . "Product: " . $product->name . "\n"
        . "Price: Rp" . number_format($product->price, 0, ',', '.') . "\n"
        . "Quantity: 1\n\n"
        . "Please confirm my order.");

    // WhatsApp URL format: https://wa.me/whatsappphonenumber/?text=YourMessage
    // Replace the "whatsapp_number" with the business's WhatsApp phone number
    $whatsappNumber = '62881011205176'; // Replace with your WhatsApp number
    $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$message}";

    // Redirect the user to WhatsApp with the order details
    return redirect($whatsappUrl);
});

Route::get('/deleteCart', function (Request $request) {
    $data = ShoppingCart::find($request['id']);
    $data->delete();
    return redirect('cart');
});
Route::post('/placeCart', function (Request $request) {
    ShoppingCart::create(['product_id' => $request['id'], 'user_id' => $request['user_id']]);
    return redirect('dashboard');
});
