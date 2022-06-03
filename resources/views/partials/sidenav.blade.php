<aside class="h-screen sticky top-0">
    <div class="w-60 h-screen flex-1 flex flex-col min-h-0 bg-blue-500">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4 flex justify-center">
                <p class="font-black text-4xl text-white">SFAMS</p>
            </div>
            <nav class="mt-5 flex-1 px-2 space-y-1" aria-label="Sidebar">
                <a href="/" class="{{ (request()->is('/')) ? 'bg-blue-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="flex-1"> Dashboard </span>
                </a>

                <a href="/students" class="{{ (request()->is('students*')) ? 'bg-blue-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/chart-bar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1"> Students </span>
                </a>

                <a href="/process-payment" class="{{ (request()->is('process-payment*')) ? 'bg-blue-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/chart-bar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="flex-1"> Process Payment </span>
                </a>

                <a href="/reports" class="{{ (request()->is('reports*')) ? 'bg-blue-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/chart-bar -->
                    <svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="flex-1"> Reports </span>
                </a>

                <a href="/utilities" class="{{ (request()->is('utilities*')) ? 'bg-blue-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/chart-bar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1"> Fee And S.Y. Utilities </span>
                </a>

                <a href="/users" class="{{ (request()->is('users*')) ? 'bg-blue-800 text-white' : 'text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/chart-bar -->
                    <svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                    <span class="flex-1"> App Users </span>
                </a>
            </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="bg-red-500 hover:bg-red-700 group w-full text-center text-white flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: outline/chart-bar -->
                <p class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="grid content-center">Logout</span>
                </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>  
</aside>