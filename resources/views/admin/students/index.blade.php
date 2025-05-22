<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students List</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded px-6 py-4">

            <a href="{{ route('admin.students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                Add New Student
            </a>

            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">User Name</th>
                        <th class="border border-gray-300 px-4 py-2">User Email</th>
                        <th class="border border-gray-300 px-4 py-2">University</th>
                        <th class="border border-gray-300 px-4 py-2">Major</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $student->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->user->name ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->user->email ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->university->name ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->major->name ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('admin.students.edit', $student->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>

                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">No students found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>



        </div>
    </div>
</x-app-layout>
