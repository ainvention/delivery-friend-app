<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class Main extends Component
{
    public $step = null;

    public function render()
    {
        return view('livewire.search.step1');
    }
}
