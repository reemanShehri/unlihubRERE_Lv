<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header"><h2 class="text-xl font-semibold">Files</h2></x-slot>

    <div class="py-4 max-w-5xl mx-auto">
        <a href="{{ route('admin.files.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Upload New File</a>

        @if(session('success'))
            <div class="mt-2 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        @if($files->count() > 0)
            <table class="mt-4 w-full table-auto border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Preview</th>
                        <th class="border px-4 py-2">File</th>
                        <th class="border px-4 py-2">User</th>
                        <th class="border px-4 py-2">Course</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                        @php
                            $ext = strtolower(pathinfo($file->path, PATHINFO_EXTENSION));
                            $url = asset('storage/' . $file->path);
                        @endphp
                        <tr>
                            <td class="border px-4 py-2">{{ $file->name }}</td>

                            <td class="border px-4 py-2">
                                @if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ $url }}" alt="{{ $file->name }}" class="w-24 h-auto rounded shadow" />
                                @elseif($ext == 'pdf')
                                    <embed src="{{ $url }}" type="application/pdf" width="100" height="100" />
                                @else
                                    <span class="text-gray-500">No preview</span>
                                @endif
                            </td>

                            <td class="border px-4 py-2">
                                <a href="{{ $file->path }}" target="_blank" class="text-blue-600 hover:underline">View/Download</a>
                            </td>


                            <td class="border px-4 py-2">{{ $file->user->name ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $file->course->title ?? '-' }}</td>

                            <td class="border px-4 py-2 flex gap-2">
                                <a href="{{ route('admin.files.edit', $file->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('admin.files.destroy', $file->id) }}" method="POST" onsubmit="return confirm('Delete file?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:underline" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="mt-4 text-center text-gray-600">No files found.</p>
        @endif
    </div>
</x-app-layout>
