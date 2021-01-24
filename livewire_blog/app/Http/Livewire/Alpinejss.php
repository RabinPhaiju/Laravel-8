<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Alpinejss extends Component
{
    public $num1;
    public $num2;
    public $result;
    
    public function add(){
        $this->result = $this->num1 + $this->num2;
    }
    
    public function render()
    {
        return view('livewire.alpinejss');
    }
}
