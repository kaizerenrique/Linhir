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
                <div class="mx-4 mb-4">                    
                    <ul>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Alianza: {{$informacion->guild->AllianceName}}
                            </h3>
                        </li>
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
                <div class="mx-4 mb-4">                    
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
                    <input type="search" wire:model="buscar" placeholder="Buscar" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                </div>
                <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                    
                </div>
            </div>
            <!-- tabla -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Correo</th>
                                <th class="px-4 py-3">Rol</th>
                                <th class="px-4 py-3">Ultima Actividad</th>
                                <th class="px-4 py-3">Tokens Generados</th>
                                <th class="px-4 py-3">Limite de Tokens</th>
                                <th class="px-4 py-3">Token Restantes</th>
                                <th class="px-4 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($miembros as $miembro )
                                <tr class="text-gray-700 dark:text-gray-100">                                           
                                    <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        {{$miembro->Id}}                                                                          
                                    </th> 
                                </tr>                            
                            @endforeach   
                            
                        </tbody>                        
                    </table>
                </div>
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9
                             dark:text-gray-300 dark:bg-gray-800">
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        
                    </span>            
                </div>
            </div>
        <!-- \tabla -->       
    </div>
    
</div>
