<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    @if(auth()->user() && auth()->user()->isAdmin())

        @include('partials.admin-dashboard')

    @elseif(auth()->user()->isClient())

        @include('partials.client-dashboard')
        
    @endif
</x-app-layout>
