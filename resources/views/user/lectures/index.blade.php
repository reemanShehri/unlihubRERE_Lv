<x-app-layout>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lectures - {{ $course->title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
   <!-- Tailwind CSS CDN -->
   <script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gray-100">

<div x-data="{ sidebarOpen: false }" class="flex h-screen">

    <!-- Sidebar -->
    {{-- <div
        :class="sidebarOpen ? 'w-48' : 'w-16'"
        class="bg-gray-800 text-white transition-all duration-300 flex flex-col items-center py-4 space-y-6 overflow-hidden"
         style="background-color: #391473"
        >
        <button @click="sidebarOpen = !sidebarOpen" class="mb-4 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" :class="sidebarOpen ? 'rotate-90' : ''" class="h-6 w-6 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <h2 x-show="sidebarOpen" class="text-xl font-bold">UniHub</h2>

        <nav class="flex flex-col space-y-4 w-full items-center">
            <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2 px-2">
                <span>📊</span> <span x-show="sidebarOpen">Dashboard</span>
            </a>
            <a href="{{ route('user.courses.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2 px-2">
                <span>📚</span> <span x-show="sidebarOpen">Courses</span>
            </a>

            <a href="{{ route('users.index') }}"
            class="block px-4 py-2 hover:bg-gray-200 rounded">
            <span>👥</span>
            <span x-show="sidebarOpen">Users</span>
         </a>

            @if($registeredCourses && $registeredCourses->isNotEmpty())
            <a href="{{ route('user.courses.lectures', $registeredCourses->first()->id) }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>🎥</span>
            </a>
        @else
            <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2 disabled" aria-disabled="true" tabindex="-1">
                <span>🎥</span>
            </a>
        @endif

            <a href="{{ route('chatboard.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>💬</span> <span x-show="sidebarOpen">Chat</span>
            </a>
            <a href="{{ route('user.settings.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>⚙️</span> <span x-show="sidebarOpen">Settings</span>
            </a>

            <a href="{{ route('uni') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>🏫</span> <span x-show="sidebarOpen">Universities</span>
            </a>
            <a href="{{ route('Free') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📖</span> <span x-show="sidebarOpen">Free Courses</span>
            </a>
        </nav>
    </div> --}}



    <!-- Sidebar as Overlay -->
<div
    x-show="sidebarOpen"
    @click.away="sidebarOpen = false"
    class="fixed top-0 left-0 z-50 w-64 h-full bg-gray-800 text-white transition-transform duration-300 transform"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    style="background-color: #391473"
>
    <div class="p-4 space-y-6">

    <br>
        <!-- Close Button -->
<div class="flex flex-row-reverse items-center justify-between w-full px-4">
    <button @click="sidebarOpen = false" class="text-white hover:text-red-400 text-2xl font-bold">
        &larr;
    </button>

    <h2 class="text-xl font-bold text-white">UniHub</h2>
</div>


        <nav class="flex flex-col space-y-4">
            <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📊</span><span>Dashboard</span>
            </a>
            <a href="{{ route('user.courses.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📚</span><span>Courses</span>
            </a>
            <a href="{{ route('users.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>👥</span><span>Users</span>
            </a>

            @if($registeredCourses && $registeredCourses->isNotEmpty())
            <a href="{{ route('user.courses.lectures', $registeredCourses->first()->id) }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>🎥</span><span x-show="sidebarOpen">Lectures</span>
            @else
     <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2 disabled">
              @endif


            <a href="{{ route('chatboard.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>💬</span><span>Chat</span>
            </a>
            <a href="{{ route('user.settings.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>⚙️</span><span>Settings</span>
            </a>
            <a href="{{ route('uni') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>🏫</span><span>Universities</span>
            </a>
            <a href="{{ route('Free') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📖</span><span>Free Courses</span>
            </a>
        </nav>
    </div>
</div>

    <!-- Main Content -->


     <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Top Bar -->
            <div class="bg-white shadow px-4 py-3 flex justify-between items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="text-xl text-gray-800 focus:outline-none">
                    ☰
                </button>
                {{-- <span class="font-semibold text-gray-600">Welcome, {{ Auth::user()->name }}</span> --}}
            </div>
    <main class="flex-1 p-6 overflow-auto">
        <h1 class="text-3xl font-semibold mb-6">Lectures for Course: {{ $course->title }}</h1>

        @if($lectures->isEmpty())
            <p class="text-gray-600">There are no lectures available for this course yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($lectures as $lecture)
                <div class="bg-white rounded shadow p-4">


                    <img src="{{ asset('images/image1.png') }}"
                    alt="Lecture Image"
                    class="rounded mb-4 w-full h-40 object-cover">


                    {{-- <img src="https://source.unsplash.com/400x200/?lecture,education&sig={{ $loop->index }}" alt="Lecture Image" class="rounded mb-4 w-full h-40 object-cover"> --}}
                    <h2 class="text-xl font-bold mb-2">{{ $lecture->title }}</h2>
                    <p class="text-gray-600 mb-2">{{ $lecture->description ?? 'No description available.' }}</p>
                    <p class="text-sm text-gray-400 mb-4">Created at: {{ $lecture->created_at->format('Y-m-d') }}</p>
                    @if($lecture->link)
                        <a href="{{ $lecture->link }}" target="_blank" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">View</a>
                    @else
                        <span class="text-sm text-red-500">No link available</span>
                    @endif
                </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('user.courses.index') }}" class="inline-block mt-6 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">← Back to Courses</a>
    </main>
</div>

</body>
</html>

</x-app-layout>
