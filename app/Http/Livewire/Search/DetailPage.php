<?php

namespace App\Http\Livewire\Search;

use App\Models\Sending;
use Livewire\Component;

class DetailPage extends Component
{
    public $task;
    public $taskId;
    public $selectedTask;
    public $openContact = false;

    protected $listeners = [];

    public function render()
    {
        return view('livewire.search.detail-page', [
            'task' => $this->selectedTask,
        ]);
    }



}
