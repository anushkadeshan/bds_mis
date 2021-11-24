

@extends('layouts.admin.master')
@section('title', 'Livelihood Families')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Livelihood Families</li>
<li class="breadcrumb-item active">All</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Livelihood Families <span class="inline-flex items-center justify-center px-3 py-2 mr-2 text-lg font-bold leading-none text-red-100 bg-red-600 rounded-full">{{$count}}</span></h1>
                    </div>
                    @can('Create Livelihood Family')
                    <div class="col-sm-6">
                        <a href="{{route('house-hold-families.create')}}"><button
                            class="bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
                        >
                            Add New
                        </button>
                        </a>
                    </div>
                    @endcan
                </div>
            </section>
            <div class="card-body">
                <div class="content px-3">
                    @can('View Livelihood Family')
                    <livewire:livelihoodfamily-table exportable>
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Family</span>
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
