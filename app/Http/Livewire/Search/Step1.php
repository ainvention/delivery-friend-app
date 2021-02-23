<?php

namespace App\Http\Livewire\Search;

use App\Models\User;
use App\Models\Sending;
use Livewire\Component;

class Step1 extends Component
{
    // public $tasks;

    // public function mount()
    // {
    //     $this->tasks = Sending::paginate(10);
    // }

    public $page = 'home';

    public $often;
    public $size;
    public $selectedTask;
    public $selectedTaskId;
    public $dateSuggestion;
    public $priceSuggestion;
    public $openContact = false;
    public $modalSwitch = false;



    protected $listeners = ['moveDetailPage', 'movePage'];



    public function moveDetailPage($id)
    {
        $this->selectedTask = Sending::where('id', $id)->first();
        $this->page = 'detail';
    }


    public function movePage($page)
    {
        $this->page = $page;
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        // pass the object to the view in the render() method,
        // along with pagination it does not need to be a public prop
        $tasks = Sending::orderByDesc('created_at');
        $taskCount = $tasks->count();
        return view('livewire.search.step1', [
            'tasks' => $tasks->paginate(10),
            'count' => $taskCount
        ]);
    }





    public function searchTask()
    {
        // $toDate = $this->toDate;
        // $toTime = $this->toDate
        // Sending::where('from_address', $this->fromAddress)
        // ->where('to_address', $this->toAddress)
        // ->where('to_date', [$from, $to])
        // ->where('size', $this->size)
        // ->where
    }
}
