<?php

namespace App\Http\Livewire\LogFrame;

use Illuminate\Support\Facades\Auth;
use App\Models\Program\CompletionReport;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CompletionReportTable extends LivewireDatatable
{
    public $model = CompletionReport::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return CompletionReport::query()->where('completion_reports.added_by',Auth::user()->id)->leftJoin('budgets', 'budgets.id', 'completion_reports.budget_id')->leftJoin('dsd_office', 'dsd_office.id', 'completion_reports.dsd');

        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return CompletionReport::query()->whereIn('completion_reports.added_by',json_decode(Auth::user()->subordinates))->where('is_draft',false)->leftJoin('budgets', 'budgets.id', 'completion_reports.budget_id')->leftJoin('dsd_office', 'dsd_office.id', 'completion_reports.dsd');
        }
        else{
            return CompletionReport::query()->leftJoin('budgets', 'budgets.id', 'completion_reports.budget_id')->leftJoin('dsd_office', 'dsd_office.id', 'completion_reports.dsd');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('responsible_officer')->searchable(),
            Column::name('budgets.boarder_activity')->searchable(),
            Column::name('financial_year')->searchable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable(),
            Column::name('date_of_start'),
            Column::name('date_of_end'),
            BooleanColumn::name('isReviewed'),
            BooleanColumn::name('isApproved'),
            Column::callback(['id'], function ($id) {
                return view('livewire.log-frame.completion-report-table', ['id' => $id]);
            })
        ];
    }

}
