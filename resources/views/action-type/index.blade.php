<x-app-layout>
    <x-slot name="header">
        @include('headers.action-type')
    </x-slot>

    <x-slot name="slot">
        <x-section>
            @livewire('action-type.table')
            @livewire('action-type.delete-modal')
        </x-section>
    </x-slot>
</x-app-layout>