<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->id}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->title}}
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
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->budget->no_of_units}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->no_of_units}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    @php
    $units = (($row->no_of_units/$row->budget->no_of_units)*100)
    @endphp
    <div class="p-1 {{$units>110 || $units<90 ? 'bg-danger' : ''}}">

        {{number_format($units,2)}}%
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->budget->cost_per_unit*$row->budget->no_of_units}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->total_cost}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    @php
        $financial = ($row->total_cost/($row->budget->cost_per_unit*$row->budget->no_of_units)*100)
        @endphp
    <div class="p-1 {{$financial>110 || $financial<90 ? 'bg-danger' : ''}}">

        {{number_format($financial,2)}}%
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->completed_date}}
    </div>
</x-livewire-tables::table.cell>
