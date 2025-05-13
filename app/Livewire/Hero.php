<?php

namespace App\Livewire;

use Livewire\Component;

class Hero extends Component
{
    public function render()
    {   
        $data = Hero::all();
        return view('livewire.hero', compact('data'));
    }
}
