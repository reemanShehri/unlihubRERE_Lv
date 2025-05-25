<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-6">
        @auth
            @php
                $student = auth()->user()->student;
            @endphp

            @if ($student && $student->university)
                <div class="bg-white shadow-lg rounded-xl p-8">
                    <h1 class="text-4xl font-bold mb-4 text-center">{{ $student->university->name }}</h1>
                    <p class="text-center text-gray-600 mb-6">الدولة: {{ $student->university->country }}</p>

                    <div class="space-y-4 text-center">
                        {{-- الموقع الرسمي --}}
                        @if($student->university->official_website)
                            <a href="{{ $student->university->official_website }}" target="_blank" class="text-blue-600 hover:underline">الموقع الرسمي</a>
                        @endif

                        {{-- البوابة الأكاديمية --}}
                        @if($student->university->student_portal)
                            <a href="{{ $student->university->student_portal }}" target="_blank" class="text-blue-600 hover:underline">البوابة الأكاديمية</a>
                        @endif

                        {{-- مودل --}}
                        @if($student->university->moodle_link)
                            <a href="{{ $student->university->moodle_link }}" target="_blank" class="text-blue-600 hover:underline">مودل الجامعة</a>
                        @endif

                        {{-- صفحة فيسبوك --}}
                        @if($student->university->facebook_page)
                            <a href="{{ $student->university->facebook_page }}" target="_blank" class="text-blue-600 hover:underline">صفحة فيسبوك</a>
                        @endif

                        {{-- مجموعة تلغرام --}}
                        @if($student->university->telegram_group)
                            <a href="{{ $student->university->telegram_group }}" target="_blank" class="text-blue-600 hover:underline">مجموعة تلغرام</a>
                        @endif
                    </div>
                </div>
            @else
                <p class="text-center text-red-600 font-semibold">لم يتم تسجيل بيانات الجامعة الخاصة بك.</p>
            @endif
        @else
            <p class="text-center text-gray-500">يجب تسجيل الدخول لعرض بيانات الجامعة.</p>
        @endauth
    </div>
</x-app-layout>
