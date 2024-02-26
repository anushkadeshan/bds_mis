<?php

namespace App\Http\Livewire;

use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivelihoodfamilyTable extends LivewireDatatable
{


    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $gnds = Auth::user()->gnds;
            return LivelihoodFamily::query()->whereIn('gn_id',json_decode($gnds));
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff', 'District Represetnative'])){
            $gnds = Auth::user()->gnds;
            return LivelihoodFamily::query()->whereIn('gn_id',json_decode($gnds));
        }
        else{
            return LivelihoodFamily::query();
        }


    }

    protected $listners = ['refreshLivewireDatatable' => 'columns'];


    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('district')->searchable(),
            Column::name('date_of_interviewed')->searchable(),
            Column::name('village')->searchable(),
            Column::name('hh_name')->searchable(),
            Column::name('hh_contact')->searchable(),


            Column::callback(['id'], function ($id) {
                return view('livewire.livelihoodfamily-table', ['id' => $id]);
            })
        ];
    }
}
