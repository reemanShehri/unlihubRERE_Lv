<x-app-layout>

       <!-- Tailwind CSS CDN -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<div x-data="{ sidebarOpen: false }" class="flex ">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Sidebar -->
    <div
        :class="sidebarOpen ? 'w-48' : 'w-16'"
        class="bg-gray-800 text-white transition-all duration-300 flex flex-col items-center py-4 space-y-6 overflow-y-auto sticky top-0 h-screen"
    >
        <h2 x-show="sidebarOpen" class="text-xl font-bold">UniHub</h2>
        <nav class="flex flex-col space-y-4 w-full items-center">
            <a href="{{ route('chatboard.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📊</span> <span x-show="sidebarOpen">Dashboard</span>
            </a>
            <a href="{{ route('user.courses.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📚</span> <span x-show="sidebarOpen">Courses</span>
            </a>

            <a href="{{ route('users.index') }}"
            class="block px-4 py-2 hover:bg-gray-200 rounded">
            <span>👥</span>
            <span x-show="sidebarOpen">Users</span>
         </a>

            @if($registered_courses && $registered_courses->isNotEmpty())
                <a href="{{ route('user.courses.lectures', $registered_courses->first()->id) }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>🎥 </span> <span x-show="sidebarOpen">Lectures</span>
                </a>
            @else
                <a href="#" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2 disabled" aria-disabled="true" tabindex="-1">
                    <span>🎥</span><span x-show="sidebarOpen"></span>
                </a>
            @endif

            <a href="{{ route('chatboard.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>💬</span> <span x-show="sidebarOpen">Chat</span>
            </a>
            <a href="{{ route('user.settings.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>⚙️</span> <span x-show="sidebarOpen">Settings</span>
            </a>

            <a href="{{ route('uni') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>🏫</span> <span x-show="sidebarOpen">Universities</span>
            </a>
            <a href="{{ route('Free') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                <span>📖</span> <span x-show="sidebarOpen">Free Courses</span>
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
      <div>

        <a href="{{ route('posts.mine') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
         My Posts
     </a>

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
            {{-- <label for="link" class="flex items-center cursor-pointer text-indigo-600 hover:text-indigo-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 015.656 5.656l-1.414 1.414a4 4 0 01-5.656-5.656l1.414-1.414zM7.172 13.828a4 4 0 01-5.656-5.656l1.414-1.414a4 4 0 015.656 5.656L7.172 13.828z" />
              </svg>
              Link
            </label> --}}

            <div x-data="{ showLinkInput: false }">
                <!-- Link Input Toggle -->
                {{-- <label @click="showLinkInput = !showLinkInput" class="flex items-center cursor-pointer text-indigo-600 hover:text-indigo-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 015.656 5.656l-1.414 1.414a4 4 0 01-5.656-5.656l1.414-1.414zM7.172 13.828a4 4 0 01-5.656-5.656l1.414-1.414a4 4 0 015.656 5.656L7.172 13.828z" />
                    </svg>
                    Link
                </label> --}}

                <!-- Input Field -->
                <div x-show="showLinkInput" class="mt-2">
                    <input type="url" name="link" id="link" placeholder="Enter link here..." class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                </div>
            </div>

          </div>

          <!-- Link Input -->
          <input type="url" name="link" id="link" placeholder="to add link : https://example.com"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent " />

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
          <img src="{{ asset('images/' . $post->image_path) }}" alt="Post Image"
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
          {{-- <div class="mb-6">
            <form method="POST" action="{{ route('posts.like', $post->id) }}">
              @csrf
              <button
                class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-150">👍 Like
                ({{ $post->likes->count() }})</button>
            </form>
          </div> --}}

