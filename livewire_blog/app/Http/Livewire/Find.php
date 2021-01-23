<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Find extends Component
{
    public $name;
    
    public $student = ['s_name'=>''];

    public function mount(){
        $this->name='';
    }
    public function render()
    {
        return view('livewire.find');
    }
}
