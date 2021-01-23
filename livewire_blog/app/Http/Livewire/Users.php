<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $search;
    protected $querystring = ['search'];

    public function render()
    {
        $users = User::where('name','like','%'.$this->search.'%')->get();
        return view('livewire.users',['users'=>$users]);
    }
}
