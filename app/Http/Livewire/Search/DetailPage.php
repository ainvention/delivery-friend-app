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

    protected $listeners = ['contactFormToggle']; // contactFormToggle for after message sent

    public function render()
    {
        return view('livewire.search.detail-page', [
            'task' => $this->selectedTask,
        ]);
    }

    public function contactFormToggle()
    {
        $this->openContact = !$this->openContact;
    }
}
