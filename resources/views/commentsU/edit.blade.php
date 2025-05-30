<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Edit Comment/h2>

            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <textarea
                    name="body"
                    class="w-full border border-gray-300 rounded p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    rows="5"
                    required
                >{{ old('body', $comment->body) }}</textarea>

                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <div class="flex items-center justify-end mt-4 space-x-3">
                    <a
                        href="{{ route('chatboard.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded transition duration-200"
                    >
                        back
                    </a>
                 
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
