<x-app-layout>
    @section('title','Activity Log')
    <div >
        <div class="max-w-9xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Notifications</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">
                <livewire:all-notifications/>
            </div>
        </div>
    </div>

</x-app-layout>