{{-- 2 --}}
           <!-- زر الإعجاب -->
           <button class="like-btn {{ $post->isLikedBy(auth()->user()) ? 'liked' : '' }}"
            onclick="toggleLike({{ $post->id }})"
            data-post-id="{{ $post->id }}">
        @if($post->isLikedBy(auth()->user()))
        👎 UnLike
        @else
        ❤️/ 👍 Like
        @endif
    </button>

    <!-- عدد الإعجابات -->
    <span class="likes-count" id="likes-count-{{ $post->id }}">
        {{ $post->likes->count() }}
    </span>

    <!-- المستخدمون المعجبون -->
    <div class="liked-users" id="liked-users-{{ $post->id }}"
         style="{{ $post->likes->count() > 0 ? 'display:block' : 'display:none' }}">
        <h4>Liked users:</h4>
        <div class="users-list" id="users-list-{{ $post->id }}">
            @foreach($post->likes->take(5) as $like)
                <span class="user-badge">{{ $like->user->name }}</span>
            @endforeach
        </div>
    </div>

          <!-- Comments Section -->
          <section class="border-t border-gray-100 pt-4">
            <h4 class="font-semibold text-gray-700 mb-3">Comments ({{ $post->comments->count() }})</h4>

            <ul class="space-y-4 max-h-64 overflow-y-auto">
                @foreach ($post->comments as $comment)
                    <li class="flex items-start space-x-4 bg-gray-50 p-3 rounded-lg shadow-sm">
                        <!-- صورة البروفايل البسيطة -->
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-lg">
                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        </div>

                        <!-- محتوى التعليق + أدوات التحكم -->
                        <div class="flex-1">
                            <!-- اسم المستخدم والتعليق -->
                            <div class="flex justify-between items-center">



                        <div class="bg-gray-100 rounded-lg p-3 flex-1">
                            <p class="text-sm font-semibold text-gray-800">{{ $comment->user->name }}</p>
                            <p class="text-gray-700 text-sm whitespace-pre-line">{{ $comment->body }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $comment->created_at->diffForHumans() }}</p>

                                <!-- أدوات التعديل والحذف -->
                                @if (auth()->id() === $comment->user_id)
                                    <div class="flex items-end  space-x-2">
                                        <!-- تعديل -->
                                        <a href="{{ route('comments.edit', $comment->id) }}" class="text-blue-500 hover:text-blue-700 text-lg" title="تعديل">
                                            ✏️
                                        </a>
                                        <!-- حذف -->
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا التعليق؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 text-lg" title="حذف">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                @endif

                            @foreach ($comment->replies as $reply)
    <div class="ml-8 pl-4 border-l-2 border-gray-200">
        <p>{{ $reply->body }}</p>
        <small>By: {{ $reply->user->name }}</small>

        <button onclick="toggleReplyForm('{{ $reply->id }}')" class="...">Reply</button>

        <div id="reply-form-{{ $reply->id }}" class="hidden">
            <form method="POST" action="{{ route('replies.store', $comment->id) }}">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                <textarea name="body" placeholder="Reply to this..." class="..."></textarea>
                <button type="submit" class="...">Send</button>
            </form>
        </div>

        <!-- عرض الردود الفرعية (إذا كانت موجودة) -->
        @foreach ($reply->replies as $nestedReply)
            @include('partials.reply', ['reply' => $nestedReply])
        @endforeach
    </div>
@endforeach




                            <div class="flex items-center gap-4 mt-2"> <!-- محتوى التعليق الأساسي هنا -->

                                <!-- زر الإعجاب -->
                                {{-- <form action="{{ route('comments.toggleLike', $comment->id) }}" method="POST" class="flex items-center">
                                    @csrf
                                    <button type="submit" class="flex items-center text-blue-500 hover:text-blue-700 text-sm">
                                        ❤️ <span class="like-count ml-1">{{ $comment->likes->count() }}</span>
                                    </button>
                                </form> --}}

                                {{-- 22 --}}
                                <div class="comment-like-section flex items-center">
                                    <!-- أيقونة الإعجاب -->
                                    <span class="comment-like-icon {{ $comment->isLikedBy(auth()->user()) ? 'liked' : '' }}"
                                          onclick="toggleCommentLike({{ $comment->id }})"
                                          data-comment-id="{{ $comment->id }}"
                                          title="{{ $comment->isLikedBy(auth()->user()) ? 'Unlike' : 'Like' }}">
                                        <i class="far fa-heart"></i>
                                    </span>

                                    <!-- عدد الإعجابات -->
                                    <form id="like-form-{{ $comment->id }}" action="{{ route('comments.toggleLike', $comment->id) }}" method="POST" onsubmit="likeComment(event, {{ $comment->id }})" class="flex items-center">
                                        @csrf
                                        <button type="submit" class="flex items-center text-blue-500 hover:text-blue-700 text-sm">
                                            ❤️ <span id="like-count-{{ $comment->id }}">{{ $comment->likes->count() }}</span>
                                        </button>
                                    </form>

                                                                  </span>

