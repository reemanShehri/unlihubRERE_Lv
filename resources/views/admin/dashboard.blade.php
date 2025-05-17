<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Welcome, {{ Auth::user()->name }} 👨‍💻!

                    <br>
                    <ul class="mt-4 list-disc list-inside">
                        <li>
                            Total Students: {{ $studentsCount }}
                         <a href="{{ route('admin.students.index') }}" class="text-blue-500 hover:underline">(View Students)</a>
                        </li>
                        <li>
                            Total Universities: {{ $universitiesCount ?? '...' }}
                            <a href="{{ route('admin.universities.index') }}" class="text-blue-500 hover:underline">(View Universities)</a>
                        </li>
                        <li>
                            Total Courses: {{ $coursesCount ?? '...' }}
                            <a href="{{ route('admin.courses.index') }}" class="text-blue-500 hover:underline">(View Courses)</a> 
                        </li>

                        <li>
                            Total Colleges: {{ $collegesCount ?? '...' }}
                            <a href="{{ route('admin.colleges.index') }}" class="text-blue-500 hover:underline">(View Colleges)</a>
                        </li>

                        <li>
                            Total Majors: {{ $majorsCount ?? '...' }}
                            <a href="{{ route('admin.majors.index') }}" class="text-blue-500 hover:underline">(View Majors)</a>
                        </li>




                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
