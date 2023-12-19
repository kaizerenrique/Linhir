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
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-36 w-36 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-36 w-36" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    @endif

                </div>
                <div class="mx-4 mb-4">
                    <ul>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Nombre: {{ $personaje->Name }}
                            </h3>
                        </li>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Gremio:
                                @if ($personaje->GuildName == 'Linhir')
                                    <a href="{{ route('linhir') }}">
                                        {{ $personaje->GuildName }}
                                    </a>
                                @else
                                    {{ $personaje->GuildName }}
                                @endif
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
                <div class="mx-4 mb-4 mt-4">
                    <ul>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Fama total por Asesinatos: {{ number_format($personaje->KillFame) }}
                            </h3>
                        </li>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Fama total por Muertes: {{ number_format($personaje->DeathFame) }}
                            </h3>
                        </li>
                        <li>
                            <h3 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight p-1">
                                Relación: {{ $personaje->FameRatio }}
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
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Cosechador</h2>
                        <ul>
                            <li>
                                <span
                                    class="bg-green-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Total: {{ number_format($personaje->LifetimeStatistics->Gathering->Fiber->Total) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-blue-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Royal: {{ number_format($personaje->LifetimeStatistics->Gathering->Fiber->Royal) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-black dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    ZN:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Fiber->Outlands) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-orange-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Avalon:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Fiber->Avalon) }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Peletero</h2>
                        <ul>
                            <li>
                                <span
                                    class="bg-green-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Total: {{ number_format($personaje->LifetimeStatistics->Gathering->Hide->Total) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-blue-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Royal: {{ number_format($personaje->LifetimeStatistics->Gathering->Hide->Royal) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-black dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    ZN:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Hide->Outlands) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-orange-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Avalon:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Hide->Avalon) }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Prospector</h2>
                        <ul>
                            <li>
                                <span
                                    class="bg-green-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Total: {{ number_format($personaje->LifetimeStatistics->Gathering->Ore->Total) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-blue-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Royal: {{ number_format($personaje->LifetimeStatistics->Gathering->Ore->Royal) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-black dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    ZN:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Ore->Outlands) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-orange-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Avalon:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Ore->Avalon) }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Cantero</h2>
                        <ul>
                            <li>
                                <span
                                    class="bg-green-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Total: {{ number_format($personaje->LifetimeStatistics->Gathering->Rock->Total) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-blue-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Royal: {{ number_format($personaje->LifetimeStatistics->Gathering->Rock->Royal) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-black dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    ZN:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Rock->Outlands) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-orange-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Avalon:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Rock->Avalon) }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Leñador</h2>
                        <ul>
                            <li>
                                <span
                                    class="bg-green-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Total: {{ number_format($personaje->LifetimeStatistics->Gathering->Wood->Total) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-blue-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Royal: {{ number_format($personaje->LifetimeStatistics->Gathering->Wood->Royal) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-black dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    ZN:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Wood->Outlands) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-orange-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Avalon:
                                    {{ number_format($personaje->LifetimeStatistics->Gathering->Wood->Avalon) }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Pescador</h2>
                        <span
                            class="bg-green-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                            Total: {{ number_format($personaje->LifetimeStatistics->FishingFame) }}
                        </span>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Agricultor</h2>
                        <span
                            class="bg-green-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                            Total: {{ number_format($personaje->LifetimeStatistics->FarmingFame) }}
                        </span>
                    </div>
                </div>

                <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Elaboración</h2>
                        <ul>
                            <li>
                                <span
                                    class="bg-green-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Total: {{ number_format($personaje->LifetimeStatistics->Crafting->Total) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-blue-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Royal: {{ number_format($personaje->LifetimeStatistics->Crafting->Royal) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-black dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    ZN:
                                    {{ number_format($personaje->LifetimeStatistics->Crafting->Outlands) }}
                                </span>
                            </li>
                            <li>
                                <span
                                    class="bg-orange-700 dark:text-gray-200 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Avalon:
                                    {{ number_format($personaje->LifetimeStatistics->Crafting->Avalon) }}
                                </span>
                            </li>
                        </ul>                        
                    </div>
                </div>

            </div>
            <!-- / targetas de informacion -->
        </div>

    </div>

</div>
