<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        @auth
            @php
                $student = auth()->user()->student;
                $universities = App\Models\University::all();
            @endphp

            @if ($student && $student->university)
                <!-- بطاقة الجامعة المختارة -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-800 rounded-2xl shadow-2xl overflow-hidden mb-12">
                    <div class="p-8 text-white">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-3xl font-bold mb-2">{{ $student->university->name }}</h1>
                                <div class="flex items-center mb-6">
                                    <span class="bg-white text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                        {{ $student->university->country }}
                                    </span>
                                </div>
                            </div>
                            <span class="bg-white text-blue-800 px-4 py-2 rounded-lg font-bold">My University</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                            @if($student->university->official_website)
                            <a href="{{ $student->university->official_website }}" target="_blank" 
                               class="bg-white bg-opacity-10 hover:bg-opacity-20 transition p-4 rounded-xl flex items-center">
                                <div class="bg-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                </div>
                                <span>الموقع الرسمي</span>
                            </a>
                            @endif

                            @if($student->university->student_portal)
                            <a href="{{ $student->university->student_portal }}" target="_blank" 
                               class="bg-white bg-opacity-10 hover:bg-opacity-20 transition p-4 rounded-xl flex items-center">
                                <div class="bg-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <span>البوابة الأكاديمية</span>
                            </a>
                            @endif

                            @if($student->university->moodle_link)
                            <a href="{{ $student->university->moodle_link }}" target="_blank" 
                               class="bg-white bg-opacity-10 hover:bg-opacity-20 transition p-4 rounded-xl flex items-center">
                                <div class="bg-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <span>نظام التعليم (Moodle)</span>
                            </a>
                            @endif

                            @if($student->university->facebook_page)
                            <a href="{{ $student->university->facebook_page }}" target="_blank" 
                               class="bg-white bg-opacity-10 hover:bg-opacity-20 transition p-4 rounded-xl flex items-center">
                                <div class="bg-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                                    </svg>
                                </div>
                                <span>صفحة الفيسبوك</span>
                            </a>
                            @endif

                            @if($student->university->telegram_group)
                            <a href="{{ $student->university->telegram_group }}" target="_blank" 
                               class="bg-white bg-opacity-10 hover:bg-opacity-20 transition p-4 rounded-xl flex items-center">
                                <div class="bg-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69.03-.07.01-.16-.07-.23s-.17-.05-.25-.02c-.11.03-1.79 1.14-5.06 3.35-.48.33-.91.5-1.31.5-.43 0-1.25-.24-1.87-.44-.75-.24-1.35-.37-1.3-.78.03-.24.33-.5.91-.76 3.19-1.33 5.3-2.2 8.1-3.37.78-.33 1.56-.5 2.36-.5.27 0 .52.03.75.1.6.17.85.75.7 1.52z"></path>
                                    </svg>
                                </div>
                                <span>مجموعة التليجرام</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- قائمة جميع الجامعات -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">الجامعات الفلسطينية</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($universities as $university)
                            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-xl font-semibold text-gray-800">{{ $university->name }}</h3>
                                        @if($student->university_id == $university->id)
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">جامعتي</span>
                                        @endif
                                    </div>
                                    <p class="text-gray-600 mt-2">{{ $university->country }}</p>
                                    
                                    <div class="mt-4 flex flex-wrap gap-2">
                                        @if($university->official_website)
                                            <a href="{{ $university->official_website }}" target="_blank" class="text-sm bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full">
                                                الموقع
                                            </a>
                                        @endif
                                        @if($university->student_portal)
                                            <a href="{{ $university->student_portal }}" target="_blank" class="text-sm bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full">
                                                البوابة
                                            </a>
                                        @endif
                                    </div>

                                    {{-- <div class="mt-4">
                                        @if($student->university_id != $university->id)
                                            <form action="{{ route('student.set-university', $university) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                                    اختر كجامعتي
                                                </button>
                                            </form>
                                        @endif
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            @else
                <!-- حالة عدم وجود جامعة مسجلة -->
                <div class="text-center">
                    <div class="bg-white p-8 rounded-xl shadow-lg max-w-md mx-auto">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <h2 class="mt-4 text-xl font-bold text-gray-800">لم يتم اختيار جامعة بعد</h2>
                        <p class="mt-2 text-gray-600">الرجاء اختيار جامعتك من القائمة التالية:</p>
                        
                        <div class="mt-6 grid grid-cols-1 gap-4">
                            {{-- @foreach($universities as $university)
                                <form action="{{ route('student.set-university', $university) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex justify-between items-center bg-white hover:bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                                        <span>{{ $university->name }}</span>
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </form>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <!-- حالة عدم تسجيل الدخول -->
            <div class="text-center bg-white p-8 rounded-xl shadow-lg max-w-md mx-auto">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                <h2 class="mt-4 text-xl font-bold text-gray-800">يجب تسجيل الدخول</h2>
                <p class="mt-2 text-gray-600">الرجاء تسجيل الدخول لعرض بيانات الجامعة</p>
                <div class="mt-6">
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        تسجيل الدخول
                    </a>
                </div>
            </div>
        @endauth
    </div>
</x-app-layout>