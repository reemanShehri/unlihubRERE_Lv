<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            University Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h3 class="text-2xl font-bold mb-4">{{ $university->name }}</h3>
                <p class="text-gray-700 mb-2"><strong>Country:</strong> {{ $university->country }}</p>
            </div>

            <a href="{{ route('admin.universities.index') }}"
               class="inline-block mt-4 text-blue-500 hover:text-blue-700 font-semibold">
                &larr; Back to List
            </a>

        </div>
    </div>
</x-app-layout>
