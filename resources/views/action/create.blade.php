<x-app-layout>
    <x-slot name="header">
        @include('headers.actions')
    </x-slot>

    <x-slot name="slot">
        <x-section>
            @livewire('action.create')
            @livewire('hive.choose-modal')
            @livewire('hive.details-modal')
            @livewire('bee-family.details-modal')
            @livewire('family-state.details-modal')
        </x-section>
    </x-slot>
</x-app-layout>
