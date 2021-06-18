<x-app-layout>
    @section('title','BSS Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <livewire:bss.dashboard.dashbord />
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">

                @if(!auth()->user()->hasRole(['Community Development coordinator', 'Youth Development coordinator']))
                <div class="grid grid-cols-2 gap-4">
                    <livewire:bss.dashboard.main-chart />
                    <livewire:bss.dashboard.running-chart />
                </div>
                @else
                <div class="grid grid-cols-1 gap-4">
                    <livewire:bss.dashboard.running-chart />
                </div>
                @endif


        </div>
    </div>
</x-app-layout>
