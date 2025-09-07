<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnonPost - Share Your Thoughts Anonymously</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="h-32 w-full overflow-hidden absolute -z-10">
            <img src="http://static.photos/face/1200x630/15" alt="Banner" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="backdrop-blur-sm bg-white/30">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-2">
                        <img src="http://static.photos/minimal/200x200/5" alt="Logo" class="h-8 w-8 rounded-full">
                        <div class="text-blue-500 font-bold text-2xl">AnonPost</div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="index.html" class="text-gray-600 hover:text-blue-500">Sign In</a>
                    <a href="index.html" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient py-20">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Share Your Thoughts <span class="text-blue-500">Anonymously</span></h1>
                    <p class="text-lg text-gray-600 mb-8">Express yourself freely without revealing your identity. Connect with others who understand.</p>
                    <div class="flex space-x-4">
                        <a href="/Main" class="bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600 transition">Start Posting</a>
                        <a href="#features" class="border border-blue-500 text-blue-500 px-6 py-3 rounded-full hover:bg-blue-50 transition">Learn More</a>
                    </div>
                </div>
                <div class="md:w-1/2" data-aos="fade-left">
                    <img src="http://static.photos/minimal/640x360/1" alt="Anonymous posting" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-16">Why Choose AnonPost</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md feature-card transition" data-aos="fade-up">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i data-feather="shield" class="text-blue-500 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Complete Anonymity</h3>
                    <p class="text-gray-600">Your identity is protected. Share your deepest thoughts without fear of judgment.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md feature-card transition" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <i data-feather="users" class="text-purple-500 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Supportive Community</h3>
                    <p class="text-gray-600">Connect with others who understand what you're going through.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md feature-card transition" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <i data-feather="message-square" class="text-green-500 w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Express Freely</h3>
                    <p class="text-gray-600">No filters, no restrictions. Say what you really feel.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Ready to Share Your Thoughts?</h2>
            <p class="text-xl text-gray-600 mb-8">Join thousands of others who are expressing themselves freely.</p>
            <a href="index.html" class="bg-blue-500 text-white px-8 py-4 rounded-full text-lg hover:bg-blue-600 transition inline-block">Get Started for Free</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-10 border-t">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-blue-500 font-bold text-2xl mb-4 md:mb-0">AnonPost</div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-600 hover:text-blue-500">Privacy</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500">Terms</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500">Contact</a>
                </div>
            </div>
            <div class="mt-8 text-center text-gray-500 text-sm">
                © 2023 AnonPost. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        AOS.init();
        feather.replace();
    </script>
</body>
</html>