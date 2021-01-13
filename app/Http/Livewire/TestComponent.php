<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $testModalSwitch;

    public function render()
    {
        return view('livewire.test-component');
    }

    public function modalOpen()
    {
        $this->testModalSwitch = 1;
    }

    public function modalClose()
    {
        $this->testModalSwitch = 0;
    }
}
