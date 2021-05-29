<x-app-layout>
    <div>
        <div class="max-w-9xl mx-auto py-6 sm:px-2 lg:px-4">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Vacancies</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('vacancies.create')}}" target="_blank">
                                <button
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
                <section class="p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <livewire:skill.employers.vacancy-table exportable/>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
