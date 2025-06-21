<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>

    {{-- م استعملتها :: --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دردشة ذكاء اصطناعي</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .chat-container {
            height: calc(100vh - 150px);
        }
        .typing-indicator:after {
            content: '...';
            animation: typing 1.5s infinite;
        }
        @keyframes typing {
            0% { content: '.'; }
            33% { content: '..'; }
            66% { content: '...'; }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-indigo-600 text-white p-4 flex items-center">
                <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold">مساعد الذكاء الاصطناعي</h1>
                    <p class="text-indigo-200 text-sm">كيف يمكنني مساعدتك اليوم؟</p>
                </div>
            </div>

            <!-- Chat Box -->
            <div id="chat-box" class="chat-container p-4 overflow-y-auto space-y-4">
                <div class="flex justify-start">
                    <div class="bg-indigo-100 text-indigo-800 rounded-lg p-3 max-w-xs lg:max-w-md">
                        <p>مرحباً! أنا مساعدك الذكي. كيف يمكنني مساعدتك اليوم؟</p>
                    </div>
                </div>
            </div>

            <!-- Typing Indicator (Hidden by default) -->
            <div id="typing-indicator" class="hidden px-4 pb-2">
                <div class="flex items-center">
                    <div class="bg-gray-200 rounded-full p-2 mr-2">
                        <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce"></div>
                    </div>
                    <div class="bg-gray-200 rounded-full p-2 mr-2">
                        <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                    <div class="bg-gray-200 rounded-full p-2">
                        <div class="w-2 h-2 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
                </div>
            </div>

            <!-- Input Form -->
            <div class="border-t p-4 bg-gray-50">
                <form id="chat-form" class="flex gap-2">
                    <input
                        type="text"
                        id="message"
                        placeholder="اكتب رسالتك هنا..."
                        class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        autocomplete="off"
                        required
                    >
                    <button
                        type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors"
                    >
                        إرسال
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const chatBox = document.getElementById('chat-box');
        const chatForm = document.getElementById('chat-form');
        const messageInput = document.getElementById('message');
        const typingIndicator = document.getElementById('typing-indicator');

        chatForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const message = messageInput.value.trim();
            if (!message) return;

            // Add user message to chat
            addMessage(message, 'user');

            // Clear input
            messageInput.value = '';

            // Show typing indicator
            typingIndicator.classList.remove('hidden');
            chatBox.scrollTop = chatBox.scrollHeight;

            try {
                // Send message to server
                const response = await fetch('/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ message })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();

                // Hide typing indicator
                typingIndicator.classList.add('hidden');

                // Add bot response to chat
                addMessage(data.reply, 'bot');

            } catch (error) {
                typingIndicator.classList.add('hidden');
                addMessage('عذراً، حدث خطأ في الاتصال. يرجى المحاولة لاحقاً.', 'bot');
                console.error('Error:', error);
            }
        });

        function addMessage(content, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'}`;

            const bubble = document.createElement('div');
            bubble.className = sender === 'user'
                ? 'bg-indigo-600 text-white rounded-lg p-3 max-w-xs lg:max-w-md'
                : 'bg-indigo-100 text-indigo-800 rounded-lg p-3 max-w-xs lg:max-w-md';

            bubble.textContent = content;
            messageDiv.appendChild(bubble);
            chatBox.appendChild(messageDiv);

            // Scroll to bottom
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>
</html>
