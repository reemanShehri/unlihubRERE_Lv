<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Universities') }}
        </h2>
    </x-slot>


    @if (session('success'))
        <div id="success-message" class="mb-4 bg-green-100 text-green-700 p-4 rounded">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 3000); // 3 seconds
        </script>
    @endif

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.universities.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Add University</a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Name</th>

                                              <th class="px-4 py-2 text-left font-medium text-gray-600">Country</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Website</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Student Portal</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Moodle</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Facebook</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Telegram</th>


                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($universities as $university)
                            <tr>
                                <td class="px-4 py-2">{{ $university->id }}</td>
                                <td class="px-4 py-2">{{ $university->name }}</td>


                                  <td class="px-4 py-2">{{ $university->country }}</td>
                                <td class="px-4 py-2">
                                    @if($university->official_website)
                                        <a href="{{ $university->official_website }}" class="text-blue-600 hover:underline" target="_blank">Visit</a>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    @if($university->student_portal)
                                        <a href="{{ $university->student_portal }}" class="text-blue-600 hover:underline" target="_blank">Portal</a>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    @if($university->moodle_link)
                                        <a href="{{ $university->moodle_link }}" class="text-blue-600 hover:underline" target="_blank">Moodle</a>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    @if($university->facebook_page)
                                        <a href="{{ $university->facebook_page }}" class="text-blue-600 hover:underline" target="_blank">Facebook</a>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    @if($university->telegram_group)
                                        <a href="{{ $university->telegram_group }}" class="text-blue-600 hover:underline" target="_blank">Telegram</a>
                                    @endif
                                </td>

                                
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.universities.edit', $university) }}" class="text-blue-500">Edit</a>
                                    |
                                    <form action="{{ route('admin.universities.destroy', $university) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($universities->isEmpty())
                            <tr><td colspan="3" class="px-4 py-2 text-center">No universities found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
