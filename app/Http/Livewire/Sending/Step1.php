<?php

namespace App\Http\Livewire\Sending;

use App\Models\Coupon;
use App\Models\Sending;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Step1 extends Component
{
    //to use Livewire File Upload
    use WithFileUploads;

    //core property for page state define
    public $step = 1;

    // for modal switching
    public $modalSwitch = false;

    public $modalSwitchCoupon = false;


    //when method savePhoto() was runned.
    public $isSetPhoto = false;

    // when useCoupon() triggerd in step7, then will change to true
    public $couponAdjusted = false;

    public $currentTaskId = null;

    public $couponAttemptableCount = 10;

    public $couponAttemptedCount = 0;

    public $title = null;
    public $photo = null;
    public $note = null;
    public $size = null;
    public $fromAddress = null;
    public $simpleFromAddress = null;
    public $fromNote = null;
    public $fromLat = null;
    public $fromLng = null;
    public $toAddress = null;
    public $simpleToAddress = null;
    public $toNote = null;
    public $toLat = null;
    public $toLng = null;
    public $toDate = null;
    public $toDateManually = null;
    public $toTime = null;
    public $toTimeManually = null;
    public $totalDistance = null;
    public $recommendedCost = null;
    public $couponNumber = null;
    public $couponPrice = null;
    public $couponRate = null;
    public $discountedCost = null;
    public $reward = null;
    public $serviceCharge = null;
    public $insuranceCost = 49;
    public $totalDeliveryCost = null;
    public $isFraglile = false;
    public $needAnimalCage = false;
    public $needCoolingEquipment = false;
    public $needHelpWrapping = false;

    protected $listeners = [
        'savePhoto',
        'moveBack' => 'moveBack',
        'moveNext' => 'moveNext',
        'passTotalDistance',
        'calculateRecommendedCost',
        'calculateServiceCharge',
        'calculateReward',
        'calcualteRecommendedCostManually',
        'calculateTotalDeliveryCost',
    ];

    protected $rules = [
        'recommendedCost' => 'numeric|min:200',
        'totalDeliveryCost' => 'required',
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
        'totalDeliveryCost.required' => 'some error occurred!'
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
     * moveStep8
     *
     * @return void
     */
    public function moveStep1()
    {
        return redirect()->to('/sending');
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
            'note' => 'max:80',
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
            'simpleFromAddress' => 'required',
            'fromNote' => 'max:80',
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
            'simpleToAddress' => 'required',
            'toNote' => 'max:80',
            'toLat' => 'required',
            'toLng' => 'required',
        ]);

        $this->step = $this->step + 1;
    }





    public function moveStep6()
    {
        // when setted toDateManually by datepicker then toDat will set null
        if ($this->toDateManually !== null) {
            $this->validate([ 'toDateManually' => 'date' ]);
            $this->toDate = null;
        } else {
            $this->validate([ 'toDate' => 'string' ]);
            $this->toDateManually = null;
        }

        // when setted toTimeManually by datepicker then toTime will set null
        if ($this->toTimeManually !== null) {
            $this->validate([ 'toTimeManually' => 'date_format:H:i']);
            $this->toTime = null;
        } else {
            $this->validate([ 'toTime' => 'string' ]);
            $this->toTimeManually = null;
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
        $this->publishTask();

        $this->alert('success', 'Congratulation,', [
            'position' =>  'center',
            'timer' =>  3000,
            'toast' =>  false,
            'text' =>  'Your task was published!',
            'confirmButtonText' =>  '',
            'cancelButtonText' =>  'OK',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
          ]);

        $this->step = $this->step + 1;
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
     * savePhoto
     *
     * @return void
     */
    public function savePhoto()
    {
        $this->validate(
            [
                'photo' => 'file|mimes:jpg,jpeg,bmp,png|max:2048', // 2MB Max
            ]
        );

        $path = $this->photo->store('sending-photos', 'public');
        $this->photo = $path;

        $this->isSetPhoto = true;

        $this->modalToggle();

        return $this->alert('success', 'Item photo saved!', [
            'position' =>  'center',
            'timer' =>  3000,
            'toast' =>  false,
            'text' =>  '',
            'confirmButtonText' =>  '',
            'cancelButtonText' =>  'OK',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
    }

    public function replacePhoto()
    {
        if ($this->isSetPhoto) {

        }
    }





    /**
     * prevent to save $this->photo with "temp image"
     * when user clicked outside of modal instead of click 'Cancel' or 'Save' buttons.
     * This method require refectoring!
     *
     * @return void
     */
    public function photoDelete()
    {
        $this->photo = null;
        $this->isSetPhoto = false;

        $this->modalToggle();

        $this->alert('info', 'We recommend add a photo.', [
            'position' =>  'center',
            'timer' =>  5000,
            'toast' =>  false,
            'confirmButtonText' =>  '',
            'cancelButtonText' =>  'OK',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
    }





    /**
     * modalToggleCoupon
     *
     * @return void
     */
    public function modalToggleCoupon()
    {
        $this->modalSwitchCoupon = !$this->modalSwitchCoupon;
    }






    /**
     * useCoupon
     *
     * @return void
     */
    public function useCoupon()
    {
        // coupon attempt count check.
        $this->couponAttemptCheck();

        if (isset($this->couponNumber)) {
            //check coupon exist.
            $coupon = Coupon::where('number', $this->couponNumber)->first();

            if ($coupon !== null) {
                // used check
                if ($coupon->used !== null) {
                    $this->modalToggleCoupon();
                    return $this->alert('error', 'Already used coupon!', [
                        'position' =>  'center',
                        'timer' =>  7000,
                        'toast' =>  false,
                        'text' =>  "Please check again your coupon.",
                        'confirmButtonText' =>  '',
                        'cancelButtonText' =>  'OK',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);
                }

                // expire check
                if (Carbon::parse($coupon->expire)->isFuture() === false) {
                    $this->modalToggleCoupon();
                    return $this->alert('error', 'Expired coupon!', [
                        'position' =>  'center',
                        'timer' =>  7000,
                        'toast' =>  false,
                        'text' =>  'Please check again your coupon.',
                        'confirmButtonText' =>  '',
                        'cancelButtonText' =>  'OK',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);
                }

                // adjust by coupon price or rate of discount.
                $this->calculateByCouponPriceOrRate($coupon);

                // update coupon info
                $currentTask = Sending::find($this->currentTaskId);
                $currentTask->total_delivery_cost = $this->totalDeliveryCost;
                $currentTask->coupon_number = $this->couponNumber;
                $currentTask->coupon_price = $this->couponPrice;
                $currentTask->coupon_rate = $this->couponRate;
                $currentTask->discounted_cost = $this->discountedCost;
                $currentTask->save();

                // update used state of this coupon.
                $coupon->used = now();
                // update which task id used this coupon
                $coupon->adjusted_task_id = $this->currentTaskId;
                $coupon->save();

                // Add coupon modal close.
                $this->modalToggleCoupon();
                // Update coupon adjusted state
                $this->couponAdjusted = true;
                //alert pop-up
                return $this->alert('success', 'Congratulation!!', [
                    'position' =>  'center',
                    'timer' =>  3000,
                    'toast' =>  false,
                    'text' =>  'Your coupon addjusted :)',
                    'confirmButtonText' =>  '',
                    'cancelButtonText' =>  'OK',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
            } else {
                //clear input field
                $this->couponNumber = null;

                return session()->
                flash('error', "Invalid coupon, try again! attempt remain: ".
                ($this->couponAttemptableCount - $this->couponAttemptedCount));
            }
        }
    }





    /**
     * couponNotUse: Canceled to use coupon.
     *
     * @return void
     */
    public function couponNotUse()
    {
        $this->couponAdjusted = true;
    }





    /**
     * couponAttemptCheck
     *
     * @return void
     */
    public function couponAttemptCheck()
    {
        $this->couponAttemptedCount = $this->couponAttemptedCount + 1;

        if ($this->couponAttemptedCount >= $this->couponAttemptableCount) {
            // Decide as the user is not using the coupon
            $this->couponAdjusted = true;

            // coupon add modal close.
            $this->modalToggleCoupon();

            return $this->alert('error', "Possible attempts has exceeded ".$this->couponAttemptableCount." times.", [
                'position' =>  'center',
                'timer' =>  7000,
                'toast' =>  false,
                'text' =>  'Please check again your coupon.',
                'confirmButtonText' =>  '',
                'cancelButtonText' =>  'OK',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }
    }





    public function calculateByCouponPriceOrRate($coupon)
    {
        if (isset($coupon->price)) {
            $this->couponPrice = $coupon->price;
            $this->totalDeliveryCost = $this->totalDeliveryCost - $coupon->price;
            $this->discountedCost = $coupon->price;
        } elseif (isset($coupon->rate)) {
            $this->couponRate = $coupon->rate;

            //Insurance cost is not adjust to discount.
            $beforeDiscountCost = $this->totalDeliveryCost - $this->insuranceCost;

            // calculate & adjust with coupon rate.
            $this->discountedCost = $beforeDiscountCost * $coupon->rate / 100;

            // add insuranceCost after discount calculation.
            $this->totalDeliveryCost = $this->totalDeliveryCost - $this->discountedCost;
        }
    }





    /**
     * publishTask
     * as computed Properties
     *
     * @return void
     */
    public function publishTask()
    {
        $this->validate([
        'title' => 'required|min:4',
        'photo' => 'nullable|string',
        'note' => 'nullable|max:80',
        'size' => 'string',
        'fromAddress' => 'required|string',
        'simpleFromAddress' => 'required|string',
        'fromNote' => 'nullable|string',
        'fromLat' => 'required|string',
        'fromLng' => 'required|string',
        'toAddress' => 'required|string',
        'simpleToAddress' => 'required|string',
        'toNote' => 'nullable|string',
        'toLat' => 'required|string',
        'toLng' => 'required|string',
        'toDate' => 'nullable|string',
        'toDateManually' => 'nullable|date',
        'toTime' => 'nullable|string',
        'toTimeManually' => 'nullable|date_format:H:i',
        'totalDistance' => 'numeric',
        'recommendedCost' => 'required|numeric|min:200|max:99999',
        'couponNumber' => 'nullable|string',
        'couponPrice' => 'nullable|numeric',
        'couponRate' => 'nullable|numeric',
        'reward' => 'required|numeric',
        'serviceCharge' => 'required|numeric',
        'insuranceCost' => 'required|numeric',
        'totalDeliveryCost' => 'nullable|numeric', // not exist at this point
        'isFraglile' => 'boolean',
        'needAnimalCage' => 'boolean',
        'needCoolingEquipment' => 'boolean',
        'needHelpWrapping' => 'boolean',
        ]);

        if ($this->toDateManually !== null) {
            $this->validate([
                'toDateManually' => 'date'
            ]);

            $this->toDate = null;
        } elseif ($this->toTimeManually !== null) {
            $this->validate([
                'toTimeManually' => 'date_format:H:i'
            ]);

            $this->toTime = null;
        }

        $this->calculateTotalDeliveryCost();

        $this->storeData();
    }





    public function deleteSendingTask()
    {
        $currendTask = Sending::find($this->currentTaskId);
        $currendTask->delete();
    }





    /**
     * storeData()
     *
     * @return void
     */
    public function storeData()
    {
        // flight::firstOrcreate([

        // ]);
        $sending = new Sending;
        $sending->user_id = Auth::id();
        $sending->user_name = Auth::user()->name;
        $sending->photo = $this->photo;
        $sending->title = $this->title;
        $sending->note = $this->note;
        $sending->size = $this->size;
        $sending->from_address = $this->fromAddress;
        $sending->simple_from_address = $this->simpleFromAddress;
        $sending->from_note = $this->fromNote;
        $sending->from_lat = $this->fromLat;
        $sending->from_lng = $this->fromLng;
        $sending->to_address = $this->toAddress;
        $sending->simple_to_address = $this->simpleToAddress;
        $sending->to_note = $this->toNote;
        $sending->to_lat = $this->toLat;
        $sending->to_lng = $this->toLng;
        $sending->to_date = $this->toDate;
        $sending->to_date_manually = $this->toDateManually;
        $sending->to_time = $this->toTime;
        $sending->to_time_manually = $this->toTimeManually;
        $sending->total_distance = $this->totalDistance;
        $sending->recommended_cost = $this->recommendedCost;
        $sending->coupon_number = $this->couponNumber;
        $sending->coupon_price = $this->couponPrice;
        $sending->coupon_rate = $this->couponRate;
        $sending->discounted_cost = $this->discountedCost;
        $sending->reward = $this->reward;
        $sending->service_charge = $this->serviceCharge;
        $sending->insurance_cost = $this->insuranceCost;
        $sending->total_delivery_cost = $this->totalDeliveryCost;
        $sending->is_fraglile = $this->isFraglile;
        $sending->need_animal_cage = $this->needAnimalCage;
        $sending->need_cooling_equipment = $this->needCoolingEquipment;
        $sending->need_help_wrapping = $this->needHelpWrapping;

        $sending->save();

        $this->currentTaskId = $sending->id;
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
     * calculateRecommendedCost
     *
     * @return void
     */
    public function calculateRecommendedCost($totalDistance)
    {
        $size = $this->size;

        if ($size  == 'POCKET') {
            $this->recommendedCost = round($totalDistance * 4.2);
        } elseif ($size == 'BAG') {
            $this->recommendedCost = round($totalDistance * 3.6);
        } elseif ($size == 'CAR') {
            $this->recommendedCost = round($totalDistance * 5);
        } elseif ($size == 'SUV') {
            $this->recommendedCost = round($totalDistance * 7.5);
        } elseif ($size == 'VAN') {
            $this->recommendedCost = round($totalDistance * 13);
        } else {
            //"Couldn't calculate Recommended Cost, because no size matched!"
            return redirect()->back()->withErrors('Size inpu error, please select a collect one')->withInput();
        }

        if ($this->recommendedCost !== null) {
            $this->calcualteRecommendedCostManually();
        }
    }





    /**
     * calculateServiceCharge
     *
     * @return void
     */
    public function calculateServiceCharge($recommendedCost)
    {
        $this->serviceCharge = round($recommendedCost * 0.2 - $this->insuranceCost);
    }





    /**
     * calculateReward
     *
     * @return void
     */
    public function calculateReward($recommendedCost)
    {
        $this->reward = round($recommendedCost * 0.8);
    }





    /**
     * calculateTotalDeliveryCost
     *
     * @return void
     */
    public function calculateTotalDeliveryCost()
    {
        $this->totalDeliveryCost =
        $this->reward + $this->serviceCharge + $this->insuranceCost;
    }





    /**
     * calcualteRecommendedWithMenual
     *
     * @return void
     */
    public function calcualteRecommendedCostManually()
    {
        // $this->recommendedCosts is the value entered through wire:model="recommendedCosts in step6"
        $recommendedCost = $this->recommendedCost;

        $this->calculateServiceCharge($recommendedCost);
        $this->calculateReward($recommendedCost);
    }

    // public function editPublishedTask()
    // {

    // }

    // public function deletePublishedTask()
    // {

    // }
}
