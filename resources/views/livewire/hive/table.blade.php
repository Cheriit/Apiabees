<div>
    <x-flash/>
    <div class="grid grid-cols-6 gap-6 p-3">
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="filter_apiary_code_name" value="Filter by apiary:" />
            <x-select for="filter_apiary_code_name" wire:model="filter_apiary_code_name" :options="$filter_apiary_code_name_dropdown"  />
            <x-jet-input-error for="filter_apiary_code_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="filter_state" value="Filter by state:" />
            <x-select for="filter_state" wire:model="filter_state" :options="$filter_state_dropdown"  />
            <x-jet-input-error for="filter_state" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="filter_nfc" value="{{ __('Filter by NFC tag') }}" />
            <x-jet-input id="filter_nfc" type="text" class="mt-1 block w-full" wire:model="filter_nfc" autocomplete="filter_nfc"/>
            <x-jet-input-error for="filter_nfc" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="filter_qr" value="{{ __('Filter by QR code') }}" />
            <x-jet-input id="filter_qr" type="text" class="mt-1 block w-full" wire:model="filter_qr" autocomplete="filter_qr"/>
            <x-jet-input-error for="filter_qr" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label  value="{{ __('Load last scan') }}" />
            <x-jet-secondary-button wire:click="loadScanNFCQR()" wire:loading.attr="disabled" class="mt-1">
                {{ __('Load') }}
            </x-jet-secondary-button>
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-secondary-button wire:click="resetFilters()" wire:loading.attr="disabled" class="mt-7">
                {{ __('Reset') }}
            </x-jet-secondary-button>
        </div>
        <div class="col-span-6 sm:col-span-4">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <tr>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                ID
            </th>


            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Apiary code name
            </th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                location row
            </th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                location column
            </th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                state
            </th>
            <th class="pr-4 py-3 bg-gray-50"></th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

        @foreach($hives as $hive)
            <div>
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 font-medium text-gray-900">
                                    {{$hive->id}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 font-medium text-gray-900">
                                    @if($hive->apiary_code_name!=null)
                                    {{$hive->apiary_code_name}}
                                    @else
                                        <i>Unassigned</i>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 font-medium text-gray-900">
                                    @if($hive->location_row!=null)
                                        {{$hive->location_row}}
                                    @else
                                        <i>Unassigned</i>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 font-medium text-gray-900">
                                    @if($hive->location_column!=null)
                                        {{$hive->location_column}}
                                    @else
                                        <i>Unassigned</i>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 font-medium text-gray-900">
                                    @if($hive->bee_family_id!=null)
                                        Occupied
                                    @else
                                        Empty
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="pr-4 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <a href="#" class="text-green-400 hover:text-green-900"
                           wire:click="openHiveEditModal('{{$hive->id}}')" wire:loading.attr="disabled"><i
                                class="fas fa-edit pr-2"></i>Edit</a>
                        <a href="#" class="text-gray-400 hover:text-gray-900"
                           wire:click="openHiveDetailsModal('{{$hive->id}}')" wire:loading.attr="disabled"><i
                                class="fas fa-address-card pl-2 pr-2"></i>Details</a>
                        <a href="#" class="text-red-600 hover:text-red-900"
                           wire:click="openHiveDeleteModal('{{$hive->id}}')" wire:loading.attr="disabled"><i
                                class="fas fa-times pl-2 pr-2"></i>Delete</a>
                    </td>
                </tr>
            </div>
        @endforeach
        </tbody>
    </table>
    <div class="p-3">
        {{ $hives->links() }}
    </div>
</div>
