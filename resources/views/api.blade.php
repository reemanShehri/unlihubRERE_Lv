<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Academic Assistant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="im.png" type="image/x-icon">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #6366f1;
            --text-color: #1f2937;
            --light-bg: #f9fafb;
            --user-bg: #e0e7ff;
            --bot-bg: #f3f4f6;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            color: var(--text-color);
        }

        .chat-container {
            max-width: 800px;
            margin: 30px auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .chat-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .chat-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .chat-header i {
            font-size: 1.8rem;
            margin-left: 15px;
        }

        .chat-header p {
            margin: 5px 0 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .chat-messages {
            height: 500px;
            overflow-y: auto;
            padding: 20px;
            background-color: var(--light-bg);
            display: flex;
            flex-direction: column;
        }

        .message {
            max-width: 70%;
            margin-bottom: 15px;
            padding: 12px 15px;
            border-radius: 18px;
            line-height: 1.5;
            position: relative;
            animation: fadeIn 0.3s ease;
        }

        .user-message {
            align-self: flex-end;
            background-color: var(--user-bg);
            color: var(--primary-color);
            border-bottom-right-radius: 5px;
        }

        .bot-message {
            align-self: flex-start;
            background-color: var(--bot-bg);
            border-bottom-left-radius: 5px;
        }

        .typing-indicator {
            display: inline-flex;
            padding: 10px 15px;
            background-color: var(--bot-bg);
            border-radius: 18px;
            border-bottom-left-radius: 5px;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            margin: 0 3px;
            background-color: #6b7280;
            border-radius: 50%;
            animation: typingAnimation 1.4s infinite ease-in-out;
        }

        .typing-dot:nth-child(1) { animation-delay: 0s; }
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }

        .chat-input {
            display: flex;
            padding: 15px;
            background-color: white;
            border-top: 1px solid #e5e7eb;
        }

        .chat-input input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 25px;
            outline: none;
            font-size: 1rem;
            transition: border 0.3s;
        }

        .chat-input input:focus {
            border-color: var(--primary-color);
        }

        .chat-input button {
            margin-right: 10px;
            padding: 12px 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .chat-input button:hover {
            background-color: #4338ca;
        }

        .empty-chat {
            text-align: center;
            color: #9ca3af;
            margin: auto;
        }

        .empty-chat i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #d1d5db;
        }

        .empty-chat p {
            font-size: 1.1rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes typingAnimation {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-5px); }
        }

        /* التمرير الجميل */
        .chat-messages::-webkit-scrollbar {
            width: 8px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <div>
                <h2><i class="fas fa-robot"></i> مساعد الجامعة الذكي</h2>
                <p>أسألني أي شيء عن موادك الجامعية أو الحياة الأكاديمية</p>
            </div>
        </div>

        <div class="chat-messages" id="chat-messages">
            <div class="empty-chat" id="empty-chat">
                <i class="fas fa-comments"></i>
                <p>ابدأ محادثة مع المساعد الذكي</p>
            </div>
        </div>

        <div class="chat-input">
            <input type="text" id="user-input" placeholder="اكتب رسالتك هنا..." autocomplete="off">
            <button id="send-button"><i class="fas fa-paper-plane"></i> إرسال</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatMessages = document.getElementById('chat-messages');
            const userInput = document.getElementById('user-input');
            const sendButton = document.getElementById('send-button');
            const emptyChat = document.getElementById('empty-chat');

            // إرسال الرسالة عند الضغط على زر الإرسال
            sendButton.addEventListener('click', sendMessage);

            // إرسال الرسالة عند الضغط على Enter
            userInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            function sendMessage() {
                const message = userInput.value.trim();
                if (message === '') return;

                // إخفاء الرسالة الفارغة إذا كانت موجودة
                if (emptyChat) emptyChat.style.display = 'none';

                // إضافة رسالة المستخدم
                addMessage(message, 'user');

                // مسح حقل الإدخال
                userInput.value = '';

                // إظهار مؤشر الكتابة
                showTypingIndicator();

                // محاكاة رد المساعد (يمكن استبدالها باتصال حقيقي بالخادم)
                setTimeout(() => {
                    // إخفاء مؤشر الكتابة
                    removeTypingIndicator();

                    // توليد رد عشوائي
                    const responses = [
                        "أنا مساعدك الذكي، كيف يمكنني مساعدتك اليوم؟",
                        "هل لديك أي استفسار عن المواد الدراسية؟",
                        "يمكنني مساعدتك في العثور على مصادر دراسية مفيدة",
                        "هل تريد معرفة مواعيد الاختبارات أو التسجيل؟",
                        "أنا هنا لمساعدتك في أي استفسار أكاديمي"
                    ];

                    const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                    addMessage(randomResponse, 'bot');
                }, 1500);
            }

            function addMessage(text, sender) {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('message');
                messageDiv.classList.add(sender + '-message');
                messageDiv.innerHTML = `<p>${text}</p>`;

                chatMessages.appendChild(messageDiv);
                scrollToBottom();
            }

            function showTypingIndicator() {
                const typingDiv = document.createElement('div');
                typingDiv.classList.add('typing-indicator');
                typingDiv.id = 'typing-indicator';

                for (let i = 0; i < 3; i++) {
                    const dot = document.createElement('span');
                    dot.classList.add('typing-dot');
                    typingDiv.appendChild(dot);
                }

                chatMessages.appendChild(typingDiv);
                scrollToBottom();
            }

            function removeTypingIndicator() {
                const typingIndicator = document.getElementById('typing-indicator');
                if (typingIndicator) {
                    typingIndicator.remove();
                }
            }

            function scrollToBottom() {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            // رسالة ترحيبية أولية بعد تحميل الصفحة
            setTimeout(() => {
                if (emptyChat && emptyChat.style.display !== 'none') {
                    emptyChat.style.display = 'none';
                    addMessage("مرحباً! أنا مساعدك الذكي. كيف يمكنني مساعدتك اليوم؟", 'bot');
                }
            }, 1000);
        });
    </script>
</body>
</html>
