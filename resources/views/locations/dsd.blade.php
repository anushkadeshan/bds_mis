
<x-app-layout>
    @section('title','DSD Divisions')
    <div >
        <div class="max-w-9xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DS Divisions</h1>
                        </div>
                        <div class="col-sm-6">
                            <button
                                class="bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
                                data-toggle="modal" data-target="#exampleModal"
                            >
                                Add New
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">
                <livewire:dsd-table exportable hide="province">
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <livewire:ds-create>
    </div>
</x-app-layout>

