<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFile extends Component
{
    use WithFileUploads;
    public $photo;
    public $message;

    protected $rules=[
        'photo'=>'image|max:1024'
    ];

    public function upload(){
        $this->validate();
        $this->photo->store('photos');
        session()->flash('message', 'photo successfully posted.');
        return redirect()->to('/home/rabinphaiju');
        
    }

    public function render()
    {
        return view('livewire.upload-file');
    }
}
