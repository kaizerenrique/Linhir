<section class="bg-white dark:bg-gray-900">
    <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
        <h2 class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">Top Farmers de Linhir </h2>
        <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-3 lg:grid-cols-4 dark:text-gray-400">

            <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="ml-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Agricultor</h2>
                  <p class="mt-2 text-sm dark:text-gray-200">{{$tops["Agricultor"]["Name"]}} </p>
                  <p class="mt-2 text-sm dark:text-gray-200">{{number_format($tops["Agricultor"]["Agricultor"])}} </p>
                </div>
            </div>

            <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="ml-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Cantero</h2>
                  <p class="mt-2 text-sm dark:text-gray-200">{{$tops["Cantero"]["Name"]}} </p>
                  <p class="mt-2 text-sm dark:text-gray-200">{{number_format($tops["Cantero"]["Cantero"])}} </p>
                </div>
            </div>

            <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="ml-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Cosechador</h2>
                  <p class="mt-2 text-sm dark:text-gray-200">{{$tops["Cosechador"]["Name"]}} </p>
                  <p class="mt-2 text-sm dark:text-gray-200">{{number_format($tops["Cosechador"]["Cosechador"])}} </p>
                </div>
            </div>

            <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="ml-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Crafter</h2>
                  <p class="mt-2 text-sm dark:text-gray-200">{{$tops["Crafter"]["Name"]}} </p>
                  <p class="mt-2 text-sm dark:text-gray-200">{{number_format($tops["Crafter"]["Crafter"])}} </p>
                </div>
            </div>

            <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="ml-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Peletero</h2>
                  <p class="mt-2 text-sm dark:text-gray-200">{{$tops["Peletero"]["Name"]}} </p>
                  <p class="mt-2 text-sm dark:text-gray-200">{{number_format($tops["Peletero"]["Peletero"])}} </p>
                </div>
            </div>
            
            <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="ml-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Prospector</h2>
                  <p class="mt-2 text-sm dark:text-gray-200">{{$tops["Prospector"]["Name"]}} </p>
                  <p class="mt-2 text-sm dark:text-gray-200">{{number_format($tops["Prospector"]["Prospector"])}} </p>
                </div>
            </div>            

            <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="ml-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Leñador</h2>
                  <p class="mt-2 text-sm dark:text-gray-200">{{$tops["Leñador"]["Name"]}} </p>
                  <p class="mt-2 text-sm dark:text-gray-200">{{number_format($tops["Leñador"]["Leñador"])}} </p>
                </div>
            </div>

            <div class="flex items-start p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="ml-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">Pescador</h2>
                  <p class="mt-2 text-sm dark:text-gray-200">{{$tops["Pescador"]["Name"]}} </p>
                  <p class="mt-2 text-sm dark:text-gray-200">{{number_format($tops["Pescador"]["Pescador"])}} </p>
                </div>
            </div>  
            
        </div>
    </div>
</section>
