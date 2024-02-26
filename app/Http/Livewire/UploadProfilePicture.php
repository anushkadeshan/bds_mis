<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\Auth;

class UploadProfilePicture extends Component
{
    use WithFileUploads;
    public $query;
    public $families;
    public $hh_name;
    public $family_id;

    public $photo;
    public $profile;
    public $money;
    public $filename1;
    public $filename2;
    public $filename3;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $this->filename3 = $this->photo->getClientOriginalName();

    }
    public function updatedProfile()
    {
        $this->validate([
            'profile' => 'image|max:1024', // 1MB Max
        ]);
        $this->filename1 = $this->profile->getClientOriginalName();

    }

    public function updatedMoney()
    {
        $this->validate([
            'money' => 'mimes:pdf|max:1024'// 1MB Max
        ]);


        $this->filename2 = $this->money->getClientOriginalName();

    }
    public function updatedQuery(){
        $branch_id  = Auth::user()->branch_id;
        $this->families = LivelihoodFamily::where('branch_id',$branch_id)
            ->where('hh_name','like','%'.$this->query. '%')
            ->select('id','hh_name','serial_number','branch_id')
            ->get()->toArray();
    }

    public function saveData(){
        $this->validate([
            'money' => 'mimes:pdf|max:1024|required', // 1MB Max
            'photo' => 'image|max:1024|required', // 1MB Max
            'profile' => 'image|max:1024|required', // 1MB Max
            'family_id' => 'required'
        ]);

        $money_order_photo = $this->photo->storePublicly('money_orders','public');
        $money_order = $this->money->storePublicly('money_orders','public');
        $profile = $this->profile->storePublicly('profile_pictures','public');
        if($profile && $money_order && $money_order_photo){
            $family = LivelihoodFamily::find($this->family_id);
            $family->covid_relief_money_order = $money_order;
            $family->money_order_giving_photo = $money_order_photo;
            $family->profile_picture = $profile;
            $family->save();

            session()->flash('message', 'All files updated succesfully. Thank You');
            return redirect()->to('/money-order-documents');
        }
    }

    public function saveProfilePhoto(){
        $this->validate([ // 1MB Max
            'profile' => 'image|max:1024|required', // 1MB Max
            'family_id' => 'required'
        ]);

        $profile = $this->profile->storePublicly('profile_pictures','public');
        if($profile ){
            $family = LivelihoodFamily::find($this->family_id);
            $family->profile_picture = $profile;
            $family->save();

            session()->flash('message', 'Profile Picture updated succesfully. Thank You');
        }
    }

    public function saveMoneyOrderGivingPhoto(){
        $this->validate([ // 1MB Max
            'photo' => 'image|max:1024|required',  // 1MB Max
            'family_id' => 'required'
        ]);

        $money_order_photo = $this->photo->storePublicly('money_orders','public');
        if($money_order_photo){
            $family = LivelihoodFamily::find($this->family_id);
            $family->money_order_giving_photo = $money_order_photo;
            $family->save();

            session()->flash('message', 'Photo updated succesfully. Thank You');
            return redirect()->to('/upload-profile-picture');
        }
    }

    public function saveMoneyOrderPhoto(){
        $this->validate([
            'money' => 'mimes:pdf|max:1024|required', // 1MB Max
            'family_id' => 'required'
        ]);

        $money_order = $this->money->storePublicly('money_orders','public');
        if($money_order){
            $family = LivelihoodFamily::find($this->family_id);
            $family->covid_relief_money_order = $money_order;
            $family->save();

            session()->flash('message', 'Document updated succesfully. Thank You');
        }
    }

    public function clear(){
        $this->families = [];
    }

    public function selectFamily($id){
        $family  = LivelihoodFamily::find($id);
        $this->hh_name = $family->hh_name;
        $this->query = $family->hh_name;
        $this->family_id = $id;
        $this->families = [];
    }

    public function render()
    {
        return view('livewire.upload-profile-picture');
    }
}
