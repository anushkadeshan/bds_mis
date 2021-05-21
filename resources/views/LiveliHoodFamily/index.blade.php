
<x-app-layout>

    <div >
        <div class="max-w-9xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Livelihood Families</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('house-hold-families.create')}}"><button
                                class="bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
                            >
                                Add New
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">
                <livewire:livelihoodfamily-table exportable>
            </div>
        </div>
    </div>
</x-app-layout>

