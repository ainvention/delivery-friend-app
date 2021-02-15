<?php

namespace App\Http\Livewire\Search;

use App\Models\Sending;
use Livewire\Component;

class Detail extends Component
{


    public $task;

    // protected $listeners =[
    //     'detail' => 'render'
    // ];



    public function mount($id = 1)
    {
        $this->task = Sending::find($id);
    }



    public function render()
    {
        return view('livewire.search.detail', ['task' => $this->task]);
    }
}
