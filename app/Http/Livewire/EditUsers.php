<?php

namespace App\Http\Livewire;
use Auth;
use App\Models\User;
use Livewire\Component;
use App\Actions\textbiz;
use App\Models\GnOffice;
use textbiz as GlobalTextbiz;
use App\Notifications\UserActivated;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditUsers extends Component
{
    use LivewireAlert;
    public $user= [];
    public $roles= [];
    public $branches= [];
    public $permissions = [];
    public $dsDivisions = [];
    public $gnDivisions = [];

    public $username;

    public $role;
    public $branch;
    public $isActive;
    public $reporting_to;
    public $subordinates;
    public $regional_branches = [];
    public $givenPermissions = [];
    public $dsds = [];
    public $gnds = [];

    public $users = [];
    public $me_officers = [];

    public function givePermission(){

        $userCollection = User::find($this->user->id);
        $userCollection->syncPermissions($this->givenPermissions);
        //dd($this->givenPermissions);
        $this->alert('success','Permissions given Successfully.');

    }

    public function changeRole(){
        $userCollection = User::find($this->user->id);
        $userCollection->syncRoles($this->role);
        $this->emit('refreshLivewireDatatable');
        $this->alert('success','Role added Successfully.');

    }

    public function addSubordinates(){
        $userCollection = User::find($this->user->id);
        $userCollection->subordinates = $this->subordinates;
        $userCollection->save();

        $this->alert('success','Subordinates added Successfully.');
    }

    public function addReporting_to(){
        $userCollection = User::find($this->user->id);
        $userCollection->reporting_to = $this->reporting_to;
        $userCollection->save();

        $this->alert('success','Reporting To added Successfully.');
    }

    public function changeActive(){
        $userCollection = User::find($this->user->id);
        $userCollection->active = $this->isActive;
        $userCollection->save();


        if($this->isActive==1){
            //send sms
            //$to = $userCollection->phone;
           // $message = "Hi ".$userCollection->name. " Your account is activated. Please log in to continue. -BDS MIS-";
            //$textbiz = (new textbiz);
           // $textbiz->sendsms($message,$to);

            $this->alert('success','User successfully Activated.');
        }
        else{
            $this->alert('success','User added Deactivated.');
        }

    }

    public function changeBranch(){
        $userCollection = User::find($this->user->id);
        $userCollection->branch_id = $this->branch;
        $userCollection->save();
        $this->alert('success','Branch added Successfully.');

    }

    public function changeBranches(){
        //dd(json_encode($this->regional_branches));
        $userCollection = User::find($this->user->id);
        $userCollection->branches = $this->regional_branches;
        $userCollection->save();
        $this->alert('success','Branch successfully Updated.');

    }

    public function changeDsds(){
        //dd(json_encode($this->regional_branches));
        $userCollection = User::find($this->user->id);
        $userCollection->dsds = $this->dsds;
        $userCollection->save();
        $this->alert('success','SDs successfully Updated.');

    }

    public function changeGnds(){
        //dd(json_encode($this->regional_branches));
        $userCollection = User::find($this->user->id);
        $userCollection->gnds = $this->gnds;
        $userCollection->save();
        $this->alert('success','GNDs successfully Updated.');

    }

    public function UpdatedDsds($dsds){
        if (!is_null($dsds)) {
            $this->gnDivisions = GnOffice::whereIn('dsd_id', $dsds)->get();
        }
    }

    public function mount($user,$roles,$branches,$permissions, $dsDivisions)
    {
        $this->username = $user->name;
        $this->users = User::get();
        $this->isActive = $user->active;
        $this->dsDivisions = $dsDivisions;
        //dd($dsDivisions);
        $cuurent_role = $user->roles->pluck('name');
        $this->dsds = json_decode($user->dsds);
        if (!is_null($this->dsds)) {
            $this->gnDivisions = GnOffice::whereIn('dsd_id', $this->dsds)->get();
        }
        $this->gnds = json_decode($user->gnds);
        $this->subordinates = json_decode($user->subordinates);
        $this->reporting_to = json_decode($user->reporting_to);
       // dd($cuurent_role);
        if(count($cuurent_role)>0){
            //dd($cuurent_role[0]);
            $this->role = $cuurent_role[0];
        }

        $this->branch = $user->branch_id;

        $userCollection = User::find($this->user->id);
        if($cuurent_role=='Regional Manager'){

        }
        $currentPermissions = $userCollection->getAllPermissions()->pluck('name');
        $this->givenPermissions = $currentPermissions->toArray();
        $this->regional_branches = json_decode($userCollection->branches);
        $me_officers = User::role('M&E Staff')->pluck('name','id');
        $this->me_officers =$me_officers;

        return view('livewire.edit-users')->with(['user'=>$user ,'roles'=>$roles,'branches'=>$branches,'permissions'=>$permissions]);
    }
}
