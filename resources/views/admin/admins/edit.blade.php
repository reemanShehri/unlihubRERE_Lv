<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Admin</h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6">
        <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="user_name" class="block font-medium text-gray-700">Name</label>
                <input type="text" id="user_name" value="{{ $admin->name }}" disabled class="w-full border-gray-300 rounded mt-1 bg-gray-100" />
            </div>

            <div>
                <label for="user_email" class="block font-medium text-gray-700">Email</label>
                <input type="email" id="user_email" value="{{ $admin->email }}" disabled class="w-full border-gray-300 rounded mt-1 bg-gray-100" />
            </div>

            <div>
                <label for="role" class="block font-medium text-gray-700">Role</label>
                <select name="role" id="role" class="w-full border-gray-300 rounded mt-1" required>
                    <option value="user" {{ $admin->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Update Admin
                </button>
                <a href="{{ route('admin.admins.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
