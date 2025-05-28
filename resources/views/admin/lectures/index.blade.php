<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">All Lectures</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('admin.lectures.create') }}" 
        class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition duration-300">
        + Add Lecture
     </a>
     
        {{-- <table class="w-full mt-4 border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Course</th>
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Link</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lectures as $lecture)
                    <tr>
                        <td class="border px-4 py-2">{{ $lecture->title }}</td>
                        <td class="border px-4 py-2">{{ $lecture->description ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $lecture->course->title ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $lecture->lecture_date }}</td>
                        <td><a href="{{ $lecture->link }}" class="text-blue-600 hover:underline" target="_blank">View Lecture</a></td>

                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.lectures.edit', $lecture) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('admin.lectures.destroy', $lecture) }}" method="POST" class="inline-block ml-2">
                                @csrf @method('DELETE')
                                <button class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}


        <form method="GET" action="{{ route('admin.lectures.index') }}" class="mb-4">
            <select name="course_id" class="border px-2 py-1 rounded">
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        
            <input type="text" name="title" value="{{ request('title') }}" placeholder="Search by lecture title" class="border px-2 py-1 rounded"/>
        
            <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Filter</button>
            <a href="{{ route('admin.lectures.index') }}" 
            class="ml-2 text-gray-600 underline hover:text-gray-800 transition duration-200">
            Reset
         </a>
                 </form>
        
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Course</th>
                    <th>Lecture Date</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lectures as $lecture)
                    <tr>
                        <td>{{ $lecture->id }}</td>
                        <td>{{ $lecture->title }}</td>
                        <td>{{ $lecture->description }}</td>
                        <td>{{ $lecture->course->title ?? 'No course' }}</td>
                        <td>{{ $lecture->lecture_date }}</td>
                        <td><a href="{{ $lecture->link }}" target="_blank" class="text-blue-600 underline">Watch</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No lectures found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
</x-app-layout>
