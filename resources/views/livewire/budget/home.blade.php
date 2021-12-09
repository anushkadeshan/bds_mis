<div>
    <div class="col-xl-12 xl-100 chart_data_left box-col-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="row m-0 chart-main">
                    <div class="col-xl-4 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart flot-chart-container" wire:ignore>
                                        <div class="chartist-tooltip" style="top: -0.1875px; left: 17px;"><span
                                                class="chartist-tooltip-value"></span></div>
                                                <i data-feather="settings"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body ml-5">
                                <div class="right-chart-content">
                                    <button type="button" wire:click="table" class="btn btn-success">Table View</button>
                                    <br><span>Add/Edit Budget Items</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart1 flot-chart-container" wire:ignore>
                                        <div class="chartist-tooltip" style="top: -17.1875px; left: -1.25px;"><span
                                                class="chartist-tooltip-value"></span></div>
                                                <i data-feather="list"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body ml-5">
                                <div class="right-chart-content">
                                    <button type="button"  wire:click="activity" class="btn btn-success">Activity View</button>
                                    <br><span>View Budget by Activities</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart2 flot-chart-container" wire:ignore>
                                        <div class="chartist-tooltip" style="top: -8.1875px; left: 12px;"><span
                                                class="chartist-tooltip-value"></span></div>
                                                <i data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body ml-5">
                                <div class="right-chart-content">
                                    <button type="button" wire:click="staff" class="btn btn-success">Staff View</button>
                                    <br><span>View Budget by Staff</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if($table)
    <div class="content">
        <div class="loading-overlay" wire:loading.class="is-active">
            <span class="fa fa-spinner fa-3x fa-spin"></span>
        </div>

        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Budget Items</h1>
                    </div>
                    <div class="col-sm-6">
                        @can('Create Budget')
                        <button
                            class="bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                        >
                            Add New
                        </button>
                        @endcan
                    </div>
                </div>
            </section>
            <div class="card-body">
                <div class="content px-3">
                    @can('View Budget')
                    <livewire:budget.budget-table exportable/>
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
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
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Opps!</strong>
            <span class="block sm:inline">You don't have permisision to View Thsi Section	</span>
        </div>
    @endcan

    @endif
</div>

