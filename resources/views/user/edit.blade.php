<x-app-layout>
           <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('تعديل الملف الشخصي') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <x-input-label for="name" :value="__('الاسم')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="phone" :value="__('رقم الهاتف')" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="bio" :value="__('نبذة عنك')" />
                    <x-text-input id="bio" name="bio" type="text" class="mt-1 block w-full" :value="old('bio', $user->bio)" />
                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                </div>

                <x-primary-button class="mt-4">
                    {{ __('حفظ التغييرات') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
