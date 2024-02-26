<?php

namespace App\Http\Livewire\Skill\Families;

use App\Models\DsOffice;
use App\Models\skill\Family;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class FamilyTable extends LivewireDatatable
{
    public $model = Family::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return Family::query()->leftJoin('dsd_office','dsd_office.id', 'families.ds_division')->leftJoin('gn_office','gn_office.id', 'families.gn_division');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('head_of_household')->searchable()->editable(),
            Column::name('district')->searchable()->editable(),
            Column::name('dsd_office.name')
                ->label('DS Name')->searchable(),
            Column::name('gn_office.name')
                ->label('GN Name')->searchable(),
            Column::name('nic_head_of_household')->searchable()->editable(),
            Column::name('family_type')->searchable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.skill.families.family-table', ['id' => $id]);
            })
        ];
    }

}
