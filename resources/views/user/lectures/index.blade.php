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
    <div
        :class="sidebarOpen ? 'w-48' : 'w-16'"
        class="bg-gray-800 text-white transition-all duration-300 flex flex-col items-center py-4 space-y-6 overflow-hidden"
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
        </nav>
    </div>

    <!-- Main Content -->
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
