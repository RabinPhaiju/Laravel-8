<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $search;
    protected $querystring = ['search'];
    public function updatingSearch(){
        $this->resetPage();
    }
    // protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // $users = User::where('name','like','%'.$this->search.'%')->get();
        $users = User::where('name','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.users',['users'=>$users]);
    }
}
