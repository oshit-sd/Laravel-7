<?php

namespace App\Http\Livewire;

use App\Step;
use Livewire\Component;

class EditStep extends Component
{
    public $steps = [];

    public function mount($steps)
    {
        $this->steps = $steps->toArray();
    }

    public function increment()
    {
        $this->steps[] = count($this->steps) + 1;
    }

    public function remove($index)
    {
        $step = $this->steps[$index];
        Step::find($step['id'])->delete();
        unset($this->steps[$index]);
    }

    public function render()
    {
        return view('livewire.edit-step');
    }
}
