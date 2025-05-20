<x-app-layout>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen">
        <!-- Sidebar -->


        <div
            :class="sidebarOpen ? 'w-48' : 'w-16'"
            class="bg-gray-800 text-white transition-all duration-300 flex flex-col items-center py-4 space-y-6 overflow-hidden"
        >
            <h2 x-show="sidebarOpen" class="text-xl font-bold">UniHub</h2>

            <nav class="flex flex-col space-y-4 w-full items-center">
                <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>📊</span> <span x-show="sidebarOpen">Dashboard</span>
                </a>
                <a href="{{ route('user.courses.index')}}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>📚</span> <span x-show="sidebarOpen">Courses</span>
                </a>
                <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>🎥</span> <span x-show="sidebarOpen">Lectures</span>
                </a>
                <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>💬</span> <span x-show="sidebarOpen">Chat</span>
                </a>
                <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>⚙️</span> <span x-show="sidebarOpen">Settings</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <div class="bg-white shadow px-4 py-3 flex justify-between items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="text-xl text-gray-800 focus:outline-none">
                    ☰
                </button>
            </div>

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-100 space-y-6">
                <div class="bg-white p-6 rounded shadow text-lg font-semibold text-gray-700 hover:bg-gray-50">
                    {{ __("You're logged in, ") . Auth::user()->name . "!" }}
                </div>

                <!-- Statistics -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-50">
                        <h4 class="text-lg font-semibold"> Courses Count</h4>
                        <p class="text-2xl text-indigo-600 mt-2">{{ $courses_count }}</p>
                    </div>

                    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-50">
                        <h4 class="text-lg font-semibold">Lecture Count</h4>
                        <p class="text-2xl text-indigo-600 mt-2">{{ $lectures_count }}</p>
                    </div>

                    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-50">
                        <h4 class="text-lg font-semibold">University</h4>
                        <p class="text-lg mt-2 text-gray-700">
                            {{ \App\Models\University::find(Auth::user()->student->university_id)->name ?? 'University not set' }}
                        </p>
                    </div>

                    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-50">
                        <h4 class="text-lg font-semibold">Major</h4>
                        <p class="text-lg mt-2 text-gray-700">
                            {{ Auth::user()->student->major->name ?? 'Major not set' }}
                        </p>
                    </div>

                    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-50">
                        <h4 class="text-lg font-semibold">College</h4>
                        <p class="text-lg mt-2 text-gray-700">
                            {{ Auth::user()->student->college->name ?? 'College not set' }}
                        </p>
                    </div>
                </div>

                <!-- Registered Courses List -->
                <div class="bg-white p-6 rounded shadow">
                    <h4 class="text-lg font-semibold mb-4">Courses You're Registered In</h4>
                    @if(count($registered_courses) > 0)
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            @foreach($registered_courses as $course)
                                <li>{{ $course->title }}</li>

                            @endforeach
                        </ul>
                        Total: {{ $registered_courses->count() }}

                    @else
                    <p class="text-gray-500">You are not registered in any courses yet. Total: {{ $registered_courses->count() }}</p>

                    @endif
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-4 rounded shadow">
                        <h4 class="text-lg font-semibold mb-2">Courses by College</h4>
                        <div class="relative w-80 h-80 mx-auto">
                            <canvas id="coursesByCollegeChart" width="240" height="240"></canvas>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <p class="text-gray-500 text-sm"></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded shadow">
                        <h4 class="text-lg font-semibold mb-2">Weekly User Activity</h4>
                        <canvas id="weeklyActivityChart"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart Scripts -->
    <script>
        const ctx1 = document.getElementById('coursesByCollegeChart').getContext('2d');
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($collegeLabels) !!},
                datasets: [{
                    label: 'Courses',
                    data: {!! json_encode($collegeCounts) !!},
                    backgroundColor: ['#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#6366F1'],
                    borderWidth: 1
                }]
            }
        });

        const ctx2 = document.getElementById('weeklyActivityChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: {!! json_encode($activityDays) !!},
                datasets: [{
                    label: 'Activities',
                    data: {!! json_encode($activityCounts) !!},
                    backgroundColor: '#3B82F6'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
