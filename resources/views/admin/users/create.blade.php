<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New User</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            @csrf

            <x-input-label for="name" value="Name" />
            <x-text-input name="name" id="name" type="text" class="w-full mb-4" value="{{ old('name') }}" required />
            <x-input-error :messages="$errors->get('name')" />

            <x-input-label for="email" value="Email" />
            <x-text-input name="email" id="email" type="email" class="w-full mb-4" value="{{ old('email') }}" required />
            <x-input-error :messages="$errors->get('email')" />

            <x-input-label for="role" value="Role" />
            <select name="role" id="role" class="w-full mb-4 rounded border-gray-300">
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" />

            <x-input-label for="password" value="Password" />
            <x-text-input name="password" id="password" type="password" class="w-full mb-4" required />
            <x-input-error :messages="$errors->get('password')" />

            <x-input-label for="password_confirmation" value="Confirm Password" />
            <x-text-input name="password_confirmation" id="password_confirmation" type="password" class="w-full mb-4" required />

            <x-primary-button class="mt-4">Create</x-primary-button>
        </form>
    </div>
</x-app-layout>
