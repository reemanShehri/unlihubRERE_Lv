<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Edit File</h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-8 px-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <form action="{{ route('admin.files.update', $file->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">File Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $file->name) }}"
                    required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                >
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="file_url" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">File URL</label>
                <input
                    type="url"
                    name="file_url"
                    id="file_url"
                    value="{{ old('file_url', $file->path) }}"
                    required
                    placeholder="https://example.com/file.pdf"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                >
                @error('file_url')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="user_id" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">User</label>
                <select
                    name="user_id"
                    id="user_id"
                    required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                >
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $file->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="course_id" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Course</label>
                <select
                    name="course_id"
                    id="course_id"
                    required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                >
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $course->id == $file->course_id ? 'selected' : '' }}>
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition-colors duration-300"
            >
                Update File
            </button>
        </form>
    </div>
</x-app-layout>
