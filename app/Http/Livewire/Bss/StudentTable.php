<?php

namespace App\Http\Livewire\Bss;

use Livewire\Component;
use App\Models\bss\Student;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Auth;

class StudentTable extends LivewireDatatable
{
    public $model = Student::class;


    protected $listners = ['refreshLivewireDatatable' => 'columns'];


    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return Student::query()->leftJoin('gn_office', 'gn_office.id', 'students.gn_id')
            ->leftJoin('dsd_office', 'dsd_office.id', 'students.dsd_id')
            ->leftJoin('status', 'status.id', 'students.status_id')
            ->leftJoin('payment_details', 'payment_details.student_id', 'students.id')
            //->whereIn('students.approved',[1,2])
            ->leftJoin('branches', 'branches.id', 'students.branch_id')
            ->where('branch_id',Auth::user()->branch_id);
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return Student::query()->leftJoin('gn_office', 'gn_office.id', 'students.gn_id')
            ->leftJoin('dsd_office', 'dsd_office.id', 'students.dsd_id')
            ->leftJoin('status', 'status.id', 'students.status_id')
            ->leftJoin('payment_details', 'payment_details.student_id', 'students.id')
            ->leftJoin('branches', 'branches.id', 'students.branch_id')
           // ->whereIn('students.approved',[1,2])
            ->where('payment_details.p_status',1)
            ->whereIn('branch_id',json_decode(Auth::user()->branches));
        }
        else{
            return Student::query()->leftJoin('gn_office', 'gn_office.id', 'students.gn_id')
            ->leftJoin('dsd_office', 'dsd_office.id', 'students.dsd_id')
            ->leftJoin('branches', 'branches.id', 'students.branch_id')
            ->leftJoin('payment_details', 'payment_details.student_id', 'students.id')
            ->whereNotIn('branch_id',[9,10,11,4])
           // ->whereIn('students.approved',[1,2])
           ->where('payment_details.p_status',1)
            ->leftJoin('status', 'status.id', 'students.status_id');

        }
    }

    public function columns()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return [
                NumberColumn::name('id'),
                Column::name('name')->searchable()->editable()->filterable(),
                Column::name('ref_no')->searchable()->editable()->hide(),
                Column::name('schol_type')->searchable()->hide(),
                Column::name('schol_given_on')->searchable()->hide(),
                Column::name('nic')->searchable()->filterable(),
                Column::name('dsd_office.name')
                    ->label('DS Office Name')->searchable()->filterable()->hide(),
                Column::name('gn_office.name')
                    ->label('GN Office Name')->searchable()->filterable()->hide(),
                Column::name('contact')->filterable()->editable(),
                Column::name('al_year')->filterable()->editable()->hide(),
                Column::name('branches.name')->filterable()->label('Branch Name'),

                Column::name('status.status')
                    ->label('Current Status')->searchable()->filterable()->hide(),
                Column::callback(['id'], function ($id) {
                    return view('livewire.bss.student-table', ['id' => $id]);
                })
            ];
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return [
                NumberColumn::name('id'),
                Column::name('name')->searchable()->editable()->filterable(),
                Column::name('ref_no')->searchable()->editable()->hide(),
                Column::name('schol_type')->searchable()->hide(),
                Column::name('schol_given_on')->searchable()->hide(),
                Column::name('nic')->searchable()->filterable(),
                Column::name('dsd_office.name')
                    ->label('DS Office Name')->searchable()->filterable(),
                Column::name('gn_office.name')
                    ->label('GN Office Name')->searchable()->filterable()->hide(),
                Column::name('contact')->filterable()->editable(),
                Column::name('al_year')->filterable()->editable(),
                Column::name('branches.name')->filterable()->label('Branch Name'),
                Column::name('status.status')
                    ->label('Current Status')->searchable()->filterable()->hide(),
                Column::callback(['id'], function ($id) {
                    return view('livewire.bss.student-table', ['id' => $id]);
                })
            ];
        }
        else{
            return [
                NumberColumn::name('id'),
                Column::name('name')->searchable()->editable()->filterable(),
                Column::name('ref_no')->searchable()->editable()->hide(),
                Column::name('schol_type')->searchable()->hide(),
                Column::name('schol_given_on')->searchable()->hide(),
                Column::name('ethnicity')->searchable()->hide()->filterable(),
                Column::name('nic')->searchable()->filterable()->hide(),
                Column::name('dsd_office.name')
                    ->label('DS Office Name')->searchable()->filterable()->hide(),
                Column::name('gn_office.name')
                    ->label('GN Office Name')->searchable()->filterable()->hide(),
                Column::name('contact')->filterable()->editable(),
                Column::name('al_year')->filterable()->editable()->hide(),
                Column::name('branches.name')->filterable()->label('Branch Name'),
                Column::name('status.status')
                    ->label('Current Status')->searchable()->filterable()->hide(),
                Column::callback(['id','confirmed_al_stream'], function ($id,$confirmed_al_stream) {
                    return view('livewire.bss.student-table', ['id' => $id,'confirmed_al_stream'=>$confirmed_al_stream]);
                })
            ];
        }

    }


}
