<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Step extends Component
{
    public $steps = [];

    public function increment()
    {
        $this->steps[] = count($this->steps) + 1;
    }

    public function remove($key)
    {
        unset($this->steps[$key]);
    }

    public function render()
    {
        return view('livewire.step');
    }
}
