<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Home extends Component
{
    public $name;
    public $num1;
    public $num2;
    public $result;
    public $message = '';

    protected $rules = [
        'num1'=>'required | min:2 |max:4',
        'num2'=>'required | min:2 |max:4',
    ];

    protected $messages =[ //custrom error message
        'num1.required'=>'hey :attribute num1 is required',
        'num2.required'=>'hey :attribute num2 is required',
    ];

    protected $listeners = ['resultcalculated'=>'calculatedResult'];

    public function add(){
        $this->validate();
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
    public function downloadfile(){
        return Storage::disk('local')->download('photos/rabin.jpg');
    }

    public function mount($name){
        $this->name=$name;
    }
    public function render()
    {
        return view('livewire.home');
    }
}
