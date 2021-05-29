<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;

class PermissionEdit extends Component
{
    public $permission;
    public $roles;
    public $assignedRoles;


    public function mount($permission,$roles)
    {
        
        return view('livewire.permission-edit')->with(['permission'=>$permission, 'roles'=>$roles]);
    }
}
