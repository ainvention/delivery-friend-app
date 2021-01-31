<?php

namespace App\Http\Livewire\Sending;

use App\Models\Sending;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Step1 extends Component
{
    //to use Livewire File Upload
    use WithFileUploads;

    //core property for page state define
    public $step = 1;

    // for modal switching
    public $modalSwitch = false;

    //when method photoSave() was runned.
    public $isSetPhoto = false;

    public $photo = null;
    public $title = null;
    public $notes = null;
    public $size = null;
    public $fromAddress = null;
    public $fromNotes = null;
    public $fromLat = null;
    public $fromLng = null;
    public $toAddress = null;
    public $toNotes = null;
    public $toLat = null;
    public $toLng = null;
    public $toDate = null;
    public $toDateCustom = null;
    public $toTime = null;
    public $toTimeCustom = null;
    public $totalDistance = null;
    public $recommendedCosts = null;
    public $isCoupon = false;
    public $rewards = null;
    public $serviceCharges = null;
    public $insuranceCost = 49;
    public $totalDeliveryCosts = null;
    public $isFraglile = false;
    public $needAnimalCage = false;
    public $needCoolingEquipment = false;
    public $needHelpWrapping = false;

    protected $listeners = [
        'photoSave',
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
        'recommendedCosts' => 'numeric|min:200',
    ];

    protected $messages = [
        // 'notes.max' => 'Please write within 80 characters.',
        // 'title.required' => 'This field is required.',
        // 'title.min' => 'This field must be at least :min characters.',
        // 'recommendedCosts.numeric' => 'This field must be a number.',
        // 'recommendedCosts.min' => 'We recommend over 200 NOK is more better to get helper.',
        // 'recommendedCosts.max' => 'We recommend under 99999 NOK is more better to get helper.',
        // 'required' => 'This field is required.',
        // 'min' => 'Please write at least :min characters.',
        // 'max' => 'Please write within :max characters.',
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
     * When button clicked moveBack
     * Almost of sending pages use this for go previous page.
     *
     * @return void
     */
    public function moveBack()
    {
        $this->step = $this->step - 1;
    }


    /**
     * When button clicked moveStep2
     * from step1 to step2(size input page)
     *
     * @return void
     */
    public function moveStep2()
    {
        $this->validate([
            'title' => 'required|min:4|max:80',
            'notes' => 'max:80',
        ]);

        $this->step = $this->step + 1;
    }

    /**
     * When button clicked moveStep3
     * from step2 to step3(sender's address input page).
     *
     * @return void
     */
    public function moveStep3()
    {
        $this->step = $this->step + 1;
    }

    /**
     * when button clicked moveStep4
     * from step3 to step4(receiver's address input page).
     *
     * @return void
     */
    public function moveStep4()
    {
        $this->validate([
            'fromAddress' => 'required',
            'fromNotes' => 'max:80',
            'fromLat' => 'required',
            'fromLng' => 'required',
        ]);

        $this->step = $this->step + 1;
    }

    /**
     * When button clicked moveStep5
     * from step4 to step5(date and time input page).
     * @return void
     */
    public function moveStep5()
    {
        $this->validate([
            'toAddress' => 'required',
            'toNotes' => 'max:80',
            'toLat' => 'required',
            'toLng' => 'required',
        ]);

        $this->step = $this->step + 1;
    }

    public function moveStep6()
    {
        // when setted toDateCustom by datepicker then toDat will set null
        if ($this->toDateCustom !== null) {
            $this->validate([ 'toDateCustom' => 'date' ]);
            $this->toDate = null;
        } else {
            $this->validate([ 'toDate' => 'string' ]);
            $this->toDateCustom = null;
        }

        // when setted toTimeCustom by datepicker then toTime will set null
        if ($this->toTimeCustom !== null) {
            $this->validate([ 'toTimeCustom' => 'date_format:H:i']);
            $this->toTime = null;
        } else {
            $this->validate([ 'toTime' => 'string' ]);
            $this->toTimeCustom = null;
        }

        $this->step = $this->step + 1;
    }

    /**
     * moveStep7
     *
     * @return void
     */
    public function moveStep7()
    {
        $this->saveSendingRequest();

        $this->step = $this->step + 1;
    }

    /**
     * On/Off modalToggle
     *
     * @return void
     */
    public function modalToggle(string $param = null)
    {
        $this->modalSwitch = !$this->modalSwitch;

        if ($param === 'photo') {
            $this->photoDelete();
        }
    }

    /**
     * prevent to save "temp image" as $this->photo
     * when user clicked outside of modal instead of click 'Cancel' or 'Save' buttons.
     *
     * @return void
     */
    public function photoSave()
    {
        $this->validate(
            [
                'photo' => 'mimes:jpg,jpeg,bmp,png|max:2048', // 2MB Max
            ]
        );

        $path = $this->photo->store('sending-photos', 'public');
        $this->photo = $path;
        $this->isSetPhoto = true;
        $this->modalToggle();
    }


    /**
     * photoDelete
     *
     * @return void
     */
    public function photoDelete()
    {
        $this->photo = null;
        $this->isSetPhoto = false;
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
        'title' => 'required|min:4',
        'photo' => 'mimes:jpg,jpeg,bmp,png|max:2048',
        'notes' => 'max:80',
        'size' => 'string',
        'fromAddress' => 'required|string',
        'fromNotes' => 'string',
        'fromLat' => 'required|string',
        'fromLng' => 'required|string',
        'toAddress' => 'required|string',
        'toNotes' => 'string',
        'toLat' => 'required|string',
        'toLng' => 'required|string',
        'toDate' => 'nullable|string',
        'toDateCustom' => 'nullable|date',
        'toTime' => 'nullable|string',
        'toTimeCustom' => 'nullable|date_format:H:i',
        'totalDistance' => 'string',
        'recommendedCosts' => 'required|numeric|min:200|max:99999',
        'isCoupon' => 'boolean',
        'rewards' => 'numeric',
        'serviceCharges' => 'numeric',
        'insuranceCost' => 'numeric',
        'totalDeliveryCosts' => 'numeric',
        'isFraglile' => 'boolean',
        'needAnimalCage' => 'boolean',
        'needCoolingEquipment' => 'boolean',
        'needHelpWrapping' => 'boolean',
        ]);

        if ($this->toDateCustom !== null) {
            $this->validate([
                'toDateCustom' => 'date'
            ]);

            $this->toDate = null;
        } elseif ($this->toTimeCustom !== null) {
            $this->validate([
                'toTimeCustom' => 'date_format:H:i'
            ]);

            $this->toTime = null;
        }

        $this->calculateTotalDeliveryCosts();

        $sending = new Sending;
        $sending->user_id = Auth::id();
        $sending->photo = $this->photo;
        $sending->title = $this->title;
        $sending->notes = $this->notes;
        $sending->size = $this->size;
        $sending->fromAddress = $this->fromAddress;
        $sending->fromNotes = $this->fromNotes;
        $sending->fromLat = $this->fromLat;
        $sending->fromLng = $this->fromLng;
        $sending->toAddress = $this->toAddress;
        $sending->toNotes = $this->toNotes;
        $sending->toLat = $this->toLat;
        $sending->toLng = $this->toLng;
        $sending->toDate = $this->toDate;
        $sending->toDateCustom = $this->toDateCustom;
        $sending->toTime = $this->toTime;
        $sending->toTimeCustom = $this->toTimeCustom;
        $sending->totalDistance = $this->totalDistance;
        $sending->recommendedCosts = $this->recommendedCosts;
        $sending->isCoupon = $this->isCoupon;
        $sending->rewards = $this->rewards;
        $sending->serviceCharges = $this->serviceCharges;
        $sending->insuranceCost = $this->insuranceCost;
        $sending->totalDeliveryCosts = $this->totalDeliveryCosts;
        $sending->isFraglile = $this->isFraglile;
        $sending->needAnimalCage = $this->needAnimalCage;
        $sending->needCoolingEquipment = $this->needCoolingEquipment;
        $sending->needHelpWrapping = $this->needHelpWrapping;

        $sending->save();
        // return redirect('/sending');
    }


    /**
     * passTotalDistance by Event emit with a parameter(distance) in step6
     *
     * @param  mixed $distance
     * @return void
     */
    public function passTotalDistance($payload)
    {
        $this->totalDistance = $payload;
    }

    /**
     * calculateRecommendedCosts
     *
     * @return void
     */
    public function calculateRecommendedCosts($totalDistance)
    {
        $size = $this->size;
        $insuranceCost = $this->insuranceCost;

        if ($size  == 'handCarry') {
            $this->recommendedCosts = round($totalDistance * 4.2);
        } elseif ($size == 'byBag') {
            $this->recommendedCosts = round($totalDistance * 3.6);
        } elseif ($size == 'byCar') {
            $this->recommendedCosts = round($totalDistance * 5);
        } elseif ($size == 'byBigCar') {
            $this->recommendedCosts = round($totalDistance * 7.5);
        } elseif ($size == 'byVan') {
            $this->recommendedCosts = round($totalDistance * 13);
        } else {
            //"Couldn't calculate Recommended Costs, because no size matched!"
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($this->recommendedCosts !== null) {
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
        $insuranceCost = $this->insuranceCost;
        $this->serviceCharges = round($recommendedCosts * 0.2 - $insuranceCost);
    }


    /**
     * calculateRewards
     *
     * @return void
     */
    public function calculateRewards($recommendedCosts)
    {
        $this->rewards = round($recommendedCosts * 0.8);
    }


    /**
     * calculateTotalDeliveryCosts
     *
     * @return void
     */
    public function calculateTotalDeliveryCosts()
    {
        $this->totalDeliveryCosts =
        $this->rewards + $this->serviceCharges + $this->insuranceCost;
    }

    /**
     * calcualteRecommendedWithMenual
     *
     * @return void
     */
    public function reCalcualteRecommendedCostsWithMenual()
    {
        $recommendedCosts = $this->recommendedCosts;

        $this->calculateServiceCharges($recommendedCosts);
        $this->calculateRewards($recommendedCosts);
    }

    // public function editPublishedTask()
    // {

    // }

    // public function deletePublishedTask()
    // {

    // }
}
