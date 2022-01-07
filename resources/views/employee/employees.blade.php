@extends('layouts.admin.master')
@section('title', 'Employees')

@section('css')
<style>
    .loading-overlay {
        display: none;
        background: rgba(255, 255, 255, 0.7);
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        z-index: 9998;
        align-items: center;
        justify-content: center;
    }

    .loading-overlay.is-active {
        display: flex;
    }
</style>
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Employees</li>
<li class="breadcrumb-item active">Table</li>
@endsection

@section('content')
<div class="container mt-3">
    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Employees</h1>
                    </div>
                    <div class="col-sm-6">
                        @can('Create Employees')
                        <button data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"
                            class="float-right p-2 m-2 text-white transition-all duration-300 bg-blue-600 shadow-lg w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring hover:shadow-none">
                            Add New
                        </button>
                        @endcan
                        @can('View Employees')
                        <a href="{{route('employees.create')}}">
                            <button
                                class="float-right p-2 m-2 text-white transition-all duration-300 bg-green-600 shadow-lg rounded-10 hover:bg-green-700 focus:outline-none focus:ring hover:shadow-none">
                                View Sent Birthday Wishes
                            </button>
                        </a>
                        @endcan
                    </div>
                </div>
            </section>
            <div class="card-body">
                <div class="px-3 content">
                    @can('View Employees')
                    <livewire:employee-table />
                    @else
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Employee Table </span>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add an Employee</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="px-3 content">
                        @can('View Employees')
                        <livewire:add-employee />
                        @else
                        <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                            role="alert">
                            <strong class="font-bold">Opps!</strong>
                            <span class="block sm:inline">You don't have permisision to Add Employee </span>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
