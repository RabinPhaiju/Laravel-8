<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Find extends Component
{
    public $name;
    public $num1;
    public $num2;
    public $result;

    public function add(){
        $this->result = $this->num1 + $this->num2;
    }
    
    public $student = ['s_name'=>''];

    public function mount(){
        $this->name='';
    }
    public function render()
    {
        return view('livewire.find');
    }
}