{{--

                                    @if($comment->likes->count() > 0)
                                        <span class="view-comment-likers ml-2 text-sm text-blue-500 cursor-pointer hover:underline"
                                              onclick="toggleCommentLikers({{ $comment->id }})">
                                            View Likers::
                                        </span>
                                    @endif

                                    <!-- قائمة المعجبين (مخفية بشكل افتراضي) -->
                                    <div class="comment-likers-container hidden mt-2 ml-6" id="comment-likers-container-{{ $comment->id }}">
                                        <div class="comment-likers-list flex flex-wrap gap-2" id="comment-likers-list-{{ $comment->id }}">
                                            @foreach($comment->likes->take(5) as $like)
                                                <span class="user-badge text-xs bg-gray-100 px-2 py-1 rounded-full">
                                                    {{ $like->user->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div> --}}


                                @if($comment->likes->count() > 0)
    <span id="view-comment-likers-{{ $comment->id }}"
          class="ml-2 text-sm text-blue-500 cursor-pointer hover:underline"
          onclick="toggleCommentLikers({{ $comment->id }})">
        👀 View Likers
    </span>
@endif

<!-- قائمة المعجبين (مخفية بشكل افتراضي) -->
<div class="hidden mt-2 ml-6" id="comment-likers-container-{{ $comment->id }}">
    <div class="flex flex-wrap gap-2" id="comment-likers-list-{{ $comment->id }}">
        @foreach($comment->likes->take(5) as $like)
            <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">
                {{ $like->user->name }}
            </span>
        @endforeach
    </div>
</div>

                                {{-- 22 --}}

                                <!-- فورم الرد (مختصر) -->
                                <form method="POST" action="{{ route('replies.store', $comment->id) }}" class="flex items-center gap-2">
                                    @csrf
                                    <textarea
        name="body"
        placeholder="Write reply..."
        rows="1"
        class="text-sm px-2 py-1 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500 w-full resize-none overflow-hidden"
        oninput="this.style.height = 'auto'; this.style.height = (this.scrollHeight) + 'px';"
    ></textarea>
                                    <button type="submit" class="text-sm px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        Reply
                                    </button>
                                </form>
                            </div>



                        </div>
                    </li>
                @endforeach
            </ul>


            <!-- Add New Comment -->
            {{-- <form method="POST" action="{{ route('comments.store', $post->id) }}" class="mt-4 flex space-x-3">
              @csrf
              <input type="text" name="content" placeholder="Write a comment..."
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required />
              <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition-colors duration-200">
                Comment
              </button>
            </form> --}}


            <form method="POST" action="{{ route('comments.store', $post) }}" class="mt-4 flex space-x-3">
                @csrf
                <input type="text" name="body" placeholder="Write a comment..."
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


        .like-btn {
    background-color: #b5ccfa;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 6px;
    cursor: pointer;
    margin-right: 10px;
}

.like-btn.liked {
    background-color: #fd9999;
}

.likes-count {
    font-weight: bold;
}

.liked-users {
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid #eee;
}

.user-badge {
    display: inline-block;
    background-color: #f0f0f0;
    padding: 2px 8px;
    border-radius: 12px;
    margin-right: 5px;
    margin-bottom: 5px;
    font-size: 12px;
}

/*  */


/* أيقونة إعجاب التعليقات */
.comment-like-icon {
    color: #9ca3af;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.2s ease;
}

.comment-like-icon.liked {
    color: #ef4444;
}

.comment-like-icon:hover {
    transform: scale(1.1);
}

.comment-like-icon.loading {
    opacity: 0.7;
}

/* عدد إعجابات التعليقات */
.comment-likes-count {
    font-size: 13px;
    color: #4b5563;
}

/* حاوية معجبي التعليقات */
.comment-likers-container {
    background-color: #f9fafb;
    padding: 8px;
    border-radius: 6px;
    animation: fadeIn 0.3s ease;
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





<script>
function toggleLike(postId) {
    const likeBtn = $(`button[data-post-id="${postId}"]`);

    $.ajax({
        url: '/toggle-like',
        type: 'POST',
        data: {
            post_id: postId,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            likeBtn.prop('disabled', true).addClass('loading');
        },
        success: function(response) {
            if (response.success) {
                updateLikeUI(postId, response);
            } else {
                showError(response.message || 'حدث خطأ غير متوقع');
            }
        },
        error: function(xhr) {
            const errorMsg = xhr.responseJSON?.message || 'فشل الاتصال بالخادم';
            showError(errorMsg);
        },
        complete: function() {
            likeBtn.prop('disabled', false).removeClass('loading');
        }
    });
}

function updateLikeUI(postId, data) {
    const likeBtn = $(`button[data-post-id="${postId}"]`);
    const likesCount = $(`#likes-count-${postId}`);
    const likedUsersDiv = $(`#liked-users-${postId}`);
    const usersListDiv = $(`#users-list-${postId}`);

    likeBtn.text(data.isLiked ? ' 👎 UnLike' : ' ❤️/ 👍 Like')
           .toggleClass('liked', data.isLiked);

    likesCount.text(data.likesCount);

    if (data.likesCount > 0) {
        likedUsersDiv.show();
        usersListDiv.empty();
        data.likedUsers.forEach(user => {
            usersListDiv.append(`<span class="user-badge">${user.name}</span>`);
        });
    } else {
        likedUsersDiv.hide();
    }
}

function showError(message) {
    // يمكنك استخدام Toast أو Alert حسب مكتباتك
    alert(message);
    console.error('Error:', message);
}
</script>


{{-- likesComments --}}

<script>

// دالة تبديل الإعجاب للتعليقات
// function toggleCommentLike(commentId) {
//     const likeIcon = $(`.comment-like-icon[data-comment-id="${commentId}"]`);

//     $.ajax({
//         url: `/comments/${commentId}/toggle-like`,
//         type: 'POST',
//         data: {
//             _token: $('meta[name="csrf-token"]').attr('content')
//         },
//         beforeSend: function() {
//             likeIcon.addClass('loading');
//         },
//         success: function(response) {
//             if (response.success) {
//                 // تحديث الأيقونة
//                 likeIcon.toggleClass('liked', response.isLiked);
//                 likeIcon.find('i').toggleClass('far fas');
//                 likeIcon.attr('title', response.isLiked ? 'Unlike' : 'Like');

//                 // تحديث العدد
//                 $(`#comment-likes-count-${commentId}`).text(response.likesCount);

//                 // تحديث رابط العرض
//                 const viewLikers = $(`#comment-${commentId} .view-comment-likers`);
//                 if (response.likesCount > 0) {
//                     if (viewLikers.length === 0) {
//                         $(`#comment-${commentId} .comment-like-section`).append(
//                             `<span class="view-comment-likers ml-2 text-sm text-blue-500 cursor-pointer hover:underline"
//                               onclick="toggleCommentLikers(${commentId})">
//                                 View Likers
//                              </span>`
//                         );
//                     }
//                 } else {
//                     viewLikers.remove();
//                     $(`#comment-likers-container-${commentId}`).hide();
//                 }
//             }
//         },
//         error: function(xhr) {
//             console.error('Error:', xhr.responseText);
//         },
//         complete: function() {
//             likeIcon.removeClass('loading');
//         }
//     });
// }

// // دالة عرض معجبي التعليقات
// function toggleCommentLikers(commentId) {
//     const container = $(`#comment-likers-container-${commentId}`);
//     const list = $(`#comment-likers-list-${commentId}`);

//     if (container.is(':visible')) {
//         container.hide();
//         return;
//     }

//     // إذا كانت القائمة فارغة، جلب البيانات
//     if (list.children().length === 0) {
//         $.get(`/comments/${commentId}/likers`, function(response) {
//             if (response.success) {
//                 list.empty();
//                 response.likers.forEach(user => {
//                     list.append(
//                         `<span class="user-badge text-xs bg-gray-100 px-2 py-1 rounded-full">
//                             ${user.name}
//                          </span>`
//                     );
//                 });
//                 container.show();
//             }
//         });
//     } else {
//         container.show();
//     }
// }

<script>
document.addEventListener('DOMContentLoaded', function() {
    // استمع لكل الفورم الخاصة باللايك
    document.querySelectorAll('form[id^="like-form-"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const commentId = this.id.replace('like-form-', '');
            const url = this.action;
            const token = this.querySelector('input[name="_token"]').value;

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                // تحديث عدد اللايكات
                const likeCountSpan = document.querySelector(`#like-button-${commentId} .like-count`);
                if(likeCountSpan) {
                    likeCountSpan.textContent = data.likes_count;
                }

                // تحديث قائمة المعجبين (إذا موجودة)
                const likersList = document.getElementById(`comment-likers-list-${commentId}`);
                if (likersList) {
                    likersList.innerHTML = '';
                    data.likers.forEach(user => {
                        const span = document.createElement('span');
                        span.className = 'text-xs bg-gray-100 px-2 py-1 rounded-full';
                        span.textContent = user.name;
                        likersList.appendChild(span);
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
</script>


</script>


<script>
    function toggleCommentLikers(commentId) {
        const container = document.getElementById(`comment-likers-container-${commentId}`);
        if (container.classList.contains('hidden')) {
            container.classList.remove('hidden');
        } else {
            container.classList.add('hidden');
        }
    }
</script>


<script>
    function likeComment(event, commentId) {
        event.preventDefault(); // منع الريلود

        const form = document.getElementById(`like-form-${commentId}`);
        const url = form.action;
        const csrfToken = form.querySelector('input[name="_token"]').value;

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById(`like-count-${commentId}`).innerText = data.likes_count;
        })
        .catch(error => {
            console.error('Error toggling like:', error);
        });
    }
    </script>


</x-app-layout>
