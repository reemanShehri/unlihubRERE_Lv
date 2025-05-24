<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Posts
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @forelse ($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 p-4">
                    <!-- المحتوى النصي -->
                    <p class="text-gray-800 whitespace-pre-line">{{ $post->content }}</p>

                    <!-- الصورة -->
                    @if ($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image"
                             class="my-3 rounded max-w-full h-auto max-h-80" />
                    @endif

                    <!-- الملف -->
                    @if ($post->file_path)
                        <p class="my-3">
                            <a href="{{ asset('storage/' . $post->file_path) }}" target="_blank"
                               class="text-indigo-600 underline">
                               Download attached file
                            </a>
                        </p>
                    @endif

                    <!-- الرابط -->
                    @if ($post->link)
                        <p class="my-3">
                            <a href="{{ $post->link }}" target="_blank"
                               class="text-indigo-600 underline">
                               {{ $post->link }}
                            </a>
                        </p>
                    @endif

                    <div class="flex justify-end space-x-4 mt-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">You have no posts yet.</p>
            @endforelse
        </div>

        <br>

        <div class="flex justify-center mb-4">
            <a href="{{ route('chatboard.index') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                ChatBoard
            </a>
        </div>
    </div>
</x-app-layout>
