@extends('layouts.admin.master')
@section('title', 'View Field Trips')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/rating.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Field Trips</li>
<li class="breadcrumb-item active">Derail View</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1>
                            View Field Trips
                        </h1>
                    </div>

                    <div class="col-sm-2">
                        <a href="{{route('trips.index')}}"><button
                            class="float-right  text-white p-2  btn btn-success m-2"
                        >
                          <i class="fa fa-table"></i>  Table View
                        </button></a>
                    </div>
                </div>
            </section>
            <div class="card-body p-0">
                <div class="content px-3">
                    @can('View Sessions')
                    <div class="row">
                        <div class="col-md-12">
                            <livewire:mobile-app.trip-detail-view />
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('assets/admin/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/js/rating/jquery.barrating.js')}}"></script>
<script src="{{asset('assets/admin/js/rating/rating-script.js')}}"></script>
<script src="{{asset('assets/admin/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/admin/js/ecommerce.js')}}"></script>
<script src="{{asset('assets/admin/js/product-list-custom.js')}}"></script>

admin/@endsection
