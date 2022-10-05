<?php

namespace App\Http\Livewire\Moneyorder;

use App\Models\EconomicCrisis;
use Livewire\Component;
use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class EconomicCrisisTable extends LivewireDatatable
{
    public $model = EconomicCrisis::class;

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return EconomicCrisis::query()->leftJoin('livelihood_families', 'livelihood_families.id', 'economic_crises.livelihood_family_id')->leftJoin('dsd_office', 'dsd_office.id', 'livelihood_families.dsd_id')->where('branch_id',Auth::user()->branch_id)->orderBy('money_order_offer_picture', 'desc')->whereNotNull('money_order_offer_picture');
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return EconomicCrisis::query()->leftJoin('livelihood_families', 'livelihood_families.id', 'economic_crises.livelihood_family_id')->leftJoin('dsd_office', 'dsd_office.id', 'livelihood_families.dsd_id')->whereIn('branch_id',json_decode(Auth::user()->branches))->orderBy('money_order_offer_picture', 'desc')->whereNotNull('money_order_offer_picture');
        }
        else{
            return EconomicCrisis::query()->leftJoin('livelihood_families', 'livelihood_families.id', 'economic_crises.livelihood_family_id')->leftJoin('dsd_office', 'dsd_office.id', 'livelihood_families.dsd_id')->whereNotIn('branch_id',[9,10,11,4])->orderBy('money_order_offer_picture', 'desc')->whereNotNull('money_order_offer_picture');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->searchable(),
            Column::name('livelihood_families.hh_name')->searchable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable(),
            Column::name('livelihood_families.village')->searchable(),
            Column::callback(['money_order_offer_picture'], function ($link) {
                return view('livewire.money-orders2', ['link' => $link]);
            })->label('Offer')->alignCenter(),
            Column::callback(['money_order_scanned_copy'], function ($link) {
                return view('livewire.money-orders3', ['link' => $link]);
            })->label('Document')->alignCenter(),

        ];
    }

    //public function render()
    //{
    //    return view('livewire.moneyorder.economic-crisis-table');
    //}
}
