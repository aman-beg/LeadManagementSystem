<?php

namespace App\Livewire;

use Livewire\Component;

class FilterLeads extends Component
{
    public $filterTerm;
    public function render()
    {
        return view('livewire.filter-leads');
    }
    public function updatedFilterTerm(){ //automatically call on changes of $filterTerm
        $this->dispatch('filterUpdated', $this->filterTerm);
    }
}