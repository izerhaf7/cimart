<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Hero;
use App\Livewire\SearchPage;
use App\Models\Categories;
use App\Models\Hero as ModelsHero;
use App\Models\Orders;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Review;
use App\Models\ShoppingCart;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect("dashboard");
});

Route::get("/dashboard", function () {
    $data = Categories::all();
    $banner = ModelsHero::all();
    return view("dashboard", compact("data", "banner"));
})->name("dashboard");
Route::get("/about", function () {
    // Pass the data to the view
    $data = WebsiteSettings::first()->with("person")->get();
    return view("about", compact("data"));
})->name("about");
Route::get("article/{id?}", function (?int $id = 0) {
    $data = Posts::find($id);
    return view("article", compact("data"));
});

Route::post("/submit-review", function (Request $request) {
    // Validate the request
    $request->validate([
        "product_id" => "required|exists:products,id", // Ensure product exists
        "rating" => "required|integer|min:1|max:5", // Rating must be between 1 and 5
        "comment" => "required|string|max:1000", // Comment must not exceed 1000 characters
    ]);

    // Create the review
    Review::create([
        "user_id" => Auth::id(), // Assuming the user is logged in
        "product_id" => $request->product_id,
        "rating" => $request->rating,
        "comment" => $request->comment,
    ]);

    // Redirect or return a response
    return redirect()->back()->with("success", "Thank you for your review!");
})->name("review.store");

Route::get("/order", function () {
    $data = Orders::where("user_order_id", auth()->user()->id)->get();

    return view("order", compact("data"));
})
    ->name("order")
    ->middleware(["auth", "verified"]);

Route::get("/cart", function () {
    $data = ShoppingCart::where("user_id", auth()->user()->id)->get();
    $total = ShoppingCart::where("shopping_cart.user_id", auth()->user()->id)
        ->join("products", "shopping_cart.product_id", "=", "products.id")
        ->sum("products.price");

    return view("welcome", compact("data", "total"));
})
    ->name("cart")
    ->middleware(["auth", "verified"]);

Route::get("/detail/{id?}", function (?int $id = 0) {
    $data = Products::with("review")->find($id); // Fetch the product along with its reviews

    // Calculate the average rating
    $averageRating = round($data->review()->avg("rating"));

    return view("detailPage", compact("data", "averageRating"));
});
Route::get("/category", function () {
    $data = Categories::all();
    return view("category", compact("data"));
});

Route::get("categoryPage/{category?}", function (?string $category = "") {
    // Find the products that belong to the category
    $products = Products::with("categories")
        ->whereHas("categories", function ($query) use ($category) {
            $query->where("name", "like", "%" . $category . "%"); // Assuming you're searching by category name
        })
        ->get();

    return view("category_page", compact("products"));
});

Route::get("/products/{id?}", function (?int $id = 0) {
    $data = Products::find($id);
    $data->viewcount += 1;
    $data->save();
    return redirect("/detail/" . $id . "");
});

Route::get("/search", SearchPage::class);

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );
});

require __DIR__ . "/auth.php";
