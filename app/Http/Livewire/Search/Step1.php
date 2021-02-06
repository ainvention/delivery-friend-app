<?php

namespace App\Http\Livewire\Search;

use App\Models\Sending;
use App\Models\User;
use Livewire\Component;

class Step1 extends Component
{

    // public $tasks;


    // public function mount()
    // {
    //     $this->tasks = Sending::paginate(10);
    // }

    public function render()
    {
        return view('livewire.search.step1', ['tasks' => Sending::paginate(10)]);
    }

    public function detail($id)
    {
        $task = Sending::where('id', $id)->get();
        return view('livewire.search.detail', ['task' => $task]);
    }
}
