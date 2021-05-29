<x-app-layout>
    <div>
        <div class="max-w-9xl mx-auto py-6 sm:px-2 lg:px-4">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Course - {{$course['name']}}</h1>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">
                <section class="p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <livewire:skill.courses.edit-courses :course="$course">
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
