<div>
    <!-- targetas de informacion -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="ml-4">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Gremios Registrados</h2>
                <p class="mt-2 text-sm dark:text-gray-200">{{ $num }}</p>
            </div>
        </div>
        <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="ml-4">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Activos</h2>
                <p class="mt-2 text-sm dark:text-gray-200">{{ $acti }}</p>
            </div>
        </div>
        <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="ml-4">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Nuevo Gremio</h2>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4" wire:click="modalgremio()">
                        {{ __('Registrar') }}
                    </x-button>
                </div>
            </div>
        </div>
    </div>

            <!-- Lista de Actividades -->
            <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- cabecera, titulo, búsquedas y límite de lista -->
                <div class="flex flex-wrap items-center px-4 py-2">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">Lista de
                            Actividades</h3>
                    </div>
                    <div class="flex flex-col items-center w-full max-w-xl">
                        <x-input class="block mt-1 w-100" type="search" wire:model="buscar" placeholder="Buscar" />

                    </div>
                    <div>
                        <div class="flex-1 text-right">
                            <label class="inline-flex items-center mt-3 ">
                                <span
                                    class="mr-2 font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">Activas:
                                </span>
                                <x-checkbox class="rounded-full" name="activo" wire:model="activo" />
                            </label>
                        </div>
                    </div>
                    <div class="relative w-full max-w-full flex-grow flex-1 text-right mt-1">
                        <select wire:model.live="lim"
                            class="w-25 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-500 rounded-md shadow-sm">
                            <option value="6" selected>6</option>
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                        </select>
                    </div>
                </div>
                <!-- mensaje -->
                <div>
                    @if (session()->has('message'))
                        <div class="max-w-lg mx-auto">
                            <div class="flex bg-emerald-100 rounded-lg p-4 mb-4 text-sm text-emerald-700"
                                role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="stroke-current flex-shrink-0 h-5 w-5 mr-3" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div>
                                    <span class="font-medium">{{ session('message') }}</span>.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- / mensaje -->

                <!-- tabla -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Escudo</th>
                                    <th class="px-4 py-3">Nombre</th>
                                    <th class="px-4 py-3">ID de Albion</th>
                                    <th class="px-4 py-3">Estado</th>
                                    <th class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($guilds as $guild)
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left ">
                                            <div class="relative inline-block shrink-0 rounded-2xl me-3">
                                                <img src="{{ $guild->escudo}}" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                                            </div>
                                        </th>
                                        <th
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            {{ $guild->nombre_gremio }}
                                        </th>

                                        <th
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            {{ $guild->id_gremio }}
                                        </th>

                                        <th
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            @switch($guild->estado)
                                                @case(0)
                                                    <span
                                                        class="bg-pink_salmon dark:text-maroon_oak text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">Inactivo</span>
                                                @break

                                                @case(1)
                                                    <span
                                                        class="bg-malachite dark:text-deep_fir text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">Active</span>
                                                @break

                                                @default
                                            @endswitch
                                        </th>

                                        <th
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
                                            <div class="flex item-center justify-center">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                    wire:click="">
                                                    <a href="{{ route('gremio', $guild->id_gremio) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                    </a>
                                                </div>

                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                    wire:click="verdetalles({{ $guild->id }})">                                                    
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>                                                    
                                                </div>

                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                    wire:click="consultaeliminar({{ $guild->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9
                         dark:text-gray-300 dark:bg-gray-800">
                        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                            {{ $guilds->links() }}
                        </span>
                    </div>
                </div>
                <!-- \tabla -->

            </div>
    <!-- Buscar Gremio Modal-->
        <x-dialog-modal wire:model="modalAgregar">
                <x-slot name="title">
                    Buscar Gremio
                </x-slot>
        
                <x-slot name="content">
                    <div>
                        <x-input id="buscar" class="block mt-1 w-full" type="search" name="buscar" wire:model.live="buscar"
                            placeholder="Buscar" />
                    </div>
                    <div class="mt-4">
                        <!-- Tabla -->
                        <div class="overflow-x-auto">
                            <div class="dark:bg-gray-800 shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="dark:bg-gray-800 dark:text-gray-100 uppercase text-sm leading-normal">
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
    <!-- /Buscar Gremio Modal-->

    <!-- Agregar Gremio Modal-->
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
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="font-semibold">Click
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
                <x-input-error for="id_gremio" class="mt-2" />
                {{ $id_gremio }}
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Integrantes') }}" />
                {{ $miembros_gremio }}
            </div>
            <div class="mt-4">
                <x-label for="name" value="{{ __('Activar') }}" />
                <x-checkbox class="mt-2" name="estado" id="estado" wire:model.defer="estado" required />
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
    <!-- / Agregar Gremio Modal-->


    <!-- Seccion que contiene el modal para eliminar -->
    <x-confirmation-modal wire:model="confirmarEliminar">
        <x-slot name="title">
            Borrar Gremio
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de querer borrar el Gremio : {{ $nombre }}?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmarEliminar')" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="borrargremio({{ $identificador }})"
                wire:loading.attr="disabled">
                Borrar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
    <!-- / Seccion que contiene el modal para eliminar -->

    <x-dialog-modal wire:model="modalver">
        <x-slot name="title">
            @if ($alianza_gremio == null)
                {{ $nombre_gremio }}
            @else
                {{ $alianza_gremio }} - {{ $nombre_gremio }}
            @endif            
        </x-slot>

        <x-slot name="content">  
            @if ($imagen2)
                <div class="col-span-2 sm:col-span-4 md:col-span-4">
                    <img class="mb-4 w-full" src="{{ $imagen2}}" alt="">
                </div>
            @endif
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2">
                <div>
                    <x-label for="name" value="{{ __('ID de Gremio') }}" />                
                    {{ $id_gremio }}
                </div>
                <div class=" ">
                    <x-label for="name" value="{{ __('Nombre del Gremio') }}" />
                    {{ $nombre_gremio }}
                </div>                
            </div>

            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2">
                @if ($alianza_gremio)
                    <div class=" ">
                        <x-label for="name" value="{{ __('ID de Alianza') }}" />
                        {{ $id_alianza }}
                    </div>
                    <div class=" ">
                        <x-label for="name" value="{{ __('Nombre de Alianza') }}" />
                        {{ $alianza_gremio }}
                    </div>                    
                @endif
            </div>
            
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2">
                <div class=" ">
                    <x-label for="name" value="{{ __('Integrantes') }}" />
                    {{ $miembros_gremio }}
                </div>

                <div class=" ">
                    <x-label for="name" value="{{ __('Fama PVP') }}" />
                    {{ number_format($fame, 0, ',', '.')  }}
                </div>
            </div> 

            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2">
                <div class=" ">
                    <x-label for="name" value="{{ __('Deaths') }}" />
                    {{ number_format($deaths, 0, ',', '.')  }}
                </div>

                <div class=" ">
                    <x-label for="name" value="{{ __('Kills') }}" />
                    {{ number_format($kills, 0, ',', '.')  }}
                </div>
            </div> 

            <div class="mt-4">
                <x-label for="name" value="{{ __('Fecha de fundación') }}" />                
                {{ $founded }}
            </div>

            
        </x-slot>

        <x-slot name="footer">
            
            <div class="px-4 py-2 m-2">
                <x-danger-button class="ml-2" wire:click="$toggle('modalver')" wire:loading.attr="disabled">
                    Cancelar
                </x-danger-button>
            </div>
        </x-slot>
    </x-dialog-modall>
  
</div>
