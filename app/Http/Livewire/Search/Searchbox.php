<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class Searchbox extends Component
{
    public $often;
    public $size;
    public $distance;
    // for modal switching
    public $modalSwitch = false;

    protected $listeners = ['modalToggle'];

    public function render()
    {
        return view('livewire.search.searchbox');
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
}
