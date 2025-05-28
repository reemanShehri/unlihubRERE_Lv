<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Professional</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="min-h-screen">

    <!-- Header Section -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-primary">
                    <span class="text-dark">Uni</span>Hub
                </a>
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ url('/') }}" class="text-dark hover:text-primary">Home</a>
                    <a href="{{ route('terms') }}" class="text-dark hover:text-primary">Terms</a>
                    <a href="{{ route('pages.contact') }}" class="text-primary font-medium">Contact</a>
                    <a href="{{ route('privacy') }}" class="text-dark hover:text-primary">Privacy</a>
                </nav>
                <button class="md:hidden text-dark">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-16">
        <!-- Hero Section -->
        <section class="text-center mb-20">
            <h1 class="text-4xl md:text-5xl font-bold text-dark mb-4">Get In Touch With Us</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We're here to help and answer any questions you might have.
                Reach out to us through any of the channels below.
            </p>
        </section>

        <!-- Contact Cards -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            <!-- Email Card -->
            <div class="contact-card bg-white rounded-xl p-8 shadow-md">
                <div class="flex items-center mb-6">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                        <i class="fas fa-envelope text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark">Email Us</h3>
                </div>
                <p class="text-gray-600 mb-6">
                    Send us an email and we'll get back to you within 24 hours.
                </p>
                <a href="mailto:r409456712@gmail.com" class="inline-flex items-center text-primary font-medium">
                    support
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- WhatsApp Card -->
            <div class="contact-card bg-white rounded-xl p-8 shadow-md">
                <div class="flex items-center mb-6">
                    <div class="bg-green-100 p-3 rounded-full mr-4">
                        <i class="fab fa-whatsapp text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark">WhatsApp</h3>
                </div>
                <p class="text-gray-600 mb-6">
                    Chat with us instantly on WhatsApp for quick responses.
                </p>
                <a href="https://wa.me/972592038364" target="_blank" class="inline-flex items-center text-green-600 font-medium">
                    +972 59 203 8364
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Social Media Card -->
            <div class="contact-card bg-white rounded-xl p-8 shadow-md">
                <div class="flex items-center mb-6">
                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                        <i class="fas fa-hashtag text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-dark">Social Media</h3>
                </div>
                <p class="text-gray-600 mb-6">
                    Connect with us on our social media platforms.
                </p>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/reman.el.shehri" target="_blank" class="social-icon bg-blue-100 text-blue-600 w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://t.me/Reeman_sh2003" target="_blank" class="social-icon bg-blue-200 text-blue-700 w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fab fa-telegram"></i>
                    </a>
                    <a href="https://www.instagram.com/reman_shehri" class="social-icon bg-pink-100 text-pink-600 w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Location Section -->
        <section class="bg-white rounded-xl shadow-md overflow-hidden mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="p-10">
                    <h2 class="text-2xl font-bold text-dark mb-4">Our Location</h2>
                    <p class="text-gray-600 mb-6">
                        <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                       Gaza strip 
                    </p>
                    <p class="text-gray-600 mb-6">
                        <i class="fas fa-clock text-primary mr-2"></i>
                        Monday - Friday: 9:00 AM - 6:00 PM
                    </p>
                    {{-- <p class="text-gray-600 mb-6">
                        <i class="fas fa-phone-alt text-primary mr-2"></i>
                        +1 (555) 123-4567
                    </p> --}}
                    {{-- <div class="flex space-x-4">
                        <a href="#" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition">
                            Get Directions
                        </a>
                    </div> --}}
                </div>
                <div class="bg-gray-200 min-h-64 lg:min-h-full">
                    <!-- Map Placeholder -->
                    <div class="h-full flex items-center justify-center text-gray-500">
                        <i class="fas fa-map-marked-alt text-5xl"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="mb-20">
            <h2 class="text-3xl font-bold text-dark text-center mb-12">Frequently Asked Questions</h2>
            <div class="max-w-3xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-6 text-left">
                        <h3 class="text-lg font-medium text-dark">How quickly do you respond to inquiries?</h3>
                        <i class="fas fa-chevron-down text-primary transition-transform"></i>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            We typically respond to all inquiries within 24 hours during business days.
                            For WhatsApp messages, responses are usually immediate during working hours.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-6 text-left">
                        <h3 class="text-lg font-medium text-dark">What are your working hours?</h3>
                        <i class="fas fa-chevron-down text-primary transition-transform"></i>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            Our standard working hours are from 9:00 AM to 6:00 PM, Monday through Friday.
                            We are closed on weekends and public holidays.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-6 text-left">
                        <h3 class="text-lg font-medium text-dark">Which is the best way to contact you?</h3>
                        <i class="fas fa-chevron-down text-primary transition-transform"></i>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            For urgent matters, WhatsApp is the fastest way to reach us.
                            For detailed inquiries, email is preferred. Social media is great for general questions.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">UniHub</h3>
                    <p class="text-gray-400">
                        Connecting you with professional solutions for all your business needs.
                    </p>
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
                    <h4 class="font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Consulting</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Development</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Marketing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Support</a></li>
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
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025R UniConnect. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 bg-primary text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- JavaScript -->
    <script>
        // FAQ Toggle Functionality
        document.querySelectorAll('.faq-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('i');

                content.classList.toggle('hidden');
                icon.classList.toggle('transform');
                icon.classList.toggle('rotate-180');
            });
        });

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
</body>
</html>
