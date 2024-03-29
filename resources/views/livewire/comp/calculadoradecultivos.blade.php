<div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

    <div class="flex flex-wrap items-center px-4 py-2">
        <div class="relative w-full max-w-full flex-grow flex-1">
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Premium ') }}</span>
            <x-checkbox id="premium" name="premium" wire:model="premium" /> <br>
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Uso Foco ') }}</span>
            <x-checkbox id="foco" name="foco" wire:model="foco" /> <br>
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Bono de Ciudad ') }}</span>
            <x-checkbox id="bono" name="bono" wire:model="bono" /> <br>
        </div>
        <div class="flex flex-col items-center w-full max-w-xl">   
            
            
        </div>
        <div class="relative w-full max-w-full flex-grow flex-1 text-right mt-1">
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Parcelas') }}</span>
            <select wire:model.live="parcelas"
                class="w-25 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-500 rounded-md shadow-sm">
                <option value="1" selected>1</option>
                <option value="2" selected>2</option>
                <option value="3" selected>3</option>
                <option value="4" selected>4</option>
                <option value="5" selected>5</option>
                <option value="6" selected>6</option>
                <option value="7" selected>7</option>
                <option value="8" selected>8</option>
                <option value="9" selected>9</option>
                <option value="10" selected>10</option>
                <option value="11" selected>11</option>
                <option value="12" selected>12</option>
                <option value="13" selected>13</option>
                <option value="14" selected>14</option>
                <option value="15" selected>15</option>
                <option value="16" selected>16</option>
            </select>
        </div>
    </div>


    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Ciudad</th>
                        <th class="px-4 py-3">Semilla</th>
                        <th class="px-4 py-3">Precio de semilla</th>
                        <th class="px-4 py-3">Producto</th>
                        <th class="px-4 py-3">Precio de Producto</th>
                        <th class="px-4 py-3">(%) de Retorno</th>
                        <th class="px-4 py-3">Retorno de semillas</th>
                        <th class="px-4 py-3">Profit</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">                   
                    <tr class="text-gray-700 dark:text-gray-100">
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            Lymhurst                                                                         
                        </th>
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            <img src="{{asset('/plantilla/recursos/farming/T1_FARM_CARROT_SEED.png')}}" alt="T1_FARM_CARROT_SEED" class="w-12 h-12">                                                                        
                        </th>
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                            
                            <x-input id="carrotseed" class="block w-full" type="number" name="carrotseed" value="0" />                                                                         
                        </th>
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                            <img src="{{asset('/plantilla/recursos/farming/T1_CARROT.png')}}" alt="T1_CARROT" class="w-12 h-12">                                                                        
                        </th>
                        <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">                            
                            <x-input id="carrot" class="block w-full" type="number" name="carrot" value="0" />                                                                         
                        </th>
                    </tr>
                </tbody>                        
            </table>
        </div>
        
    </div>
</div>
