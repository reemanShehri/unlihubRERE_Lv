<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Majors List</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('admin.majors.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Major
            </a>
        </div>

        <table class="min-w-full bg-white border border-gray-200 rounded">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Major Name</th>
                    <th class="py-2 px-4 border-b">College</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($majors as $major)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $major->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $major->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $major->college->name ?? 'N/A' }}</td>
                        <td class="py-2 px-4 border-b space-x-2">
                            <a href="{{ route('admin.majors.edit', $major) }}"
                               class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('admin.majors.destroy', $major) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Are you sure to delete this major?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $majors->links() }}
        </div>
    </div>
</x-app-layout>
