<?php

namespace App\Http\Livewire\Reports\Progress;

use App\Models\User;
use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use Livewire\WithPagination;
use App\Exports\ProgressExport;
use App\Models\LogFrame\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\Program\CompletionReport;
use App\Models\Program\Financial\Budget;

class ProgressTable extends Component
{
    use WithPagination;
    public $financial_year;
    public $yearArray = [];
    public $dsds = [];
    public $gnds= [];
    public $managers = [];
    public $staffs = [];
    public $activities = [];

    //filters
    public $gnd;
    public $dsd;
    public $manager;
    public $staff;
    public $activity;

    public function mount(){
        $this->getYears();
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $ds_array = Budget::distinct('dsd_id')->where('added_by',$user->id)->pluck('dsd_id')->toArray();
            $gn_array = Budget::distinct('gn_id')->where('added_by',$user->id)->pluck('gn_id')->toArray();
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff', 'District Represetnative'])){
            $subordinates = Auth::user()->subordinates;
            $ds_array = Budget::distinct('dsd_id')->whereIn('added_by',json_decode($subordinates))->pluck('dsd_id')->toArray();
            $gn_array = Budget::distinct('gn_id')->whereIn('added_by',json_decode($subordinates))->pluck('gn_id')->toArray();
            $this->staffs = User::whereIn('subordinates',json_decode($subordinates))->pluck('name','id');
        }
        else{
            $ds_array = Budget::distinct('dsd_id')->pluck('dsd_id')->toArray();
            $gn_array = Budget::distinct('gn_id')->pluck('gn_id')->toArray();
            $this->managers = User::role('Regional Manager')->pluck('name','id');
            $this->staffs = User::role(['Community Development coordinator','Youth Development coordinator'])->pluck('name','id');
        }

        $this->dsds = DsOffice::whereIn('id',$ds_array)->pluck('name','id')->toArray();

        $gn_ids = [];
        foreach($gn_array as $key => $ids){
            foreach($ids as $key2 => $id){
                $gn_ids[] += $id;
            }
        }
        $this->gnds = GnOffice::whereIn('id',$gn_ids)->pluck('name','id')->toArray();

        $activityArray = CompletionReport::distinct('activity_id')->pluck('activity_id')->toArray();
        $this->activities = Activity::whereIn('id',$activityArray)->pluck('name','id')->toArray();

    }

    public function getYears(){
        $currentYear=date('Y');
        $startyear=date('Y')-1;
        $this->financial_year = $currentYear;
        $endYear=$startyear+5;

        // set start and end year range i.e the start year
        $this->yearArray = range($startyear,$endYear);
    }

    public function updatedDsd(){
    }

    public function updatedGnd(){

    }

    public function filter(){
        $this->render();
    }

    public function clearFilters(){
        $this->dsd = [];
        $this->gnd = [];
        $this->staff = [];
        $this->manager = [];
    }

    protected function getManagersDsds(){
        $managersDsdsArray = User::whereIn('id',$this->manager)->pluck('dsds');
        $managersDsds = [];
        foreach($managersDsdsArray as $key => $ids){
            if(!empty($ids)){
                foreach($ids as $key2 => $id){
                    $managersDsds[] += $id;
                }
            }
        }
        return array_unique($managersDsds);
    }

    protected function getStaffDsd(){
        $staffDsdArray = User::whereIn('id',$this->staff)->pluck('dsds');
        $staffDsds = [];
        foreach($staffDsdArray as $key => $ids){
            if(!empty($ids)){
                foreach($ids as $key2 => $id){
                    $staffDsds[] += $id;
                }
            }
        }
        return array_unique($staffDsds);

    }

    public function export(){
        $progress = CompletionReport::query()->with('budget');
        return (new ProgressExport($this->dsd,$this->financial_year,$this->gnd,$this->manager,$this->staff,$this->activity))->download('Progress '.now().'.xlsx');
    }

    public function render()
    {
        $progress = CompletionReport::query()->with('budget');
        $progress->where('financial_year',$this->financial_year);
        if(!empty($this->dsd)){
            $progress->whereIn('dsd',$this->dsd);
        }
        if(!empty($this->gnd)){
            $progress->whereJsonContains('gnds',$this->gnd);
        }
        if(!empty($this->manager)){
            $progress->whereIn('dsd',$this->getManagersDsds());
        }
        if(!empty($this->staff)){
            $progress->whereIn('dsd',$this->getStaffDsd());
        }
        if(!empty($this->activity)){
            $progress->whereIn('activity_id',$this->activity);
        }
        $data = $progress->paginate(10);
        return view('livewire.reports.progress.progress-table',[
            'progress' => $data
        ]);
    }
}
