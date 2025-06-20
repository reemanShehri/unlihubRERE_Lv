<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Welcome --}}
            {{-- <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-900"> --}}

                <div class="shadow-sm sm:rounded-lg p-6 text-gray-900"
     style="
        background-color: #a3b6ce; /* Tailwind gray-700 */
        background-image: url('https://www.transparenttextures.com/patterns/dark-mosaic.png
'');
        background-repeat: repeat;
        color: white;
    ">
                <p class="text-lg font-medium mb-4">
                    Welcome, {{ Auth::user()->name }} 👨‍💻!
                </p>
            </div>

            {{-- Quick Links --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @php
                        $quickLinks = [
                            ['label' => 'Students', 'route' => 'admin.students.index'],
                            ['label' => 'Universities', 'route' => 'admin.universities.index'],
                            ['label' => 'Courses', 'route' => 'admin.courses.index'],
                            ['label' => 'Colleges', 'route' => 'admin.colleges.index'],
                            ['label' => 'Majors', 'route' => 'admin.majors.index'],
                            ['label' => 'Users', 'route' => 'admin.users.index'],
                            ['label' => 'Posts', 'route' => 'admin.posts.index'],
                            ['label' => 'Comments', 'route' => 'admin.comments.index'],
                            ['label' => 'Lectures', 'route' => 'admin.lectures.index'],
                            ['label' => 'Files', 'route' => 'admin.files.index'],
                            ['label' => 'Admins', 'route' => 'admin.admins.index'],
                        ];
                    @endphp

                    @foreach ($quickLinks as $link)
                        <a href="{{ route($link['route']) }}" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium py-3 px-4 rounded-lg text-center shadow-sm transition">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Stats Section --}}

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Statistics Overview</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-gray-800">
                    <div>Total Students: <strong>{{ $studentsCount }}</strong> <a href="{{ route('admin.students.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Universities: <strong>{{ $universitiesCount ?? '...' }}</strong> <a href="{{ route('admin.universities.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Courses: <strong>{{ $coursesCount ?? '...' }}</strong> <a href="{{ route('admin.courses.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Colleges: <strong>{{ $collegesCount ?? '...' }}</strong> <a href="{{ route('admin.colleges.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Majors: <strong>{{ $majorsCount ?? '...' }}</strong> <a href="{{ route('admin.majors.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Users: <strong>{{ $usersCount ?? '...' }}</strong> <a href="{{ route('admin.users.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Posts: <strong>{{ $postsCount ?? '...' }}</strong> <a href="{{ route('admin.posts.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Comments: <strong>{{ $commentsCount ?? '...' }}</strong> <a href="{{ route('admin.comments.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Lectures: <strong>{{ $lecturesCount ?? '...' }}</strong> <a href="{{ route('admin.lectures.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                    <div>Total Files: <strong>{{ $filesCount ?? '...' }}</strong> <a href="{{ route('admin.files.index') }}" class="text-blue-500 hover:underline">(View)</a></div>
                </div>
            </div>

            {{-- Charts --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">User Registrations (Last 6 Months)</h3>
                <canvas id="registrationsChart" style="max-height:300px;"></canvas>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Top 5 Courses by Number of Students</h3>
                <canvas id="topCoursesChart" style="max-height:300px;"></canvas>
            </div>

        </div>
    </div>

    {{-- Chart.js Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const registrationsData = @json($registrationsMonthly);
        const topCoursesData = @json($topCourses);

        const regLabels = registrationsData.map(item => item.month);
        const regCounts = registrationsData.map(item => item.count);

        new Chart(document.getElementById('registrationsChart'), {
            type: 'line',
            data: {
                labels: regLabels,
                datasets: [{
                    label: 'Registrations',
                    data: regCounts,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 5,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        const courseLabels = topCoursesData.map(course => course.name);
        const courseCounts = topCoursesData.map(course => course.students_count);

        new Chart(document.getElementById('topCoursesChart'), {
            type: 'bar',
            data: {
                labels: courseLabels,
                datasets: [{
                    label: 'Students',
                    data: courseCounts,
                    backgroundColor: 'rgba(255, 159, 64, 0.7)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-app-layout>
