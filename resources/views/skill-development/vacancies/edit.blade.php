<x-app-layout>
    @section('title','Edit Vacancy')
    <div>
        <div class="max-w-9xl mx-auto py-6 sm:px-2 lg:px-4">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>Edit Vacancy - {{$vacancy['title']}}</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">
                <section class="p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <livewire:skill.vacancies.edit-vacancy :vacancy="$vacancy">
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
