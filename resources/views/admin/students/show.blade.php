<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $student->name }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Basic information about the student.
                    </p>
                </div>
                <div class="border-t border-gray-200 mt-4">
                    <dl class="divide-y divide-gray-200">
                        <div class="py-4 flex">
                            <dt class="text-sm font-medium text-gray-500 w-1/3">ID</dt>
                            <dd class="text-sm text-gray-900 w-2/3">{{ $student->id }}</dd>
                        </div>
                        <div class="py-4 flex">
                            <dt class="text-sm font-medium text-gray-500 w-1/3">Name</dt>
                            <dd class="text-sm text-gray-900 w-2/3">{{ $student->name }}</dd>
                        </div>
                        <div class="py-4 flex">
                            <dt class="text-sm font-medium text-gray-500 w-1/3">Email</dt>
                            <dd class="text-sm text-gray-900 w-2/3">{{ $student->email }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.students.index') }}"
                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
