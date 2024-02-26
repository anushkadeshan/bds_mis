
@extends('layouts.admin.master')
@section('title', 'Log Frame Outcomes')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Log Frame</li>
<li class="breadcrumb-item active">Out Comes</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Outcomes</h1>
                    </div>
                    <div class="col-sm-6">
                        @can('Create Logframe Activity')
                        <button
                            class="float-right p-2 m-2 text-white transition-all duration-300 bg-blue-600 shadow-lg w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring hover:shadow-none"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                        >
                            Add New
                        </button>
                        @endcan
                    </div>
                </div>
            </section>
            <div class="card-body">
                <div class="px-3 content">
                    @can('View Logframe Activity')
                    <livewire:log-frame.outcome-table exportable/>
                    @else
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Logframe Activity	</span>
                    </div>
                @endcan

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <livewire:log-frame.create-outcome>
    </div>
</div>
@endsection

@section('script')

@endsection
