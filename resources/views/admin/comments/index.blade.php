<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Comments</h2>
    </x-slot>

    <div class="py-4 max-w-5xl mx-auto">
        <a href="{{ route('admin.comments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Comment</a>

        @foreach ($comments as $comment)
            <div class="bg-white p-4 shadow mb-3 rounded">
                <p><strong>User:</strong> {{ $comment->user->name ?? 'N/A' }}</p>
                <p><strong>Post:</strong> {{ $comment->post->content ?? 'N/A' }}</p>
                <p><strong>Body:</strong> {{ $comment->body }}</p>
                <div class="mt-2">
                    <a href="{{ route('admin.comments.edit', $comment->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-500 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $comments->links() }}
    </div>
</x-app-layout>
