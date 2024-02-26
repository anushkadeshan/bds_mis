@extends('layouts.admin.master')
@section('title', 'Progress')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/datatables.css')}}">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/select2.css')}}">
<style type="text/css">
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
<style type="text/css">
    a.comment-indicator:hover+comment {
        background: #ffd;
        position: absolute;
        display: block;
        border: 1px solid black;
        padding: 0.5em;
    }

    a.comment-indicator {
        background: red;
        display: inline-block;
        border: 1px solid black;
        width: 0.5em;
        height: 0.5em;
    }

    comment {
        display: none;
    }
</style>
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Reports</li>
<li class="breadcrumb-item active">Progress</li>
@endsection

@section('content')
<div class="container mt-3">
    @can('View Reports')
    <div class="card">
        <div class="p-4 card-header">
            <h5>Progress</h5>
        </div>
        <div class="p-4 card-body">
            <livewire:reports.progress.progress-table />
        </div>
    </div>

    @else
    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <strong class="font-bold">Opps!</strong>
        <span class="block sm:inline">You don't have permissions to View Reports </span>
    </div>
    @endcan
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('assets/admin/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/admin/js/select2/select2-custom.js')}}"></script>
@endsection
