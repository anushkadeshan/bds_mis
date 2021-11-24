
@extends('layouts.admin.master')
@section('title', 'Activity Completion Reports')

@section('css')
@endsection

@section('style')
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
<script src="{{asset('assets/admin/js/form-wizard/form-wizard-two.js')}}"></script>
@endsection
