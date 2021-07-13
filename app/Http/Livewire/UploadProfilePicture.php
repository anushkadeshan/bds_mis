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
            'money' => 'mimes:pdf|max:1024', // 1MB Max
        ]);

        $this->filename2 = $this->money->getClientOriginalName();

    }
    public function updatedQuery(){
        $this->families = LivelihoodFamily::select('id','hh_name','serial_number')->where('branch_id',Auth::user()->branch_id)
            ->where('hh_name','like','%'.$this->query. '%')
            ->orWhere('serial_number','like','%'.$this->query. '%')
            ->get()->toArray();
    }

    public function saveData(){
        $money_order_photo = $this->photo->storePublicly('money_orders','public');
        $money_order = $this->money->storePublicly('money_orders','public');
        $profile = $this->money->profile('profile_pictures','public');
        if($profile && $money_order && $money_order_photo){
            $family = LivelihoodFamily::find($this->family_id);
            $family->covid_relief_money_order = $money_order;
            $family->money_order_giving_photo = $money_order_photo;
            $family->profile_picture = $profile;
            $family->save();

            session()->flash('message', 'All files updated succesfully. Thank You');
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
