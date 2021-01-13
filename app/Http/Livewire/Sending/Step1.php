<?php

namespace App\Http\Livewire\Sending;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Step1 extends Component
{
    public $step=1;
    public $step1;
    public $step2;
    public $step3;
    public $step4;
    public $step5A;
    public $step5A2;
    public $step5B;
    public $step5B2;
    public $step6;

    protected $listeners = ['moveBack' => 'moveBack', 'moveNext' => 'moveNext'];

    protected $rules = [
        'step1' => 'required|min:4',
    ];

    protected $messages = [
        'step1.required' => 'This field is required.',
        'step1.min' => 'This field must be at least :min characters.',
    ];



    public function render()
    {
        return view('livewire.sending.step1', ['step' => $this->step]);
    }

    public function moveBack()
    {
        $this->step = $this->step - 1;
    }

    public function moveNext()
    {
        if ($this->validate()) {
            $this->step = $this->step + 1;
        }
    }
}
