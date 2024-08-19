<?php

namespace App\Livewire;

use Livewire\Component;

class SearchLeads extends Component
{
    public $searchTerm = "";
    public function render()
    {
        return view('livewire.search-leads');
    }
    public function updatedSearchTerm(){ // automatically calls when $searchTerm will update
        $this->dispatch('searchUpdated',$this->searchTerm);
    }
}
