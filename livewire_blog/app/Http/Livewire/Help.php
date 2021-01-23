<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Help extends Component
{
    public $topic;
    public function mount($topic='all'){
        $this->topic=$topic;
    }
    public function render()
    {
        return view('livewire.help');
    }
}
