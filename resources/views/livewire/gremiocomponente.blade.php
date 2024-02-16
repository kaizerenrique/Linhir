<div>
    <!-- targetas de informacion -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">            
            <div class="ml-4">
              <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Actividades en lista</h2>
              <p class="mt-2 text-sm dark:text-gray-200"></p>
            </div>
        </div>
        <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">            
            <div class="ml-4">
              <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Actividades realizadas</h2>
              <p class="mt-2 text-sm dark:text-gray-200"></p>
            </div>
        </div>
        <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">            
            <div class="ml-4">
              <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Nueva actividad</h2>
                <div class="flex items-center justify-end mt-4">  
                    <x-button class="ml-4" wire:click="modalgremio()">
                        {{ __('Registrar') }}
                    </x-button>
                </div>
            </div>
        </div>
    </div>



    <x-dialog-modal wire:model="modalAgregar">
        <x-slot name="title">
            Buscar Gremio
        </x-slot>

        <x-slot name="content">
            <div>
                <x-input id="buscar" class="block mt-1 w-full" type="search" name="buscar"
                    wire:model.live="buscar" placeholder="Buscar" />
            </div>
            <div class="mt-4">
                <!-- Tabla -->
                <div class="overflow-x-auto">
                    <div class="dark:bg-gray-800 shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr
                                    class="dark:bg-gray-800 dark:text-gray-100 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                </tr>
                            </thead>
                            @if ($gremios == false)
                            @else
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach ($gremios as $gremio)
                                        <tr class="border-b border-gray-200 hover:bg-gray-600 dark:text-gray-100"
                                            type="button" wire:click="detallesdegremio('{{ $gremio->Id }}')">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                {{ $gremio->Name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif

                        </table>
                    </div>
                </div>
                <!-- / Tabla -->
            </div>
            

        </x-slot>

        <x-slot name="footer">
            <div class="px-4 py-2 m-2">
                <x-secondary-button wire:click="" wire:loading.attr="disabled">
                    Agregar
                </x-secondary-button>
            </div>
            <div class="px-4 py-2 m-2">
                <x-danger-button class="ml-2" wire:click="$toggle('modalAgregar')" wire:loading.attr="disabled">
                    Cancelar
                </x-danger-button>
            </div>
        </x-slot>
    </x-dialog-modall>

    <x-dialog-modal wire:model="modalGremio">
        <x-slot name="title">
            @if ($alianza_gremio == null)
                {{ $nombre_gremio }}
            @else
                {{ $alianza_gremio }} {{ $nombre_gremio }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" value="{{ __('Escudo de Gremio') }}" />
                @if ($imagen)
                    <div class="col-span-2 sm:col-span-4 md:col-span-4">
                        <img class="mb-4 w-full" src="{{ $imagen->temporaryUrl() }}" alt="">
                    </div>
                @endif
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    para
                                    Subir
                                    archivo</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" wire:model.defer="imagen" />
                        <x-input-error for="imagen" class="mt-2" />
                    </label>
                </div>                   
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Nombre del Gremio') }}" />
                {{ $nombre_gremio }}
            </div>

            @if ($alianza_gremio)
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Alianza') }}" />
                    {{ $alianza_gremio }}
                </div>
            @endif

            <div class="mt-4">
                <x-label for="name" value="{{ __('Identificador') }}" />
                {{ $id_gremio }}
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Integrantes') }}" />
                {{ $miembros_gremio }}
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="px-4 py-2 m-2">
                <x-secondary-button wire:click="guardargremio()" wire:loading.attr="disabled">
                    Agregar
                </x-secondary-button>
            </div>
            <div class="px-4 py-2 m-2">
                <x-danger-button class="ml-2" wire:click="$toggle('modalGremio')" wire:loading.attr="disabled">
                    Cancelar
                </x-danger-button>
            </div>
        </x-slot>
    </x-dialog-modall>
</div>
