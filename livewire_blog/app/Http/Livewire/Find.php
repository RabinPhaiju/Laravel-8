<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Find extends Component
{
    public $name;
    public $num1;
    public $num2;
    public $result;

    public $message='';
    // if event is from full page then it must protected, and other inline class can access it.
    // This function is called when the event=resultcalcualted is triggered.
    protected $listeners = ['resultcalculated'=>'calculatedResult'];

    public function calculatedResult(){
        if($this->num1>$this->num2){
            $this->message='Num1 is greater than num2';
        }else if($this->num1<$this->num2){
        $this->message='Num2 is greater than num1';
        }else{
            $this->message ='Num1 is equal to num2';
        }
    }

    public function add(){
        sleep(2); // for see the loading meesage.
        $this->result = $this->num1 + $this->num2;
    }
    public function subtract(){
        $this->result = $this->num1 - $this->num2;
        // method 2 to call event
        $this->emit('resultcalculated');
    }
    
    public $student = ['s_name'=>''];

    // mount is used to empty the defined variable.
    public function mount(){
        $this->name='';
    }
    public function render()
    {
        return view('livewire.find');
    }
}
