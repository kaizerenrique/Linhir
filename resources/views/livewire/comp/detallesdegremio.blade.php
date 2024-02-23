<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $informacion->guild->Name }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                            <img src="{{$datos_gremio->escudo}}" class="h-36" />                    
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
                                                    {{number_format($integrante->LifetimeStatistics->PvE->Total , 0, ',', '.')}}    
                                                </th>
                                                
                                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                    {{number_format($integrante->LifetimeStatistics->Gathering->Fiber->Total , 0, ',', '.')}}    
                                                </th>
    
                                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                    {{number_format($integrante->LifetimeStatistics->Gathering->Hide->Total , 0, ',', '.')}}    
                                                </th>
    
                                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                    {{number_format($integrante->LifetimeStatistics->Gathering->Ore->Total , 0, ',', '.')}}    
                                                </th>
    
                                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                    {{number_format($integrante->LifetimeStatistics->Gathering->Rock->Total , 0, ',', '.')}}    
                                                </th>
    
                                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                    {{number_format($integrante->LifetimeStatistics->Gathering->Wood->Total , 0, ',', '.')}}    
                                                </th>
    
                                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                    {{number_format($integrante->LifetimeStatistics->FishingFame , 0, ',', '.')}}    
                                                </th>
    
                                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                    {{number_format($integrante->LifetimeStatistics->Crafting->Total , 0, ',', '.')}}    
                                                </th>
    
                                                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                                         
                                                    {{number_format($integrante->LifetimeStatistics->FarmingFame , 0, ',', '.')}}    
                                                </th>
                                            @endif
                                        @endforeach  
                                        
                                    </tr>                            
                                @endforeach   
                                
                            </tbody>                        
                        </table>
                    </div>
                    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-2
                                 dark:text-gray-300 dark:bg-gray-800">
                        <span class="flex col-span-4 mt-2 md:mt-auto md:justify-end">
                            {{ $miembros->links() }} 
                        </span>            
                    </div>
                </div>
                <!-- \tabla -->  
        </div>        
        
    </div>
</div>