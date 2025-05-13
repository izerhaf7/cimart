<?php

namespace App\Livewire;
use Livewire\Attributes\Lazy;
use Livewire\Component;


class Title extends Component
{
    public $title;
    public function render()
    {
        return view('livewire.title');
    }
}
