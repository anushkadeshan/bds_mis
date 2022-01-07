@extends('layouts.admin.master')
@section('title', 'Log Frame')
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css">
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
<li class="breadcrumb-item active">Log Frame</li>
@endsection

@section('content')
<div class="container mt-3">
    @can('View Reports')
    <livewire:reports.logframe.table />
    @else
    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <strong class="font-bold">Opps!</strong>
        <span class="block sm:inline">You don't have permission to View Log Frame </span>
    </div>
    @endcan
</div>
@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.2/extensions/filter-control/bootstrap-table-filter-control.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.2/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
@endsection
