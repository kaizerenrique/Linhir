<div>
    <p class="m-4 dark:text-gray-200">Hola Mundo XD</p>

    <!-- Name -->
    <div class="col-span-6 sm:col-span-4">
        <x-label for="name" value="{{ __('Name') }}" />
        <x-input id="buscar" type="text" class="mt-1 block w-full" wire:model="buscar" autocomplete="buscar" />
        <x-input-error for="buscar" class="mt-2" />
    </div>
    @if (!empty($resultados))
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 dark:text-gray-200 align-middle border border-solid dark:border-gray-500 py-3 text-base uppercase border-l-0 
                    border-r-0 whitespace-nowrap font-semibold text-left">
                        Nombre
                    </th>
                    <th class="px-4 dark:text-gray-200 align-middle border border-solid dark:border-gray-500 py-3 text-base uppercase border-l-0 
                    border-r-0 whitespace-nowrap font-semibold text-left">
                        Nombre de Gremio
                    </th>
                    <th class="px-4 dark:text-gray-200 align-middle border border-solid dark:border-gray-500 py-3 text-base uppercase border-l-0 
                    border-r-0 whitespace-nowrap font-semibold text-left">
                        Nombre de Alianza
                    </th>
                </tr>
            </thead>
            <tbody>


                @foreach ($resultados as $resultado)
                    <tr class="dark:text-gray-200">
                        <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                            {{ $resultado->Name }}
                        </td>
                        <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                            @if (!empty($resultado->GuildName))
                                {{ $resultado->GuildName }}
                            @endif
                        </td>
                        <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4 text-left">
                            @if (!empty($resultado->AllianceName))
                                {{ $resultado->AllianceName }}
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    @else
    @endif



    <x-secondary-button wire:click="consultarpersonaje()" wire:loading.attr="disabled">
        {{ __('Modal') }}
    </x-secondary-button>

    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model="modalpersonaje">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}


        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalpersonaje')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
