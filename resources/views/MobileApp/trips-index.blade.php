@extends('layouts.admin.master')
@section('title', 'View Field Trips')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Field Trips</li>
<li class="breadcrumb-item active">All</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            View Field Trips
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('trip-detail-view')}}"><button
                            class="float-right  text-white p-2 btn btn-success m-2"
                        >
                        <i class="fa fa-list"></i> Detail View
                        </button></a>
                    </div>
                </div>
            </section>
            <div class="card-body">
                <div class="content px-3">
                    @can('View Sessions')
                    <div class="row">
                        <div class="col-md-12">
                            <livewire:mobile-app.trip-table />
                        </div>
                    </div>
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Trips</span>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
