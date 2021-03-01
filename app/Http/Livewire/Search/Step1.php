<?php

namespace App\Http\Livewire\Search;

use App\Models\User;
use App\Models\Sending;
use Livewire\Component;

class Step1 extends Component
{

    //$page is already used in pagination, so changed to pageName.
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
        $this->page = 'detail';
    }


    public function movePage($page)
    {
        $this->pageName = $page;
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
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
        // This query will adjust with ->select() for avoid N+1 query problem in the next DEV session.
        // $tasks = Sending::paginate(10);
        $tasks = Sending::orderBy('created_at', 'desc')->paginate(10);
        // $tasks = Sending::paginate(10);
        return view('livewire.search.step1', [
            'tasks' => $tasks,
            'taskCount' => $tasks->count(),
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



    // public function contactFormClose()
    // {
    //     $this->openContact = false;
    // }
}
