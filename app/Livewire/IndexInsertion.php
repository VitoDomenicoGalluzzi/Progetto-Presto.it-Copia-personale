<?php

namespace App\Livewire;

use App\Models\Insertion;
use Livewire\Component;

class IndexInsertion extends Component
{
    public function render()
    {
        return view('livewire.index-insertion', ['insertions'=>Insertion::all()]);
    }
}
