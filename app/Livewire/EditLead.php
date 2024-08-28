<?php

namespace App\Livewire;

use App\Models\Lead;
use Exception;
use Livewire\Component;

class EditLead extends Component
{
    public $lead,$name,$email,$phone,$message,$status,$leadId;
    protected $rules = [
        'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'required|regex:/^(\+?\d{1,3})?(\s?\d+){1,19}$/',
        'message' => 'nullable',
        'status' => 'required|in:new,contacted,in progress,converted,closed',
    ];
    // for real time search
    public function updated($properName)   //lifecycle hook automatically call when property updates from wire:model.live
    {
        $this->validateOnly($properName);
    }
    public function mount($id)
    {
        $this->leadId = $id;
        $lead = Lead::find($id);
        $this->name = $lead->name;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
        $this->message = $lead->message;
        $this->status = $lead->status;
    }
    public function render()
    {
        return view('livewire.edit-lead')->layout('components.layouts.app');
    }
    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
        $this->status = 'new';
    }
    public function update($id)
    {
        try{
            $this->validate();
            $lead = Lead::findOrFail(100);
            if ($lead) {
                // updation on DB
                $lead->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'message' => $this->message,
                    'status' => $this->status,
                ]);
                session()->flash('message', 'Lead Updated Successfully.');
                $this->resetInputFields();
                $this->redirectRoute('leads-list');
            }
        } catch(Exception $e){
            session()->flash('error','Editing Exception occured!');
        }
    }
    public function leadsList()
    {
        return $this->redirectRoute('leads-list');
    }
}
