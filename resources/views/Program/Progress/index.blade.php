
@extends('layouts.admin.master')
@section('title', 'Progress')

@section('css')
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
<li class="breadcrumb-item">Program</li>
<li class="breadcrumb-item active">Progress</li>
@endsection

@section('content')
<div class="container mt-3">

    <div class="content">
        <div class="card">
            <section class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Progress</h1>
                    </div>
                    <div class="col-sm-6">
                        @can('Create Progress')
                        <button
                            class="bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                        >
                            Add New
                        </button>
                        @endcan
                    </div>
                </div>
            </section>
            <div class="card-body p-0">
                <div class="content px-3">
                    @can('View Progress')
                    <livewire:progress.progress-table />
                    @else
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">You don't have permisision to View Progress Table	</span>
                    </div>
                @endcan

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <livewire:progress.create-progress>
    </div>
</div>
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
