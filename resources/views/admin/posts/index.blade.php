<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Posts</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.posts.create') }}"
           class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + New Post
        </a>

        <form method="GET" action="{{ route('admin.posts.index') }}" class="mb-4 flex items-center space-x-2">
            <input type="text" name="user_name" value="{{ request('user_name') }}" placeholder="Search by user name" 
                   class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Filter</button>
            <a href="{{ route('admin.posts.index') }}" 
            class="ml-4 inline-block bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded transition duration-200">
            Reset
         </a>
         
                 </form>
        

        <div class="bg-white shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2">User</th>
                        <th class="px-4 py-2">Chat Board</th>
                        <th class="px-4 py-2">Content</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($posts as $post)
                        <tr>
                            <td class="px-4 py-2">{{ $post->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $post->chatBoard->title ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ Str::limit($post->content, 50) }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
