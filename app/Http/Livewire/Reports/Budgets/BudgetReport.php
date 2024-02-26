<?php

namespace App\Http\Livewire\Reports\Budgets;

use App\Models\GnOffice;
use App\Models\User;
use Livewire\Component;
use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Auth;

use App\Models\Program\Financial\Budget;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BudgetReport extends Component
{
    use LivewireAlert;
    public $selectedDistrict = [];
    public $selectedDsd = [];
    public $selectedGnd = [];
    public $selected_rm;
    public $selectedStaff = [];

    public $districts = [];
    public $dsds = [];
    public $gnds = [];
    public $regional_managers = [];
    public $staffs = [];
    public $yearArray = [];
    public $budgets = [];

    public $financial_year;

    Public $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    Public $months_long = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    protected $listeners = ['updateFilter' => 'updateFilter'];

    public function getYears(){
        $currentYear=date('Y');
        $startyear=date('Y')-1;
        $this->financial_year = $startyear;
        $endYear=$startyear+5;
        // set start and end year range i.e the start year
        $this->yearArray = range($startyear,$endYear);
    }

    public function mount(){
        $this->districts = Budget::distinct('district')->whereNotNull('district')->pluck('district');
        $this->getYears();
        $this->queryBudget();
    }

    public function queryBudget(){
        $user = Auth::user();
        $query = Budget::query();

        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $this->dsds = Budget::with('dsd')->distinct('dsd_id')->where('added_by',$user->id)->whereNotNull('dsd_id')->get()->pluck('dsd.name','dsd_id')->toArray();

            $gnds = Budget::distinct('gn_id')->whereNotNull('gn_id')->where('added_by',$user->id)->get()->pluck('gn_id')->toArray();

            $gn_ids = [];
            foreach($gnds as $key => $gnd){
                foreach($gnd as $key1 =>$id){
                    array_push($gn_ids,$id);
                }
            }
            $this->gnds = GnOffice::whereIn('id',$gn_ids)->get()->pluck('name','id')->toArray();

            $query = $query->with('precondition','dsd','activity','addedBy')->where('added_by',$user->id)->where('approved',true)->orderBy('pre_condition_id');

            if(empty(!$this->selectedDistrict)){
                $query = $query->whereIn('district',$this->selectedDistrict);
            }
            if(empty(!$this->selectedDsd)){
                $query = $query->whereIn('dsd_id',$this->selectedDsd);
            }
            if(empty(!$this->selectedGnd)){
                $query = $query->whereIn('gn_id',$this->selectedGnd);
            }
            if(empty(!$this->selected_rm)){
                $rm = User::where('id',$this->selected_rm)->first();
                $subordinates = json_decode($rm->subordinates);

                $query = $query->whereIn('added_by',$subordinates);
                //dd($query->get(),$subordinates);
            }
            if(empty(!$this->selectedStaff)){
                $query = $query->where('added_by',$this->selectedStaff);
            }
            if(is_null(!$this->financial_year)){
                $query = $query->where('year',$this->financial_year);
            }

            $budgets = $query->get();

            $this->budgets = $budgets;

        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff', 'District Represetnative'])){
            $subordinates = Auth::user()->subordinates;
            $this->dsds = Budget::with('dsd')->distinct('dsd_id')->whereIn('added_by',json_decode($subordinates))->whereNotNull('dsd_id')->get()->pluck('dsd.name','dsd_id')->toArray();
            $gnds = Budget::distinct('gn_id')->whereNotNull('gn_id')->whereIn('added_by',json_decode($subordinates))->get()->pluck('gn_id')->toArray();
            $gn_ids = [];
            foreach($gnds as $key => $gnd){
                foreach($gnd as $key1 =>$id){
                    array_push($gn_ids,$id);
                }
            }
            $this->gnds = GnOffice::whereIn('id',$gn_ids)->get()->pluck('name','id')->toArray();
            $this->staffs = User::whereIn('subordinates',json_decode($subordinates))->pluck('name','id');
            $query = $query->with('precondition','dsd','activity','addedBy')->whereIn('added_by',json_decode($subordinates))->where('approved',true)->orderBy('pre_condition_id');
            if(empty(!$this->selectedDistrict)){
                $query = $query->whereIn('district',$this->selectedDistrict);
            }
            if(empty(!$this->selectedDsd)){
                $query = $query->whereIn('dsd_id',$this->selectedDsd);
            }
            if(empty(!$this->selectedGnd)){
                $query = $query->whereIn('gn_id',$this->selectedGnd);
            }
            if(empty(!$this->selected_rm)){
                $rm = User::where('id',$this->selected_rm)->first();
                $subordinates = json_decode($rm->subordinates);

                $query = $query->whereIn('added_by',$subordinates);
                //dd($query->get(),$subordinates);
            }
            if(empty(!$this->selectedStaff)){
                $query = $query->where('added_by',$this->selectedStaff);
            }
            if(empty(!$this->financial_year)){
                $query = $query->where('year',$this->financial_year);
            }
            $this->budgets = $query->get();

        }
        else{
            $this->dsds = Budget::with('dsd')->distinct('dsd_id')->whereNotNull('dsd_id')->get()->pluck('dsd.name','dsd_id')->toArray();
            $gnds = Budget::distinct('gn_id')->whereNotNull('gn_id')->get()->pluck('gn_id')->toArray();
            $gn_ids = [];
            foreach($gnds as $key => $gnd){
                foreach($gnd as $key1 =>$id){
                    array_push($gn_ids,$id);
                }
            }
            $this->gnds = GnOffice::whereIn('id',$gn_ids)->get()->pluck('name','id')->toArray();
            $this->regional_managers = User::role('Regional Manager')->pluck('name','id');
            $this->staffs = User::pluck('name','id');

            $query = $query->with('precondition','dsd','activity','addedBy')->where('approved',true)->orderBy('pre_condition_id');
            if(empty(!$this->selectedDistrict)){
                $query = $query->whereIn('district',$this->selectedDistrict);
            }
            if(empty(!$this->selectedDsd)){
                $query = $query->whereIn('dsd_id',$this->selectedDsd);
            }
            if(empty(!$this->selectedGnd)){
                $query = $query->whereIn('gn_id',$this->selectedGnd);
            }
            if(empty(!$this->selected_rm)){
                $rm = User::where('id',$this->selected_rm)->first();
                $subordinates = json_decode($rm->subordinates);

                $query = $query->whereIn('added_by',$subordinates);
                //dd($query->get(),$subordinates);
            }
            if(empty(!$this->selectedStaff)){
                $query = $query->where('added_by',$this->selectedStaff);
            }
            if(empty(!$this->financial_year)){
                $query = $query->where('year',$this->financial_year);
            }
            $this->budgets = $query->get();

        }
        $this->dispatchBrowserEvent('contentChanged');

    }

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('bootstrapTable');
    }

    public function updateFilter(){
        $this->queryBudget();
    }

    public function updatedFinancialYear(){
        //dd($this->financial_year);
        $this->queryBudget();
    }

    public function updatedSelectedRm(){
        $this->queryBudget();
    }

    public function render()
    {
        return view('livewire.reports.budgets.budget-report');
    }
}
