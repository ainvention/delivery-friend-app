<?php

namespace App\Http\Livewire\Sending;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use App\Models\Sending;

class Step1 extends Component
{
    use WithFileUploads;

    public $step = 1;

    public $options = [
        'photo' => null,
        'title' => null,
        'notes' => null,
        'size' => null,
        'size' => null,
        'fromAddress' => null,
        'fromNotes' => null,
        'fromLat' => null,
        'fromLng' => null,
        'toAddress' => null,
        'toNotes' => null,
        'toLat' => null,
        'toLng' => null,
        'toDate' => null,
        'toDateCustom' => null,
        'toTime' => null,
        'toTimeCustom' => null,
        'totalDistance' => null,
        'reward' => null,
        'sendingCharge' => null,
        'isFraglile' => 'false',
        'needAnimalCage' => 'false',
        'needCoolingEquipment' => 'false',
        'needHelpWrapping' => 'false',
    ];

    public $modalSwitch = false;

    protected $listeners = [
        'moveBack' => 'moveBack',
        'moveNext' => 'moveNext',
        'passTotalDistance',
    ];

    protected $rules = [
        'options.title' => 'required|min:4',
    ];

    protected $messages = [
        'options.title.required' => 'This field is required.',
        'options.title.min' => 'This field must be at least :min characters.',
    ];



    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.sending.step1', ['step' => $this->step]);
    }

    /**
     * moveBack
     *
     * @return void
     */
    public function moveBack()
    {
        $this->step = $this->step - 1;
    }

    /**
     * moveNext
     *
     * @return void
     */
    public function moveNext()
    {
        if ($this->validate()) {
            $this->step = $this->step + 1;
        }
    }

    /**
     * modalToggle
     *
     * @return void
     */
    public function modalToggle()
    {
        $this->modalSwitch = !$this->modalSwitch;
    }

    /**
     * imageSave
     *
     * @return void
     */
    public function imageSave()
    {
        $this->validate([
            'options.photo' => 'required|file|mimes:jpg,jpeg,bmp,png|max:10240', // 2MB Max
        ]);

        $path = $this->options['photo']->store('sending-photos', 'public');
        $this->options['photo'] = $path;
        $this->modalToggle();
    }

    /**
     * resetOption
     * reset $options['key'] by $index
     * @param  mixed $index
     * @return void
     */
    public function resetOption($index)
    {
        $this->options[$index] = null;
        $this->modalToggle();
    }


    /**
     * calculateSending
     * as computed Properties
     *
     * @return void
     */
    public function calculateSending()
    {
        $this->validate([
            'options.toDateCustom' => 'date',
            'options.toTimeCustom' => 'date_format:H:i',
        ]);

        $sending = new Sending;
        $sending->options = $this->options;
        $sending->save();
        return redirect('/sending');
    }

    /**
     * passTotalDistance by Event emit with a parameter(distance) in step6
     *
     * @param  mixed $distance
     * @return void
     */
    public function passTotalDistance($payload)
    {
        $this->options['totalDistance'] = $payload;
    }
}
