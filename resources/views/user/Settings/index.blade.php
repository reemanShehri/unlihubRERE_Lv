<x-app-layout>

    <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

    <div x-data="{ sidebarOpen: true, activeTab: 'account' }" class="flex h-screen bg-gray-50">
        <!-- السايدبار الجديد -->
        <div
            :class="sidebarOpen ? 'w-48' : 'w-16'"
            class="bg-gray-800 text-white transition-all duration-300 flex flex-col items-center py-4 space-y-6 overflow-hidden"
        >
            <button @click="sidebarOpen = !sidebarOpen" class="mb-4 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" :class="sidebarOpen ? 'rotate-90' : ''" class="h-6 w-6 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <h2 x-show="sidebarOpen" class="text-xl font-bold">UniHub</h2>

            <nav class="flex flex-col space-y-4 w-full items-center">
                <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2 px-2">
                    <span>📊</span> <span x-show="sidebarOpen">Dashboard</span>
                </a>
                <a href="{{ route('user.courses.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2 px-2">
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
                    <span>🎥</span>
                </a>
            @endif

                <a href="{{ route('chatboard.index') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>💬</span> <span x-show="sidebarOpen">Chat</span>
                </a>
                <a href="{{ route('user.settings.index') }}" class="bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>⚙️</span> <span x-show="sidebarOpen">Settings</span>
                </a>

                <a href="{{ route('uni') }}" class="hover:bg-gray-700 w-full text-center py-2 rounded flex items-center justify-center space-x-2">
                    <span>🏫</span> <span x-show="sidebarOpen">Universities</span>
                </a>
            </nav>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- التوب بار -->
            <div class="bg-white shadow-sm px-6 py-4 flex justify-between items-center border-b">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                {{-- <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-600 font-medium">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                </div> --}}
            </div>

            <!-- محتوى الصفحة -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Settings</h1>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                    <!-- تبويبات الإعدادات -->
                    <div class="border-b border-gray-200 mb-6">
                        <nav class="flex space-x-8">
                            <button @click="activeTab = 'account'"
                                    :class="activeTab === 'account' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Account Settings
                            </button>
                            <button @click="activeTab = 'privacy'"
                                    :class="activeTab === 'privacy' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Privacy
                            </button>
                            <button @click="activeTab = 'notifications'"
                                    :class="activeTab === 'notifications' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Notifications
                            </button>
                        </nav>
                    </div>

                    <!-- إعدادات الحساب -->
                    <div x-show="activeTab === 'account'" class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Profile Information</h3>
                            {{-- <form class="space-y-4">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                                        <input type="text" id="first-name" value="{{ Auth::user()->first_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <input type="text" id="last-name" value="{{ Auth::user()->last_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                                    <textarea id="bio" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ Auth::user()->bio }}</textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save Changes
                                    </button>
                                </div>
                            </form> --}}

                            <form action="{{ route('settings.update') }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                                        <input type="text" name="first_name" id="first-name" value="{{ Auth::user()->first_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <input type="text" name="last_name" id="last-name" value="{{ Auth::user()->last_name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                                    <textarea id="bio" name="bio" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ Auth::user()->bio }}</textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Change Password</h3>
                            <form class="space-y-4">
                                <div>
                                    <label for="current-password" class="block text-sm font-medium text-gray-700">Current Password</label>
                                    <input type="password" id="current-password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="new-password" class="block text-sm font-medium text-gray-700">New Password</label>
                                    <input type="password" id="new-password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                    <input type="password" id="confirm-password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Change Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- إعدادات الخصوصية -->
                    <div x-show="activeTab === 'privacy'" class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Privacy Settings</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="profile-public" name="profile-public" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ Auth::user()->is_public ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="profile-public" class="font-medium text-gray-700">Make my profile public</label>
                                        <p class="text-gray-500">Your profile will be visible to everyone</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="show-email" name="show-email" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ Auth::user()->show_email ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="show-email" class="font-medium text-gray-700">Show my email address</label>
                                        <p class="text-gray-500">Your email will be visible to other users</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="activity-status" name="activity-status" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ Auth::user()->show_activity ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="activity-status" class="font-medium text-gray-700">Show my activity status</label>
                                        <p class="text-gray-500">Others will see when you're active</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="button" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save Changes
                                </button>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Data & Privacy</h3>
                            <div class="space-y-4">
                                <div>
                                    <button type="button" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                        Download my data
                                    </button>
                                    <p class="text-gray-500 text-sm mt-1">Download a copy of your personal data</p>
                                </div>
                                <div>
                                    <button type="button" class="text-red-600 hover:text-red-900 text-sm font-medium">
                                        Delete my account
                                    </button>
                                    <p class="text-gray-500 text-sm mt-1">Permanently delete your account and all data</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- إعدادات الإشعارات -->
                    <div x-show="activeTab === 'notifications'" class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Notification Preferences</h3>
                            <div class="space-y-4">
                                <div>
                                    <h4 class="text-md font-medium text-gray-800 mb-2">Email Notifications</h4>
                                    <div class="space-y-3 pl-4">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="course-updates" name="course-updates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ Auth::user()->notify_course_updates ? 'checked' : '' }}>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="course-updates" class="font-medium text-gray-700">Course updates</label>
                                                <p class="text-gray-500">Get notified about new course materials</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="assignment-deadlines" name="assignment-deadlines" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ Auth::user()->notify_assignments ? 'checked' : '' }}>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="assignment-deadlines" class="font-medium text-gray-700">Assignment deadlines</label>
                                                <p class="text-gray-500">Reminders about upcoming deadlines</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="forum-activity" name="forum-activity" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ Auth::user()->notify_forum_activity ? 'checked' : '' }}>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="forum-activity" class="font-medium text-gray-700">Forum activity</label>
                                                <p class="text-gray-500">When someone replies to your posts</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="text-md font-medium text-gray-800 mb-2">Push Notifications</h4>
                                    <div class="space-y-3 pl-4">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="important-announcements" name="important-announcements" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ Auth::user()->push_important ? 'checked' : '' }}>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="important-announcements" class="font-medium text-gray-700">Important announcements</label>
                                                <p class="text-gray-500">Urgent notifications from instructors</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="direct-messages" name="direct-messages" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ Auth::user()->push_messages ? 'checked' : '' }}>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="direct-messages" class="font-medium text-gray-700">Direct messages</label>
                                                <p class="text-gray-500">When someone sends you a message</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="button" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
