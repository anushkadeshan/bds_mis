@extends('layouts.admin.master')
@section('title', 'Field Sessions')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Mobile App</li>
<li class="breadcrumb-item active">Field Sessions</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        @if(session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{ session('message') }}</p>
            </div>
            @endif
        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Field Sessions <span class="inline-flex items-center justify-center px-3 py-2 mr-2 text-lg font-bold leading-none text-red-100 bg-red-600 rounded-full">{{$count}}</span></h1>
                    </div>
                </div>
            </section>
            <div class="card-body">
                <div class="content px-3">
                    @can('View Sessions')
                    <livewire:mobile-app.session-table exportable hideable="select" />
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Sessions table</span>
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
