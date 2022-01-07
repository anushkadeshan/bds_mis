
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
<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')

@can('Create BDS CR')
<livewire:log-frame.create-completion-report/>
@else
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Opps!</strong>
    <span class="block sm:inline">You don't have permisision to Create Completion Reports</span>
</div>
@endcan

@endsection


@section('script')
<script src="{{asset('assets/admin/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/admin/js/dropzone/dropzone-script.js')}}"></script>
@endsection
