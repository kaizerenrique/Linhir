<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <div class="col-span-1 sm:col-span-2 md:col-span-1">
            <!-- Seccion de identificacion del Gremio -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="flex justify-center w-full mt-4">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{$informacion->guild->Name}}
                    </h2>
                </div>
                <div class="flex justify-center w-full my-6">                    
                        <img src="{{asset('/plantilla/linhir_escudo.png')}}" class="h-36" />                    
                </div>
                <div class="mx-4 mb-6">                    
                    <ul>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Fundador: <a href="#">{{$informacion->guild->FounderName}}</a>
                            </h3>
                        </li>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Fecha de fundación:

                                {{ Carbon\Carbon::parse($informacion->guild->Founded)->format('d-m-Y') }}
                            </h3>
                        </li>
                    </ul>
                </div>
            </div> 
            
            <!-- / Seccion de identificacion del Gremio -->

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mt-4">
                <div class="mx-4 mb-8">                    
                    <ul>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Fama total por Asesinatos: {{number_format($informacion->guild->killFame) }}
                            </h3>
                        </li>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Fama total por Muertes: <a href="#">{{number_format($informacion->guild->DeathFame)}}</a>
                            </h3>
                        </li>
                    </ul>
                </div>
            </div>                   
        </div>
        <div class="col-span-1 sm:col-span-2 md:col-span-2">
            <!-- targetas de informacion -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                      <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Integrantes</h2>
                      <p class="mt-2 text-sm dark:text-gray-200">{{$informacion->basic->memberCount}}</p>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                      <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Asesinatos</h2>
                      <p class="mt-2 text-sm dark:text-gray-200">{{$informacion->overall->kills}} kills</p>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                      <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Muertes</h2>
                      <p class="mt-2 text-sm dark:text-gray-200">{{$informacion->overall->deaths}} deaths</p>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                      <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Relación</h2>
                      <p class="mt-2 text-sm dark:text-gray-200">{{$informacion->overall->ratio}}</p>
                    </div>
                </div>

            </div>
            <!-- / targetas de informacion -->

            <!-- seccion top players -->
            <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                        <div class="flex flex-wrap items-center px-4 py-2">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Top 5 PVP</h3>
                            </div>
                        </div>
                        <div class="block w-full">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle 
                                        border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 
                                        border-r-0 whitespace-nowrap font-semibold text-left">Nombre</th>
                                        <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle 
                                        border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 
                                        border-r-0 whitespace-nowrap font-semibold text-left">Fama por Matar</th>
                                        <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle 
                                        border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 
                                        border-r-0 whitespace-nowrap font-semibold text-left">Fama por Muerte</th>
                                        <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle 
                                        border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 
                                        border-r-0 whitespace-nowrap font-semibold text-left">Relación</th>
                                        <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle 
                                        border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 
                                        border-r-0 whitespace-nowrap font-semibold text-left">Asesinatos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informacion->topPlayers as $registro )
                                        <tr class="text-gray-700 dark:text-gray-100">                                           
                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                {{$registro->Name}}                                                                          
                                            </th> 
                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                {{number_format($registro->KillFame)}}                                                                          
                                            </th> 
                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                {{number_format($registro->DeathFame)}}                                                                          
                                            </th> 
                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                {{$registro->FameRatio}}                                                                          
                                            </th> 
                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                {{number_format($registro->totalKills)}}                                                                          
                                            </th> 
                                        </tr>                            
                                    @endforeach                        
                                </tbody>
                            </table>                
                        </div>
                    </div>
                </div>
            </div>
            <!-- / seccion top players -->
        </div>
        
    </div>

    <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">                
        
            <div class="flex flex-wrap items-center px-4 py-2">
                <div class="relative w-full max-w-full flex-grow flex-1">
                  <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">Listado de usuarios Registrados</h3>
                </div>
                <div class="flex flex-col items-center w-full max-w-xl">   
                    <x-input class="block mt-1 w-100" type="search" wire:model="buscar" placeholder="Buscar" /> 
                    
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
                        <div class="flex bg-emerald-100 rounded-lg p-4 mb-4 text-sm text-emerald-700" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5 mr-3"
                                fill="none" viewBox="0 0 24 24">
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
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Fama PVE</th>
                                <th class="px-4 py-3">Fibra</th>
                                <th class="px-4 py-3">Piel</th>
                                <th class="px-4 py-3">Mineral</th>
                                <th class="px-4 py-3">Roca</th>
                                <th class="px-4 py-3">Madera</th>
                                <th class="px-4 py-3">Pesca</th>
                                <th class="px-4 py-3">Elaboración</th>
                                <th class="px-4 py-3">Agricultura</th>
                                <th class="px-4 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($miembros as $miembro )
                                <tr class="text-gray-700 dark:text-gray-100">                                           
                                    <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        {{$miembro->Name}}                                                                          
                                    </th>
                                    @foreach ($integrantes as $integrante )
                                        @if ($miembro->Id_albion == $integrante->Id) 
                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->PvE->Total)}}    
                                            </th>
                                            
                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->Gathering->Fiber->Total)}}    
                                            </th>

                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->Gathering->Hide->Total)}}    
                                            </th>

                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->Gathering->Ore->Total)}}    
                                            </th>

                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->Gathering->Rock->Total)}}    
                                            </th>

                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->Gathering->Wood->Total)}}    
                                            </th>

                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->FishingFame)}}    
                                            </th>

                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->Crafting->Total)}}    
                                            </th>

                                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                {{number_format($integrante->LifetimeStatistics->FarmingFame)}}    
                                            </th>
                                        @endif
                                    @endforeach  
                                    <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                wire:click="">
                                                <a href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            @if (@Auth::user()->hasPermissionTo('editar_jugador'))
                                                @if ($miembro->user_id == null)
                                                    <!-- Agregar Usuario -->
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                        wire:click="agregarusuario({{$miembro->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </div> 
                                                    <!-- Alter -->
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                        wire:click="alterpersonaje({{$miembro->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                        </svg>
                                                    </div>
                                                @else 
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                        wire:click="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                    </div>
                                                    
                                                @endif
                                                
                                            @endif
                                            @if (@Auth::user()->hasPermissionTo('eliminar_jugador'))                                            
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                    wire:click="consultaborrarintegrante({{$miembro->id}})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>                                                
                                            @endif                                            
                                        </div>                                                                                                                 
                                    </th> 
                                </tr>                            
                            @endforeach   
                            
                        </tbody>                        
                    </table>
                </div>
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9
                             dark:text-gray-300 dark:bg-gray-800">
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        {{ $miembros->links() }} 
                    </span>            
                </div>
            </div>
        <!-- \tabla -->   

        <!-- Seccion que contiene el modal para eliminar -->
        <x-confirmation-modal wire:model="confirmarEliminar">
            <x-slot name="title">
                Borrar personaje
            </x-slot>
    
            <x-slot name="content">
                ¿Está seguro de querer borrar el personaje de: {{ $personaje }}? 
            </x-slot>
    
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmarEliminar')" wire:loading.attr="disabled">
                    Cancelar
                </x-secondary-button>
    
                <x-danger-button class="ml-2" wire:click="eliminarPersonaje({{$identificador}})"
                    wire:loading.attr="disabled">
                    Borrar Personaje
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
        <!-- / Seccion que contiene el modal para eliminar -->   

        <x-dialog-modal wire:model="agregarusuariomodal">
            <x-slot name="title">
                Crear Usuario
            </x-slot>
    
            <x-slot name="content">
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Nombre del Personaje') }}" />
                    <x-input class="block mt-1 w-full" type="text" wire:model.defer="name" disabled />    
                </div>
                <div class="mt-4">
                    <x-label for="correo" value="{{ __('Ingresa el correo electrónico') }}" />
                    <x-input class="block mt-1 w-full" type="email" wire:model.defer="email" required />    
                    <x-input-error for="email" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Rol de Usuario') }}" />
                    <select wire:model.defer="rol"
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="" selected>Seleccionar</option>
                        @foreach ($roles as $role)                            
                            <option value="{{ $role->name }}">{{ $role->name }}</option>                            
                        @endforeach  
                    </select>
                </div>
                <x-input id="idper" type="hidden" class="mt-1 block w-full" wire:model.defer="idper"/>

            </x-slot>
    
            <x-slot name="footer">
                <div class="px-4 py-2 m-2">
                    <x-secondary-button wire:click="guardarusuario()" wire:loading.attr="disabled">
                        Agregar
                    </x-secondary-button>
                </div>
                <div class="px-4 py-2 m-2">
                    <x-danger-button class="ml-2" wire:click="$toggle('agregarusuariomodal')" wire:loading.attr="disabled">
                        Cancelar
                    </x-danger-button>
                </div>
            </x-slot>
        </x-dialog-modall>

        <x-dialog-modal wire:model="agregaraltermodal">
            <x-slot name="title">
                Crear Usuario
            </x-slot>
    
            <x-slot name="content">
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Nombre del Personaje') }}" />
                    <x-input class="block mt-1 w-full" type="text" wire:model.defer="name" disabled />    
                </div>
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Usuario') }}" />
                    <select wire:model.defer="usuario"
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="" selected>Seleccionar</option>
                        @foreach ($usuarios as $usuario)                            
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>                            
                        @endforeach  
                    </select>
                </div>
                <x-input id="idper" type="hidden" class="mt-1 block w-full" wire:model.defer="idper"/>

            </x-slot>
    
            <x-slot name="footer">
                <div class="px-4 py-2 m-2">
                    <x-secondary-button wire:click="asociaralter()" wire:loading.attr="disabled">
                        Agregar
                    </x-secondary-button>
                </div>
                <div class="px-4 py-2 m-2">
                    <x-danger-button class="ml-2" wire:click="$toggle('agregaraltermodal')" wire:loading.attr="disabled">
                        Cancelar
                    </x-danger-button>
                </div>
            </x-slot>
        </x-dialog-modall>
    

    </div>
    
</div>
