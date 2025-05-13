<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Livewire\Component;

class RemoveButton extends Component
{
    public $id;

    public function remove()
    {
        $data = ShoppingCart::find($this->id);

        if ($data) {
            $data->delete();
            session()->flash('message', 'Item removed successfully!');
        } else {
            session()->flash('error', 'Item not found!');
        }
    }

    public function render()
    {
        return view('livewire.remove-button');
    }
}
