<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-white">
                💬 Course Chat: {{ $course->name }}
            </h2>

            <div class="space-x-2">
                <a href="{{ route('user.courses.index') }}"
                   class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                    🔙 Back to Courses
                </a>
                <a href="{{ route('user.courses.lectures', $course->id) }}"
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    🎥 View Lectures
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 bg-gradient-to-b from-purple-100 via-white to-purple-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Chat Box -->
            <div class="bg-white shadow-xl rounded-lg p-6 border border-purple-200">
                <div class="mb-4 border-b border-gray-300 pb-2">
                    <h3 class="text-lg font-bold text-purple-800">🗨️ Conversation</h3>
                </div>
              <div class="h-96 overflow-y-auto mb-6 p-2 bg-purple-50 rounded border border-purple-100" id="chat-box">
                    @forelse ($messages->reverse() as $msg)

                        <div class="flex mb-4 @if($msg->user_id === auth()->id()) justify-end @else justify-start @endif">
                            <div class="flex max-w-xl @if($msg->user_id === auth()->id()) flex-row-reverse @endif">
                                <!-- User Avatar -->
                                <div class="flex-shrink-0 mx-2">
                                    <div class="h-8 w-8 rounded-full bg-purple-300 flex items-center justify-center text-purple-800 font-bold">


                <img
    src="{{ $msg->user->profile_photo_url }}"
    alt="{{ $msg->user->name }}"
    class="h-8 w-8 rounded-full object-cover"
>

                                    </div>
                                </div>

                                <!-- Message Content -->
                                <div class="@if($msg->user_id === auth()->id()) bg-blue-100 @else bg-gray-100 @endif text-gray-800 px-4 py-2 rounded-lg shadow relative" style="max-width: 80%;">
                                    <!-- Message Header -->
                                    <div class="flex items-center justify-between mb-1">
                                        <strong class="@if($msg->user_id === auth()->id()) text-blue-800 @else text-gray-800 @endif">
                                            {{ $msg->user->name }}
                                        </strong>
                                        <small class="text-xs text-gray-500 ml-2">
                                            {{ $msg->created_at->diffForHumans() }}
                                        </small>
                                    </div>

                                    <!-- Reply Preview -->
                                    @if($msg->replyTo)
                                        <div class="mt-1 mb-2 p-2 bg-white border-l-4 @if($msg->user_id === auth()->id()) border-blue-400 @else border-gray-400 @endif text-sm italic text-gray-600 rounded">
                                            Replying to <strong>{{ $msg->replyTo->user->name }}:</strong>
                                            <div class="truncate">{{ $msg->replyTo->message }}</div>
                                        </div>
                                    @endif

                                    <!-- Message Text -->
                                    <div class="whitespace-pre-wrap">{{ $msg->message }}</div>

                                    <!-- Message Actions -->
                                    <div class="flex justify-end mt-1 space-x-2 text-xs">
                                        {{-- <button
                                            onclick="startReply({{ $msg->id }}, {!! json_encode($msg->user->name) !!}, {!! json_encode($msg->message) !!})"
                                            class="hover:text-blue-600 cursor-pointer"
                                            title="Reply">↩️ Reply
                                        </button> --}}

                                        @if($msg->user_id === auth()->id())
                                            <button
                                                onclick="startEdit({{ $msg->id }}, `{{ addslashes($msg->message) }}`)"
                                                class="hover:text-green-600 cursor-pointer"
                                                title="Edit">✏️ Edit
                                            </button>

                                            <form method="POST" action="{{ url("/courses/{$course->id}/chat/{$msg->id}") }}" onsubmit="return confirm('Are you sure you want to delete this message?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="hover:text-red-600 cursor-pointer" title="Delete">🗑️ Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No messages yet.</p>
                    @endforelse
                </div>

                <!-- Message Form -->
                <form method="POST" action="{{ url("/courses/{$course->id}/chat") }}" id="chat-form" class="mt-4">
                    @csrf
                    <input type="hidden" name="reply_to_message_id" id="reply_to_message_id" value="">
                    <input type="hidden" name="edit_message_id" id="edit_message_id" value="">

                    <div class="flex flex-col space-y-2">
                        <div id="reply-info" class="hidden bg-blue-100 p-2 rounded text-sm text-blue-800">
                            Replying to <span id="reply-to-username"></span>: <em id="reply-to-message" class="truncate max-w-4xl"></em>
                            <button type="button" onclick="cancelReply()" class="ml-4 text-red-600 hover:underline">Cancel</button>
                        </div>

                        <textarea
                            name="message"
                            id="message-textarea"
                            class="w-full border border-purple-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50"
                            rows="3"
                            placeholder="Type your message..."
                            required></textarea>

                        <div class="flex justify-end space-x-2">
                            <button type="button" onclick="cancelEdit()" class="hidden text-gray-600 hover:text-gray-900" id="cancel-edit-btn">Cancel Edit</button>

                            <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition" id="send-btn">
                                ➤ Send
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Scroll to bottom of chat
        function scrollToBottom() {
            const chatBox = document.getElementById('chat-box');
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // لبدء الرد على رسالة
        function startReply(id, username, message) {
            document.getElementById('reply_to_message_id').value = id;
            document.getElementById('edit_message_id').value = '';
            document.getElementById('reply-info').classList.remove('hidden');
            document.getElementById('reply-to-username').textContent = username;
            document.getElementById('reply-to-message').textContent = message;
            document.getElementById('message-textarea').focus();
            scrollToBottom();
        }

        function cancelReply() {
            document.getElementById('reply_to_message_id').value = '';
            document.getElementById('reply-info').classList.add('hidden');
        }

        // لبدء تعديل رسالة
        function startEdit(id, message) {
            document.getElementById('edit_message_id').value = id;
            document.getElementById('reply_to_message_id').value = '';
            document.getElementById('message-textarea').value = message;
            document.getElementById('message-textarea').focus();
            document.getElementById('reply-info').classList.add('hidden');
            document.getElementById('cancel-edit-btn').classList.remove('hidden');
            document.getElementById('send-btn').textContent = '✏️ Update';
            scrollToBottom();
        }

        function cancelEdit() {
            document.getElementById('edit_message_id').value = '';
            document.getElementById('message-textarea').value = '';
            document.getElementById('cancel-edit-btn').classList.add('hidden');
            document.getElementById('send-btn').textContent = '➤ Send';
        }

        // Scroll to bottom when page loads
        window.addEventListener('load', scrollToBottom);
    </script>
</x-app-layout>
