<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['hero_title'] ?? 'Portfolio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            max-width: 100vw;
        }
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            background-attachment: fixed;
            overflow-x: hidden;
            max-width: 100vw;
            position: relative;
        }
        
        /* Prevent Horizontal Scroll */
        * {
            max-width: 100%;
        }
        
        .container-custom {
            overflow-x: hidden;
        }
        
        /* Perfect Spacing System - Ultra Rapih */
        .container-custom {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        @media (min-width: 640px) {
            .container-custom {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }
        @media (min-width: 768px) {
            .container-custom {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        @media (min-width: 1024px) {
            .container-custom {
                padding-left: 2.5rem;
                padding-right: 2.5rem;
            }
        }
        @media (min-width: 1280px) {
            .container-custom {
                padding-left: 3rem;
                padding-right: 3rem;
            }
        }
        
        /* Line Clamp */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Glow Effect - Enhanced */
        .glow-effect {
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
            transition: all 0.3s ease;
        }
        .glow-effect:hover {
            box-shadow: 0 0 40px rgba(139, 92, 246, 0.6), 0 0 60px rgba(139, 92, 246, 0.3);
            transform: translateY(-2px);
        }
        
        /* Card Hover - Smooth */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.2);
        }
        
        /* Gradient Text - Removed (moved to shimmer section) */
        
        /* Gradient Border - Perfect */
        .gradient-border {
            position: relative;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border: 1px solid rgba(139, 92, 246, 0.2);
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
            opacity: 0.5;
        }
        
        /* Float Animation - Enhanced */
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) translateX(0px); 
            }
            25% {
                transform: translateY(-15px) translateX(10px);
            }
            50% { 
                transform: translateY(-25px) translateX(0px); 
            }
            75% {
                transform: translateY(-15px) translateX(-10px);
            }
        }
        .float-animation {
            animation: float 8s ease-in-out infinite;
        }
        
        /* Glow Animation for Elements */
        @keyframes glow-rotate {
            0% {
                box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
                transform: rotate(0deg);
            }
            50% {
                box-shadow: 0 0 40px rgba(6, 182, 212, 0.5);
            }
            100% {
                box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
                transform: rotate(360deg);
            }
        }
        
        /* Profile Image Hover - SUPER KEREN! */
        .profile-image-container {
            position: relative;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }
        .profile-image-container:hover {
            transform: scale(1.05) rotate(2deg);
        }
        .profile-image-container::before {
            content: '';
            position: absolute;
            inset: -8px;
            background: linear-gradient(135deg, #667eea, #764ba2, #667eea);
            background-size: 200% 200%;
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: -1;
            filter: blur(25px);
            animation: gradientShift 3s ease infinite;
        }
        .profile-image-container:hover::before {
            opacity: 0.9;
            animation: gradientShift 3s ease infinite, pulse 2s ease-in-out infinite;
        }
        .profile-image-container::after {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, transparent, rgba(139, 92, 246, 0.3), transparent);
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: -1;
            animation: rotate 4s linear infinite;
        }
        .profile-image-container:hover::after {
            opacity: 1;
        }
        @keyframes pulse {
            0%, 100% { opacity: 0.9; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.05); }
        }
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Skill Icon Hover */
        .skill-icon {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .skill-icon:hover {
            transform: scale(1.15) rotate(8deg);
        }
        
        /* Project Image Zoom */
        .project-image {
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .project-card:hover .project-image {
            transform: scale(1.15);
        }
        
        /* Smooth Fade In */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Text Shimmer Effect */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }
        .gradient-text {
            background: linear-gradient(90deg, #667eea 0%, #06b6d4 50%, #667eea 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s linear infinite;
        }
        
        /* Hero Name Text Animation - Smaller */
        .hero-name-text {
            position: relative;
            display: inline-block;
            text-shadow: 
                0 0 10px rgba(102, 126, 234, 0.3),
                0 0 20px rgba(102, 126, 234, 0.2);
            animation: glow-pulse-text 3s ease-in-out infinite;
        }
        
        @keyframes glow-pulse-text {
            0%, 100% {
                text-shadow: 
                    0 0 10px rgba(102, 126, 234, 0.3),
                    0 0 20px rgba(102, 126, 234, 0.2);
            }
            50% {
                text-shadow: 
                    0 0 15px rgba(102, 126, 234, 0.5),
                    0 0 25px rgba(102, 126, 234, 0.3),
                    0 0 35px rgba(6, 182, 212, 0.2);
            }
        }
        
        /* Profile Image Hero - Floating Animation */
        .profile-image-hero {
            animation: float-gentle 6s ease-in-out infinite;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .profile-image-hero:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
        }
        
        .profile-image-hero img {
            transition: transform 0.7s ease;
        }
        
        .profile-image-hero:hover img {
            transform: scale(1.15);
        }
        
        @keyframes float-gentle {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            25% {
                transform: translateY(-8px) rotate(1deg);
            }
            50% {
                transform: translateY(-12px) rotate(0deg);
            }
            75% {
                transform: translateY(-8px) rotate(-1deg);
            }
        }
        
        /* Subtle Glow Animation */
        @keyframes subtle-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(102, 126, 234, 0.2);
            }
            50% {
                box-shadow: 0 0 30px rgba(6, 182, 212, 0.3);
            }
        }
        
        /* About Image Circular - Smooth Animations */
        .about-image-circular {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            animation: float-gentle 8s ease-in-out infinite;
        }
        
        .about-image-circular:hover {
            transform: scale(1.08) translateY(-10px);
            box-shadow: 
                0 25px 50px rgba(102, 126, 234, 0.4),
                0 0 80px rgba(6, 182, 212, 0.3);
            animation-play-state: paused;
        }
        
        .about-image-circular img {
            transition: transform 0.6s ease;
        }
        
        .about-image-circular:hover img {
            transform: scale(1.12);
        }
        
        /* About Text Container - Matching Style */
        .about-text-container {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .about-text-container:hover {
            transform: translateY(-8px);
        }
        
        /* Clean Container Spacing */
        .container-custom {
            margin-left: auto;
            margin-right: auto;
        }
        
        /* About Section Specific Spacing */
        #about .container-custom {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        @media (min-width: 768px) {
            #about .container-custom {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        
        @media (min-width: 1024px) {
            #about .container-custom {
                padding-left: 3rem;
                padding-right: 3rem;
            }
        }
        
        /* Particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }
        
        /* Slide In Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Bounce In */
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Button Hover Effect */
        .btn-hover {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .btn-hover::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        .btn-hover:hover::before {
            width: 300px;
            height: 300px;
        }
        
        /* Responsive Typography - Improved */
        @media (max-width: 640px) {
            h1 { 
                font-size: 2rem !important; 
                line-height: 1.2 !important;
            }
            h2 { font-size: 1.75rem !important; }
            h3 { font-size: 1.5rem !important; }
            
            .hero-name-text {
                font-size: 2rem !important;
                line-height: 1.2 !important;
            }
            
            #typing-role {
                font-size: 1.5rem !important;
            }
            
            .profile-image-hero {
                width: 120px !important;
                height: 120px !important;
            }
        }
        
        @media (min-width: 641px) and (max-width: 768px) {
            .hero-name-text {
                font-size: 2.5rem !important;
            }
            
            #typing-role {
                font-size: 1.75rem !important;
            }
        }
        
        @media (min-width: 769px) and (max-width: 1024px) {
            .hero-name-text {
                font-size: 3rem !important;
            }
            
            #typing-role {
                font-size: 2rem !important;
            }
        }
        
        /* Fix Horizontal Scroll on All Devices */
        @media (max-width: 1024px) {
            .container-custom {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            
            section {
                overflow-x: hidden !important;
            }
            
            .about-image-circular {
                width: 200px !important;
                height: 200px !important;
            }
        }
        
        /* Mobile Specific */
        @media (max-width: 640px) {
            .about-image-circular {
                width: 180px !important;
                height: 180px !important;
            }
            
            #about .grid {
                gap: 2rem !important;
            }
            
            #about .container-custom {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        }
        
        /* Tablet Specific */
        @media (min-width: 641px) and (max-width: 1023px) {
            .container-custom {
                padding-left: 1.5rem !important;
                padding-right: 1.5rem !important;
            }
            
            .about-image-circular {
                width: 240px !important;
                height: 240px !important;
            }
        }
        
        /* Desktop Fine-tuning */
        @media (min-width: 1024px) {
            #about .grid {
                align-items: center;
            }
        }
        
        /* Perfect Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2, #667eea);
        }
    </style>
</head>
<body class="text-white overflow-x-hidden">
    
    <!-- Navigation - Premium Modern -->
    <nav class="fixed w-full bg-slate-900/70 backdrop-blur-xl z-50 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="#home" class="text-2xl font-bold tracking-tight">
                    <span class="gradient-text">Portfolio</span>
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#home" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all duration-300">Home</a>
                    <a href="#about" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all duration-300">About</a>
                    <a href="#skills" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all duration-300">Skills</a>
                    <a href="#experience" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all duration-300">Experience</a>
                    <a href="#projects" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all duration-300">Projects</a>
                    <a href="#certificates" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all duration-300">Certificates</a>
                    <a href="#contact" class="px-5 py-2.5 ml-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 transition-all duration-300 glow-effect">
                        Contact Me
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-white/5 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-slate-900/95 backdrop-blur-xl border-t border-white/5">
            <div class="px-6 py-6 space-y-2">
                <a href="#home" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Home</a>
                <a href="#about" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">About</a>
                <a href="#skills" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Skills</a>
                <a href="#experience" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Experience</a>
                <a href="#projects" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Projects</a>
                <a href="#certificates" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Certificates</a>
                <a href="#contact" class="block px-4 py-3 rounded-xl text-sm font-semibold bg-gradient-to-r from-violet-600 to-indigo-600 text-center">Contact Me</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section - Centered Design with Particles -->
    <section id="home" class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <!-- Animated Particles Background -->
        <div id="particles-container" class="absolute inset-0 overflow-hidden pointer-events-none"></div>
        
        <!-- Gradient Background Blobs -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-violet-600/10 rounded-full blur-3xl float-animation"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl float-animation" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-cyan-500/5 rounded-full blur-3xl float-animation" style="animation-delay: 4s;"></div>
        </div>

        <div class="container-custom w-full py-12 md:py-16 lg:py-20 relative z-10">
            <!-- Centered Content -->
            <div class="text-center max-w-5xl mx-auto px-4 sm:px-6" data-aos="fade-up">
                <!-- Profile Image - Animated -->
                <div class="mb-8 md:mb-10 flex justify-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48">
                        <!-- Rotating Ring -->
                        <div class="absolute inset-0 rounded-full border-2 border-dashed border-violet-500/30 animate-spin" style="animation-duration: 20s;"></div>
                        
                        <!-- Glow Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-cyan-500 rounded-full blur-xl opacity-30 animate-pulse"></div>
                        
                        <!-- Image Container with Hover -->
                        <div class="profile-image-hero relative w-full h-full rounded-full overflow-hidden border-4 border-white/10 shadow-2xl cursor-pointer">
                            @if($settings['profile_image'])
                                <img src="{{ Storage::url($settings['profile_image']) }}" alt="Profile" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-violet-600 to-cyan-500 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/50" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Orbiting Dots -->
                        <div class="absolute top-0 left-1/2 w-3 h-3 bg-violet-500 rounded-full animate-ping"></div>
                        <div class="absolute bottom-0 right-1/2 w-2 h-2 bg-cyan-500 rounded-full animate-ping" style="animation-delay: 1s;"></div>
                    </div>
                </div>

                <!-- Main Name - Moderate Size -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-4 md:mb-6 leading-tight" data-aos="fade-up" data-aos-delay="300">
                    <span class="block text-white hero-name-text">
                      {{ $settings['hero_title'] ?? 'Abdurrohman' }}
                    </span>
                </h1>
                
                <!-- Subtitle with Typing Animation -->
                <div class="mb-8 md:mb-10" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-lg sm:text-xl md:text-2xl text-gray-300 font-light mb-3">
                        Saya Seorang
                    </p>
                    <div class="min-h-[2.5rem] md:min-h-[3rem]">
                        <p class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold gradient-text" id="typing-role">
                            Full Stack Developer
                        </p>
                    </div>
                </div>
                
                <!-- Description -->
                <p class="text-sm sm:text-base md:text-lg text-gray-400 leading-relaxed max-w-2xl mx-auto mb-8 md:mb-10" data-aos="fade-up" data-aos-delay="500">
                    {{ $settings['hero_subtitle'] ?? 'Kreator digital yang mengubah ide menjadi karya inovatif dengan teknologi mutakhir dan kreativitas tanpa batas.' }}
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center" data-aos="fade-up" data-aos-delay="600">
                    <a href="#projects" class="group w-full sm:w-auto px-6 md:px-8 py-3 md:py-4 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold text-sm md:text-base hover:from-violet-500 hover:to-indigo-500 transition-all duration-300 glow-effect flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>LIHAT KARYA</span>
                    </a>
                    <a href="#contact" class="group w-full sm:w-auto px-6 md:px-8 py-3 md:py-4 rounded-xl font-semibold text-sm md:text-base border-2 border-cyan-500/50 hover:border-cyan-400 hover:bg-cyan-500/10 transition-all duration-300 backdrop-blur-sm flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>HUBUNGI SAYA</span>
                    </a>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 md:bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
                <div class="flex flex-col items-center gap-2">
                    <span class="text-gray-400 text-xs md:text-sm font-medium">Scroll Down</span>
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section - Clean Layout with Circular Image -->
    @if($settings['about_description'])
    <section id="about" class="py-16 md:py-20 lg:py-24 relative overflow-hidden">
        <div class="container-custom max-w-6xl">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">
                    About Me
                </span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
                    <span class="gradient-text">About Me</span>
                </h2>
            </div>

            <!-- Content with Circular Image -->
            <div class="grid lg:grid-cols-5 gap-8 md:gap-10 lg:gap-12 items-center">
                <!-- Left Side - Circular Profile Image -->
                <div class="lg:col-span-2 flex justify-center lg:justify-start" data-aos="fade-right">
                    <div class="relative">
                        <!-- Glow Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600/30 to-cyan-500/30 rounded-full blur-2xl animate-pulse"></div>
                        
                        <!-- Circular Image Container -->
                        <div class="about-image-circular relative w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full overflow-hidden border-4 border-white/10 shadow-2xl">
                            @if($settings['profile_image'])
                                <img src="{{ Storage::url($settings['profile_image']) }}" alt="About Me" class="w-full h-full object-cover transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-violet-600 to-cyan-500 flex items-center justify-center">
                                    <svg class="w-24 h-24 md:w-32 md:h-32 text-white/50" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-violet-600/20 via-transparent to-cyan-500/20 opacity-0 hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <!-- Decorative Ring -->
                        <div class="absolute inset-0 rounded-full border-2 border-dashed border-violet-500/20 animate-spin" style="animation-duration: 30s;"></div>
                    </div>
                </div>

                <!-- Right Side - Text Content -->
                <div class="lg:col-span-3" data-aos="fade-left">
                    <div class="about-text-container gradient-border rounded-3xl p-6 md:p-8 lg:p-10 backdrop-blur-sm card-hover">
                        <div class="space-y-4 md:space-y-6">
                            <div class="text-gray-300 leading-relaxed text-base md:text-lg">
                                @if($settings['about_description'])
                                    {!! $settings['about_description'] !!}
                                @else
                                    <p class="mb-4">
                                        I'm a passionate Full Stack Developer with expertise in building modern web applications. 
                                        I love creating clean, efficient, and user-friendly solutions.
                                    </p>
                                    <p class="mb-4">
                                        With experience in Laravel, React, Vue.js, and mobile development with Flutter, 
                                        I bring ideas to life through code and creativity.
                                    </p>
                                    <p>
                                        When I'm not coding, you can find me exploring new technologies, 
                                        contributing to open source projects, or sharing knowledge with the developer community.
                                    </p>
                                @endif
                            </div>
                            
                            <!-- Skills Tags -->
                            <div class="flex flex-wrap gap-2 mt-6">
                                <span class="px-3 py-1 bg-violet-600/20 text-violet-300 rounded-full text-sm border border-violet-500/30">Laravel</span>
                                <span class="px-3 py-1 bg-indigo-600/20 text-indigo-300 rounded-full text-sm border border-indigo-500/30">Flutter</span>
                                <span class="px-3 py-1 bg-purple-600/20 text-purple-300 rounded-full text-sm border border-purple-500/30">UI/UX</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    <!-- Skills Section - Premium Modern -->
    @if($skills->count() > 0)
    <section id="skills" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">
                    My Skills
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Skills & Expertise</span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Technologies and tools I use to bring ideas to life
                </p>
            </div>
            
            @php
                $groupedSkills = $skills->groupBy('category');
            @endphp
            
            @foreach($groupedSkills as $category => $categorySkills)
            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
                @if($category)
                <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                    <span class="w-2 h-8 bg-gradient-to-b from-violet-600 to-indigo-600 rounded-full"></span>
                    <span class="gradient-text">{{ $category }}</span>
                </h3>
                @endif
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                    @foreach($categorySkills as $skill)
                    <div class="group gradient-border rounded-2xl p-5 md:p-6 lg:p-7 backdrop-blur-sm card-hover cursor-pointer">
                        <div class="flex flex-col items-center text-center">
                            @if($skill->icon)
                            <div class="w-16 h-16 mb-4 rounded-2xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 flex items-center justify-center skill-icon">
                                <img src="{{ Storage::url($skill->icon) }}" alt="{{ $skill->name }}" class="w-10 h-10 object-contain">
                            </div>
                            @else
                            <div class="w-16 h-16 mb-4 rounded-2xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 flex items-center justify-center skill-icon">
                                <svg class="w-8 h-8 text-violet-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 7H7v6h6V7z"></path>
                                    <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            @endif
                            <h4 class="font-semibold text-white mb-2 group-hover:text-violet-400 transition-colors">{{ $skill->name }}</h4>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $skill->level === 'Expert' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : '' }}
                                {{ $skill->level === 'Intermediate' ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : '' }}
                                {{ $skill->level === 'Beginner' ? 'bg-amber-500/20 text-amber-400 border border-amber-500/30' : '' }}
                            ">
                                {{ $skill->level }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Experience Section - Premium Modern Timeline -->
    @if($experiences->count() > 0)
    <section id="experience" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom max-w-5xl">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">
                    Career Journey
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Experience</span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    My journey and achievements
                </p>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-gradient-to-b from-violet-600 to-indigo-600"></div>

                @foreach($experiences as $index => $experience)
                <div class="relative mb-12 last:mb-0" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="md:flex items-center {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                        <!-- Content Card -->
                        <div class="md:w-5/12 {{ $index % 2 === 0 ? 'md:pr-12' : 'md:pl-12' }}">
                            <div class="gradient-border rounded-2xl p-5 md:p-6 lg:p-7 backdrop-blur-sm card-hover group">
                                <div class="flex items-start gap-4 mb-4">
                                    @if($experience->image)
                                    <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 border-2 border-white/10">
                                        <img src="{{ Storage::url($experience->image) }}" alt="{{ $experience->title }}" class="w-full h-full object-cover">
                                    </div>
                                    @endif
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold text-white group-hover:text-violet-400 transition-colors mb-1">
                                            {{ $experience->title }}
                                        </h3>
                                        <p class="text-violet-400 font-semibold text-sm">{{ $experience->position }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-2 mb-4">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-gray-400 text-sm">
                                        {{ $experience->start_year }} - {{ $experience->is_current ? 'Present' : $experience->end_year }}
                                    </span>
                                    @if($experience->is_current)
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-medium border border-emerald-500/30">
                                        Current
                                    </span>
                                    @endif
                                </div>
                                
                                <p class="text-gray-300 leading-relaxed">{{ $experience->description }}</p>
                            </div>
                        </div>

                        <!-- Timeline Dot -->
                        <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full bg-gradient-to-r from-violet-600 to-indigo-600 border-4 border-slate-900 z-10"></div>

                        <!-- Spacer -->
                        <div class="hidden md:block md:w-5/12"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Projects Section - Premium Modern -->
    @if($projects->count() > 0)
    <section id="projects" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">
                    Portfolio
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Featured Projects</span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Showcasing my Project and creative solutions
                </p>
            </div>

            <!-- Projects Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
                @foreach($projects as $index => $project)
                <div class="project-card group gradient-border rounded-3xl overflow-hidden backdrop-blur-sm card-hover" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <!-- Project Image -->
                    <div class="relative h-56 overflow-hidden bg-slate-800">
                        <img src="{{ Storage::url($project->main_image) }}" alt="{{ $project->name }}" class="project-image w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent opacity-60"></div>
                        
                        @if($project->is_featured)
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full bg-violet-600 text-white text-xs font-semibold flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                Featured
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Project Content -->
                    <div class="p-5 md:p-6 lg:p-7">
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-violet-400 transition-colors">
                            {{ $project->name }}
                        </h3>
                        
                        <p class="text-gray-400 text-sm mb-4 line-clamp-3 leading-relaxed">
                            {!! Str::limit(strip_tags($project->description), 120) !!}
                        </p>
                        
                        @if($project->technologies)
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach(array_slice($project->technologies, 0, 3) as $tech)
                            <span class="px-3 py-1 rounded-lg bg-violet-600/20 text-violet-300 text-xs font-medium border border-violet-500/30">
                                {{ $tech }}
                            </span>
                            @endforeach
                            @if(count($project->technologies) > 3)
                            <span class="px-3 py-1 rounded-lg bg-slate-700/50 text-gray-400 text-xs font-medium">
                                +{{ count($project->technologies) - 3 }}
                            </span>
                            @endif
                        </div>
                        @endif
                        
                        <div class="flex gap-3">
                            @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank" class="flex-1 text-center px-4 py-2.5 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-sm flex items-center justify-center gap-2 glow-effect">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Demo
                            </a>
                            @endif
                            @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" class="flex-1 text-center px-4 py-2.5 rounded-xl font-semibold border border-white/10 hover:border-violet-500/50 hover:bg-white/5 transition-all text-sm flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                </svg>
                                Code
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif


    <!-- Certificates Section - Premium Modern -->
    @if($certificates->count() > 0)
    <section id="certificates" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">
                    Achievements
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Certificates & Awards</span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
Certificates and Achievements                 </p>
            </div>

            <!-- Certificates Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
                @foreach($certificates as $index => $certificate)
                <div class="group gradient-border rounded-3xl overflow-hidden backdrop-blur-sm card-hover" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <!-- Certificate Image -->
                    <div class="relative h-48 overflow-hidden bg-slate-800">
                        <img src="{{ Storage::url($certificate->image) }}" alt="{{ $certificate->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent opacity-60"></div>
                    </div>

                    <!-- Certificate Content -->
                    <div class="p-5 md:p-6 lg:p-7">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-lg font-bold text-white group-hover:text-violet-400 transition-colors flex-1">
                                {{ $certificate->name }}
                            </h3>
                            <svg class="w-6 h-6 text-violet-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        
                        <p class="text-violet-400 font-semibold text-sm mb-2">{{ $certificate->issuer }}</p>
                        
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-400 text-sm">{{ $certificate->year }}</span>
                        </div>
                        
                        @if($certificate->verification_link)
                        <a href="{{ $certificate->verification_link }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-sm glow-effect">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Verify
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Download CV Section - Premium Modern -->
    @if($settings['cv_file'])
    <section class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom max-w-4xl" data-aos="fade-up">
            <div class="gradient-border rounded-3xl p-12 backdrop-blur-sm text-center relative overflow-hidden">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-violet-600/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 flex items-center justify-center">
                        <svg class="w-10 h-10 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4">
                        <span class="gradient-text">Download My Resume</span>
                    </h3>
                    <p class="text-gray-400 mb-8 max-w-xl mx-auto">
                        Get a detailed overview of my experience, skills, and achievements
                    </p>
                    <a href="{{ route('cv.download') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-2xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all glow-effect">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Download CV</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Contact Section - Premium Modern -->
    <section id="contact" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom max-w-5xl">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">
                    Contact
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Let's Work Together</span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Have a project in mind? Let's discuss how we can work together
                </p>
            </div>

            <div class="grid lg:grid-cols-5 gap-8">
                <!-- Contact Info -->
                <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                    <div class="gradient-border rounded-2xl p-6 backdrop-blur-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Email</h4>
                                <p class="text-gray-400 text-sm">abdurrahmanjkt2@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="gradient-border rounded-2xl p-6 backdrop-blur-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Location</h4>
                                <p class="text-gray-400 text-sm">Bogor, West Java</p>
                            </div>
                        </div>
                    </div>

                    <div class="gradient-border rounded-2xl p-6 backdrop-blur-sm">
                        <h4 class="font-semibold text-white mb-4">Follow Me</h4>
                        <div class="flex gap-3">
                            <a href="https://github.com/maman2008" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </a>
                            <a href="https://www.linkedin.com/in/abdurrohman-46494031b/" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-3" data-aos="fade-left">
                    @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="gradient-border rounded-3xl p-6 md:p-8 lg:p-10 backdrop-blur-sm space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Name</label>
                            <input type="text" name="name" required value="{{ old('name') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:border-violet-500 focus:bg-white/10 focus:outline-none transition-all text-white placeholder-gray-500" placeholder="John Doe">
                            @error('name')
                            <p class="text-red-400 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Email</label>
                            <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:border-violet-500 focus:bg-white/10 focus:outline-none transition-all text-white placeholder-gray-500" placeholder="john@example.com">
                            @error('email')
                            <p class="text-red-400 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Message</label>
                            <textarea name="message" required rows="6" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:border-violet-500 focus:bg-white/10 focus:outline-none transition-all text-white placeholder-gray-500 resize-none" placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                            @error('message')
                            <p class="text-red-400 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                        <button type="submit" class="w-full px-8 py-4 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-2xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all glow-effect flex items-center justify-center gap-2 group">
                            <span>Send Message</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer - Premium Modern -->
    <footer class="relative py-12 md:py-16 border-t border-white/5">
        <div class="container-custom">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <!-- Brand -->
                <div>
                    <h3 class="text-2xl font-bold gradient-text mb-4">Portfolio</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Building digital experiences with passion and precision.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold text-white mb-4">Quick Links</h4>
                    <div class="space-y-2">
                        <a href="#home" class="block text-gray-400 hover:text-violet-400 transition-colors text-sm">Home</a>
                        <a href="#about" class="block text-gray-400 hover:text-violet-400 transition-colors text-sm">About</a>
                        <a href="#projects" class="block text-gray-400 hover:text-violet-400 transition-colors text-sm">Projects</a>
                        <a href="#contact" class="block text-gray-400 hover:text-violet-400 transition-colors text-sm">Contact</a>
                    </div>
                </div>

                <!-- Social -->
                <div>
                    <h4 class="font-semibold text-white mb-4">Connect</h4>
                    <div class="flex gap-3">
                        <a href="https://github.com/maman2008" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-violet-400 transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/in/abdurrohman-46494031b/" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-violet-400 transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-violet-400 transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/abdurr949_/" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-violet-400 transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} Portfolio. All rights reserved.
                </p>
                <p class="text-gray-400 text-sm">
                    Built with <span class="text-red-400">❤</span> using Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking a link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // ============================================
        // TYPING ANIMATION - KEREN & SMOOTH
        // ============================================
        
        class TypeWriter {
            constructor(element, words, wait = 3000) {
                this.element = element;
                this.words = words;
                this.text = '';
                this.wordIndex = 0;
                this.wait = parseInt(wait, 10);
                this.isDeleting = false;
                this.type();
            }

            type() {
                const current = this.wordIndex % this.words.length;
                const fullText = this.words[current];

                if (this.isDeleting) {
                    this.text = fullText.substring(0, this.text.length - 1);
                } else {
                    this.text = fullText.substring(0, this.text.length + 1);
                }

                this.element.innerHTML = `<span class="typing-text">${this.text}</span><span class="typing-cursor">|</span>`;

                let typeSpeed = this.isDeleting ? 50 : 100;

                if (!this.isDeleting && this.text === fullText) {
                    typeSpeed = this.wait;
                    this.isDeleting = true;
                } else if (this.isDeleting && this.text === '') {
                    this.isDeleting = false;
                    this.wordIndex++;
                    typeSpeed = 500;
                }

                setTimeout(() => this.type(), typeSpeed);
            }
        }

        // Typing Animation untuk Role - 3 Roles Only
        document.addEventListener('DOMContentLoaded', () => {
            const roleElement = document.getElementById('typing-role');
            if (roleElement) {
                const roles = [
                    'Full Stack Developer',
                    'UI/UX Designer',
                    'Mobile Developer'
                ];
                new TypeWriter(roleElement, roles, 2500);
            }
        });

        // ============================================
        // PROFILE IMAGE PARALLAX EFFECT
        // ============================================
        
        const profileContainer = document.querySelector('.profile-image-container');
        if (profileContainer) {
            profileContainer.addEventListener('mousemove', (e) => {
                const rect = profileContainer.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                
                profileContainer.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
            });

            profileContainer.addEventListener('mouseleave', () => {
                profileContainer.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
            });
        }

        // ============================================
        // SMOOTH SCROLL WITH OFFSET
        // ============================================
        
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offset = 80;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // ============================================
        // NAVBAR BACKGROUND ON SCROLL
        // ============================================
        
        const navbar = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-slate-900/90');
                navbar.classList.remove('bg-slate-900/70');
            } else {
                navbar.classList.add('bg-slate-900/70');
                navbar.classList.remove('bg-slate-900/90');
            }
        });

        // ============================================
        // CURSOR TRAIL EFFECT (Optional - Keren!)
        // ============================================
        
        const createCursorTrail = () => {
            const trail = document.createElement('div');
            trail.className = 'cursor-trail';
            trail.style.cssText = `
                position: fixed;
                width: 8px;
                height: 8px;
                background: linear-gradient(135deg, #667eea, #764ba2);
                border-radius: 50%;
                pointer-events: none;
                z-index: 9999;
                opacity: 0.6;
                transition: opacity 0.3s ease;
            `;
            document.body.appendChild(trail);

            let mouseX = 0, mouseY = 0;
            let trailX = 0, trailY = 0;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });

            function animate() {
                trailX += (mouseX - trailX) * 0.1;
                trailY += (mouseY - trailY) * 0.1;
                
                trail.style.left = trailX + 'px';
                trail.style.top = trailY + 'px';
                
                requestAnimationFrame(animate);
            }
            
            animate();
        };

        // Uncomment untuk mengaktifkan cursor trail
        // createCursorTrail();

        // ============================================
        // PARTICLE BACKGROUND - ACTIVE
        // ============================================
        
        const createParticles = () => {
            const container = document.getElementById('particles-container');
            if (!container) return;

            // Create 50 particles
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                const size = Math.random() * 4 + 1;
                const colors = [
                    'rgba(102, 126, 234, 0.6)',
                    'rgba(6, 182, 212, 0.6)',
                    'rgba(139, 92, 246, 0.6)',
                    'rgba(118, 75, 162, 0.6)'
                ];
                const color = colors[Math.floor(Math.random() * colors.length)];
                
                particle.style.cssText = `
                    width: ${size}px;
                    height: ${size}px;
                    background: ${color};
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                    animation: float ${Math.random() * 10 + 10}s ease-in-out infinite;
                    animation-delay: ${Math.random() * 5}s;
                    box-shadow: 0 0 ${size * 2}px ${color};
                `;
                container.appendChild(particle);
            }

            // Create connecting lines
            setInterval(() => {
                const particles = container.querySelectorAll('.particle');
                particles.forEach((p1, i) => {
                    particles.forEach((p2, j) => {
                        if (i < j) {
                            const rect1 = p1.getBoundingClientRect();
                            const rect2 = p2.getBoundingClientRect();
                            const distance = Math.hypot(
                                rect1.left - rect2.left,
                                rect1.top - rect2.top
                            );
                            
                            if (distance < 150) {
                                // Draw line logic here if needed
                            }
                        }
                    });
                });
            }, 100);
        };

        // Activate particles
        createParticles();

        // ============================================
        // SCROLL REVEAL COUNTER ANIMATION
        // ============================================
        
        const animateCounter = (element, target, duration = 2000) => {
            let start = 0;
            const increment = target / (duration / 16);
            
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start);
                }
            }, 16);
        };

        // Observer untuk trigger animasi saat element terlihat
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe semua card elements
        document.querySelectorAll('.card-hover').forEach(card => {
            observer.observe(card);
        });

        // ============================================
        // CONSOLE MESSAGE (Fun Easter Egg!)
        // ============================================
        
        console.log('%c👋 Hello Developer!', 'color: #667eea; font-size: 24px; font-weight: bold;');
        console.log('%cLooking for something? Feel free to reach out!', 'color: #764ba2; font-size: 14px;');
        console.log('%c💼 Portfolio built with Laravel & Tailwind CSS', 'color: #8b5cf6; font-size: 12px;');
    </script>

    <style>
        /* Typing Cursor Animation */
        .typing-cursor {
            animation: blink 0.7s infinite;
            color: #8b5cf6;
            font-weight: 300;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        /* Smooth Transitions */
        .profile-image-container {
            transition: transform 0.3s ease-out;
        }

        /* Card Animation */
        .card-hover {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        /* Enhanced Glow on Hover */
        .glow-effect {
            position: relative;
            overflow: hidden;
        }

        .glow-effect::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .glow-effect:hover::after {
            width: 300px;
            height: 300px;
        }
    </style>
</body>
</html>
