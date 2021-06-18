<x-app-layout>
    @section('title','BDS-MIS Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
