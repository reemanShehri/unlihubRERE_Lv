<x-app-layout>

       <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<div x-data="{ sidebarOpen: false }" class="flex ">
    <!-- Sidebar -->
    <div
        :class="sidebarOpen ? 'w-48' : 'w-16'"
        class="bg-gray-800 text-white transition-all duration-300 flex flex-col items-center py-4 space-y-6 overflow-y-auto sticky top-0 h-screen"
    >
        <h2 x-show="sidebarOpen" class="text-xl font-bold">UniHub</h2>
        <nav class="flex flex-col space-y-4 w-full items-center">
            <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📊</span> <span x-show="sidebarOpen">Dashboard</span>
            </a>
            <a href="{{ route('user.courses.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📚</span> <span x-show="sidebarOpen">Courses</span>
            </a>
            <a href="{{ route('user.courses.lectures', $registered_courses->first()->id) }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>🎥</span> <span x-show="sidebarOpen">Lectures</span>
            </a>
            <a href="{{ route('chatboard.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>💬</span> <span x-show="sidebarOpen">Chat</span>
            </a>
            <a href="{{ route('user.settings.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>⚙️</span> <span x-show="sidebarOpen">Settings</span>
            </a>
        </nav>
    </div>


 <!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <!-- Top Bar -->
    <div class="bg-white shadow-sm px-6 py-4 flex justify-between items-center border-b">
      <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 hover:text-gray-900 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
      <div class="flex items-center space-x-4">
        <span class="text-gray-700 font-semibold">{{ Auth::user()->name }}</span>
        <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
          <span class="text-indigo-600 font-medium">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
        </div>
      </div>
    </div>

    <!-- Page Content -->
    <main class="flex-1 overflow-y-auto p-6 space-y-8">

      <!-- ChatBoard Header -->
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">ChatBoard</h1>
        <div class="text-sm text-gray-500">{{ now()->format('l, F j, Y') }}</div>
      </div>

      <!-- Create New Post -->
      <section class="bg-white p-6 rounded-lg shadow border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800 mb-5">Create a new post</h3>
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-6">
          @csrf

          <!-- Upload Options -->
          <div class="flex space-x-6 items-center">
            <!-- Image Upload -->
            <label for="image" class="flex items-center cursor-pointer text-indigo-600 hover:text-indigo-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              Image
              <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(this)" />
            </label>

            <!-- File Upload -->
            <label for="file" class="flex items-center cursor-pointer text-indigo-600 hover:text-indigo-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-6-8h4l4 4v12a2 2 0 01-2 2H8a2 2 0 01-2-2V6a2 2 0 012-2z" />
              </svg>
              File
              <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.txt" class="hidden" />
            </label>

            <!-- Link Input Toggle -->
            <label for="link" class="flex items-center cursor-pointer text-indigo-600 hover:text-indigo-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 015.656 5.656l-1.414 1.414a4 4 0 01-5.656-5.656l1.414-1.414zM7.172 13.828a4 4 0 01-5.656-5.656l1.414-1.414a4 4 0 015.656 5.656L7.172 13.828z" />
              </svg>
              Link
            </label>
          </div>

          <!-- Link Input -->
          <input type="url" name="link" id="link" placeholder="https://example.com"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent hidden" />

          <!-- Image Preview -->
          <div id="imagePreviewContainer" class="mb-4 hidden">
            <img id="imagePreview" src="#" alt="Image Preview" class="max-w-full h-auto rounded-lg max-h-72" />
            <button type="button" onclick="removeImage()" class="mt-2 text-sm text-red-600 hover:text-red-800">
              Remove Image
            </button>
          </div>

          <!-- Post Content -->
          <textarea name="content" rows="5" placeholder="What's on your mind?"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none"
            required></textarea>

          <!-- Submit Button -->
          <div class="flex justify-end">
            <button type="submit"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200">
              Post
            </button>
          </div>
        </form>
      </section>

      <!-- Posts Section -->
      <section class="space-y-8">
        @forelse ($posts as $post)
        <article class="bg-white p-6 rounded-lg shadow border border-gray-200">

          <!-- Post Header -->
          <header class="flex items-center justify-between mb-5">
            <div class="flex items-center space-x-4">
              <div
                class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-medium text-lg">
                {{ strtoupper(substr($post->user->name, 0, 1)) }}
              </div>
              <div>
                <p class="font-semibold text-gray-800">{{ $post->user->name }}</p>
                <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
              </div>
            </div>
            @if($post->user_id === Auth::id())
            <div>
              <!-- Actions can be added here -->
            </div>
            @endif
          </header>

          <!-- Post Content -->
          <div class="mb-5 text-gray-700 whitespace-pre-line">
            {{ $post->content }}
          </div>

          @if ($post->image_path)
          <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image"
            class="mb-5 rounded max-w-full h-auto max-h-80" />
          @endif

          @if ($post->file_path)
          <p class="mb-5">
            <a href="{{ asset('storage/' . $post->file_path) }}" target="_blank" class="text-indigo-600 underline">
              Download attached file
            </a>
          </p>
          @endif

          @if ($post->link)
          <p class="mb-5">
            <a href="{{ $post->link }}" target="_blank" class="text-indigo-600 underline">
              {{ $post->link }}
            </a>
          </p>
          @endif

          <!-- Post Likes -->
          <div class="mb-6">
            <form method="POST" action="{{ route('posts.like', $post->id) }}">
              @csrf
              <button type="submit"
                class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-150">👍 Like
                ({{ $post->likes->count() }})</button>
            </form>
          </div>

          <!-- Comments Section -->
          <section class="border-t border-gray-100 pt-4">
            <h4 class="font-semibold text-gray-700 mb-3">Comments ({{ $post->comments->count() }})</h4>

            <!-- List Comments -->
            {{-- <ul class="space-y-4 max-h-64 overflow-y-auto">
              @foreach ($post->comments as $comment)
              <li class="flex space-x-4">
                <div
                  class="flex-shrink-0 h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-medium">
                  {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                </div>
                <div class="bg-gray-100 rounded-lg p-3 flex-1">
                  <p class="text-sm font-semibold text-gray-800">{{ $comment->user->name }}</p>
                  <p class="text-gray-700 text-sm whitespace-pre-line">{{ $comment->body }}</p>
                  <p class="text-xs text-gray-500 mt-1">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
              </li>
              @endforeach
            </ul> --}}


            <ul class="space-y-4 max-h-64 overflow-y-auto">
                @foreach ($post->comments as $comment)
                    <li class="flex space-x-4">
                        <div
                            class="flex-shrink-0 h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-medium">
                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        </div>
                        <div class="bg-gray-100 rounded-lg p-3 flex-1">
                            <p class="text-sm font-semibold text-gray-800">{{ $comment->user->name }}</p>
                            <p class="text-gray-700 text-sm whitespace-pre-line">{{ $comment->content }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $comment->created_at->diffForHumans() }}</p>

                            {{-- زر لايك --}}
                        {{-- <form action="{{ route('comments.like', $comment->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-sm text-blue-600 hover:underline mt-1">
                                    ❤️ Like ({{ $comment->likes->count()?? 0 }})
                                </button>
                            </form> --}}

                        <form action="{{ route('comments.toggleLike', $comment->id) }}" method="POST">
                                @csrf
                                <button
                                class="like-btn text-blue-500 hover:underline text-sm"
                                data-comment-id="{{ $comment->id }}"
                            >
                                ❤️ <span class="like-count">{{ $comment->likes->count() }}</span>
                            </button>

                            </form> 



                        </div>
                    </li>
                @endforeach
            </ul>


            <!-- Add New Comment -->
            <form method="POST" action="{{ route('comments.store', $post->id) }}" class="mt-4 flex space-x-3">
              @csrf
              <input type="text" name="content" placeholder="Write a comment..."
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required />
              <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition-colors duration-200">
                Comment
              </button>
            </form>
          </section>

        </article>
        @empty
        <p class="text-gray-600">No posts yet. Be the first to post!</p>
        @endforelse
      </section>
    </main>
  </div>

  <script>
    function previewImage(input) {
      const previewContainer = document.getElementById('imagePreviewContainer');
      const preview = document.getElementById('imagePreview');
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.src = e.target.result;
          previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
      } else {
        previewContainer.classList.add('hidden');
        preview.src = '#';
      }
    }

    function removeImage() {
      const input = document.getElementById('image');
      input.value = '';
      const previewContainer = document.getElementById('imagePreviewContainer');
      const preview = document.getElementById('imagePreview');
      preview.src = '#';
      previewContainer.classList.add('hidden');
    }
  </script>

    <style>

. sidebarOpen {
  background-color: #1A237E; /* كحلي غامق */
  color: rgb(0, 0, 0); /* نص أبيض عشان يبان */
}

        /* Custom pagination styling to match our design */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 4px;
        }

        .pagination a, .pagination span {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
        }

        .pagination a {
            color: #4F46E5;
            border: 1px solid #E5E7EB;
        }

        .pagination a:hover {
            background-color: #F3F4F6;
        }

        .pagination .active span {
            background-color: #4F46E5;
            color: white;
            border-color: #4F46E5;
        }

        .pagination .disabled span {
            color: #9CA3AF;
            border-color: #E5E7EB;
        }
    </style>


<script>
    function previewImage(input) {
      const preview = document.getElementById('imagePreview');
      const container = document.getElementById('imagePreviewContainer');

      if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
          preview.src = e.target.result;
          container.classList.remove('hidden');
        };

        reader.readAsDataURL(input.files[0]);
      } else {
        container.classList.add('hidden');
        preview.src = '#';
      }
    }
  </script>




</x-app-layout>
