<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            <i class="fas fa-user-circle mr-2"></i>{{ $user->name }}'s Profile
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Main Profile Card -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="p-8 space-y-6">
                <!-- User Header -->
                <div class="flex items-start justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-user-graduate text-blue-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h3>
                            <div class="flex items-center text-gray-600 mt-1">
                                <i class="fas fa-envelope mr-2"></i>
                                <span>{{ $user->email }}</span>
                                <button class="ml-4 text-blue-500 hover:text-blue-700 transition"
                                        onclick="document.getElementById('message-modal').classList.remove('hidden')">
                                    <i class="fas fa-paper-plane mr-1"></i>@if ($user->phone)
                                    @php
                                    $phoneWith972 = auth()->user()->getFormattedPhoneForWhatsApp();
                                
                                    if (substr($phoneWith972, 0, 3) === '972') {
                                        $phoneWith970 = '970' . substr($phoneWith972, 3);
                                    } elseif (substr($phoneWith972, 0, 3) === '970') {
                                        $phoneWith970 = $phoneWith972; // الرقم أصلاً 970
                                        $phoneWith972 = '972' . substr($phoneWith972, 3); // جرب العكس
                                    } else {
                                        // لو الرقم بدون كود دولة، نضيف 972 و970
                                        $phoneWith970 = '970' . $phoneWith972;
                                        $phoneWith972 = '972' . $phoneWith972;
                                    }
                                @endphp
                                
                                <div class="space-y-2">
                                    <a href="https://wa.me/{{ $phoneWith972 }}" target="_blank" 
                                       class="text-green-600 hover:underline font-bold">
                                       (+ 972)
                                    </a>
                                
                                    <a href="https://wa.me/{{ $phoneWith970 }}" target="_blank" 
                                       class="text-green-600 hover:underline font-bold">
                                       (+ 970)
                                    </a>
                                </div>
                                
                                </div>
                                
                                @endif
                                
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-2">

                    </div>
                </div>

                <!-- User Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Academic Info -->
                    <div class="bg-gray-50 p-5 rounded-lg">
                        <h4 class="font-semibold text-lg text-gray-700 mb-4 flex items-center">
                            <i class="fas fa-university mr-2 text-blue-500"></i>
                            Academic Information
                        </h4>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-600"><i class="fas fa-school mr-2"></i>University:</span>
                                <span class="font-medium">{{ $user->student->university->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-600"><i class="fas fa-book mr-2"></i>Major:</span>
                                <span class="font-medium">{{ $user->student->major->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-600"><i class="fas fa-building mr-2"></i>College:</span>
                                <span class="font-medium">{{ $user->student->college->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Info -->
                    <div class="bg-gray-50 p-5 rounded-lg">
                        <h4 class="font-semibold text-lg text-gray-700 mb-4 flex items-center">
                            <i class="fas fa-chart-line mr-2 text-green-500"></i>
                            Activity
                        </h4>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-600"><i class="far fa-calendar-alt mr-2"></i>Member Since:</span>
                                <span class="font-medium">{{ $user->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-2">
                                <span class="text-gray-600"><i class="fas fa-sync-alt mr-2"></i>Last Updated:</span>
                                <span class="font-medium">{{ $user->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600"><i class="fas fa-id-card mr-2"></i>Student Status:</span>
                                <span class="font-medium text-green-600">Active</span>
                            </div>
                        </div>
                    </div>


                <!-- Phone -->
<div class="flex justify-between border-b border-gray-100 pb-2">
    <span class="text-gray-600"><i class="fas fa-phone mr-2"></i>Phone:</span>
    <span class="font-medium">{{ $user->phone ?? 'No phone' }}</span>
</div>

<!-- Bio -->
<div class="mt-4 bg-gray-50 p-5 rounded-lg">
    <h4 class="font-semibold text-lg text-gray-700 mb-2 flex items-center">
        <i class="fas fa-info-circle mr-2 text-indigo-500"></i>
        Bio
    </h4>
    <p class="text-gray-700">{{ $user->bio ?? 'No bio available' }}</p>
</div>


                </div>
            </div>
        </div>






        <!-- AI Assistant Section -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-robot text-indigo-600 mr-3"></i>
                    AI Academic Assistant
                </h3>
                <p class="text-gray-600 mt-1">Ask me anything about your courses or university life</p>
            </div>

            <!-- Chat Container -->
            <div class="p-4">
                <div id="ai-chat-container" class="h-64 overflow-y-auto mb-4 space-y-3 p-3 bg-gray-50 rounded-lg">
                    <!-- Messages will appear here -->
                    <div class="text-center text-gray-500 py-10" id="empty-chat">
                        <i class="fas fa-comments text-3xl mb-2 text-gray-300"></i>
                        <p>Start a conversation with your AI assistant</p>
                    </div>
                </div>

                <div class="flex space-x-2">
                    <input type="text" id="ai-message-input"
                           class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Ask about your courses...">
                    <button id="ai-send-btn"
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i> Send
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div id="message-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md">
            <div class="p-6">
                <div class="flex justify-between items-center border-b pb-4">
                    <h3 class="text-xl font-bold text-gray-800">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>
                        Send Message
                    </h3>
                    <button onclick="document.getElementById('message-modal').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mt-4 space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">To:</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2"
                               value="{{ $user->name }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Subject:</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2"
                               placeholder="Enter subject...">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Message:</label>
                        <textarea class="w-full border border-gray-300 rounded-lg px-4 py-2 h-32"
                                  placeholder="Type your message here..."></textarea>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button onclick="document.getElementById('message-modal').classList.add('hidden')"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button id="send-message-btn" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i> Send
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!-- Chat Script -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatContainer = document.getElementById('ai-chat-container');
            const messageInput = document.getElementById('ai-message-input');
            const sendBtn = document.getElementById('ai-send-btn');
            const emptyChat = document.getElementById('empty-chat');

            function addMessage(sender, message) {
                if (emptyChat) emptyChat.style.display = 'none';

                const messageDiv = document.createElement('div');
                messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'}`;

                messageDiv.innerHTML = `
                    <div class="max-w-xs md:max-w-md rounded-lg px-4 py-2 ${sender === 'user'
                        ? 'bg-blue-600 text-white rounded-br-none'
                        : 'bg-gray-200 text-gray-800 rounded-bl-none'}">
                        <div class="flex items-center mb-1">
                            <i class="fas ${sender === 'user' ? 'fa-user' : 'fa-robot'} mr-2"></i>
                            <span class="font-medium">${sender === 'user' ? 'You' : 'AI Assistant'}</span>
                        </div>
                        <p>${message}</p>
                    </div>
                `;

                chatContainer.appendChild(messageDiv);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }

            function sendMessage() {
                const message = messageInput.value.trim();
                if (!message) return;

                addMessage('user', message);
                messageInput.value = '';

                // Show typing indicator
                const typingDiv = document.createElement('div');
                typingDiv.className = 'flex justify-start';
                typingDiv.innerHTML = `
                    <div class="bg-gray-200 text-gray-800 rounded-lg rounded-bl-none px-4 py-2">
                        <i class="fas fa-ellipsis-h"></i> Typing...
                    </div>
                `;
                chatContainer.appendChild(typingDiv);
                chatContainer.scrollTop = chatContainer.scrollHeight;

                // Send to ChatGPT API
                axios.post('/api/chat', {
                    content: message
                }, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    // Remove typing indicator
                    chatContainer.removeChild(typingDiv);

                    // Add AI response
                    const aiResponse = response.data.choices[0].message.content;
                    addMessage('ai', aiResponse);
                })
                .catch(error => {
                    chatContainer.removeChild(typingDiv);
                    addMessage('error', 'Failed to get response: ' + error.message);
                });
            }

            sendBtn.addEventListener('click', sendMessage);
            messageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') sendMessage();
            });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatContainer = document.getElementById('ai-chat-container');
            const messageInput = document.getElementById('ai-message-input');
            const sendBtn = document.getElementById('ai-send-btn');

            function sendMessage() {
                const message = messageInput.value.trim();
                if (!message) return;

                // send to backend and save
                axios.post('/api/save-message', {
                    user_id: USER_ID_FROM_APP, // بدليه بالـ id تبع اليوزر
                    message: message
                })
                .then(response => {
                    console.log('تم حفظ الرسالة لإيميل:', response.data.email);
                })
                .catch(error => {
                    console.error('فشل الحفظ:', error);
                });

                // وبعدها تكمل عرض الرسالة في الواجهة مثل قبل
            }

            sendBtn.addEventListener('click', sendMessage);
        });
    </script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sendBtn = document.getElementById('send-message-btn');

        sendBtn.addEventListener('click', function () {
            const subject = document.querySelector('input[placeholder="Enter subject..."]').value.trim();
            const message = document.querySelector('textarea').value.trim();
            const recipientEmail = 'support@example.com'; // استبدل هذا بالإيميل المستهدف

            if (!message) {
                alert("Please type a message.");
                return;
            }

            axios.post('/api/send-email', {
                user_id: {{ auth()->id() ?? 'null' }},
                recipient_email: recipientEmail,
                subject: subject,
                message: message,
                user_email: '{{ auth()->user()->email ?? "guest" }}' // إضافة إيميل المستخدم
            })
            .then(response => {
                if (response.data.success) {
                    alert("Email sent successfully!");
                    document.getElementById('message-modal').classList.add('hidden');
                } else {
                    alert("Failed to send email: " + response.data.message);
                }
            })
            .catch(error => {
                console.error(error);
                alert("Something went wrong. Please try again later.");
            });
        });
    });
</script>


</x-app-layout>
