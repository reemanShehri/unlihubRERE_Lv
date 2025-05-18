<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Admin</h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6">
        <form action="{{ route('admin.admins.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf

            <div>
                <label for="user_id" class="block font-medium text-gray-700">Select User</label>
                <select name="user_id" id="user_id" class="w-full border-gray-300 rounded mt-1" required>
                    <option value="" disabled selected>Choose a user to promote</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Create Admin
                </button>
                <a href="{{ route('admin.admins.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
