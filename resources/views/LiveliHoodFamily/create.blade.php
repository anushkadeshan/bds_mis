@extends('layouts.admin.master')
@section('title', 'Livelihood Families - New')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Livelihood Families</li>
<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <h1>Livelihood Families - New</h1>
                </div>
            </section>
            <div class="card-body">
                <div class="content px-3">
                    @can('Create Livelihood Family')
                    <livewire:create-livelihoodfamily wire:loading.delay>
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to Create Livelihood Family</span>
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
