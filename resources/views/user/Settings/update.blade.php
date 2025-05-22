<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        <!-- السايدبار (نفس السابق) -->

        <!-- المحتوى الرئيسي -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- التوب بار (نفس السابق) -->

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
                            <form class="space-y-4">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                                        <input type="text" id="first-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <input type="text" id="last-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                                    <textarea id="bio" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                        <input id="profile-public" name="profile-public" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="profile-public" class="font-medium text-gray-700">Make my profile public</label>
                                        <p class="text-gray-500">Your profile will be visible to everyone</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="show-email" name="show-email" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="show-email" class="font-medium text-gray-700">Show my email address</label>
                                        <p class="text-gray-500">Your email will be visible to other users</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="activity-status" name="activity-status" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
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
                                                <input id="course-updates" name="course-updates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="course-updates" class="font-medium text-gray-700">Course updates</label>
                                                <p class="text-gray-500">Get notified about new course materials</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="assignment-deadlines" name="assignment-deadlines" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="assignment-deadlines" class="font-medium text-gray-700">Assignment deadlines</label>
                                                <p class="text-gray-500">Reminders about upcoming deadlines</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="forum-activity" name="forum-activity" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
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
                                                <input id="important-announcements" name="important-announcements" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="important-announcements" class="font-medium text-gray-700">Important announcements</label>
                                                <p class="text-gray-500">Urgent notifications from instructors</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="direct-messages" name="direct-messages" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
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

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('settings', () => ({
                activeTab: 'account'
            }))
        })
    </script>
</x-app-layout>
