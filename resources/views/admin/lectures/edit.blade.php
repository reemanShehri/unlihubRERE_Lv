<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Lecture
        </h2>
    </x-slot>

    <div class="p-6 max-w-2xl mx-auto bg-white shadow-md rounded">
        <form action="{{ route('admin.lectures.update', $lecture->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $lecture->title) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $lecture->description) }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Link -->
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium text-gray-700">Lecture Link</label>
                <input type="url" name="link" id="link" value="{{ old('link', $lecture->link) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="https://example.com">
                @error('link') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Course -->
            <div class="mb-4">
                <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                <select name="course_id" id="course_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">-- Select Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id', $lecture->course_id) == $course->id ? 'selected' : '' }}>
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
                @error('course_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Lecture Date -->
            <div class="mb-4">
                <label for="lecture_date" class="block text-sm font-medium text-gray-700">Lecture Date</label>
                <input type="date" name="lecture_date" id="lecture_date" value="{{ old('lecture_date', $lecture->lecture_date) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('lecture_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update Lecture
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
