<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">All Lectures</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('admin.lectures.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">+ Add Lecture</a>

        <table class="w-full mt-4 border">
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
        </table>
    </div>
</x-app-layout>
