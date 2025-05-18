<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit Post</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="user_id" class="block text-sm font-bold text-gray-700 mb-2">User</label>
                <select name="user_id" id="user_id" class="w-full border rounded py-2 px-3">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="chat_board_id" class="block text-sm font-bold text-gray-700 mb-2">Chat Board</label>
                <select name="chat_board_id" id="chat_board_id" class="w-full border rounded py-2 px-3">
                    @foreach($chatBoards as $board)
                        <option value="{{ $board->id }}" {{ $post->chat_board_id == $board->id ? 'selected' : '' }}>
                            {{ $board->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Content</label>
                <textarea name="content" id="content" rows="4" class="w-full border rounded py-2 px-3">{{ old('content', $post->content) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
