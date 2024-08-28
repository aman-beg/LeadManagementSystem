<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Lead;

class LeadList extends Component
{
    use WithPagination, WithoutUrlPagination;

    protected $leads;
    public $filterTerm, $searchTerm, $paginatedleads;
    #[On('searchUpdated')]
    public function addSearchedLeads($searchTerm)
    {
        $this->searchTerm = "%" . $searchTerm . "%";
        $this->resetPage();

        if (empty($this->filterTerm) || $this->filterTerm == 'all') {
            // Search all leads without filtering status
            $this->leads = Lead::where('name', 'LIKE', $this->searchTerm)
                ->orWhere('email', 'LIKE', $this->searchTerm)
                ->orWhere('message', 'LIKE', $this->searchTerm)
                ->orWhere('phone', 'LIKE', $this->searchTerm)
                ->paginate(6);
        } else {
            // Search in filtered leads by status
            $this->leads = Lead::where('status', $this->filterTerm)
                ->where(function ($query) {
                    $query->where('name', 'LIKE', $this->searchTerm)
                        ->orWhere('email', 'LIKE', $this->searchTerm)
                        ->orWhere('message', 'LIKE', $this->searchTerm)
                        ->orWhere('phone', 'LIKE', $this->searchTerm);
                })
                ->paginate(6);
        }
    }

    #[On('filterUpdated')]
    public function addFilteredLeads($filterTerm)
    {
        $this->resetPage();
        $this->filterTerm = $filterTerm;
        if ($filterTerm == "all") {
            $this->leads = Lead::paginate(6);
        } else {
            $this->leads = Lead::where("status", "=", $filterTerm)->paginate(6);
        }
    }
    public function render()
    {
        try {
            if (empty($this->leads) && (empty($this->filterTerm) || $this->filterTerm == 'all') && empty($this->searchTerm)) {
                $this->leads = Lead::paginate(6);
            } else if (empty($this->leads) && !(empty($this->filterTerm) || $this->filterTerm == 'all') && empty($this->searchTerm)) {
                $this->leads = Lead::where("status", "=", $this->filterTerm)->paginate(6);
            }
        } catch (\Exception $e) {
            abort(500);
        }
        return view('livewire.lead-list')->layout('components.layouts.app')->with('leads', $this->leads);
    }
    public function delete($id)
    {
        Lead::find($id)->delete();
        if ($this->leads == null) {
            $this->filterTerm = null;
            $this->searchTerm = null;
        }
        session()->flash('message', 'Lead Deleted Successfully.');
    }
    public function createLead()
    {
        return $this->redirectRoute('lead-form');
    }
    public function edit($id)
    {
        return $this->redirectRoute('edit-lead', ['id' => $id]);
    }
}