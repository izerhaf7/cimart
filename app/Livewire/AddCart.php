<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Livewire\Component;

class AddCart extends Component
{
    public $item;
    public function send($id)
    {
    
        ShoppingCart::create(['product_id' => $id, 'user_id' => auth()->user()->id]);

        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.add-cart');
    }
}
