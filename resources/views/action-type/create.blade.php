<x-app-layout>
    <x-slot name="header">
        @include('headers.action-types')
    </x-slot>

    <x-slot name="slot">
        <x-section>
            @livewire('action-type.create')

        </x-section>
    </x-slot>
</x-app-layout>
