<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Create Comment</h2>
    </x-slot>

    <div class="py-4 max-w-xl mx-auto">
        <form action="{{ route('admin.comments.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <label>User:</label>
            <select name="user_id" class="w-full mb-4">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>

            <label>Post:</label>
            <select name="post_id" class="w-full mb-4">
                @foreach($posts as $post)
                    <option value="{{ $post->id }}">{{ Str::limit($post->content, 50) }}</option>
                @endforeach
            </select>

            <label>Comment Body:</label>
            <textarea name="body" rows="4" class="w-full mb-4">{{ old('body') }}</textarea>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
</x-app-layout>
