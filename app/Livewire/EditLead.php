<?php

namespace App\Livewire;

use App\Models\Lead;
use DB;
use Exception;
use Livewire\Component;
use Illuminate\Support\Str;

class EditLead extends Component
{
    public $lead,$name,$email,$phone,$message,$status,$leadId;
    public $country,$state,$addLine1;
    public $countries = ['India'];
    public $states = ['Delhi','Uttar Pradesh','Maharashtra','Punjab','Telangana','Tamilnadu'];
        
    protected $rules = [
        'name' => 'required|regex:/^[\pL\s\-.]+$/u|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'required|regex:/^(\+?\d{1,3})?(\s?\d+){1,19}$/',
        'message' => 'nullable',
        'status' => 'required|in:new,contacted,in progress,converted,closed',
    ];
    public function fetchAddLine1($address)
    {
        $sArr = explode(',', $address);
        $s = '';
        for ($i=0; $i < count($sArr) - 2; $i++) { 
            if ($i==count($sArr)-3){
                $s = $s . $sArr[$i] ;
            }
            else{
                $s = $s . $sArr[$i] . ', ';
            }
        }
        // dd($s);
        return $s;
    }
    public function fetchState($address)
    {
        $sArr = explode(', ',$address);
        $s = $sArr[count($sArr)-2];
        return $s;
    }
    public function fetchCountry($address){
        return Str::afterLast($address, ', ');
    }
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
        $this->addLine1 = $this->fetchAddLine1($lead->address);
        $this->state = $this->fetchState($lead->address);
        $this->country = $this->fetchCountry($lead->address);
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
        DB::transaction(function () use ($id){
            try{
                $this->validate();
                $lead = Lead::findOrFail($id);
                if ($lead) {
                    // updation on DB
                    $lead->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'phone' => $this->phone,
                        'address' => $this->addLine1 .', '. $this->state . ', ' . $this->country,
                        'message' => $this->message,
                        'status' => $this->status,
                    ]);
                    session()->flash('message', 'Lead Updated Successfully.');
                    $this->resetInputFields();
                    $this->redirectRoute('leads-list');
                }
            } catch (Exception $e) {
                session()->flash('error', 'Editing Exception occured!');
            }
        });
        
    }
    public function leadsList()
    {
        return $this->redirectRoute('leads-list');
    }
}
