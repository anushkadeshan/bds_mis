<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->id}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->epf}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->title}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->full_name}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->date_of_birth}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->branch}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->mobile_number}}
    </div>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell class="hidden md:table-cell">
    <div>
        {{$row->company}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <a href="#" wire:click.prevent="delete({{ $row->id }})" class="text-red-600 font-large hover:text-red-900">
        <i class="fa fa-trash fa-2x"></i>
    </a>
</x-livewire-tables::table.cell>
