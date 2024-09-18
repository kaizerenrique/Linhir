<nav x-data="{ open: false }" class="sticky top-0 z-40 flex-none bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="flex items-center"  href="{{ route('welcome') }}">
                        <x-application-mark class="block mr-3 h-6 sm:h-9" />                        
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                        {{ __('Linhir') }}
                    </x-nav-link>
                    <x-nav-link href="https://linhir.site/#lebennin">
                        {{ __('Lebennin') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('calculadora de semillas') }}" :active="request()->routeIs('calculadora de semillas')">
                        {{ __('Calculadora de Semillas') }}
                    </x-nav-link>
                </div>                
            </div>    
            <div class="flex">
                <div class="hidden items-center space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (Route::has('login'))
                            
                        @auth                            
                            <a href="{{ url('dashboard') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                Dashboard
                            </a>  
                        @else                            
                            <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                iniciar sesión
                            </a>   
                        @endauth
                            
                    @endif
                </div>  
            </div>

            

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                {{ __('Linhir') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="https://linhir.site/#lebennin" >
                {{ __('Lebennin') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('calculadora de semillas') }}" :active="request()->routeIs('calculadora de semillas')">
                {{ __('Calculadora de Semillas') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">           

            <div class="mt-3 space-y-1">
                @if (Route::has('login'))
                    @auth
                        <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>   
                    @else
                        <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('iniciar sesión') }}
                        </x-responsive-nav-link>
                    @endauth                 
                @endif 
            </div>
        </div>


    </div>
</nav>
