<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Privacy Policy</title>

  <!-- Google Fonts: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #F9FAFB 0%, #E5E7EB 100%);
    }

    .contact-card {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border-left-color: #4F46E5;
    }

    .social-icon {
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        transform: scale(1.1);
    }
</style>
</head>
<body class="bg-gradient-to-tr from-indigo-50 via-white to-indigo-50 text-gray-900">
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4">
          <div class="flex items-center justify-between">

            <!-- القسم الأيسر: UniLink + Logo -->
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('admin.dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                  </a>
                  <a href="{{ url('/') }}" class="text-2xl font-bold mt-3">
                    <span class="text-dark">Uni</span><span style="color: #5A4BFF;">Link</span>
                  </a>


            </div>

      <nav class="hidden md:flex space-x-8">
        <a href="{{ url('/') }}" class="text-dark hover:text-indigo-600">Home</a>
        <a href="{{ route('terms') }}" class="text-dark hover:text-indigo-600">Terms</a>
        <a href="{{ route('pages.contact') }}" class="text-dark hover:text-indigo-600">Contact</a>
        <a href="{{ route('privacy') }}" class="text-indigo-700 font-semibold">Privacy</a>
      </nav>
    </div>
  </header>

  <main class="container mx-auto px-6 py-16 max-w-5xl">
    <!-- Title -->
    <h1 class="text-5xl font-extrabold text-indigo-700 mb-10 tracking-tight drop-shadow-md">
      Privacy Policy
    </h1>
    <p class="text-xl text-gray-600 mb-14 border-l-4 border-indigo-500 pl-6 italic drop-shadow-sm">
      This Privacy Policy explains how we collect, use, and protect your personal information when you use our application.
    </p>

    <!-- Sections -->
    <section class="mb-14 p-8 bg-white rounded-3xl shadow-lg border border-indigo-200 hover:shadow-2xl transition-shadow duration-300">
      <div class="flex items-center mb-6 space-x-4 rtl:space-x-reverse">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m-6-8h6M13 5h6a2 2 0 012 2v14a2 2 0 01-2 2h-6a2 2 0 01-2-2V7a2 2 0 012-2z" />
        </svg>
        <h2 class="text-3xl font-semibold text-indigo-700">
          1. Information We Collect
        </h2>
      </div>
      <ul class="list-disc list-inside space-y-3 text-gray-700 text-lg leading-relaxed">
        <li>Name and Email address used during registration.</li>
        <li>Messages or content you submit via our forms.</li>
        <li>Technical data like browser type, IP address, device information.</li>
      </ul>
    </section>

    <section class="mb-14 p-8 bg-white rounded-3xl shadow-lg border border-indigo-200 hover:shadow-2xl transition-shadow duration-300">
      <div class="flex items-center mb-6 space-x-4 rtl:space-x-reverse">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-6a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h2 class="text-3xl font-semibold text-indigo-700">
          2. How We Use Your Information
        </h2>
      </div>
      <p class="mb-4 text-gray-700 text-lg leading-relaxed">
        We use the collected data to:
      </p>
      <ul class="list-disc list-inside space-y-3 text-gray-700 text-lg leading-relaxed">
        <li>Provide and maintain our services.</li>
        <li>Send important updates or notifications.</li>
        <li>Improve user experience and troubleshoot issues.</li>
      </ul>
    </section>

    <section class="mb-14 p-8 bg-white rounded-3xl shadow-lg border border-indigo-200 hover:shadow-2xl transition-shadow duration-300">
      <div class="flex items-center mb-6 space-x-4 rtl:space-x-reverse">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 2v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5a9 9 0 0118 0z" />
        </svg>
        <h2 class="text-3xl font-semibold text-indigo-700">
          3. How We Protect Your Data
        </h2>
      </div>
      <p class="text-gray-700 text-lg leading-relaxed">
        We implement industry-standard security measures to protect your data from unauthorized access or misuse.
      </p>
    </section>

    <section class="mb-14 p-8 bg-white rounded-3xl shadow-lg border border-indigo-200 hover:shadow-2xl transition-shadow duration-300">
      <div class="flex items-center mb-6 space-x-4 rtl:space-x-reverse">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
          <path stroke-linecap="round" stroke-linejoin="round" d="M18 13v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m14-8h-6a2 2 0 00-2 2v6m8-8L10 14" />
        </svg>
        <h2 class="text-3xl font-semibold text-indigo-700">
          4. Third-Party Services
        </h2>
      </div>
      <p class="text-gray-700 text-lg leading-relaxed">
        We may use third-party tools (like analytics or messaging APIs), but we ensure these services are compliant with privacy regulations.
      </p>
    </section>

    <section class="mb-14 p-8 bg-white rounded-3xl shadow-lg border border-indigo-200 hover:shadow-2xl transition-shadow duration-300">
      <div class="flex items-center mb-6 space-x-4 rtl:space-x-reverse">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1118.879 6.196 9 9 0 015.121 17.804zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <h2 class="text-3xl font-semibold text-indigo-700">
          5. Your Rights
        </h2>
      </div>
      <ul class="list-disc list-inside space-y-3 text-gray-700 text-lg leading-relaxed">
        <li>You have the right to access, update, or delete your personal data.</li>
        <li>You can contact us anytime for privacy-related requests.</li>
      </ul>
    </section>

    <section class="mb-20 p-8 bg-white rounded-3xl shadow-lg border border-indigo-200 hover:shadow-2xl transition-shadow duration-300">
      <div class="flex items-center mb-6 space-x-4 rtl:space-x-reverse">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
          <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 4H8m4-8H8m12 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16-6H4a2 2 0 00-2 2v2a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z" />
        </svg>
        <h2 class="text-3xl font-semibold text-indigo-700">
          6. Contact Us
        </h2>
      </div>
      <p class="text-gray-700 text-lg leading-relaxed">
        If you have any questions about this Privacy Policy or wish to make a request, please contact us at:
        <br><strong class="text-indigo-600">admin@UniLink.com</strong>
      </p>
    </section>
  </main>




  {{-- نهاية الصفحة --}}
<div class="bg-gray-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div>
            <h4 class="font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2">
                <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-white">Home</a></li>
                <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-white">Terms</a></li>
                <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white">Privacy</a></li>
                <li><a href="{{ route('pages.contact') }}" class="text-gray-400 hover:text-white">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Connect</h4>
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/reman.el.shehri/" class="bg-gray-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://x.com/ReemanShehri" class="bg-gray-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-400 transition">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/reman_shehri/?__pwa=1" class="bg-gray-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/reeman-shehri-15a15b248/" class="bg-gray-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-500 transition">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>

        </div>

    </div>
</div>




  <footer class="bg-white border-t py-6 text-center text-sm text-gray-500">


    © 2025 UniLink. All rights reserved.
  </footer>
</body>
</html>
