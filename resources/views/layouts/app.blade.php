<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="icon" type="image/x-icon" href="{{ asset('im.png') }}">
        <link rel="shortcut icon" href="{{ asset('im.png') }}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ asset('im.png') }}">


{{-- dynamic touch --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

{{--  --}}
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])




    </head>


    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')



            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset



            @auth
    @php
        // $notifications = auth()->user()->unreadNotifications;
    @endphp






    <div class="relative">





        {{-- <button id="notification-button" class="relative">
            🔔
            @if($notifications->count())
                <span class="absolute top-0 right-0 bg-red-600 text-white rounded-full text-xs px-1">
                    {{ $notifications->count() }}
                </span>
            @endif
        </button> --}}

        <!-- قائمة الإشعارات -->
        {{-- <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg z-50">
           <ul>
    @forelse ($notifications as $notification)
        <li class="p-2 border-b hover:bg-gray-100">
            <a href="{{ route('notifications.read', $notification->id) }}">
                <strong>{{ $notification->data['title'] ?? 'إشعار' }}</strong><br>
                <span class="text-sm text-gray-600">
                    {{ $notification->data['message'] ?? '' }}
                </span>
            </a>
        </li>
    @empty
        <li class="p-2 text-gray-500 text-center">لا توجد إشعارات جديدة</li>
    @endforelse
</ul>

        </div> --}}
    </div>

    <script>
        // إظهار وإخفاء قائمة الإشعارات
        document.getElementById('notification-button').addEventListener('click', function () {
            const dropdown = document.getElementById('notification-dropdown');
            dropdown.classList.toggle('hidden');
        });
    </script>
@endauth



            {{--  --}}

            <!-- Notifications Bell Icon -->
            {{-- <div class="relative">
                @auth
                    <button id="notificationBtn" class="relative focus:outline-none">
                        <!-- أيقونة الجرس -->
                        <svg class="w-6 h-6 text-gray-600 hover:text-gray-800" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        <!-- علامة تنبيه حمراء إذا في إشعارات جديدة -->
                        @if (auth()->user()->unreadNotifications->count())
                            <span class="absolute top-0 right-0 block h-2 w-2 bg-red-600 rounded-full ring-2 ring-white animate-ping"></span>
                        @endif
                    </button>

                    <!-- قائمة الإشعارات (مخفية بشكل افتراضي) -->
                    <div id="notificationDropdown"
                         class="hidden absolute right-0 mt-2 w-80 bg-white border rounded shadow-lg z-50 max-h-96 overflow-y-auto">
                        <ul class="divide-y divide-gray-200">
                            @forelse(auth()->user()->unreadNotifications as $notification)
                                <li class="p-3 hover:bg-gray-100 text-sm flex justify-between items-center">
                                    <span>{{ $notification->data['message'] ?? 'لديك إشعار جديد' }}</span>

                                    <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-blue-600 hover:underline text-xs">وضع كمقروء</button>
                                    </form>
                                </li>
                            @empty
                                <li class="p-3 text-gray-500 text-sm">لا توجد إشعارات جديدة</li>
                            @endforelse
                        </ul>
                    </div>
                @endauth
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const btn = document.getElementById('notificationBtn');
                    const dropdown = document.getElementById('notificationDropdown');

                    btn.addEventListener('click', () => {
                        dropdown.classList.toggle('hidden');
                    });

                    document.addEventListener('click', function (event) {
                        if (!btn.contains(event.target) && !dropdown.contains(event.target)) {
                            dropdown.classList.add('hidden');
                        }
                    });
                });
            </script> --}}


{{--  --}}


            <!-- Page Content -->
            <main>
                {{ $slot }}

            </main>
        </div>
    </body>

{{--  --}}
    <script>
    window.user = @json(auth()->user()); // إذا كان المستخدم مسجلًا
</script>

{{--  --}}
</html>
