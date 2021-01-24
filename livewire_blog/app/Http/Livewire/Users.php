<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $readyToLoad = false;
    public $search;
    protected $querystring = ['search'];
    public function updatingSearch(){
        $this->resetPage();
    }
    // protected $paginationTheme = 'bootstrap';

    public function loadUsers(){
        $this->readyToLoad = true;
    }

    public function render()
    {
        // $users = User::where('name','like','%'.$this->search.'%')->get();
        $users =$this->readyToLoad? User::where('name','like','%'.$this->search.'%')->paginate(10):[];
        return view('livewire.users',['users'=>$users]);
    }
}
