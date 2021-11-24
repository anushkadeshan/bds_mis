@extends('layouts.admin.master')
@section('title', 'Edit - '.$user->name)

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <h1>
                   Edit {{$user->name}}
                </h1>
            </section>
            <div class="card-body">
                <div class="content px-3">
                    @can('Edit Users')
                    <livewire:edit-users :user="$user" :branches="$branches" :roles="$roles" :permissions="$permissions" :dsDivisions="$dsDivisions">
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to Edit Users</span>
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
