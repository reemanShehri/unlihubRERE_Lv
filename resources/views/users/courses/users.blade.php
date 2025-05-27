<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            Participants in: {{ $course->title }}
        </h1>

        @if($students->isEmpty())
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded shadow">
                No participants registered in this course yet.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 shadow-md rounded">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">Name</th>
                            <th class="py-3 px-4 text-left">Email</th>
                            <th class="py-3 px-4 text-left">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->user->name }}</td> <!-- الوصول عبر العلاقة المتسلسلة -->
                            <td>{{ $student->university->name }}</td>
                            <td>{{ $student->college->name }}</td>
                            <td>{{ $student->major->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
