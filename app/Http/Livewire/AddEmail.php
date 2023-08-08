<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddEmail extends Component
{
    public $showEmail = false;
    public $counter;

    public function render()
    {
        return view('livewire.add-email');
    }
}
