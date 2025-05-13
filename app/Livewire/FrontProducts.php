<?php
namespace App\Livewire;

use App\Models\Products;
use App\Models\Recomendation;
use App\Models\ShoppingCart;
use Livewire\Component;

class FrontProducts extends Component
{
    public $category;

    public function send($id)
    {
        ShoppingCart::create(['product_id' => $id, 'user_id' => auth()->user()->id]);

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        if ($this->category == 'recomendation') {
            $data = Recomendation::with('product.review')->get();
        } elseif ($this->category == 'promotion') {
            $data = Products::with('reviews')
                ->where('discounted_price', '>', 0)
                ->get();
        } elseif ($this->category == 'new') {
            $data = Products::with('reviews')
                ->where('discounted_price', '>', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $data = [];
        }

        return view('livewire.front-products', compact('data'));
    }
}
