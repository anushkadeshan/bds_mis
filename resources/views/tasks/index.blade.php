
@extends('layouts.admin.master')
@section('title', 'Tasks')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Admin</li>
<li class="breadcrumb-item active">Tasks</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tasks</h1>
                    </div>
                    <div class="col-sm-6">
                        @can('Create Task')
                        <button
                            class="bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                        >
                            Add New
                        </button>
                        @endcan
                    </div>
                </div>
            </section>
            <div class="card-body">
                <div class="content px-3">
                    @can('View Task')
                    <livewire:task.task-table exportable/>
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Tasks Table</span>
                    </div>
                @endcan

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <livewire:task.create-task>
    </div>
</div>
@endsection

@section('script')
<script>
    window.addEventListener('openModal', event => {
        $("#exampleModal").modal('show');
    })

    window.addEventListener('closeModal', event => {
        $("#exampleModal").modal('hide');
    });
</script>
@endsection
