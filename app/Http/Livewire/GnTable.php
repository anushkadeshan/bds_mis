<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GnOffice;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class GnTable extends LivewireDatatable
{
    use LivewireAlert;
    public $selected = [];
    public $model = GnOffice::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return GnOffice::query()->leftJoin('dsd_office', 'dsd_office.id', 'gn_office.dsd_id')->orderBy('is_working');
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id'),
            Column::name('name')->searchable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable(),
            BooleanColumn::name('is_working')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.gn-table', ['id' => $id]);
            })
        ];
    }

    public function updatedSelected($value){
        $this->emit('selected', $this->selected);
    }
}
