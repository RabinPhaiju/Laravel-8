<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Multiplefileupload extends Component
{
    use WithFileUploads;
    public $photos;
    public $message;

    protected $rules=[
        'photos.*'=>'image|max:1024'
    ];

    public function upload(){
        $this->validate();
        foreach($this->photos as $photo){

            $photo->store('photos');
        }

    }
    public function render()
    {
        return view('livewire.multiplefileupload');
    }
}
