<div>
    @if($table)
    <div class="content">
        <div class="loading-overlay" wire:loading.class="is-active">
            <span class="fa fa-spinner fa-3x fa-spin"></span>
        </div>

        <div class="card">
            <section class="card-header">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>All Budget Items</h1>
                    </div>
                    <div class="col-sm-6">
                        @can('Create Budget')
                        <button
                            class="float-right p-2 m-2 text-white transition-all duration-300 bg-blue-600 shadow-lg w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring hover:shadow-none"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                        >
                            Add New
                        </button>
                        @endcan
                    </div>
                </div>
            </section>
            <div class="card-body">
                <div class="px-3 content">
                    @can('View Budget')
                    <livewire:budget.budget-table exportable/>
                    @else
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Budget Table	</span>
                    </div>
                @endcan
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <livewire:budget.create-budget>
    </div>
    @endif
    @if($activity)
    <livewire:budget.activity-view>
    @endif
    @if($staff)
    @can('Access Staff Budget View')
        <livewire:budget.staff-view>
        @else
        <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
            <strong class="font-bold">Opps!</strong>
            <span class="block sm:inline">You don't have permisision to View Thsi Section	</span>
        </div>
    @endcan

    @endif
</div>

