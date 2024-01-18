<div>
    @foreach ($personajes as $personaje)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-4">
            <div class="col-span-1 sm:col-span-2 md:col-span-1">
                <!-- Seccion de identificacion del Gremio -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg ">

                    <div class="flex justify-center w-full mt-6 mb-4 text-gray-200 transform hover:text-purple-500 hover:scale-110">

                        <span class="inline-flex rounded-md">
                            <div
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="h-10 w-10 rounded-full object-cover">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>

                            </div>
                        </span>

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
                                    Alianza:
                                    @if (!empty($personaje->AllianceName ))
                                        {{ $personaje->AllianceName }}
                                    @endif
                                </h3>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- / Seccion de identificacion del Gremio -->
                <div class="flex items-start p-4 mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">PVE:</h2>
                        <ul>
                            <li>
                                <span
                                    class="bg-malachite dark:text-deep_fir text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                    Total: {{ number_format($personaje->LifetimeStatistics->PvE->Total) }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-span-1 sm:col-span-2 md:col-span-3">
                <!-- targetas de informacion -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                    <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="ml-4">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Cosechador
                            </h2>
                            <ul>
                                <li>
                                    <span
                                        class="bg-malachite dark:text-deep_fir text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total:
                                        {{ number_format($personaje->LifetimeStatistics->Gathering->Fiber->Total) }}
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
                                        class="bg-pink_salmon dark:text-maroon_oak text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total:
                                        {{ number_format($personaje->LifetimeStatistics->Gathering->Hide->Total) }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="ml-4">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Prospector
                            </h2>
                            <ul>
                                <li>
                                    <span
                                        class="bg-turquoise dark:text-deep_teal text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total:
                                        {{ number_format($personaje->LifetimeStatistics->Gathering->Ore->Total) }}
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
                                        class="bg-lavender_pink dark:text-toledo text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total:
                                        {{ number_format($personaje->LifetimeStatistics->Gathering->Rock->Total) }}
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
                                        class="bg-malachite dark:text-deep_fir text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total:
                                        {{ number_format($personaje->LifetimeStatistics->Gathering->Wood->Total) }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="ml-4">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Pescador</h2>
                            <span
                                class="bg-pink_salmon dark:text-maroon_oak text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                Total: {{ number_format($personaje->LifetimeStatistics->FishingFame) }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="ml-4">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Agricultor
                            </h2>
                            <span
                                class="bg-turquoise dark:text-deep_teal text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                Total: {{ number_format($personaje->LifetimeStatistics->FarmingFame) }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="ml-4">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Elaboración
                            </h2>
                            <ul>
                                <li>
                                    <span
                                        class="bg-lavender_pink dark:text-toledo text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total: {{ number_format($personaje->LifetimeStatistics->Crafting->Total) }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- / targetas de informacion -->

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-4">

                    <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="ml-4">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Fama total por
                                Asesinatos:</h2>
                            <ul>
                                <li>
                                    <span
                                        class="bg-malachite dark:text-deep_fir text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total: {{ number_format($personaje->KillFame) }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="ml-4">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Fama total por
                                Muertes:</h2>
                            <ul>
                                <li>
                                    <span
                                        class="bg-malachite dark:text-deep_fir text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total: {{ number_format($personaje->DeathFame) }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="ml-4">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-2">Relación:</h2>
                            <ul>
                                <li>
                                    <span
                                        class="bg-malachite dark:text-deep_fir text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg">
                                        Total: {{ $personaje->FameRatio }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @endforeach


</div>
