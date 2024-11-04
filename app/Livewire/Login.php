<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Request;
use App\Models\User;
use Hash;

class Login extends Component
{
    public $name,$email,$password;
    public $registedForm = false;
    public function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function authentication()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (\Auth::attempt([ //finding a result where both matching
            'email'=> $this->email,
            'password'=>$this->password,])) 
        {
            dd("logged in!");
        } else{
            dd("error");
        }
    }
    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $this->password = Hash::make($this->password);
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
        ]);
        $this->resetInputFields();
        $this->registedForm = false;
    }
    public function render()
    {
        return view('livewire.login')->layout('components.layouts.app');
    }
}
