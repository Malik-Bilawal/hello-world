{{--
    This is a complete, self-contained custom navigation bar component.
    It replaces the need for Jetstream's <x-nav-link>, <x-dropdown>, etc.
    while keeping all the same functionality (auth checks, routes, profile photos).

    TO USE:
    In your main layout file (e.g., resources/views/layouts/app.blade.php),
    replace `@livewire('navigation-menu')` with:
    `<x-custom-navbar />`
--}}
<nav x-data="{
        mobileMenuOpen: false,
        profileDropdownOpen: false,
        teamsDropdownOpen: false
     }"
     @click.outside="profileDropdownOpen = false; teamsDropdownOpen = false"
     class="backdrop-blur-xl bg-white/75 border-b border-gray-200/50 shadow-sm sticky top-0 z-50 transition-all duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Left Side: Logo and Desktop Nav Links -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group flex-shrink-0">
                    {{-- You can replace this SVG with your <x-application-mark /> or your own logo --}}
                    <svg class="h-8 w-auto text-indigo-600 group-hover:text-indigo-700 transition-all duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                    </svg>
                    <span class="text-lg font-bold text-gray-700 group-hover:text-gray-900 tracking-tight transition-colors duration-300 hidden sm:inline-block">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex space-x-8">
                    <a href="{{ route('dashboard') }}" class="relative text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-600' }} hover:text-indigo-600 transition-all group">
                        <span>{{ __('Dashboard') }}</span>
                        <span classclass="absolute left-0 -bottom-1 w-full h-0.5 {{ request()->routeIs('dashboard') ? 'bg-indigo-600' : 'bg-indigo-600/50' }} rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></span>
                    </a>
                    
                    <a href="#" class="relative text-sm font-medium text-gray-600 hover:text-indigo-600 transition-all group">
                        {{-- This is your 'Projects' link --}}
                        <span>{{ __('Projects') }}</span>
                        <span class="absolute left-0 -bottom-1 w-full h-0.5 bg-indigo-600/50 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></span>
                    </a>
                </div>
            </div>

            <!-- Right Side: Desktop Dropdowns and Hamburger -->
            <div class="flex items-center space-x-4">

                <!-- Desktop Right Side (Authenticated) -->
                @auth
                <div class="hidden sm:flex items-center space-x-4">

                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="relative">
                            <!-- Teams Trigger -->
                            <button @click="teamsDropdownOpen = !teamsDropdownOpen; profileDropdownOpen = false" class="inline-flex items-center space-x-2 px-3 py-2 text-sm font-medium rounded-lg bg-white/50 hover:bg-white border border-transparent hover:border-gray-200 hover:shadow-sm transition-all duration-200 text-gray-700">
                                <span>{{ Auth::user()->currentTeam->name }}</span>
                                <svg class="h-4 w-4 text-gray-500 transition-transform duration-200" :class="{'rotate-180': teamsDropdownOpen}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Teams Panel -->
                            <div x-show="teamsDropdownOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-60 origin-top-right bg-white rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none py-2"
                                 style="display: none;">
                                
                                <div class="block px-4 py-2 text-xs text-gray-400 font-medium uppercase tracking-wider">{{ __('Manage Team') }}</div>
                                
                                <!-- Team Settings -->
                                <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-indigo-600 transition-colors duration-150">
                                    {{ __('Team Settings') }}
                                </a>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <a href="{{ route('teams.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-indigo-600 transition-colors duration-150">
                                        {{ __('Create New Team') }}
                                    </a>
                                @endcan

                                <div class="border-t border-gray-100 my-2"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400 font-medium uppercase tracking-wider">{{ __('Switch Teams') }}</div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <form method="POST" action="{{ route('current-team.update') }}" x-data>
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                                        <button type="submit" class="w-full text-left flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-indigo-600 transition-colors duration-150">
                                            <span class="truncate">{{ $team->name }}</span>
                                            @if ($team->id == Auth::user()->current_team_id)
                                                <svg class="h-5 w-5 text-indigo-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @endif
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <!-- Profile Trigger -->
                        <button @click="profileDropdownOpen = !profileDropdownOpen; teamsDropdownOpen = false" class="flex items-center border-2 border-transparent rounded-full shadow-sm hover:shadow-lg focus:outline-none focus:border-indigo-400 transition-all duration-200">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="h-9 w-9 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                <span class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-gray-200">
                                    <span class="text-sm font-medium text-gray-600 leading-none">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </span>
                            @endif
                        </button>

                        <!-- Profile Panel -->
                        <div x-show="profileDropdownOpen"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-56 origin-top-right bg-white rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none py-2"
                             style="display: none;">
                            
                            <!-- User Info -->
                            <div class="flex items-center px-4 py-2.5 border-b border-gray-100 mb-2">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="h-10 w-10 rounded-full object-cover mr-3" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                @endif
                                <div>
                                    <div class="font-semibold text-sm text-gray-800 truncate">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</div>
                                </div>
                            </div>

                            <div class="block px-4 py-2 text-xs text-gray-400 font-medium uppercase tracking-wider">{{ __('Manage Account') }}</div>

                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-indigo-600 transition-colors duration-150">
                                {{ __('Profile') }}
                            </a>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-indigo-600 transition-colors duration-150">
                                    {{ __('API Tokens') }}
                                </a>
                            @endif

                            <div class="border-t border-gray-100 my-2"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" 
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-indigo-600 transition-colors duration-150"
                                        @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth

                <!-- Hamburger Menu Button -->
                <div class="flex sm:hidden">
                    <button @click="mobileMenuOpen = ! mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-white/80 focus:outline-none focus:bg-white/80 focus:text-gray-900 transition-all duration-200">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed. -->
                        <svg :class="{'hidden': mobileMenuOpen, 'block': ! mobileMenuOpen }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open. -->
                        <svg :class="{'hidden': ! mobileMenuOpen, 'block': mobileMenuOpen }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive (Mobile) Menu -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="sm:hidden bg-white shadow-lg border-t border-gray-100"
         style="display: none;">
        
        <!-- Mobile Nav Links -->
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('dashboard') ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : 'border-transparent text-gray-600' }} hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 text-base font-medium transition-all duration-150">
                {{ __('Dashboard') }}
            </a>
            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 text-base font-medium transition-all duration-150">
                {{-- This is your 'Projects' link --}}
                {{ __('Projects') }}
            </a>
        </div>

        @auth
        <!-- Mobile User Info & Links -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4 space-x-3">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-10 w-10 rounded-full object-cover border border-white/40 shadow" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                @endif
                <div>
                    <div class="font-semibold text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition-all duration-150">
                    {{ __('Profile') }}
                </a>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition-all duration-150">
                        {{ __('API Tokens') }}
                    </a>
                @endif

                <!-- Mobile Logout Form -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit" 
                            class="w-full text-left block px-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition-all duration-150"
                            @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </button>
                </form>

                <!-- Mobile Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 pt-3 mt-3">
                        <div class="block px-4 text-xs text-gray-400 font-medium uppercase tracking-wider">{{ __('Manage Team') }}</div>
                        <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="block px-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition-all duration-150">
                            {{ __('Team Settings') }}
                        </a>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <a href="{{ route('teams.create') }}" class="block px-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition-all duration-150">
                                {{ __('Create New Team') }}
                            </a>
                        @endcan

                        <div class="border-t border-gray-200 pt-3 mt-3">
                            <div class="block px-4 text-xs text-gray-400 font-medium uppercase tracking-wider">{{ __('Switch Teams') }}</div>
                            @foreach (Auth::user()->allTeams() as $team)
                                <form method="POST" action="{{ route('current-team.update') }}" x-data>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="team_id" value="{{ $team->id }}">
                                    <button type="submit" class="w-full text-left flex items-center justify-between px-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition-all duration-150">
                                        <span class="truncate">{{ $team->name }}</span>
                                        @if ($team->id == Auth::user()->current_team_id)
                                            <svg class="h-5 w-5 text-indigo-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @endif
                                    </button>
                                </form>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
        @endauth
    </div>
</nav>