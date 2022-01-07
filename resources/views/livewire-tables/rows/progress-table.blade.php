<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->id}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{date('Y', strtotime($row->completed_date))}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->dsd->name}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->gnd->name}}
    </div>
</x-livewire-tables::table.cell>
