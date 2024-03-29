<x-app-layout>
    @section('title','Activity Log')
    <div >
        <div class="max-w-9xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Activity Logs</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">
                <livewire:activity-log-table exportable/>
            </div>
        </div>
    </div>

</x-app-layout>

