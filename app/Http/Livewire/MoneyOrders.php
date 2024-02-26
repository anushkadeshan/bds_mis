<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MoneyOrders extends LivewireDatatable
{
    public $model = LivelihoodFamily::class;

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return LivelihoodFamily::query()->leftJoin('dsd_office', 'dsd_office.id', 'livelihood_families.dsd_id')->where('branch_id',Auth::user()->branch_id)->orderBy('money_order_giving_photo', 'desc')->whereNotNull('money_order_giving_photo');
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return LivelihoodFamily::query()->leftJoin('dsd_office', 'dsd_office.id', 'livelihood_families.dsd_id')->whereIn('branch_id',json_decode(Auth::user()->branches))->orderBy('money_order_giving_photo', 'desc')->whereNotNull('money_order_giving_photo');
        }
        else{
            return LivelihoodFamily::query()->leftJoin('dsd_office', 'dsd_office.id', 'livelihood_families.dsd_id')->whereNotIn('branch_id',[9,10,11,4])->orderBy('money_order_giving_photo', 'desc')->whereNotNull('money_order_giving_photo');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->searchable(),
            Column::name('hh_name')->searchable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable(),
            Column::name('village')->searchable(),
            Column::callback(['profile_picture'], function ($link) {
                return view('livewire.money-orders', ['link' => $link]);
            })->label('Profile Picture')->alignCenter(),
            Column::callback(['money_order_giving_photo'], function ($link) {
                return view('livewire.money-orders2', ['link' => $link]);
            })->label('Offer')->alignCenter(),
            Column::callback(['covid_relief_money_order'], function ($link) {
                return view('livewire.money-orders3', ['link' => $link]);
            })->label('Document')->alignCenter(),

        ];
    }

}
