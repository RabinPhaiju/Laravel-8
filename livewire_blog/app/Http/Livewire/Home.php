<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $name;
    public $num1;
    public $num2;
    public $result;
    public $message = '';

    protected $listeners = ['resultcalculated'=>'calculatedResult'];

    public function add(){
        $this->result = $this->num1 + $this->num2;
        $this->emit('resultcalculated');
    }

    public function calculatedResult(){
        if($this->num1>$this->num2){
            $this->message='Num1 is greater than num2';
        }else if($this->num1<$this->num2){
        $this->message='Num2 is greater than num1';
        }else{
            $this->message ='Num1 is equal to num2';
        }
    }

    public function mount($name){
        $this->name=$name;
    }
    public function render()
    {
        return view('livewire.home');
    }
}
