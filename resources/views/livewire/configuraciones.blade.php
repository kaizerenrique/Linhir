<div>
    <!-- Seccion Buscar muertes y asecinatos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="">
            <div class="w-full mt-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Muertes y asesinatos
                </h2>   
            </div>
            <div>
                <p class="text-gray-300">Sección para buscar de forma manual las muertes y asesinatos del gremio.</p>
            </div>
        </div>

        <div class="dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
            <div class="relative flex gap-x-3">                
                <div class="text-sm leading-6">
                  <label for="comments" class="font-medium text-gray-200">Buscar manualmente</label>
                  <p class="text-gray-300">Esta opción permite realizar una búsqueda de las muertes y asesinatos manual de todos los usuarios de linhir registrados </p>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">  
                <x-button class="ml-4" wire:click="buscarmuertesacecinatos">
                    {{ __('Buscar') }}
                </x-button>
            </div>
            
        </div>        
    </div>
    <x-section-border />
    <!-- /Seccion Buscar muertes y asecinatos -->

    <!-- Seccion Notificaciones de discord -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="">
            <div class="w-full mt-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Configuración de notificaciones de discord 
                </h2>
            </div>
        </div>

        <div class="dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
            <div class="relative flex gap-x-3">                
                <div class="text-sm leading-6">
                  <label for="comments" class="font-medium text-gray-200">Notificaciones: </label> 
                  @if ($config->notificar == true)
                    <span class="text-green-500 font-semibold">Activas</span>
                  @else
                    <span class="text-red-500 font-semibold">Apagadas</span>  
                  @endif     
                  <p class="text-gray-300">Esta opción activa o desactiva las notificaciones de muertes y asesinatos</p>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4"> 
                @if ($config->notificar == true)
                    <x-danger-button class="ml-3" wire:click="notificacion('apagar')">
                        {{ __('Apagar Notificaciones ') }}
                    </x-danger-button>
                    
                @else
                    <x-button class="ml-4" wire:click="notificacion('activar')">
                        {{ __('Activar Notificaciones ') }}
                    </x-button>                      
                @endif  
            </div>
            
        </div>        
    </div>
    <x-section-border />
    <!-- /Seccion Notificaciones de discord -->
</div>
