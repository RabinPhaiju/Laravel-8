<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
               <input type="text" placeholder="Search here">
            </div>
        blade;
    }
}
