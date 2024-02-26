<?php

namespace App\Http\Livewire\Moneyorder;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\EconomicCrisis as EC;
use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\Auth;

class EconomicCrisis extends Component
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
    public $economic_crisis_id;

    public function updatedQuery(){
        $branch_id  = Auth::user()->branch_id;
        $this->families = LivelihoodFamily::where('branch_id',$branch_id)
            ->where('hh_name','like','%'.$this->query. '%')
            ->select('id','hh_name','serial_number','branch_id')
            ->get()->toArray();
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

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $this->filename3 = $this->photo->getClientOriginalName();

    }

    public function updatedMoney()
    {
        $this->validate([
            'money' => 'mimes:pdf|max:1024'// 1MB Max
        ]);


        $this->filename2 = $this->money->getClientOriginalName();

    }

    public function saveMoneyOrderGivingPhoto(){
        $this->validate([ // 1MB Max
            'photo' => 'image|max:1024|required',  // 1MB Max
            'family_id' => 'required'
        ]);

        $money_order_photo = $this->photo->storePublicly('economic_crisis','public');
        if($money_order_photo){
            $family = EC::updateOrCreate(['id'=>$this->economic_crisis_id],
            [
                'money_order_offer_picture' => $money_order_photo,
                'livelihood_family_id' => $this->family_id
            ]
            );
            $this->economic_crisis_id = $family->id;

            session()->flash('message', 'Photo updated successfully. Thank You');
            return redirect()->to('/economic-crisis');
        }
    }

    public function saveMoneyOrderPhoto(){
        $this->validate([
            'money' => 'mimes:pdf|max:1024|required', // 1MB Max
            'family_id' => 'required'
        ]);

        $money_order = $this->money->storePublicly('economic_crisis','public');
        if($money_order){
            $family = EC::updateOrCreate(['id'=>$this->economic_crisis_id],
            [
                'money_order_scanned_copy' => $money_order,
                'livelihood_family_id' => $this->family_id
            ]
            );
            $this->economic_crisis_id = $family->id;

            session()->flash('message', 'Document updated successfully. Thank You');
        }
    }

    public function render()
    {
        return view('livewire.moneyorder.economic-crisis');
    }
}
