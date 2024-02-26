<x-app-layout>
    @section('title','ViewField Session')
    <div>
        <div class="max-w-9xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>View Field Session </h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">
                @can('View Sessions')
                <div class="row">
                    <div class="col-md-6">
                        <livewire:mobile-app.view-session />
                    </div>
                    <div class="col-md-6">
                        <div style="width: 500px; height: 500px;">
                            {!! Mapper::render() !!}
                        </div>
                    </div>
                </div>


                @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Opps!</strong>
                    <span class="block sm:inline">You don't have permisision to View Sessions</span>
                </div>
                @endcan

            </div>
        </div>
    </div>
</x-app-layout>
