@extends('layouts.admin.master')
@section('title', 'View Field Sessions')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Field Sessions</li>
<li class="breadcrumb-item active">{{$session->client}}</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <h1>
                    View Field Sessions
                </h1>
            </section>
            <div class="card-body">
                <img src="data:image/jpg;base64, {{ $session->image }}" alt="Image Preview" />
                <div class="content px-3">
                    @can('View Sessions')
                    <div class="row">
                        <div class="col-md-6">
                            <livewire:mobile-app.view-session :session="$session"  />
                        </div>
                        <div class="col-md-6">
                            <div style="height: 500px;">
                                {!! Mapper::render() !!}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Sessions</span>
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
