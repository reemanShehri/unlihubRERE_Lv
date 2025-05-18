<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit User</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            @csrf
            @method('PUT')

            <x-input-label for="name" value="Name" />
            <x-text-input name="name" id="name" type="text" class="w-full mb-4" value="{{ old('name', $user->name) }}" required />
            <x-input-error :messages="$errors->get('name')" />

            <x-input-label for="email" value="Email" />
            <x-text-input name="email" id="email" type="email" class="w-full mb-4" value="{{ old('email', $user->email) }}" required />
            <x-input-error :messages="$errors->get('email')" />

            <x-input-label for="role" value="Role" />
            <select name="role" id="role" class="w-full mb-4 rounded border-gray-300">
                <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Student</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" />

            <x-input-label for="password" value="New Password (optional)" />
            <x-text-input name="password" id="password" type="password" class="w-full mb-4" />
            <x-input-error :messages="$errors->get('password')" />

            <x-input-label for="password_confirmation" value="Confirm Password" />
            <x-text-input name="password_confirmation" id="password_confirmation" type="password" class="w-full mb-4" />

            <x-primary-button class="mt-4">Update</x-primary-button>
        </form>
    </div>
</x-app-layout>
