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

        // for modal switching
        public $modalSwitch = false;

        public $often;
        public $size;
        public $distance = null;
        public $task;





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




        /**
     * On/Off modalToggle
     *
     * @return void
     */
    public function modalToggle($param = null)
    {
        $this->modalSwitch = !$this->modalSwitch;

        if ($param === 'cancel') {
            $this->often = null;
            $this->size = null;
            $this->distance = null;
        } elseif ($param === 'save') {
            $this->often = $this->often;
            $this->size = $this->size;
            $this->distance = $this->distance;
        }
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


    public function detail($id)
    {
        $this->task = Sending::find($id);
        $this->emit('detail', ['task' => $this->task]);
    }
}
