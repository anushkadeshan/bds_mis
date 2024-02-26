<?php

namespace App\Exports;

use App\Models\User;
use App\Models\GnOffice;
use App\Models\Program\CompletionReport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProgressExport implements FromCollection, WithMapping, WithHeadings,ShouldAutoSize
{
    use Exportable;

    public $dsd;
    public $financial_year;
    public $gnd;
    public $manager;
    public $staff;
    public $activity;

    public function __construct($dsd,$financial_year,$gnd,$manager,$staff,$activity)
    {
        $this->dsd = $dsd;
        $this->financial_year = $financial_year;
        $this->gnd = $gnd;
        $this->manager = $manager;
        $this->staff = $staff;
        $this->activity = $activity;
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

    public function collection()
    {
        $progress = CompletionReport::query()->with('budget','dsd_office','activity','addedBy');
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
        return $progress->get();
    }

    public function getGnds($completioneport){
        $names = GnOffice::whereIn('id',$completioneport->gnds)->pluck('name')->toArray();
        return implode (", ", $names);
    }

    public function map($completioneport) :array
    {
        $i=1;
        return [
            $i++,
            $completioneport->activity_code,
            $completioneport->budget->boarder_activity,
            $completioneport->activity->name,
            $completioneport->dsd_office->name,
            $this->getGnds($completioneport),
            $completioneport->budget->no_of_units,
            $completioneport->units_completed,
            ($completioneport->units_completed/$completioneport->budget->no_of_units)*100 .'%',
            number_format(($completioneport->budget->cost_per_unit*$completioneport->budget->no_of_units), 2, '.', ','),
            number_format($completioneport->totdal_actual_cost, 2, '.', ','),
            ($completioneport->totdal_actual_cost/($completioneport->budget->cost_per_unit*$completioneport->budget->no_of_units))*100 .'%',
            $completioneport->date_of_end,
            $completioneport->date_of_start,
            $completioneport->addedBy->name
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Activity Code',
            'Boarder Activity',
            'Activity Name',
            'DSD Name',
            'GND Names',
            'Planned Units',
            'Achived Units',
            'Units %',
            'Planned Cost',
            'Total Cost',
            'Financial %',
            'Date of Start',
            'Date of End',
            'Added By'
        ];
    }



}
