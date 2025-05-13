<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\ShoppingCart;
use App\Models\Categories;

class SearchPage extends Component
{
    public $search = ''; // Search input

    // Method to render the component
    public function send($id)
    {
        ShoppingCart::create(['product_id' => $id, 'user_id' => auth()->user()->id]);
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        // Fetch products that match the search term in product name, description, or category name
        $products = Products::with('Categories') // Include related categories
            ->where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('description', 'LIKE', "%{$this->search}%")
            ->orWhereHas('categories', function ($query) {
                $query->where('name', 'LIKE', "%{$this->search}%");
            })
            ->paginate(10); // 10 items per page, you can adjust this value

        // Pass the products to the view
        return view('livewire.search-page', [
            'products' => $products,
        ]);
    }
}
