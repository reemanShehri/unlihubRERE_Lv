<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Comment</h2>
    </x-slot>

    <div class="py-4 max-w-xl mx-auto">
        <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            {{-- User Select --}}
            <div class="mb-4">
                <label for="user_id" class="block font-medium text-sm text-gray-700">User:</label>
                <select name="user_id" id="user_id" class="w-full mt-1 rounded border-gray-300">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $comment->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Post Select --}}
            <div class="mb-4">
                <label for="post_id" class="block font-medium text-sm text-gray-700">Post:</label>
                <select name="post_id" id="post_id" class="w-full mt-1 rounded border-gray-300">
                    @foreach($posts as $post)
                        <option value="{{ $post->id }}" {{ $comment->post_id == $post->id ? 'selected' : '' }}>
                            {{ Str::limit($post->content, 50) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Body --}}
            <div class="mb-4">
                <label for="body" class="block font-medium text-sm text-gray-700">Comment Body:</label>
                <textarea name="body" id="body" rows="4" class="w-full mt-1 rounded border-gray-300">{{ old('body', $comment->body) }}</textarea>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Update Comment
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
