<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        
        <h2 class="text-xl font-bold mb-4">Courses List</h2>

        <ul>
            @foreach($courses as $course)
                <li class="mb-2">
                    <a href="{{ route('courses.show', $course->id) }}" class="text-blue-600 hover:underline">
                        {{ $course->title }} ({{ $course->students_count }} students)
                    </a>
                </li>
            @endforeach
        </ul>
            </div>
     
    </div>
</x-app-layout>
