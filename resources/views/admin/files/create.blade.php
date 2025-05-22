<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Upload New File Link</h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <form action="{{ route('admin.files.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            {{-- File Name --}}
            <div class="mb-5">
                <label for="name" class="block text-gray-700 font-semibold mb-2">File Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter file name"
                >
                @error('name')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- File URL --}}
            <div class="mb-5">
                <label for="file_url" class="block text-gray-700 font-semibold mb-2">File URL</label>
                <input
                    type="url"
                    name="file_url"
                    id="file_url"
                    value="{{ old('file_url') }}"
                    required
                    placeholder="https://example.com/file.pdf"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('file_url')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- User --}}
            <div class="mb-5">
                <label for="user_id" class="block text-gray-700 font-semibold mb-2">User</label>
                <select
                    name="user_id"
                    id="user_id"
                    required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="" disabled selected>Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Course --}}
            <div class="mb-6">
                <label for="course_id" class="block text-gray-700 font-semibold mb-2">Course</label>
                <select
                    name="course_id"
                    id="course_id"
                    required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="" disabled selected>Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition-colors duration-300"
            >
                Save File Link
            </button>
        </form>
    </div>
</x-app-layout>
