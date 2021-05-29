<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditRole extends Component
{
    public $role;
    public $permissions;
    public $givenPermissions = [];

     protected $rules = [
        'givenPermissions' => 'required',
    ];

    public function givePermission(){
       
        $abc = $this->role;
        $abc->syncPermissions($this->givenPermissions);    
        //dd($this->givenPermissions);
        session()->flash('message', 'Permissions given successfully.');
        
    }

    public function mount($permissions)
    {
        $abc = $this->role;
        $currentPermissions = $abc->getAllPermissions()->pluck('name');
        $this->givenPermissions = $currentPermissions->toArray();
        //dd($this->givePermission);
        return view('livewire.edit-role')->with(['permissions'=>$permissions]);
    }
}

