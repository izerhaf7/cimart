<?php

namespace App\Livewire;

use App\Models\Posts;
use App\Models\ShoppingCart;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class FrontArticle extends Component
{
    public function send($id)
    {
        ShoppingCart::create(['product_id' => $id, 'user_id' => auth()->user()->id]);
    }
    public function render()
    {
        $data = Posts::orderBy('id', 'desc') // Replace 'id' with your timestamp field if available
            ->limit(10)             // Limit to 10 results
            ->get();
        return view('livewire.front-article', compact('data'));
    }
}
