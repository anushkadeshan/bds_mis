<?php

namespace App\Http\Livewire;
use Auth;
use App\Actions\textbiz;
use App\Models\GnOffice;
use App\Models\User;
use Livewire\Component;
use App\Notifications\UserActivated;
use textbiz as GlobalTextbiz;

class EditUsers extends Component
{
    public $user;
    public $roles;
    public $branches;
    public $permissions;
    public $dsDivisions;
    public $gnDivisions;


    public $role;
    public $branch;
    public $isActive;
    public $regional_branches = [];
    public $givenPermissions = [];
    public $dsds = [];
    public $gnds = [];

    public function givePermission(){

        $userCollection = User::find($this->user->id);
        $userCollection->syncPermissions($this->givenPermissions);
        //dd($this->givenPermissions);
        session()->flash('message', 'Permissions given successfully.');

    }

    public function changeRole(){
        $userCollection = User::find($this->user->id);
        $userCollection->syncRoles($this->role);
        $this->emit('refreshLivewireDatatable');
        session()->flash('message', 'Role successfully updated');

    }

    public function changeActive(){
        $userCollection = User::find($this->user->id);
        $userCollection->active = $this->isActive;
        $userCollection->save();


        if($this->isActive==1){
            //send sms
            $to = $userCollection->phone;
            $message = "Hi ".$userCollection->name. " Your account is activated. Please log in to continue. -BDS MIS-";
            $textbiz = (new textbiz);
            $textbiz->sendsms($message,$to);
            session()->flash('message', 'User successfully Activated.');
        }
        else{
            session()->flash('error', 'User successfully Deactivated.');
        }

    }

    public function changeBranch(){
        $userCollection = User::find($this->user->id);
        $userCollection->branch_id = $this->branch;
        $userCollection->save();

        session()->flash('message', 'Branch successfully Updated.');

    }

    public function changeBranches(){
        //dd(json_encode($this->regional_branches));
        $userCollection = User::find($this->user->id);
        $userCollection->branches = $this->regional_branches;
        $userCollection->save();

        session()->flash('message', 'Branch successfully Updated.');

    }

    public function changeDsds(){
        //dd(json_encode($this->regional_branches));
        $userCollection = User::find($this->user->id);
        $userCollection->dsds = $this->dsds;
        $userCollection->save();

        session()->flash('message', 'DSDs successfully Updated.');

    }

    public function changeGnds(){
        //dd(json_encode($this->regional_branches));
        $userCollection = User::find($this->user->id);
        $userCollection->gnds = $this->gnds;
        $userCollection->save();

        session()->flash('message', 'GNDs successfully Updated.');

    }

    public function UpdatedDsds($dsds){
        if (!is_null($dsds)) {
            $this->gnDivisions = GnOffice::whereIn('dsd_id', $dsds)->get();
        }
    }

    public function mount($user,$roles,$branches,$permissions, $dsDivisions)
    {
        $this->isActive = $user->active;
        $this->dsDivisions = $dsDivisions;
        $this->gnDivisions = collect();
        $cuurent_role = $user->roles->pluck('name');

        if(!$cuurent_role){
            $this->role = $cuurent_role[0];
        }

        $this->branch = $user->branch_id;

        $userCollection = User::find($this->user->id);
        if($cuurent_role=='Regional Manager'){

        }
        $currentPermissions = $userCollection->getAllPermissions()->pluck('name');
        $this->givenPermissions = $currentPermissions->toArray();
        $this->regional_branches = json_decode($userCollection->branches);

        return view('livewire.edit-users')->with(['user'=>$user ,'roles'=>$roles,'branches'=>$branches,'permissions'=>$permissions]);
    }
}
