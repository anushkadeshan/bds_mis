
@extends('layouts.admin.master')
@section('title', 'Dashboard')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        @role('Regional Manager')
            <livewire:dashboards.regional-manager />
        @endrole

        @hasanyrole('Youth Development coordinator|Community Development coordinator')
        <livewire:dashboards.field-officer />
        @endhasanyrole
    </div>
</div>
@endsection

@section('script')

@endsection
