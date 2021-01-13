<?php

namespace App\Http\Livewire\Sending;

use Livewire\Component;

class Step6 extends Component
{
    public $step = 6;


    public function mount()
    {
        $this->step = 6;
    }

    public function render()
    {
        return view('livewire.sending.step6', ['step' => $this->step]);
    }
}
