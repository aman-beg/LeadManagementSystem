<?php

namespace App\Livewire;

use Illuminate\Validation\ValidationException;
use Exception;
use Livewire\Component;
use App\Models\Lead;

class LeadManager extends Component
{
    public $name,$email,$phone,$message,$status,$lead_id,$filterTerm,$lead;
    public $countries = ['India'];
    public $states = ['Delhi', 'Uttar Pradesh', 'Maharashtra', 'Punjab', 'Telangana', 'Tamilnadu'];

    public $addLine1,$state,$country;
    protected $rules = [
        'name' => 'required|regex:/^[\pL\s\-.]+$/u|max:255',
        'email'=>'nullable|email|max:255',
        'phone'=>'required|regex:/^(\+?\d{1,3})?(\s?\d+){1,19}$/',
        'message'=>'nullable',
        'status'=>'required|in:new,contacted,in progress,converted,closed',
    ];
    public function getAddress(){
        return $this->addLine1 . ', ' . $this->state . ', ' . $this->country;
    }
    // for real time search
    public function updated($properName)   //lifecycle hook automatically call when property updates from wire:model.live
    {
        $this->validateOnly($properName);
    }
    public function mount()
    {
        $this->status = 'new';
    }

    public function render()
    {
        return view('livewire.lead-manager')->layout('components.layouts.app');
    }
    public function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->addLine1 = '';
        $this->state = '';
        $this->country ='';
        $this->message = '';
        $this->status = 'new';
    }
    public function store()
    {
        try {
            $this->validate();
            //creation on DB
            Lead::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' =>$this->getAddress(),
                'message' => $this->message,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Lead Created Successfully.');
            $this->resetInputFields();
        } catch (ValidationException $e) {
            session()->flash('error', 'Provide details in correct format!');
        } catch (Exception $e) {
            session()->flash('error', 'Error Occured on Server, try again later.');
        }
    }
    public function leadsList(){
        return $this->redirectRoute('leads-list');
    }
}