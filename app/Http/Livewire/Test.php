<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $steps = 5;

    public function mount()
    {
        $this->steps = 1;
    }

    public function render()
    {
        return view('livewire.test', ['steps' => $this->steps]);
    }
}
