<x-app-layout>
       <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen">
        <!-- Sidebar -->
        <div
            :class="sidebarOpen ? 'w-48' : 'w-16'"
            class="bg-gray-800 text-white transition-all duration-300 flex flex-col items-center py-4 space-y-6 overflow-hidden"
        >
            <h2 x-show="sidebarOpen" class="text-xl font-bold">UniHub</h2>

            <nav class="flex flex-col space-y-4 w-full items-center">
                <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>📊</span> <span x-show="sidebarOpen">Dashboard</span>
                </a>
                <a href="{{ route('user.courses.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>📚</span> <span x-show="sidebarOpen">Courses</span>
                </a>


                <a href="{{ route('users.index') }}"
                class="block px-4 py-2 hover:bg-gray-200 rounded">
                <span>👥</span>
                <span x-show="sidebarOpen">Users</span>
             </a>


            @if($registeredCourses && $registeredCourses->isNotEmpty())
            <a href="{{ route('user.courses.lectures', $registeredCourses->first()->id) }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>🎥</span><span x-show="sidebarOpen">Lectures</span>
            @else
     <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2 disabled">
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
            </nav>
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

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-100 space-y-10">

                <!-- ✅ Registered Courses -->
                <section class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4 border-b pb-2">✅ Registered Courses</h2>

                    @if($registeredCourses->count())
                        <ul class="space-y-4">
                            @foreach($registeredCourses as $course)
                                <li class="p-4 border rounded-lg flex justify-between items-start bg-gray-50 hover:bg-white transition">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">{{ $course->title }}</h3>
                                        <p class="text-sm text-gray-600 mt-1">{{ $course->description }}</p>
                                    </div>
                                    <div class="flex flex-col items-end space-y-2">
                                        <span class="text-sm text-gray-500">{{ $course->code }}</span>
                                        <form method="POST" action="{{ route('user.courses.unregister') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <button class="text-sm text-red-600 hover:underline">❌ Remove</button>
                                        </form>



                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">You haven’t registered for any courses yet.</p>
                    @endif
                </section>

                <!-- 🌟 Suggested Courses -->
                <section class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4 border-b pb-2">🌟 Suggested Courses (Your Major)</h2>

                    @if($suggestedCourses->count())
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($suggestedCourses as $course)
                                <div class="p-4 border rounded-lg bg-gray-50 hover:bg-white transition">
                                    <h3 class="text-lg font-bold text-gray-800">{{ $course->title }}</h3>
                                    <p class="text-sm text-gray-600 mt-1 mb-3">{{ $course->description }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-500">{{ $course->code }}</span>
                                        <form method="POST" action="{{ route('user.courses.register') }}">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <button class="text-sm text-blue-600 hover:underline">Register</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No suggested courses available for your major.</p>
                    @endif
                </section>

            </main>
        </div>
    </div>
</x-app-layout>
