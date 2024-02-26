@if ($this->showBulkActionsDropdown)
<div class="mb-3 mb-md-0" id="{{ $bulkKey = \Illuminate\Support\Str::random() }}-bulkActionsWrapper">
    <div class="dropdown d-block d-md-inline">
        <button style="width: 120px;" class="btn dropdown-toggle d-block w-120 d-md-inline" type="button"
            id="{{ $bulkKey }}-bulkActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-4 w-120">
                @lang('Bulk Actions')
            </span>

        </button>

        <div class="text-white bg-gray-600 dropdown-menu dropdown-menu-end w-100" aria-labelledby="{{ $bulkKey }}-bulkActions">
            @foreach($this->bulkActions as $action => $title)
            <a href="#" wire:click.prevent="{{ $action }}" wire:key="bulk-action-{{ $action }}" class="dropdown-item">
                {{ $title }}
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif
