<?php

namespace App\Http\Livewire\Sending;

use Image;
use App\Models\Photo;
use App\Models\Coupon;
use App\Models\Sending;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class Step1 extends Component
{
    //to use Livewire File Upload
    use WithFileUploads;

    //core property for page state define
    public $step;

    // for modal switching
    public $modalSwitch = false;
    public $modalSwitchPhoto = false;
    public $modalSwitchCoupon = false;
    public $openEdit = false;
    //when method savePhoto() was runned.
    public $isSetPhoto = false;

    // when useCoupon() triggerd in step7, then will change to true
    public $couponAdjusted = false;

    public $couponAttemptableCount = 10;

    public $couponAttemptedCount = 0;

    public $marginRate = 25; //25% to system owner.
    public $minimumMargin = 31;

    public $currentTaskId;
    public $title;
    public $photo;
    public $note;
    public $size;
    public $weight;
    public $fromAddress;
    public $simpleFromAddress;
    public $fromNote;
    public $fromLat;
    public $fromLng;
    public $toAddress;
    public $simpleToAddress;
    public $toNote;
    public $toLat;
    public $toLng;
    public $toDate;
    public $toDateManually;
    public $toTime;
    public $toTimeManually;
    public $totalDistance;
    public $recommendedCost;
    public $couponNumber;
    public $couponPrice;
    public $couponRate;
    public $discountedCost;
    public $reward;
    public $serviceCharge;
    public $insuranceCost = 49;
    public $totalDeliveryCost;
    public $isFraglile = false ;
    public $needAnimalCage = false;
    public $needCoolingEquipment = false;
    public $needHelpWrapping = false;
    public $helpPickUp = false;
    public $helpDelivery = false;

    protected $listeners = [
        'savePhoto',
        'moveBack' => 'moveBack',
        'moveNext' => 'moveNext',
        'passTotalDistance',
        'getRecommendedCost',
        'getServiceCharge',
        'getReward',
        'getRecommendedCostManually',
        'getTotalDeliveryCost',
    ];

    protected $rules = [
        'recommendedCost' => 'required|numeric|min:180|max:99999', // connected with global
        'totalDeliveryCost' => 'nullable|numeric|min:0', // not exist at this point
        'title' => 'required|min:4|max:80',
        'note' => 'nullable|string|max:80',
        'weight' => 'nullable|numeric|min:0|max:65000',
        'size' => 'required|string',
        'fromAddress' => 'required|string',
        'simpleFromAddress' => 'required|string',
        'fromNote' => 'nullable|max:80',
        'fromLat' => 'required|string',
        'fromLng' => 'required|string',
        'toAddress' => 'required|string',
        'simpleToAddress' => 'required|string',
        'toNote' => 'nullable|string|max:80',
        'toLat' => 'required|string',
        'toLng' => 'required|string',
        'toDateManually' => 'nullable|date',
        'toDate' => 'nullable|string',
        'toTimeManually' => 'nullable|date_format:H:i',
        'toTime' => 'nullable|string',
        'totalDistance' => 'numeric|min:0',
        'couponNumber' => 'nullable|string',
        'couponPrice' => 'nullable|numeric',
        'couponRate' => 'nullable|numeric',
        'reward' => 'required|numeric|min:0',
        'serviceCharge' => 'required|numeric|min:0',
        'insuranceCost' => 'required|numeric|min:0',
        'isFraglile' => 'boolean',
        'needAnimalCage' => 'boolean',
        'needCoolingEquipment' => 'boolean',
        'needHelpWrapping' => 'boolean',
        'helpPickUp' => 'boolean',
        'helpDelivery' => 'boolean',
        //photo validate rule not included
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





    public function mount()
    {
        $this->step = 1;
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.sending.step1', [
            'step' => $this->step
            ]);
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
            'note' => 'nullable|string|max:80',
            'weight' => 'nullable|numeric|min:0|max:65000',
        ]);

        if ($this->weight < 0 || $this->weight === '') {// case : weight === null just pass
            $this->weight = 0;
        }

        $this->step = 2;
    }





    /**
     * When button clicked moveStep3
     * from step2 to step3(sender's address input page).
     *
     * @return void
     */
    public function moveStep3()
    {
        $this->validate([
                'size' => 'required|string'
            ]);

        $this->step = 3;
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

        $this->step = 4;
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

        $this->step = 5;
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

        $this->step = 6;
    }





    /**
     * moveStep7
     *
     * @return void
     */
    public function moveStep7()
    {
        $this->validate();

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

        $this->step = 7;
    }





    /**
     * editTask
     *
     * @return void
     */
    public function editTask()
    {
        $this->step = 8;
    }





    /**
     * On/Off modalToggle
     *
     * @return void
     */
    public function modalToggle($param = '')
    {
        $this->modalSwitch = !$this->modalSwitch;
    }




    /**
     * modalTogglePhoto
     * for front-end button
     * @return void
     */
    public function modalTogglePhoto()
    {
        $this->modalSwitchPhoto = !$this->modalSwitchPhoto;
    }





    /**
     * savePhoto
     * It just add to Livewire property in the during of processing.
     * @return void
     */
    public function savePhoto()
    {
        if ($this->photo) {
            $this->validate(['photo' => 'image|max:2048',]);
            $path = $this->photo->store('sending-photos', 'public');
            // $this->photo = Storage::url($path); <== 'sending-photos/asdfaauihyesfklajhsdkf.jpg'
            $this->photo = str_replace('sending-photos/', '', $path);

            if ($this->step >= 6) {
                $this->storePhotoToDb();
            }


            $this->isSetPhoto = true;

            $this->modalTogglePhoto();

            return $this->alert('success', 'Item photo saved!', [
                'position' =>  'center',
                'timer' =>  3000,
                'toast' =>  false,
                'confirmButtonText' =>  '',
                'cancelButtonText' =>  'OK',
                'showCancelButton' =>  true,
                'showConfirmButton' =>  false,
            ]);
        } else {
            return $this->alert('error', 'No file chosen!', [
                'position' =>  'center',
                'timer' =>  3000,
                'toast' =>  false,
                'confirmButtonText' =>  '',
                'cancelButtonText' =>  'OK',
                'showCancelButton' =>  true,
                'showConfirmButton' =>  false,
            ]);
        }
    }





    /**
     * storePhotoToDb
     * Store uploaded file path to Photo table in DB.
     * @return void
     */
    public function storePhotoToDb()
    {
        if ($this->photo) {
            $currentPhoto = Photo::where('file_name', $this->photo)->first();
            if ($currentPhoto === null) {
                $newPhoto = new Photo;
                $newPhoto->task_id = $this->currentTaskId;
                $newPhoto->file_name = $this->photo;
                $newPhoto->save();
            } else {
                $currentPhoto->file_name = $this->photo;
                $currentPhoto->save();
            }

            // in case of not exist photo or adit photo after a task made.
            $currentSending = Sending::find($this->currentTaskId);
            if (isset($currentSending)) {
                $currentSending->photo = $this->photo;
                $currentSending->save();
            }
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
        if ($this->photo !== null) {
            $path = storage_path().'/app/public/sending-photos/'.$this->photo;
            // delete a file from server
            if (File::exists($path)) {
                unlink($path);
            }

            //delete a file from Photo table in DB
            if (Photo::where('file_name', $this->photo)) {
                Photo::where('file_name', $this->photo)->delete();
            }

            // delete a record from current Sending task
            // also filtering in case of upload and cancel clicked in Step1
            if ($this->currentTaskId !== null) {
                $currentTask = Sending::find($this->currentTaskId);
                if ($currentTask->photo !== null) {
                    $currentTask->photo = null;
                    $currentTask->save();
                }
            }
        }

        $this->photo = null;

        $this->isSetPhoto = false;

        $this->modalSwitchPhoto = false;
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
        }
        if (isset($coupon->rate)) {
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
        $this->validate();

        if ($this->toDateManually !== null) {
            $this->validate([
                'toDateManually' => 'date'
            ]);
            $this->toDate = null;
        }

        if ($this->toTimeManually !== null) {
            $this->validate([
                'toTimeManually' => 'date_format:H:i'
            ]);
            $this->toTime = null;
        }

        if ($this->weight < 0 || $this->weight === '') {// case : weight === null just pass
            $this->weight = 0;
        }

        $this->getTotalDeliveryCost();

        $this->storeData();

        //close edit drop-down form in step8-edit-task
        // prevent in other steps
        if ($this->step === 8) {
            $this->openEdit = !$this->openEdit;
        }


        return $this->alert('success', 'Task successfully saved.', [
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





    public function deleteSendingTask()
    {
        $currendTask = Sending::find($this->currentTaskId);
        $currendTask->delete();

        $this->photoDelete();
    }





    /**
     * storeData()
     *
     * @return void
     */
    public function storeData()
    {
        // check : make new task or edit current task
        if ($this->currentTaskId === null) {
            $sending = new Sending; //Temp instance, did't get space in DB when before execute save().
            $sending->user_id = Auth::id();
            $sending->user_name = Auth::user()->name;
        } else {
            $sending = Sending::find($this->currentTaskId);
        }

        $sending->photo = $this->photo;
        $sending->title = $this->title;
        $sending->note = $this->note;
        $sending->size = $this->size;
        $sending->weight = $this->weight;
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
        $sending->help_pick_up = $this->helpPickUp;
        $sending->help_delivery = $this->helpDelivery;
        $sending->save();

        // whatever task is a new task or a edited task
        $this->currentTaskId = $sending->id;

        if ($this->step >= 6) {
            $this->storePhotoToDb();
        }
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
     * recommendedCost
     *
     * @return void
     */
    public function getRecommendedCost($totalDistance)
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
            return redirect()->back()->withErrors('Item size error, please select a collect one')->withInput();
        }

        $this->getRecommendedCostManually();
    }





    /**
     * getServiceCharge
     *
     * @return void
     */
    public function getServiceCharge($recommendedCost)
    {
        $this->serviceCharge = round($recommendedCost * ($this->marginRate / 100) - $this->insuranceCost);
    }





    /**
     * getReward
     *
     * @return void
     */
    public function getReward($recommendedCost)
    {
        $this->reward = round($recommendedCost - $this->serviceCharge - $this->insuranceCost);
    }







    /**
     * lessThanMinimum
     *
     * @return void
     */
    public function lessThanMinimumServiceCharge()
    {
        if ($this->serviceCharge < $this->minimumMargin) {
            $this->serviceCharge = $this->minimumMargin; //current 31NOK.
            $this->reward = $this->recommendedCost - $this->serviceCharge - $this->insuranceCost;
        }
    }





    /**
     * calcualteRecommendedWithMenual
     *
     * @return void
     */
    public function getRecommendedCostManually()
    {
        // $this->recommendedCosts is the value entered through wire:model="recommendedCosts in step6"
        $recommendedCost = $this->recommendedCost;

        if ($this->recommendedCost < 180) {
            $this->recommendedCost = 180;
            $this->reward = 100;
            $this->serviceCharge = $this->minimumMargin;

            return $this->alert('info', 'We recommend total cost over 180 NOK is better to find helper', [
                        'position' =>  'center',
                        'timer' =>  5000,
                        'toast' =>  false,
                        'confirmButtonText' =>  '',
                        'cancelButtonText' =>  'OK',
                        'showCancelButton' =>  true,
                        'showConfirmButton' =>  false,
                    ]);
        }

        $this->getServiceCharge($recommendedCost);
        $this->getReward($recommendedCost);

        // check less than minimum cost.
        $this->lessThanMinimumServiceCharge();
    }





    /**
     * getTotalDeliveryCost
     *
     * @return void
     */
    public function getTotalDeliveryCost()
    {
        $this->totalDeliveryCost = $this->reward + $this->serviceCharge + $this->insuranceCost;
    }





    public function deleteTask()
    {
        $targetData = Sending::where('id', $this->currentTaskId)->first();

        // In case of target task not exist
        if ($targetData === null) {
            session()->flash('message', "Task not exist, Let's make a new task.");
            redirect()->to('/sending');
        }

        // In case of target task exist and prevent Null access error.
        if ($this->currentTaskId !== null && $targetData !== null) {
            if ($targetData->user_id === Auth::id()) {
                $targetData->delete();
            }
            // delete photo file in any case
            Photo::where('task_id', $this->currentTaskId)->delete();

            session()->flash('message', "Task has been deleted. Let's make a new task.");
            redirect()->to('/sending');
        }
    }





    public function cancelEditTask()
    {
        $sending = Sending::find($this->currentTaskId);
        $this->photo = $sending->photo;
        $this->title = $sending->title;
        $this->note = $sending->note;
        $this->size = $sending->size;
        $this->weight = $sending->weight;
        $this->fromAddress = $sending->from_address;
        $this->simpleFromAddress = $sending->simple_from_address;
        $this->fromNote = $sending->from_note;
        $this->fromLat = $sending->from_lat;
        $this->fromLng = $sending->from_lng;
        $this->toAddress = $sending->to_address;
        $this->simpleToAddress = $sending->simple_to_address;
        $this->toNote = $sending->to_note;
        $this->toLat = $sending->to_lat;
        $this->toLng = $sending->to_lng;
        $this->toDate = $sending->to_date;
        $this->toDateManually = $sending->to_date_manually;
        $this->toTime = $sending->to_time;
        $this->toTimeManually = date('H:i', strtotime($sending->to_time_manually));
        $this->totalDistance = $sending->total_distance;
        $this->recommendedCost = $sending->recommended_cost;
        $this->couponNumber = $sending->coupon_number;
        $this->couponPrice = $sending->coupon_price;
        $this->couponRate = $sending->coupon_rate;
        $this->discountedCost = $sending->discounted_cost;
        $this->reward = $sending->reward;
        $this->serviceCharge = $sending->service_charge;
        $this->insuranceCost = $sending->insurance_cost;
        $this->totalDeliveryCost = $sending->total_delivery_cost;
        $this->isFraglile = $sending->is_fraglile;
        $this->needAnimalCage = $sending->need_animal_cage;
        $this->needCoolingEquipment = $sending->need_cooling_equipment;
        $this->needHelpWrapping = $sending->need_help_wrapping;
        $this->helpPickUp = $sending->help_pick_up;
        $this->helpDelivery = $sending->help_delivery;

        //close edit drop-down form in step8-edit-task
        $this->openEdit = !$this->openEdit;
        // return $this->alert('info', 'Task edit canceled', [
        //    'position' =>  'center',
        //    'timer' =>  5000,
        //    'toast' =>  false,
        //    'confirmButtonText' =>  '',
        //    'cancelButtonText' =>  'OK',
        //    'showCancelButton' =>  true,
        //    'showConfirmButton' =>  false,
        // ]);
    }
}
