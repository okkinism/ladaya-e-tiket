<nav class="bg-white border-gray-200 drop-shadow-lg pb-0 relative">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('images/logoladaya.png') }}" class="h-8 mr-3" alt="Logo Ladaya" enc />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-black">{{ config('app.name') }}</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#home"
                        class="block py-2 pl-3 pr-4 text-white bg-green-400 rounded md:bg-transparent md:text-green-400 md:p-0 dark:text-white"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#about"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-400 md:p-0 dark:text-white md:dark:hover:text-green-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tentang</a>
                </li>
                <li>
                    <a href="#gallery"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-400 md:p-0 dark:text-white md:dark:hover:text-green-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Galeri</a>
                </li>
                <li>
                    <a href="#ticket"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-400 md:p-0 dark:text-white md:dark:hover:text-green-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pesan
                        Tiket</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
