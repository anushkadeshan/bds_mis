<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PermissionEdit extends Component
{
    use LivewireAlert;
    public $permission;
    public $roles;
    public $assignedRoles = [];


    public function mount($permission,$roles)
    {
        $this->assignedRoles = DB::table('role_has_permissions')->where('permission_id',$this->permission->id)->get()->pluck('role_id')->toArray();

        return view('livewire.permission-edit')->with(['permission'=>$permission, 'roles'=>$roles]);
    }

    public function updatedAssignedRoles($values){
        DB::table('role_has_permissions')->where('permission_id',$this->permission->id)->delete();
        foreach($values as $key => $value){

            $role = Role::find($value);

            $role->givePermissionTo($this->permission->name);
        }
        $this->alert('success','Roles Assigned to Permissions');

    }
}
