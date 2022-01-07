@extends('layouts.admin.master')
@section('title', 'Activity Completion Reports')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/dropzone.css')}}">
@endsection

@section('style')
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

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Activity Completion Reports</li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

@can('Create BDS CR')

<livewire:log-frame.edit-completion-report :completionReport="$completion_report" />
@else
<div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
    <strong class="font-bold">Opps!</strong>
    <span class="block sm:inline">You don't have permisision to Edit Completion Reports</span>
</div>
@endcan

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
