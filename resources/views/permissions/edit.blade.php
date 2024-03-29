@extends('layouts.admin.master')
@section('title', 'User Permissions')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Permissions</li>
<li class="breadcrumb-item active">{{$permission->name}}</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit  - {{$permission->name}} </h1>
                    </div>

                </div>
            </section>
            <div class="card-body">
                <div class="content px-3">
                    @can('Edit Permissions')
                    <livewire:permission-edit :permission="$permission" :roles="$roles">
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Permissions</span>
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
