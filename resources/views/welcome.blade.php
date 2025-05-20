<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UniHub - منصة الطلاب الجامعيين</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700" rel="stylesheet" />

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
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-2 border border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-400 rounded-lg text-sm font-medium transition-colors"
                        >
                            لوحة التحكم
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-2 border border-transparent hover:border-gray-300 dark:hover:border-gray-600 rounded-lg text-sm font-medium transition-colors"
                        >
                            تسجيل الدخول
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition-colors">
                                إنشاء حساب
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
                        <span class="unihub-text-gradient">UniHub</span> - منصتك الجامعية الشاملة
                    </h1>

                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
                        نظام متكامل لإدارة الحياة الجامعية، ربط الطلاب بالمحتوى الأكاديمي والأنشطة الطلابية في مكان واحد.
                    </p>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold">إدارة المواد والجدول الدراسي</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">تنظيم جدولك الدراسي ومتابعة المواد بسهولة</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold">تواصل مع زملائك وأساتذتك</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">منصة تواصل خاصة بالطلاب وأعضاء هيئة التدريس</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-indigo-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold">متابعة الأنشطة والفعاليات</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">ابق على اطلاع بجميع الفعاليات والأنشطة الجامعية</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('register') }}" class="px-6 py-3 unihub-gradient text-white rounded-lg font-medium text-center hover:opacity-90 transition-opacity">
                            ابدأ الآن مجانًا
                        </a>
                        <a href="#features" class="px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg font-medium text-center hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            اكتشف المزيد
                        </a>
                    </div>
                </div>

                <!-- Image/Illustration Section -->
                <div class="relative rounded-xl overflow-hidden bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900 dark:to-purple-900 lg:w-1/2 flex items-center justify-center p-8">
                    <img src="https://illustrations.popsy.co/amber/student.svg" alt="Student Illustration" class="w-full h-auto max-h-96 object-contain">
                    <div class="absolute inset-0 rounded-xl shadow-[inset_0px_0px_0px_1px_rgba(0,0,0,0.05)] dark:shadow-[inset_0px_0px_0px_1px_rgba(255,255,255,0.1)]"></div>
                </div>
            </main>
        </div>

        <!-- Features Section -->
        <div id="features" class="w-full lg:max-w-6xl py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl lg:text-3xl font-bold mb-4">مميزات منصة UniHub</h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">كل ما تحتاجه لتحقيق النجاح الأكاديمي في مكان واحد</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-lg unihub-gradient flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">إدارة المواد الدراسية</h3>
                    <p class="text-gray-500 dark:text-gray-400">سجل موادك الدراسية، تابع جدول المحاضرات، واحصل على تنبيهات بمواعيد التسليم.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-lg unihub-gradient flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">مجتمع جامعي</h3>
                    <p class="text-gray-500 dark:text-gray-400">تواصل مع زملائك في التخصص، شارك الملاحظات، وناقش المواضيع الأكاديمية.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-lg unihub-gradient flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">الفعاليات والأنشطة</h3>
                    <p class="text-gray-500 dark:text-gray-400">ابق على اطلاع بجميع الفعاليات والأنشطة والنوادي الطلابية في جامعتك.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="w-full py-6 border-t border-gray-200 dark:border-gray-800 mt-12">
            <div class="w-full lg:max-w-6xl px-4 sm:px-6 lg:px-8 mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <span class="text-xl font-bold unihub-text-gradient">UniHub</span>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">منصة الطلاب الجامعيين © 2023</p>
                    </div>
                    <div class="flex gap-4">
                        <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                            الشروط والأحكام
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                            سياسة الخصوصية
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                            تواصل معنا
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
