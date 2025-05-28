<!DOCTYPE html>
       <!-- Tailwind CSS CDN -->
       <script src="https://cdn.tailwindcss.com"></script>
<!-- Bootstrap CSS -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoH5bZg0aI6xz8Fjz4x1YYJ1ZISbB0bE+1Z8SGvtQv0QetQ" crossorigin="anonymous"></script> --}}

<html x-data="{
        currentLang: localStorage.getItem('lang') || 'ar',
        isDark: localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)
    }"
    :lang="currentLang"
    :dir="currentLang === 'ar' ? 'rtl' : 'ltr'"
    :class="{'dark': isDark}"
    class="h-full"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title x-text="currentLang === 'ar' ? 'UniHub - منصة الطلاب الجامعيين' : 'UniHub - University Students Platform'"></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('im.png') }}">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            [x-cloak] { display: none !important; }
            .unihub-gradient {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #9333ea 100%);
            }
            .unihub-text-gradient {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #9333ea 100%);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }
        </style>

        
    </head>

    <body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-tajawal flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

        <!-- Language and Theme Switcher -->
        <div class="fixed top-4 left-4 flex gap-2 z-50">
            <!-- Language Switcher -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-1 px-3 py-1 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 text-sm">
                    <span x-text="currentLang === 'ar' ? 'العربية' : 'English'"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute left-0 mt-1 w-32 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <button @click="currentLang = 'ar'; localStorage.setItem('lang', 'ar'); open = false"
                            class="block w-full text-right px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        العربية
                    </button>
                    <button @click="currentLang = 'en'; localStorage.setItem('lang', 'en'); open = false"
                            class="block w-full text-right px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        English
                    </button>
                </div>
            </div>

            <!-- Dark Mode Toggle -->
            {{-- <button @click="isDark = !isDark; localStorage.setItem('darkMode', isDark)"
                    type="button"
                    class="p-1.5 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                {{-- <svg x-show="!isDark" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"> --}}
                    {{-- <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg x-show="isDark" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                {{-- </svg> 
            </button> --}}
        </div>

        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-2 border border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-400 rounded-lg text-sm font-medium transition-colors"
                            x-text="currentLang === 'ar' ? 'لوحة التحكم' : 'Dashboard'"
                        >
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-2 border border-transparent hover:border-gray-300 dark:hover:border-gray-600 rounded-lg text-sm font-medium transition-colors"
                            x-text="currentLang === 'ar' ? 'تسجيل الدخول' : 'Login'"
                        >
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition-colors"
                                x-text="currentLang === 'ar' ? 'إنشاء حساب' : 'Register'"
                            >
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-6xl lg:flex-row gap-8">
                <!-- Content Section -->
                <div class="flex-1 p-8 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                    <h1 class="text-3xl lg:text-4xl font-bold mb-4">
                        <span class="unihub-text-gradient">UniHub</span> -
                        <span x-text="currentLang === 'ar' ? 'منصتك الجامعية الشاملة' : 'Your Comprehensive University Platform'"></span>
                    </h1>

                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-6" x-text="currentLang === 'ar' ?
                        'نظام متكامل لإدارة الحياة الجامعية، ربط الطلاب بالمحتوى الأكاديمي والأنشطة الطلابية في مكان واحد.' :
                        'An integrated system for managing university life, connecting students with academic content and student activities in one place.'">
                    </p>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold" x-text="currentLang === 'ar' ? 'إدارة المواد والجدول الدراسي' : 'Course & Schedule Management'"></h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm"
                                   x-text="currentLang === 'ar' ? 'تنظيم جدولك الدراسي ومتابعة المواد بسهولة' : 'Organize your schedule and track courses easily'">
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold" x-text="currentLang === 'ar' ? 'تواصل مع زملائك وأساتذتك' : 'Connect with Peers & Professors'"></h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm"
                                   x-text="currentLang === 'ar' ? 'منصة تواصل خاصة بالطلاب وأعضاء هيئة التدريس' : 'A dedicated platform for students and faculty members'">
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold" x-text="currentLang === 'ar' ? 'متابعة الأنشطة والفعاليات' : 'Track Activities & Events'"></h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm"
                                   x-text="currentLang === 'ar' ? 'ابق على اطلاع بجميع الفعاليات والأنشطة الجامعية' : 'Stay updated with all university events and activities'">
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('register') }}" class="px-6 py-3 unihub-gradient text-white rounded-lg font-medium text-center hover:opacity-90 transition-opacity"
                           x-text="currentLang === 'ar' ? 'ابدأ الآن مجانًا' : 'Start Now for Free'">
                        </a>
                        <a href="#features" class="px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg font-medium text-center hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                           x-text="currentLang === 'ar' ? 'اكتشف المزيد' : 'Discover More'">
                        </a>
                    </div>
                </div>

                <!-- Image/Illustration Section -->
                <div class="relative rounded-xl overflow-hidden bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900 dark:to-purple-900 lg:w-1/2 flex items-center justify-center p-8 h-full">
                    <img
                        src="{{ asset('images/image.png') }}"
                        alt="Lecture Image"
                        class="rounded-lg object-contain w-full h-full max-h-[400px]"
                    >
                </div>
            </main>
        </div>

        <!-- Features Section -->
        <div id="features" class="w-full lg:max-w-6xl py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl lg:text-3xl font-bold mb-4" x-text="currentLang === 'ar' ? 'مميزات منصة UniHub' : 'UniHub Platform Features'"></h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto"
                   x-text="currentLang === 'ar' ? 'كل ما تحتاجه لتحقيق النجاح الأكاديمي في مكان واحد' : 'Everything you need for academic success in one place'">
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-lg unihub-gradient flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2" x-text="currentLang === 'ar' ? 'إدارة المواد الدراسية' : 'Course Management'"></h3>
                    <p class="text-gray-500 dark:text-gray-400"
                       x-text="currentLang === 'ar' ? 'سجل موادك الدراسية، تابع جدول المحاضرات، واحصل على تنبيهات بمواعيد التسليم.' : 'Register your courses, track lecture schedules, and get submission deadline alerts.'">
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-lg unihub-gradient flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2" x-text="currentLang === 'ar' ? 'مجتمع جامعي' : 'University Community'"></h3>
                    <p class="text-gray-500 dark:text-gray-400"
                       x-text="currentLang === 'ar' ? 'تواصل مع زملائك في التخصص، شارك الملاحظات، وناقش المواضيع الأكاديمية.' : 'Connect with peers in your major, share notes, and discuss academic topics.'">
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-lg unihub-gradient flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2" x-text="currentLang === 'ar' ? 'الفعاليات والأنشطة' : 'Events & Activities'"></h3>
                    <p class="text-gray-500 dark:text-gray-400"
                       x-text="currentLang === 'ar' ? 'ابق على اطلاع بجميع الفعاليات والأنشطة والنوادي الطلابية في جامعتك.' : 'Stay informed about all events, activities and student clubs at your university.'">
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="w-full py-6 border-t border-gray-200 dark:border-gray-800 mt-12">
            <div class="w-full lg:max-w-6xl px-4 sm:px-6 lg:px-8 mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <span class="text-xl font-bold unihub-text-gradient">UniHub</span>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1"
                           x-text="currentLang === 'ar' ? 'منصة الطلاب الجامعيين © 2025' : 'University Students Platform © 2025R'">
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('terms') }}" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors"
                           x-text="currentLang === 'ar' ? 'الشروط والأحكام' : 'Terms & Conditions'">
                        </a>
                        <a href="{{ route('privacy') }}" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors"
                           x-text="currentLang === 'ar' ? 'سياسة الخصوصية' : 'Privacy Policy'">
                        </a>
                        <a href="{{ route('pages.contact') }}" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors"
                           x-text="currentLang === 'ar' ? 'تواصل معنا' : 'Contact Us'">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
