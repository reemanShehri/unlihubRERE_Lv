<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Create New Post</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.posts.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="user_id" class="block text-sm font-bold text-gray-700 mb-2">User</label>
                <select name="user_id" id="user_id" class="w-full border rounded py-2 px-3">
                    <option disabled selected>Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                @error('user_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="chat_board_id" class="block text-sm font-bold text-gray-700 mb-2">Chat Board</label>
                <select name="chat_board_id" id="chat_board_id" class="w-full border rounded py-2 px-3">
                    <option disabled selected>Select a board</option>
                    @foreach($chatBoards as $board)
                        <option value="{{ $board->id }}">{{ $board->title }}</option>
                    @endforeach
                </select>
                @error('chat_board_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Content</label>
                <textarea name="content" id="content" rows="4" class="w-full border rounded py-2 px-3">{{ old('content') }}</textarea>
                @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                Create
            </button>
        </form>
    </div>
</x-app-layout>
