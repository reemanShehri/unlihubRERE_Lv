<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms & Conditions | UniLink</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',
            secondary: '#10B981',
            dark: '#1F2937',
            light: '#F9FAFB'
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8fafc;
    }

    .term-section {
      border-left: 3px solid transparent;
      transition: all 0.3s ease;
    }

    .term-section:hover {
      border-left-color: #4F46E5;
      padding-left: 1rem;
    }

    .term-list li {
      position: relative;
      padding-left: 1.5rem;
      margin-bottom: 0.5rem;
    }

    .term-list li:before {
      content: "•";
      position: absolute;
      left: 0;
      color: #4F46E5;
      font-weight: bold;
    }

    .highlight-box {
      background: linear-gradient(135deg, #f0f4ff 0%, #e6edff 100%);
      border-radius: 0.5rem;
    }
  </style>
</head>
<body class="min-h-screen">

  <!-- Header -->
  {{-- <header class="bg-white shadow-sm">
    <div class="container mx-auto px-6 py-4">
      <div class="flex items-center justify-between">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-primary">
          <span class="text-dark">Uni</span>UniLink
        </a>


        <nav class="hidden md:flex space-x-8">
            <a href="{{ url('/') }}" class="text-dark hover:text-primary">Home</a>
            <a href="{{ route('terms') }}" class="text-primary font-medium">Terms</a>
            <a href="{{ route('pages.contact') }}" class="text-dark hover:text-primary">Contact</a>
            <a href="{{ route('privacy') }}" class="text-dark hover:text-primary">Privacy</a>
        </nav>

        <button class="md:hidden text-dark">
          <i class="fas fa-bars text-xl"></i>
        </button>
      </div>
    </div>
  </header> --}}

  <header class="bg-white shadow-sm">
    <div class="container mx-auto px-6 py-4">
      <div class="flex items-center justify-between">

        <!-- القسم الأيسر: UniLink + Logo -->
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
              </a>
          <a href="{{ url('/') }}" class="text-2xl font-bold text-primary mt-3">
            <span class="text-dark">Uni</span>Link
          </a>

        </div>

        <!-- القسم الأيمن: روابط التنقل + زر الموبايل -->
        <div class="flex items-center gap-6">
          <nav class="hidden md:flex space-x-8">
            <a href="{{ url('/') }}" class="text-dark hover:text-primary">Home</a>
            <a href="{{ route('terms') }}" class="text-primary font-medium">Terms</a>
            <a href="{{ route('pages.contact') }}" class="text-dark hover:text-primary">Contact</a>
            <a href="{{ route('privacy') }}" class="text-dark hover:text-primary">Privacy</a>
          </nav>

          <button class="md:hidden text-dark">
            <i class="fas fa-bars text-xl"></i>
          </button>
        </div>

      </div>
    </div>
  </header>


  <!-- Main Content -->
  <main class="container mx-auto px-6 py-16">
    <div class="max-w-4xl mx-auto">
      <!-- Page Header -->
      <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-bold text-dark mb-4">Terms & Conditions</h1>
        <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
          Last updated: <span class="font-medium">May 24, 2025</span>
        </p>
      </div>

      <!-- Highlight Box -->
      <div class="highlight-box p-6 mb-12">
        <div class="flex items-start">
          <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
            <i class="fas fa-exclamation-circle text-primary text-xl"></i>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-dark mb-2">Important Notice</h3>
            <p class="text-gray-700">
              By accessing or using UniLink, you agree to be bound by these Terms & Conditions and our Privacy Policy. If you do not agree, please do not use the platform.
            </p>
          </div>
        </div>
      </div>

      <!-- Terms Sections -->
      <div class="space-y-12">
        <!-- Section 1 -->
        <div class="term-section">
          <div class="flex items-center mb-4">
            <span class="text-primary text-2xl font-bold mr-3">1</span>
            <h2 class="text-2xl font-semibold text-dark">Acceptance of Terms</h2>
          </div>
          <div class="pl-12">
            <p class="text-gray-700 mb-4">
              These Terms & Conditions ("Terms") govern your access to and use of UniLink's services, website, and applications ("Platform"). By accessing or using the Platform, you agree to comply with and be bound by these Terms.
            </p>
            <p class="text-gray-700">
              If you are using the Platform on behalf of an organization, you are agreeing to these Terms for that organization and representing that you have the authority to bind that organization to these Terms.
            </p>
          </div>
        </div>

        <!-- Section 2 -->
        <div class="term-section">
          <div class="flex items-center mb-4">
            <span class="text-primary text-2xl font-bold mr-3">2</span>
            <h2 class="text-2xl font-semibold text-dark">Use of the Platform</h2>
          </div>
          <div class="pl-12">
            <p class="text-gray-700 mb-4">
              UniLink is designed for academic collaboration, communication, and resource sharing among students and faculty members.
            </p>
            <ul class="term-list text-gray-700 mb-4">
              <li>You must be a registered student, faculty member, or authorized staff to access certain features</li>
              <li>You are responsible for maintaining the confidentiality of your account credentials</li>
              <li>You must provide accurate and complete information when creating an account</li>
            </ul>
            <p class="text-gray-700">
              Any unauthorized use of the Platform, including but not limited to unauthorized access to systems or data, is strictly prohibited.
            </p>
          </div>
        </div>

        <!-- Section 3 -->
        <div class="term-section">
          <div class="flex items-center mb-4">
            <span class="text-primary text-2xl font-bold mr-3">3</span>
            <h2 class="text-2xl font-semibold text-dark">User Conduct</h2>
          </div>
          <div class="pl-12">
            <p class="text-gray-700 mb-4">
              You agree not to engage in any of the following prohibited activities:
            </p>
            <ul class="term-list text-gray-700 mb-4">
              <li>Posting, sharing, or transmitting content that is unlawful, harmful, threatening, abusive, harassing, defamatory, or otherwise objectionable</li>
              <li>Impersonating any person or entity or falsely stating your affiliation with a person or entity</li>
              <li>Uploading or distributing viruses or other malicious code</li>
              <li>Interfering with or disrupting the Platform or servers connected to the Platform</li>
              <li>Violating any applicable laws or regulations</li>
            </ul>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
              <div class="flex">
                <div class="flex-shrink-0">
                  <i class="fas fa-ban text-red-500"></i>
                </div>
                <div class="ml-3">
                  <p class="text-sm text-red-700">
                    Violations of these conduct guidelines may result in immediate termination of your account and legal action where applicable.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Section 4 -->
        <div class="term-section">
          <div class="flex items-center mb-4">
            <span class="text-primary text-2xl font-bold mr-3">4</span>
            <h2 class="text-2xl font-semibold text-dark">Content Ownership</h2>
          </div>
          <div class="pl-12">
            <p class="text-gray-700 mb-4">
              You retain all ownership rights to the content you submit, post, or display on or through the Platform ("Your Content").
            </p>
            <p class="text-gray-700 mb-4">
              By submitting Your Content, you grant UniLink a worldwide, non-exclusive, royalty-free license (with the right to sublicense) to use, copy, reproduce, process, adapt, modify, publish, transmit, display, and distribute Your Content in any and all media or distribution methods.
            </p>
            <p class="text-gray-700">
              This license is solely for the purpose of operating, developing, providing, and improving the Platform and researching and developing new services.
            </p>
          </div>
        </div>

        <!-- Section 5 -->
        <div class="term-section">
          <div class="flex items-center mb-4">
            <span class="text-primary text-2xl font-bold mr-3">5</span>
            <h2 class="text-2xl font-semibold text-dark">Termination</h2>
          </div>
          <div class="pl-12">
            <p class="text-gray-700 mb-4">
              We may suspend or terminate your access to the Platform immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach these Terms.
            </p>
            <p class="text-gray-700">
              Upon termination, your right to use the Platform will immediately cease. All provisions of these Terms which by their nature should survive termination shall survive termination, including ownership provisions, warranty disclaimers, indemnity, and limitations of liability.
            </p>
          </div>
        </div>

        <!-- Section 6 -->
        <div class="term-section">
          <div class="flex items-center mb-4">
            <span class="text-primary text-2xl font-bold mr-3">6</span>
            <h2 class="text-2xl font-semibold text-dark">Changes to Terms</h2>
          </div>
          <div class="pl-12">
            <p class="text-gray-700 mb-4">
              We reserve the right, at our sole discretion, to modify or replace these Terms at any time. We will provide at least 30 days' notice prior to any new terms taking effect.
            </p>
            <p class="text-gray-700">
              By continuing to access or use our Platform after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you must stop using the Platform.
            </p>
          </div>
        </div>

        <!-- Section 7 -->
        <div class="term-section">
          <div class="flex items-center mb-4">
            <span class="text-primary text-2xl font-bold mr-3">7</span>
            <h2 class="text-2xl font-semibold text-dark">Contact Us</h2>
          </div>
          <div class="pl-12">
            <p class="text-gray-700 mb-6">
              If you have any questions about these Terms, please contact us at:
            </p>
            <div class="flex items-center">
              <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                <i class="fas fa-envelope text-primary text-xl"></i>
              </div>
              <div>
                <a href="mailto:r409456712@gmail.com" class="text-primary font-medium text-lg">r409456712@gmail.com</a>
                <p class="text-sm text-gray-500">We typically respond within 2 business days</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">UniLink</h3>
          <p class="text-gray-400">
            The leading academic collaboration platform for universities and students worldwide.
          </p>
        </div>
        <div>


        </div>
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
                <a href="https://www.facebook.com/reman.el.shehri/" class="social-icon bg-gray-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-primary">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://x.com/ReemanShehri" class="social-icon bg-gray-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-400">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/reman_shehri/?__pwa=1" class="social-icon bg-gray-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-pink-600">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/reeman-shehri-15a15b248/" class="social-icon bg-gray-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-600">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
        <p>&copy; 2025 UniLink. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-6 right-6 bg-primary text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all">
    <i class="fas fa-arrow-up"></i>
  </button>

  <!-- JavaScript -->
  <script>
    // Back to Top Button
    const backToTopButton = document.getElementById('backToTop');

    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 300) {
        backToTopButton.classList.remove('opacity-0', 'invisible');
        backToTopButton.classList.add('opacity-100', 'visible');
      } else {
        backToTopButton.classList.remove('opacity-100', 'visible');
        backToTopButton.classList.add('opacity-0', 'invisible');
      }
    });

    backToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
      duration: 800,       // مدة الحركة (بالمللي ثانية)
      easing: 'ease-in-out', // نوع الحركة
      once: false,         // التكرار (false تعني تتكرر كل ما تظهر العناصر)
      offset: 120,         // المسافة قبل ظهور العنصر (بالبكسل)
      delay: 100,          // التأخير بين العناصر (بالمللي ثانية)
    });
  });
</script>


</body>
</html>
