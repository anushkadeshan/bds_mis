<?php

namespace App\Http\Livewire\Progress;

use App\Models\Program\Progress;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProgressTable extends LivewireDatatable
{
    public $model = Progress::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return Progress::query()->where('added_by',Auth::user()->id)->leftJoin('users','users.id', '=', 'progress.added_by');
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return Progress::whereIn('branch_id',json_decode(Auth::user()->branches))->leftJoin('users','users.id' , '=', 'progress.added_by');
        }
        else{
            return Progress::query()->leftJoin('users','users.id', '=', 'progress.added_by');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('activity_code')->searchable(),
            Column::name('year')->searchable(),
            Column::name('no_of_units')->label('No of Units Completed'),
            Column::name('cost_per_unit')->label('Cost per Units Completed'),
            DateColumn::name('completed_date')->label('Activity Completed Date'),
            Column::name('users.name')->label('Added By'),
            BooleanColumn::name('Approved'),
            Column::callback(['id'], function ($id) {
                return view('livewire.progress.progress-table', ['id' => $id]);
            })
        ];
    }

    public function edit($id){
        $this->emit('editBudget', $id);
    }

}
