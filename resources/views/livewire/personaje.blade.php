<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <div class="col-span-1 sm:col-span-2 md:col-span-1">
            <!-- Seccion de identificacion del Gremio -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="flex justify-center w-full mt-4">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        
                    </h2>
                </div>
                <div class="flex justify-center w-full my-6">                    
                    
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-36 w-36 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-36 w-36" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                                                        
                </div>
                <div class="mx-4 mb-4">                    
                    <ul>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Alianza: 
                            </h3>
                        </li>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Fundador: 
                            </h3>
                        </li>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                
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
                                Fama total por Asesinatos:
                            </h3>
                        </li>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Fama total por Muertes: <a href="#"> </a>
                            </h3>
                        </li>
                    </ul>
                </div>
            </div>                   
        </div>

    </div>

</div>
