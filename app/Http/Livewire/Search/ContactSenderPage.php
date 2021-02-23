<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class ContactSenderPage extends Component
{
    public $dateSuggestion;
    public $priceSuggestion;
    public $selectedTask;
    public $messageToSender;
    public $openContact = false;

    protected $listeners = ['sendMessageToSender'];

    public function mount()
    {
        $this->dateSuggestion = $this->selectedTask->to_time_manually;
        $this->priceSuggestion = $this->selectedTask->recommended_cost;
    }


    public function render()
    {
        return view('livewire.search.contact-sender-page');
    }

    public function sendMessageToSender()
    {
        $this->validate([
            'messageToSender' => 'required|string|min:10|max:500',
            'dateSuggestion' => 'required|date',
            'priceSuggestion' => 'required|numeric|min:180|max:65000',
        ]);

        $this->openContact = !$this->openContact;
        return $this->alert('success', 'Message sent!,', [
            'position' =>  'center',
            'timer' =>  3000,
            'toast' =>  false,
            'text' =>  'Sender will reply you when opened.'.$this->selectedTaskId,
            'confirmButtonText' =>  '',
            'cancelButtonText' =>  'OK',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }
}
