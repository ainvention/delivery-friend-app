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

    public $pageName = 'home';

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
        $this->pageName = 'detail';
    }


    public function movePage($pageQuery)
    {
        $this->pageName = $pageQuery;
    }


    // public function contactFormClose()
    // {
    //     $this->openContact = false;
    // }



    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        // pass the object to the view in the render() method,
        // along with pagination it does not need to be a public prop
        // This query will adjust with ->select() for avoid N+1 query problem.
        $tasks = Sending::latest()->get();
        $taskCount = $tasks->count();
        return view('livewire.search.step1', [
            'tasks' => $tasks,
            'taskCount' => $taskCount,
        ]);
    }





    public function searchTask()
    {
        // Sending::where('from_address', $this->fromAddress)
        // ->where('to_address', $this->toAddress)
        // ->where('size', $this->size)
        // ->get();
    }

    public function nowDelevoping()
    {
        // return $this->alert('success', 'We are developing a service!', [
        //     'position' =>  'center',
        //     'timer' =>  5000,
        //     'toast' =>  false,
        //     'confirmButtonText' =>  'to get more accurate map information.',
        //     'cancelButtonText' =>  'OK',
        //     'showCancelButton' =>  true,
        //     'showConfirmButton' =>  false,
        // ]);
    }
}
