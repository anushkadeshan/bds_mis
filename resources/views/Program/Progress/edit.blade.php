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
<li class="breadcrumb-item active">Progress Edit</li>
@endsection

@section('content')
<div class="container mt-3">
    <livewire:progress.edit-progress :progress="$progress" />
</div>
@endsection
