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
        'recommendedCosts' => null,
        'isCoupon' => 'false',
        'rewards' => null,
        'serviceCharges' => null,
        'insuranceCost' => 49,
        'totalDeliveryCosts' => null,
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
        'calculateRecommendedCosts',
        'calculateServiceCharges',
        'calculateRewards',
        'reCalcualteRecommendedCostsWithMenual',
        'calculateTotalDeliveryCosts',
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
     * On/Off modalToggle
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
     * saveSendingRequest
     * as computed Properties
     *
     * @return void
     */
    public function saveSendingRequest()
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

    /**
     * calculateRecommendedCosts
     *
     * @return void
     */
    public function calculateRecommendedCosts($totalDistance)
    {
        $size = $this->options['size'];
        $insuranceCost = $this->options['insuranceCost'];

        if ($size  == 'handCarry') {
            $this->options['recommendedCosts'] = round($totalDistance * 4.2);
        } elseif ($size == 'byBag') {
            $this->options['recommendedCosts'] = round($totalDistance * 3.6);
        } elseif ($size == 'byCar') {
            $this->options['recommendedCosts'] = round($totalDistance * 5);
        } elseif ($size == 'byBigCar') {
            $this->options['recommendedCosts'] = round($totalDistance * 7.5);
        } elseif ($size == 'byVan') {
            $this->options['recommendedCosts'] = round($totalDistance * 13);
        } else {
            //"Couldn't calculate Recommended Costs, because no size matched!"
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($this->options['recommendedCosts'] !== null) {
            $this->reCalcualteRecommendedCostsWithMenual();
        }
    }

    /**
     * calculateServiceCharges
     *
     * @return void
     */
    public function calculateServiceCharges($recommendedCosts)
    {
        $insuranceCost = $this->options['insuranceCost'];
        $this->options['serviceCharges'] = round($recommendedCosts * 0.2 - $insuranceCost);
    }


    /**
     * calculateRewards
     *
     * @return void
     */
    public function calculateRewards($recommendedCosts)
    {
        $this->options['rewards'] = round($recommendedCosts * 0.8);
    }


    /**
     * calculateTotalDeliveryCosts
     *
     * @return void
     */
    public function calculateTotalDeliveryCosts()
    {
        $this->options['calculateTotalDeliveryCosts'] = $this->options['rewards'] + $this->options['serviceCharges'];
    }

    /**
     * calcualteRecommendedWithMenual
     *
     * @return void
     */
    public function reCalcualteRecommendedCostsWithMenual()
    {
        $recommendedCosts = $this->options['recommendedCosts'];

        $this->validate([
            'options.recommendedCosts' => 'required|numeric|min:100',
        ]);
        $this->calculateServiceCharges($recommendedCosts);
        $this->calculateRewards($recommendedCosts);
    }
}
