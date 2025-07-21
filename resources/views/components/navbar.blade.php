<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo / Brand -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
                    <span class="text-xl font-bold text-indigo-700">Project</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-indigo-600">Home</a>
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600">Dashboard</a>
                <a href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'text-indigo-600 font-bold' : 'text-gray-700 hover:text-indigo-600' }}">
                     Dashboard
                </a>

                @auth
                    <a href="{{ route('courses.index') }}"
                       class="{{ request()->routeIs('courses.index') ? 'text-indigo-600 font-bold' : 'text-gray-700 hover:text-indigo-600' }}">
                        Courses
                    </a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600">Students</a>
                @endauth
                @auth
                 @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}"
                 class="{{ request()->routeIs('admin.dashboard') ? 'text-indigo-600 font-bold' : 'text-gray-700 hover:text-indigo-600' }}">
                  Admin Panel
                  </a>
                 @endif

                    @if(Auth::user()->role === 'teacher')
                        <a href="{{ route('gradebook.index') }}"
                        class="{{ request()->routeIs('gradebook.index') ? 'text-indigo-600 font-bold' : 'text-gray-700 hover:text-indigo-600' }}">
                        Gradebook
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Auth Links -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <span class="text-gray-700 text-sm">
                        👤 {{ Auth::user()->name }} 
                        @if(Auth::user()->role)
                            ({{ ucfirst(Auth::user()->role) }})
                        @endif
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-500 hover:text-red-600 text-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600">Register</a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
        <a href="{{ url('/') }}" class="block py-2 text-gray-700 hover:text-indigo-600">Home</a>
        <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-indigo-600">Dashboard</a>

        @auth
            <a href="{{ route('courses.index') }}" class="block py-2 text-gray-700 hover:text-indigo-600">Courses</a>
            <a href="#" class="block py-2 text-gray-700 hover:text-indigo-600">Students</a>

            <form method="POST" action="{{ route('logout') }}" class="pt-2">
                @csrf
                <button class="text-red-500 hover:text-red-600 text-sm">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block py-2 text-gray-700 hover:text-indigo-600">Login</a>
            <a href="{{ route('register') }}" class="block py-2 text-gray-700 hover:text-indigo-600">Register</a>
        @endauth
    </div>

    <!-- Toggle Script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</nav>
