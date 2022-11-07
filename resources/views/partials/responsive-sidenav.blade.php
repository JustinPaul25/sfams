{{-- <div class="md:hidden flex items-center">
	<button id="mobile-menu-button" class="outline-none">
		<svg
			class="w-6 h-6 text-gray-500"
			x-show="!showMenu"
			fill="none"
			stroke-linecap="round"
			stroke-linejoin="round"
			stroke-width="2"
			viewBox="0 0 24 24"
			stroke="currentColor"
		>
		<path d="M4 6h16M4 12h16M4 18h16"></path>
		</svg>
	</button>
</div>

<div id="mobile-menu" class="hidden after:transition-all">
	<ul class="">
		@hasrole('Administrator')
			<li>
				<a href="/" class="{{ (request()->is('/')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
					</svg>
					<span class="flex-1"> Dashboard </span>
				</a>
			</li>
		@endhasanyrole
		@hasanyrole('Administrator|staff')
			<li>
				<a href="/students" class="{{ (request()->is('students*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300 " viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
					</svg>
					<span class="flex-1"> Students </span>
				</a>
			</li>
			<li>
				<a href="/process-payment" class="{{ (request()->is('process-payment*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
						<path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
					</svg>
					<span class="flex-1"> Process Payment </span>
				</a>
			</li>
			<li>
				<a href="/reports" class="{{ (request()->is('reports*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
					</svg>
					<span class="flex-1"> Reports </span>
				</a>
			</li>
		@endhasanyrole
		@hasrole('Administrator')
			<li>
				<a href="/utilities" class="{{ (request()->is('utilities*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
					</svg>
					<span class="flex-1"> Fee And S.Y. Utilities </span>
				</a>
			</li>
			<li>
				<a href="/users" class="{{ (request()->is('users*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                    <span class="flex-1"> App Users </span>
				</a>
			</li>
			<li>
				<a href="/logs" class="{{ (request()->is('logs*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
					</svg>
					<span class="flex-1"> System Logs </span>
				</a>
			</li>
		@endhasanyrole
		@hasrole('Student')
			<li>
				<a href="/my-profile" class="{{ (request()->is('my-profile*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
					</svg>
					<span class="flex-1"> My Profile </span>
				</a>
			</li>
			<li>
				<a href="/notifications" class="{{ (request()->is('notifications*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
					</svg>
					<span class="flex-1"> Notifications </span>
					<span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">9</span>
				</a>
			</li>
		@endhasanyrole
	</ul>
	<div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
		<a href="{{ route('logout') }}" onclick="event.preventDefault();
		document.getElementById('logout-form').submit();" class="bg-red-500 hover:opacity-75 group w-full text-center text-white flex items-center px-2 py-2 text-sm font-medium rounded-md">
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
</div> --}}
<nav class="relative px-4 py-4 flex justify-between items-center bg-blue-300">
	<a class="text-3xl font-bold leading-none" href="/">
		<img class="w-10 h-10" alt="image name" src="{{ url('img/logo.jpg') }}" />
	</a>
	<div class="lg:hidden">
		<button class="navbar-burger flex items-center text-blue-600 p-3">
			<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<title>Mobile menu</title>
				<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
			</svg>
		</button>
	</div>
</nav>
<div class="navbar-menu relative z-50 hidden">
	<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
	<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
		<div class="flex items-center mb-8">
			<a class="mr-auto text-3xl font-bold leading-none" href="/">
				<img class="w-12 h-12" alt="image name" src="{{ url('img/logo.jpg') }}" />
			</a>
			<button class="navbar-close">
				<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
				</svg>
			</button>
		</div>
		<div>
			<ul>
				@hasrole('Administrator')
					<li>
						<a href="/" class="{{ (request()->is('/')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
							</svg>
							<span class="flex-1"> Dashboard </span>
						</a>
					</li>
				@endhasanyrole
				@hasanyrole('Administrator|staff')
					<li>
						<a href="/students" class="{{ (request()->is('students*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300 " viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
							</svg>
							<span class="flex-1"> Students </span>
						</a>
					</li>
					<li>
						<a href="/process-payment" class="{{ (request()->is('process-payment*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
								<path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
							</svg>
							<span class="flex-1"> Process Payment </span>
						</a>
					</li>
					<li>
						<a href="/reports" class="{{ (request()->is('reports*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
							</svg>
							<span class="flex-1"> Reports </span>
						</a>
					</li>
				@endhasanyrole
				@hasrole('Administrator')
					<li>
						<a href="/utilities" class="{{ (request()->is('utilities*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
							</svg>
							<span class="flex-1"> Fees Utilities </span>
						</a>
					</li>
					<li>
						<a href="/users" class="{{ (request()->is('users*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
							<span class="flex-1"> App Users </span>
						</a>
					</li>
					<li>
						<a href="/logs" class="{{ (request()->is('logs*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
							</svg>
							<span class="flex-1"> System Logs </span>
						</a>
					</li>
				@endhasanyrole
				@hasrole('Student')
					<li>
						<a href="/my-profile" class="{{ (request()->is('my-profile*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							<span class="flex-1"> My Profile </span>
						</a>
					</li>
					<li>
						<a href="/notifications" class="{{ (request()->is('notifications*')) ? 'bg-blue-800 text-white' : 'hover:bg-blue-800 hover:opacity-75' }} block text-sm px-2 py-2 font-semibold flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
							</svg>
							<span class="flex-1"> Notifications </span>
							<span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">9</span>
						</a>
					</li>
				@endhasanyrole
			</ul>
		</div>
		<div class="mt-auto">
			<div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
				<a href="{{ route('logout') }}" onclick="event.preventDefault();
				document.getElementById('logout-form').submit();" class="bg-red-500 hover:opacity-75 group w-full text-center text-white flex items-center px-2 py-2 text-sm font-medium rounded-md">
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
	</nav>
</div>