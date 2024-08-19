<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Lead;

class LeadManager extends Component
{
    public $leads,$name,$email,$phone,$message,$status,$lead_id,$filterTerm;
    public $updateMode = false;
    protected $rules = [
        'name'=>'required',
        'email'=>'nullable|email',
        'phone'=>'required',
        'message'=>'nullable',
        'status'=>'required|in:new,contacted,in progress,converted,closed',
    ];
    // for real time search
    public function updated($properName)   //lifecycle hook automatically call when property updates from wire:model.live
    {
        $this->validateOnly($properName);
    }
    public function mount()
    {
        $this->status = 'new';
    }
    #[On('searchUpdated')]
    public function addSearchedLeads($searchTerm)
    {
        // getting all from DB by default
        $statusFilteredLeads = Lead::all();
        // if user has selected filter so get filterd leads from DB
        if(!$this->filterTerm == '') 
        {
            $statusFilteredLeads = Lead::where("status", "=", $this->filterTerm)->get();
        }
        // then just filter on basis of serchTerm and update public leads
        $this->leads = $statusFilteredLeads->filter(function ($lead) use ($searchTerm) {
            return stripos($lead->name, $searchTerm) !== false ||
                stripos($lead->email, $searchTerm) !== false ||
                stripos($lead->message, $searchTerm) !== false;
        });
    }
    #[On('filterUpdated')]
    public function addFilteredLeads($filterTerm)
    {
        $this->filterTerm = $filterTerm;
        if($filterTerm == "all"){
            $this->leads = Lead::all();
        }else{
            $this->leads = Lead::where("status", "=", $filterTerm)->get();
        }
    }
    public function render()
    {
        if($this->leads==null){
            $this->leads = Lead::all();
        }
        return view('livewire.lead-manager');
    }
    public function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
        $this->status = 'new';
    }
    public function store()
    {
        $this->validate();
        //creation on DB
        Lead::create([
        'name' => $this->name,
        'email' => $this->email,
        'phone' => $this->phone,
        'message'=> $this->message,
        'status' => $this->status ,
        ]);
        session()->flash('message','Lead Created Successfully.');
        $this->resetInputFields();
        $this->leads = null;
    }
    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        $this->lead_id = $id;
        $this->name = $lead->name;    
        $this->email = $lead->email;    
        $this->phone = $lead->phone;    
        $this->message = $lead->message;    
        $this->status = $lead->status;   
        
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate();
        if($this->lead_id){
            $lead = Lead::findOrFail($this->lead_id);
            // updation on DB
            $lead->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
                'status' => $this->status ,
            ]);
            session()->flash('message', 'Lead Updated Successfully.');
            $this->resetInputFields();
            $this->updateMode = false;
            $this->leads = null;
        }
    }
    public function delete($id){
        Lead::find($id)->delete();
        session()->flash('message','Lead Deleted Successfully.');
        $this->leads = null;
    }
}
