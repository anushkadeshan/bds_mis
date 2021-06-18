<x-app-layout>
    @section('title','Edit BSS Students')

    <div>
        <div class="max-w-9xl mx-auto py-6 sm:px-2 lg:px-4">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit BSS Student</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">
                <section class="p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    
                    @if(empty($id))
                        <livewire:bss.edit-student :id="null"/>
                    @else
                        <livewire:bss.edit-student :id="$id"/>
                    @endif
                   
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
