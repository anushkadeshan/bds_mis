<x-app-layout>
    @section('title','All BSS Students')

    <div>
        <div class="max-w-9xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>All BSS Students <span class="inline-flex items-center justify-center px-3 py-2 mr-2 text-lg font-bold leading-none text-red-100 bg-red-600 rounded-full">{{$count}}</span></h1>
                        </div>
                        @can('Create Student')
                        <div class="col-sm-6">
                            <a href="{{route('students.create')}}"><button
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
                @can('View Student')
                    <livewire:bss.student-table exportable hideable="select" />
                @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Opps!</strong>
                    <span class="block sm:inline">You don't have permisision to View BSS table</span>
                </div>
                @endcan

            </div>
        </div>
    </div>
</x-app-layout>
