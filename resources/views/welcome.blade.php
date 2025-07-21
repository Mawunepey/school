<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to School Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Hero Section -->
    <section class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-16 text-center">
            <h1 class="text-4xl font-bold text-indigo-600">Welcome to Our School Management System</h1>
            <p class="mt-4 text-lg text-gray-600">
                Manage students, teachers, and school activities with ease.
            </p>

            <div class="mt-6">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="inline-block px-6 py-3 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-block px-6 py-3 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-block ml-4 px-6 py-3 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-indigo-600 mb-2">Student Management</h3>
                    <p class="text-gray-600">Easily add, update, and track student information.</p>
                </div>
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-indigo-600 mb-2">Teacher Assignments</h3>
                    <p class="text-gray-600">Assign subjects and manage teaching staff efficiently.</p>
                </div>
                <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-indigo-600 mb-2">Class Scheduling</h3>
                    <p class="text-gray-600">Automate class schedules and reduce conflicts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6 border-t text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} School Management System. All rights reserved.
    </footer>

</body>
</html>
