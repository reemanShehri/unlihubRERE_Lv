<x-app-layout>
       <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }} - {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- صورة البروفايل --}}
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Profile Photo</h3>
                <div class="flex items-center space-x-4">
                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                         class="w-20 h-20 rounded-full object-cover" alt="Profile Photo">
                    <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="file" name="profile_photo" class="block mb-2" required>
                        <x-primary-button>Update Photo</x-primary-button>
                    </form>
                </div>
            </div>

            {{-- معلومات البروفايل الأساسية --}}
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Profile Information</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- المعلومات الأكاديمية --}}
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Academic Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-md transition-shadow">
                        <h4 class="text-lg font-semibold text-gray-800">University</h4>
                        <p class="text-lg mt-2 text-gray-600">
                            {{ Auth::user()->student->university->name ?? 'Not set' }}
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-md transition-shadow">
                        <h4 class="text-lg font-semibold text-gray-800">Major</h4>
                        <p class="text-lg mt-2 text-gray-600">
                            {{ Auth::user()->student->major->name ?? 'Not set' }}
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-md transition-shadow">
                        <h4 class="text-lg font-semibold text-gray-800">College</h4>
                        <p class="text-lg mt-2 text-gray-600">
                            {{ Auth::user()->student->college->name ?? 'Not set' }}
                        </p>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <a href="{{ route('student-details.edit') }}" class="text-indigo-600 hover:underline">Edit Academic Info</a>
                </div>
            </div>

            {{-- تغيير كلمة المرور --}}
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Change Password</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- حذف الحساب --}}
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h3 class="text-lg font-semibold mb-4 text-red-700">Delete Account</h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
