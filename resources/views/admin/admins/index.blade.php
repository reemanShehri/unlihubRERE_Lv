<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admins List ({{ $admins->count() }})
            </h2>
            <a href="{{ route('admin.admins.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
               Add New Admin
            </a>
        </div>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        @if(session('success'))
            <div id="success-message" class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border-b border-gray-300">Name</th>
                    <th class="p-3 border-b border-gray-300">Email</th>
                    <th class="p-3 border-b border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr class="border-b border-gray-300">
                    <td class="p-3">{{ $admin->name }}</td>
                    <td class="p-3">{{ $admin->email }}</td>
                    <td class="p-3 space-x-2">

                        <a href="{{ route('admin.admins.edit', $admin->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded">
                           Edit
                        </a>

                        @if(auth()->id() !== $admin->id)
                        <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this admin?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded">
                                Delete
                            </button>
                        </form>

                        <form action="{{ route('admin.admins.demote', $admin->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Do you want to demote this admin to a regular user?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white py-1 px-3 rounded">
                                Demote
                            </button>
                        </form>
                        @else
                            <span class="text-gray-500 italic">You cannot delete yourself</span>
                        @endif

                    </td>
                </tr>
                @endforeach

                @if($admins->isEmpty())
                <tr>
                    <td colspan="3" class="text-center p-4 text-gray-500">No admins found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script>
        // Hide the success message after 3 seconds
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000); // 3000ms = 3 seconds
            }
        });
    </script>
</x-app-layout>
