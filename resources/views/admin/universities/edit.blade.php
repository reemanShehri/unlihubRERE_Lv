<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit University
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-4 font-medium text-sm text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.universities.update', $university->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">University Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $university->name) }}" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-6">
                    <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
                    <input type="text" name="country" id="country" value="{{ old('country', $university->country) }}" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>


                {{--  --}}


                 <!-- Official Website -->
    <div class="mb-4">
        <label for="official_website" class="block text-gray-700 text-sm font-bold mb-2">Official Website</label>
        <input type="url" name="official_website" id="official_website" value="{{ old('official_website', $university->official_website) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <!-- Student Portal -->
    <div class="mb-4">
        <label for="student_portal" class="block text-gray-700 text-sm font-bold mb-2">Student Portal</label>
        <input type="url" name="student_portal" id="student_portal" value="{{ old('student_portal', $university->student_portal) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <!-- Moodle Link -->
    <div class="mb-4">
        <label for="moodle_link" class="block text-gray-700 text-sm font-bold mb-2">Moodle Link</label>
        <input type="url" name="moodle_link" id="moodle_link" value="{{ old('moodle_link', $university->moodle_link) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <!-- Facebook Page -->
    <div class="mb-4">
        <label for="facebook_page" class="block text-gray-700 text-sm font-bold mb-2">Facebook Page</label>
        <input type="url" name="facebook_page" id="facebook_page" value="{{ old('facebook_page', $university->facebook_page) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <!-- Telegram Group -->
    <div class="mb-6">
        <label for="telegram_group" class="block text-gray-700 text-sm font-bold mb-2">Telegram Group</label>
        <input type="url" name="telegram_group" id="telegram_group" value="{{ old('telegram_group', $university->telegram_group) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

{{--  --}}

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update
                    </button>

                    <a href="{{ route('admin.universities.index') }}"
                       class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
