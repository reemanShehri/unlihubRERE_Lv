<x-app-layout>
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

        <div class="bg-white shadow-md rounded px-6 py-4 mb-4">

            <form method="GET" action="{{ route('admin.students.index') }}" class="flex flex-wrap gap-4 items-end">

                <!-- Search by Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ request('name') }}" 
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                </div>

                <!-- Filter by University -->
                <div>
                    <label for="university" class="block text-sm font-medium text-gray-700">University</label>
                    <select name="university" id="university"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="">All</option>
                        @foreach($universities as $university)
                            <option value="{{ $university->id }}" {{ request('university') == $university->id ? 'selected' : '' }}>
                                {{ $university->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter by Major -->
                <div>
                    <label for="major" class="block text-sm font-medium text-gray-700">Major</label>
                    <select name="major" id="major"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="">All</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->id }}" {{ request('major') == $major->id ? 'selected' : '' }}>
                                {{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Filter
                    </button>
                </div>

                <div>
                    <a href="{{ route('admin.students.index') }}" 
                       class="ml-2 inline-block bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded">
                       Reset
                    </a>
                </div>
            </form>
        </div>

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

            <div class="mt-4">
                {{ $students->appends(request()->query())->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
