<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Courses List</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.courses.create') }}" class="mb-4 inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add New Course</a>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        



        {{--  --}}

         <!-- فورم البحث -->
         <form method="GET" action="{{ route('admin.courses.index') }}" class="mb-6 flex gap-2 items-center">

            <input 
                type="text" 
                name="title" 
                placeholder="Search by course title..." 
                value="{{ request('title') }}" 
                class="border border-gray-300 rounded px-3 py-2 flex-1"
            />

            <select name="major" class="border border-gray-300 rounded px-3 py-2">
                <option value="">All Majors</option>
                @foreach($majors as $major)
                    <option value="{{ $major->id }}" {{ request('major') == $major->id ? 'selected' : '' }}>
                        {{ $major->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Search</button>

            <a href="{{ route('admin.courses.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Reset</a>

        </form>

        {{--  --}}

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Major</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $course->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $course->title }}</td>
                    <td class="py-2 px-4 border-b">{{ Str::limit($course->description, 50) }}</td>
                    <td class="py-2 px-4 border-b">{{ $course->major->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 text-center">No courses found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $courses->links() }}
        </div>
    </div>
</x-app-layout>
