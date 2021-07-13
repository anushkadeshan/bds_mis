<x-app-layout>

    <div>
        <div class="max-w-9xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Insurance Schema</h1>
                        </div>
                        @can('Create BDS CR')
                        <div class="col-sm-6">
                            <a href="{{route('insurances.create')}}"><button
                                class="bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
                            >
                                Add New
                            </button>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
            </section>
            <div class="content px-3">
                @can('View BDS CR')
                <livewire:insuarance-table exportable>
                @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Opps!</strong>
                    <span class="block sm:inline">You don't have permisision to view completion reports</span>
                </div>
                @endcan

            </div>
        </div>
    </div>
</x-app-layout>
