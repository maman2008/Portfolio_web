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
        ::-webkit-scrollbar { display: none !important; width: 0 !important; }
        * { -ms-overflow-style: none !important; scrollbar-width: none !important; }

        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            background-attachment: fixed;
            overflow-x: hidden;
            max-width: 100vw;
            position: relative;
        }
        * { max-width: 100%; }

        .container-custom {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
            overflow-x: hidden;
        }
        @media (min-width: 640px) { .container-custom { padding-left: 1.5rem; padding-right: 1.5rem; } }
        @media (min-width: 768px) { .container-custom { padding-left: 2rem; padding-right: 2rem; } }
        @media (min-width: 1024px) { .container-custom { padding-left: 2.5rem; padding-right: 2.5rem; } }
        @media (min-width: 1280px) { .container-custom { padding-left: 3rem; padding-right: 3rem; } }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .glow-effect {
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
            transition: all 0.3s ease;
        }
        .glow-effect:hover {
            box-shadow: 0 0 40px rgba(139, 92, 246, 0.6), 0 0 60px rgba(139, 92, 246, 0.3);
            transform: translateY(-2px);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.2);
        }

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

        @keyframes float {
            0%, 100% { transform: translateY(0px) translateX(0px); }
            25% { transform: translateY(-15px) translateX(10px); }
            50% { transform: translateY(-25px) translateX(0px); }
            75% { transform: translateY(-15px) translateX(-10px); }
        }
        .float-animation { animation: float 8s ease-in-out infinite; }

        .skill-icon { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .skill-icon:hover { transform: scale(1.15) rotate(8deg); }

        .project-image { transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
        .project-card:hover .project-image { transform: scale(1.15); }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up { animation: fadeInUp 0.6s ease-out; }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        .gradient-text {
            background: linear-gradient(90deg, #667eea 0%, #06b6d4 50%, #667eea 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s linear infinite;
        }

        .hero-name-text {
            position: relative;
            display: inline-block;
            text-shadow:
                0 0 40px rgba(102, 126, 234, 0.25),
                0 0 80px rgba(102, 126, 234, 0.1);
            animation: glow-pulse-text 4s ease-in-out infinite;
        }
        @keyframes glow-pulse-text {
            0%, 100% {
                text-shadow:
                    0 0 40px rgba(102, 126, 234, 0.25),
                    0 0 80px rgba(102, 126, 234, 0.1);
            }
            50% {
                text-shadow:
                    0 0 50px rgba(102, 126, 234, 0.35),
                    0 0 100px rgba(102, 126, 234, 0.15),
                    0 0 140px rgba(6, 182, 212, 0.08);
            }
        }

        @keyframes float-gentle {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-8px) rotate(1deg); }
            50% { transform: translateY(-12px) rotate(0deg); }
            75% { transform: translateY(-8px) rotate(-1deg); }
        }

        /* ============================================================
           ABOUT IMAGE — PREMIUM REDESIGN
        ============================================================ */
        .about-image-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Outer spinning ring */
        .about-ring-outer {
            position: absolute;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            border: 2px dashed rgba(102, 126, 234, 0.25);
            animation: spin-slow 25s linear infinite;
        }
        @media (min-width: 768px) { .about-ring-outer { width: 400px; height: 400px; } }
        @media (min-width: 1024px) { .about-ring-outer { width: 460px; height: 460px; } }

        /* Middle pulsing ring */
        .about-ring-mid {
            position: absolute;
            width: 305px;
            height: 305px;
            border-radius: 50%;
            border: 1.5px solid rgba(6, 182, 212, 0.15);
            animation: spin-slow 18s linear infinite reverse;
        }
        @media (min-width: 768px) { .about-ring-mid { width: 355px; height: 355px; } }
        @media (min-width: 1024px) { .about-ring-mid { width: 410px; height: 410px; } }

        @keyframes spin-slow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

        /* Orbit dot on outer ring */
        .about-ring-outer::after {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #06b6d4);
            box-shadow: 0 0 12px rgba(102, 126, 234, 0.8);
        }

        /* Glow backdrop */
        .about-glow-bg {
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.25) 0%, rgba(6, 182, 212, 0.12) 50%, transparent 70%);
            filter: blur(20px);
            animation: pulse-glow 4s ease-in-out infinite;
        }
        @media (min-width: 768px) { .about-glow-bg { width: 300px; height: 300px; } }
        @media (min-width: 1024px) { .about-glow-bg { width: 340px; height: 340px; } }
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.08); }
        }

        /* The actual circular image */
        .about-image-circular {
            position: relative;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid transparent;
            background: linear-gradient(135deg, #0f172a, #0f172a) padding-box,
                        linear-gradient(135deg, #667eea, #06b6d4, #764ba2) border-box;
            box-shadow:
                0 0 0 6px rgba(102, 126, 234, 0.1),
                0 20px 60px rgba(102, 126, 234, 0.3),
                0 0 80px rgba(6, 182, 212, 0.15);
            animation: float-gentle 8s ease-in-out infinite;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2;
        }
        @media (min-width: 768px) { .about-image-circular { width: 280px; height: 280px; } }
        @media (min-width: 1024px) { .about-image-circular { width: 320px; height: 320px; } }

        .about-image-circular:hover {
            transform: scale(1.06) translateY(-8px);
            box-shadow:
                0 0 0 8px rgba(102, 126, 234, 0.15),
                0 30px 80px rgba(102, 126, 234, 0.5),
                0 0 100px rgba(6, 182, 212, 0.25);
            animation-play-state: paused;
        }
        .about-image-circular img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .about-image-circular:hover img { transform: scale(1.08); }

        /* Overlay shimmer on hover */
        .about-image-circular::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, transparent 50%, rgba(6, 182, 212, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .about-image-circular:hover::after { opacity: 1; }

        /* No-image placeholder */
        .about-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(102,126,234,0.3), rgba(6,182,212,0.2));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Small badge pinned to the image */
        .about-badge {
            position: absolute;
            bottom: 16px;
            right: -8px;
            z-index: 3;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: 2px solid rgba(255,255,255,0.15);
            border-radius: 14px;
            padding: 8px 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.7rem;
            font-weight: 600;
            color: white;
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.5);
            white-space: nowrap;
        }
        .about-badge .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #4ade80;
            box-shadow: 0 0 8px #4ade80;
            animation: blink-dot 1.5s ease-in-out infinite;
        }
        @keyframes blink-dot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        /* About text container */
        .about-text-container {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .about-text-container:hover { transform: translateY(-8px); }

        /* Particle */
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

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
        .btn-hover:hover::before { width: 300px; height: 300px; }

        /* ============================================================
           RESPONSIVE FIXES
        ============================================================ */
        @media (max-width: 640px) {
            h2 { font-size: 1.75rem !important; }
            h3 { font-size: 1.5rem !important; }
            .about-image-circular { width: 200px !important; height: 200px !important; }
            .about-ring-outer { width: 250px !important; height: 250px !important; }
            .about-ring-mid { width: 220px !important; height: 220px !important; }
            .about-glow-bg { width: 210px !important; height: 210px !important; }
        }
        @media (max-width: 1024px) {
            .container-custom { padding-left: 1rem !important; padding-right: 1rem !important; }
            section { overflow-x: hidden !important; }
        }
        @media (min-width: 641px) and (max-width: 1023px) {
            .container-custom { padding-left: 1.5rem !important; padding-right: 1.5rem !important; }
        }
        @media (min-width: 1024px) { #about .grid { align-items: center; } }
    </style>
</head>
<body class="text-white overflow-x-hidden">

    <!-- Navigation — Clean & Proportional -->
    <nav class="fixed w-full z-50 border-b border-white/5" style="background: rgba(15,23,42,0.75); backdrop-filter: blur(20px);">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="#home" class="flex items-center gap-2">
                    <span class="text-xl font-bold tracking-tight gradient-text">Portfolio</span>
                </a>
                <!-- Desktop Links -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="#home" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-200">Home</a>
                    <a href="#about" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-200">About</a>
                    <a href="#skills" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-200">Skills</a>
                    <a href="#experience" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-200">Experience</a>
                    <a href="#projects" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-200">Projects</a>
                    <a href="#certificates" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-200">Certificates</a>
                    <div class="w-px h-5 bg-white/10 mx-2"></div>
                    <a href="#contact" class="px-5 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 transition-all duration-300 text-white" style="box-shadow: 0 0 16px rgba(139,92,246,0.35);">Contact Me</a>
                </div>
                <!-- Mobile Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-white/5 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-white/5" style="background: rgba(15,23,42,0.97); backdrop-filter: blur(20px);">
            <div class="px-6 py-4 space-y-1">
                <a href="#home" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
                <a href="#about" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">About</a>
                <a href="#skills" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Skills</a>
                <a href="#experience" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Experience</a>
                <a href="#projects" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Projects</a>
                <a href="#certificates" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Certificates</a>
                <div class="pt-2">
                    <a href="#contact" class="block px-4 py-2.5 rounded-xl text-sm font-semibold bg-gradient-to-r from-violet-600 to-indigo-600 text-center text-white">Contact Me</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section — Clean & Premium -->
    <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden" style="padding-top: 64px;">
        <div id="particles-container" class="absolute inset-0 overflow-hidden pointer-events-none"></div>

        <!-- Soft background blobs — more subtle -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/5 w-80 h-80 bg-violet-600/8 rounded-full blur-3xl float-animation"></div>
            <div class="absolute bottom-1/4 right-1/5 w-80 h-80 bg-indigo-600/8 rounded-full blur-3xl float-animation" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-cyan-500/4 rounded-full blur-3xl float-animation" style="animation-delay: 4s;"></div>
        </div>

        <div class="relative z-10 w-full max-w-4xl mx-auto px-6 sm:px-8 text-center">

            <!-- Step 1 — Status badges -->
            <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-down" data-aos-delay="100">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-medium tracking-widest uppercase border border-white/10 bg-white/5 text-violet-400" style="letter-spacing: 0.12em;">
                    <span class="w-1.5 h-1.5 rounded-full bg-violet-500 animate-pulse"></span>
                    Welcome to my portfolio
                </span>
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-medium tracking-widest uppercase border border-emerald-500/25 bg-emerald-500/8 text-emerald-400" style="letter-spacing: 0.12em;">
                    <span class="relative flex h-1.5 w-1.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                    </span>
                    Available for hire
                </span>
            </div>

            <!-- Step 2 — Greeting (small, elegant) -->
           

            <!-- Step 3 — Big Name (elegant, not overwhelming) -->
            <h1 class="font-bold text-white mb-5 tracking-tight hero-name-text" 
                style="font-size: clamp(2.8rem, 6.5vw, 5rem); line-height: 1.05; letter-spacing: -0.02em;"
                data-aos="fade-up" data-aos-delay="200">
                {{ $settings['hero_title'] ?? 'Abdurrohman' }}
            </h1>

            <!-- Step 4 — Role subtitle -->
            <div class="mb-6" data-aos="fade-up" data-aos-delay="300">
                <p class="font-light text-gray-300" style="font-size: clamp(1rem, 2vw, 1.25rem); letter-spacing: 0.01em;">
                    Saya Seorang&nbsp;
                    <span class="font-semibold gradient-text" id="typing-role">Full Stack Developer</span>
                </p>
            </div>

            <!-- Thin divider -->
            <div class="flex justify-center mb-6" data-aos="fade-up" data-aos-delay="340">
                <div class="h-px w-16 bg-gradient-to-r from-transparent via-violet-500/60 to-transparent"></div>
            </div>

            <!-- Step 5 — Description -->
            <p class="text-gray-400 leading-relaxed mx-auto mb-10 max-w-xl"
               style="font-size: clamp(0.875rem, 1.2vw, 1rem); line-height: 1.75;"
               data-aos="fade-up" data-aos-delay="380">
                {{ $settings['hero_subtitle'] ?? 'Kreator digital yang mengubah ide menjadi karya inovatif dengan teknologi mutakhir dan kreativitas tanpa batas.' }}
            </p>

            <!-- Step 6 — CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 justify-center items-center" data-aos="fade-up" data-aos-delay="440">
                <!-- Primary -->
                <a href="#projects"
                   class="inline-flex items-center justify-center gap-2 px-7 py-3 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 transition-all duration-300"
                   style="min-width: 160px; box-shadow: 0 4px 20px rgba(139,92,246,0.35); letter-spacing: 0.04em;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Lihat Karya
                </a>
                <!-- Secondary -->
                <a href="#contact"
                   class="inline-flex items-center justify-center gap-2 px-7 py-3 rounded-xl font-semibold text-sm text-cyan-300 transition-all duration-300 hover:bg-cyan-500/10"
                   style="min-width: 160px; border: 1.5px solid rgba(6,182,212,0.35); letter-spacing: 0.04em; backdrop-filter: blur(8px);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Hubungi Saya
                </a>
            </div>

        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce flex flex-col items-center gap-1.5">
            <span class="text-gray-500 text-xs font-medium tracking-widest uppercase" style="letter-spacing: 0.15em; font-size: 0.65rem;">Scroll</span>
            <svg class="w-4 h-4 text-cyan-500/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- About Section — PREMIUM IMAGE REDESIGN -->
    @if($settings['about_description'])
    <section id="about" class="py-16 md:py-20 lg:py-24 relative overflow-hidden">
        <div class="container-custom max-w-6xl">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">About Me</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
                    <span class="gradient-text">About Me</span>
                </h2>
            </div>

            <!-- Content -->
            <div class="grid lg:grid-cols-5 gap-10 md:gap-12 lg:gap-16 items-center">

                <!-- LEFT — Premium Circular Image -->
                <div class="lg:col-span-2 flex justify-center lg:justify-center" data-aos="fade-right">
                    <div class="about-image-wrapper">
                        <!-- Glow background -->
                        <div class="about-glow-bg"></div>

                        <!-- Outer spinning ring -->
                        <div class="about-ring-outer"></div>

                        <!-- Mid spinning ring -->
                        <div class="about-ring-mid"></div>

                        <!-- Main circular image -->
                        <div class="about-image-circular">
                            @if($settings['profile_image'])
                                <img src="{{ Storage::url($settings['profile_image']) }}" alt="About Me">
                            @else
                                <div class="about-placeholder">
                                    <svg class="w-24 h-24 md:w-32 md:h-32 text-white/30" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Available badge -->
                        <div class="about-badge">
                            <div class="dot"></div>
                            Available for hire
                        </div>
                    </div>
                </div>

                <!-- RIGHT — Text Content -->
                <div class="lg:col-span-3" data-aos="fade-left">
                    <div class="about-text-container gradient-border rounded-3xl p-6 md:p-8 lg:p-10 backdrop-blur-sm card-hover">
                        <div class="space-y-4 md:space-y-6">
                            <div class="text-gray-300 leading-relaxed text-base md:text-lg">
                                @if($settings['about_description'])
                                    {!! $settings['about_description'] !!}
                                @else
                                    <p class="mb-4">I'm a passionate Full Stack Developer with expertise in building modern web applications. I love creating clean, efficient, and user-friendly solutions.</p>
                                    <p class="mb-4">With experience in Laravel, React, Vue.js, and mobile development with Flutter, I bring ideas to life through code and creativity.</p>
                                    <p>When I'm not coding, you can find me exploring new technologies, contributing to open source projects, or sharing knowledge with the developer community.</p>
                                @endif
                            </div>
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

    <!-- Skills Section -->
    @if($skills->count() > 0)
    <section id="skills" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">My Skills</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"><span class="gradient-text">Skills & Expertise</span></h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Technologies and tools I use to bring ideas to life</p>
            </div>
            @php $groupedSkills = $skills->groupBy('category'); @endphp
            @foreach($groupedSkills as $category => $categorySkills)
            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
                @if($category)
                <h3 class="text-2xl font-bold mb-8 flex items-center gap-3"><span class="gradient-text">{{ $category }}</span></h3>
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
                                <svg class="w-8 h-8 text-violet-400" fill="currentColor" viewBox="0 0 20 20"><path d="M13 7H7v6h6V7z"></path><path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z" clip-rule="evenodd"></path></svg>
                            </div>
                            @endif
                            <h4 class="font-semibold text-white mb-2 group-hover:text-violet-400 transition-colors">{{ $skill->name }}</h4>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $skill->level === 'Expert' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : '' }}
                                {{ $skill->level === 'Intermediate' ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : '' }}
                                {{ $skill->level === 'Beginner' ? 'bg-amber-500/20 text-amber-400 border border-amber-500/30' : '' }}
                            ">{{ $skill->level }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Experience Section -->
    @if($experiences->count() > 0)
    <section id="experience" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom max-w-5xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">Career Journey</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"><span class="gradient-text">Experience</span></h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">My journey and achievements</p>
                <div class="mt-6">
                    <a href="{{ route('experience.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-sm">
                        <span>View All Experience</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="relative">
                @foreach($experiences as $index => $experience)
                <div class="relative mb-12 last:mb-0" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="md:flex items-center {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                        <div class="md:w-5/12 {{ $index % 2 === 0 ? 'md:pr-12' : 'md:pl-12' }}">
                            <div class="gradient-border rounded-2xl p-5 md:p-6 lg:p-7 backdrop-blur-sm card-hover group">
                                <div class="flex items-start gap-4 mb-4">
                                    @if($experience->image)
                                    <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 border-2 border-white/10">
                                        <img src="{{ Storage::url($experience->image) }}" alt="{{ $experience->title }}" class="w-full h-full object-cover">
                                    </div>
                                    @endif
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold text-white group-hover:text-violet-400 transition-colors mb-1">{{ $experience->title }}</h3>
                                        <p class="text-violet-400 font-semibold text-sm">{{ $experience->position }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-4">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span class="text-gray-400 text-sm">{{ $experience->start_year }} - {{ $experience->is_current ? 'Present' : $experience->end_year }}</span>
                                    @if($experience->is_current)
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-medium border border-emerald-500/30">Current</span>
                                    @endif
                                </div>
                                <p class="text-gray-300 leading-relaxed line-clamp-2 mb-4">{!! Str::limit(strip_tags($experience->description), 150) !!}</p>
                                <a href="{{ route('experience.detail', $experience->slug) }}" class="inline-flex items-center gap-2 text-violet-400 hover:text-violet-300 font-semibold text-sm transition-colors group/btn">
                                    <span>View Story</span>
                                    <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="hidden md:block md:w-5/12"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Projects Section -->
    @if($projects->count() > 0)
    <section id="projects" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">Portfolio</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"><span class="gradient-text">Featured Projects</span></h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Showcasing my Project and creative solutions</p>
                <div class="mt-6">
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-sm">
                        <span>View All Projects</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
                @foreach($projects as $index => $project)
                <div class="project-card group gradient-border rounded-3xl overflow-hidden backdrop-blur-sm card-hover" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative h-56 overflow-hidden bg-slate-800">
                        <img src="{{ Storage::url($project->main_image) }}" alt="{{ $project->name }}" class="project-image w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent opacity-60"></div>
                        @if($project->is_featured)
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full bg-violet-600 text-white text-xs font-semibold flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                Featured
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="p-5 md:p-6 lg:p-7">
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-violet-400 transition-colors">{{ $project->name }}</h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-3 leading-relaxed">{!! Str::limit(strip_tags($project->description), 120) !!}</p>
                        @if($project->technologies)
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach(array_slice($project->technologies, 0, 3) as $tech)
                            <span class="px-3 py-1 rounded-lg bg-violet-600/20 text-violet-300 text-xs font-medium border border-violet-500/30">{{ $tech }}</span>
                            @endforeach
                            @if(count($project->technologies) > 3)
                            <span class="px-3 py-1 rounded-lg bg-slate-700/50 text-gray-400 text-xs font-medium">+{{ count($project->technologies) - 3 }}</span>
                            @endif
                        </div>
                        @endif
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank" class="text-center px-4 py-2.5 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-xs flex items-center justify-center gap-2">
                                <span>Demo</span>
                            </a>
                            @endif
                            @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" class="text-center px-4 py-2.5 rounded-xl font-semibold border border-white/10 hover:bg-white/5 transition-all text-xs flex items-center justify-center gap-2">
                                <span>Code</span>
                            </a>
                            @endif
                        </div>
                        <a href="{{ route('projects.detail', $project->slug) }}" class="block w-full text-center px-4 py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-violet-500/50 rounded-xl font-bold transition-all text-sm group/view">
                            <span class="flex items-center justify-center gap-2">
                                View Details
                                <svg class="w-4 h-4 group-hover/view:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Certificates Section -->
    @if($certificates->count() > 0)
    <section id="certificates" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">Achievements</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"><span class="gradient-text">Certificates & Awards</span></h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Certificates and Achievements</p>
                <div class="mt-6">
                    <a href="{{ route('certificates.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-sm">
                        <span>View All Certificates</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
                @foreach($certificates as $index => $certificate)
                <div class="group gradient-border rounded-3xl overflow-hidden backdrop-blur-sm card-hover" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative h-48 overflow-hidden bg-slate-800">
                        <img src="{{ Storage::url($certificate->image) }}" alt="{{ $certificate->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent opacity-60"></div>
                    </div>
                    <div class="p-5 md:p-6 lg:p-7">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-lg font-bold text-white group-hover:text-violet-400 transition-colors flex-1">{{ $certificate->name }}</h3>
                            <svg class="w-6 h-6 text-violet-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                        <p class="text-violet-400 font-semibold text-sm mb-2">{{ $certificate->issuer }}</p>
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-gray-400 text-sm">{{ $certificate->year }}</span>
                        </div>
                        <div class="flex gap-3">
                            @if($certificate->verification_link)
                            <a href="{{ $certificate->verification_link }}" target="_blank" class="flex-1 text-center px-4 py-2 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-xs flex items-center justify-center gap-2 glow-effect">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Verify
                            </a>
                            @endif
                            <a href="{{ route('certificates.detail', $certificate->slug) }}" class="flex-1 text-center px-4 py-2 rounded-xl font-semibold border border-white/10 hover:bg-white/5 transition-all text-xs flex items-center justify-center gap-2">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Download CV Section -->
    @if($settings['cv_file'])
    <section class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom max-w-4xl" data-aos="fade-up">
            <div class="gradient-border rounded-3xl p-12 backdrop-blur-sm text-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-violet-600/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 flex items-center justify-center">
                        <svg class="w-10 h-10 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4"><span class="gradient-text">Download My Resume</span></h3>
                    <p class="text-gray-400 mb-8 max-w-xl mx-auto">Get a detailed overview of my experience, skills, and achievements</p>
                    <a href="{{ route('cv.download') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-2xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all glow-effect">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Download CV</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Contact Section -->
    <section id="contact" class="py-20 md:py-28 lg:py-32 relative">
        <div class="container-custom max-w-5xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">Contact</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4"><span class="gradient-text">Let's Work Together</span></h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Have a project in mind? Let's discuss how we can work together</p>
            </div>
            <div class="grid lg:grid-cols-5 gap-8">
                <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                    <div class="gradient-border rounded-2xl p-6 backdrop-blur-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div><h4 class="font-semibold text-white mb-1">Email</h4><p class="text-gray-400 text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e2838086979090838a8f838c888996d0a2858f838b8ecc818d8f">[email&#160;protected]</a></p></div>
                        </div>
                    </div>
                    <div class="gradient-border rounded-2xl p-6 backdrop-blur-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-600/20 to-indigo-600/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div><h4 class="font-semibold text-white mb-1">Location</h4><p class="text-gray-400 text-sm">Bogor, West Java</p></div>
                        </div>
                    </div>
                    <div class="gradient-border rounded-2xl p-6 backdrop-blur-sm">
                        <h4 class="font-semibold text-white mb-4">Follow Me</h4>
                        <div class="flex gap-3">
                            <a href="https://github.com/maman2008" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg></a>
                            <a href="https://www.linkedin.com/in/abdurrohman-46494031b/" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                            <a href="#" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg></a>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-3" data-aos="fade-left">
                    @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif
                    <form action="{{ route('contact.submit') }}" method="POST" class="gradient-border rounded-3xl p-6 md:p-8 lg:p-10 backdrop-blur-sm space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Name</label>
                            <input type="text" name="name" required value="{{ old('name') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:border-violet-500 focus:bg-white/10 focus:outline-none transition-all text-white placeholder-gray-500" placeholder="John Doe">
                            @error('name')<p class="text-red-400 text-sm mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Email</label>
                            <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:border-violet-500 focus:bg-white/10 focus:outline-none transition-all text-white placeholder-gray-500" placeholder="john@example.com">
                            @error('email')<p class="text-red-400 text-sm mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-white mb-2">Message</label>
                            <textarea name="message" required rows="6" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:border-violet-500 focus:bg-white/10 focus:outline-none transition-all text-white placeholder-gray-500 resize-none" placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-400 text-sm mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="w-full px-8 py-4 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-2xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all glow-effect flex items-center justify-center gap-2 group">
                            <span>Send Message</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative py-12 md:py-16 border-t border-white/5">
        <div class="container-custom">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-2xl font-bold gradient-text mb-4">Portfolio</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Building digital experiences with passion and precision.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Quick Links</h4>
                    <div class="space-y-2">
                        <a href="#home" class="block text-gray-400 hover:text-violet-400 transition-colors text-sm">Home</a>
                        <a href="#about" class="block text-gray-400 hover:text-violet-400 transition-colors text-sm">About</a>
                        <a href="#projects" class="block text-gray-400 hover:text-violet-400 transition-colors text-sm">Projects</a>
                        <a href="#contact" class="block text-gray-400 hover:text-violet-400 transition-colors text-sm">Contact</a>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Connect</h4>
                    <div class="flex gap-3">
                        <a href="https://github.com/maman2008" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all group"><svg class="w-5 h-5 text-gray-400 group-hover:text-violet-400 transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg></a>
                        <a href="https://www.linkedin.com/in/abdurrohman-46494031b/" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all group"><svg class="w-5 h-5 text-gray-400 group-hover:text-violet-400 transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                        <a href="#" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all group"><svg class="w-5 h-5 text-gray-400 group-hover:text-violet-400 transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg></a>
                        <a href="https://www.instagram.com/abdurr949_/" class="w-10 h-10 rounded-lg bg-white/5 hover:bg-violet-600/20 border border-white/10 hover:border-violet-500/50 flex items-center justify-center transition-all group"><svg class="w-5 h-5 text-gray-400 group-hover:text-violet-400 transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    </div>
                </div>
            </div>
            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} Portfolio. All rights reserved.</p>
                <p class="text-gray-400 text-sm">Built with <span class="text-red-400">❤</span> using Laravel & Tailwind CSS</p>
            </div>
        </div>
    </footer>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, offset: 100 });

        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        mobileMenu.querySelectorAll('a').forEach(link => link.addEventListener('click', () => mobileMenu.classList.add('hidden')));

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
                if (!this.isDeleting && this.text === fullText) { typeSpeed = this.wait; this.isDeleting = true; }
                else if (this.isDeleting && this.text === '') { this.isDeleting = false; this.wordIndex++; typeSpeed = 500; }
                setTimeout(() => this.type(), typeSpeed);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const roleElement = document.getElementById('typing-role');
            if (roleElement) new TypeWriter(roleElement, ['Full Stack Developer', 'UI/UX Designer', 'Mobile Developer'], 2500);
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offset = 80;
                    window.scrollTo({ top: target.getBoundingClientRect().top + window.pageYOffset - offset, behavior: 'smooth' });
                }
            });
        });

        const navbar = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                navbar.style.background = 'rgba(15,23,42,0.92)';
                navbar.style.borderBottomColor = 'rgba(255,255,255,0.08)';
            } else {
                navbar.style.background = 'rgba(15,23,42,0.75)';
                navbar.style.borderBottomColor = 'rgba(255,255,255,0.05)';
            }
        });

        const createParticles = () => {
            const container = document.getElementById('particles-container');
            if (!container) return;
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                const size = Math.random() * 4 + 1;
                const colors = ['rgba(102, 126, 234, 0.6)', 'rgba(6, 182, 212, 0.6)', 'rgba(139, 92, 246, 0.6)', 'rgba(118, 75, 162, 0.6)'];
                const color = colors[Math.floor(Math.random() * colors.length)];
                particle.style.cssText = `width:${size}px;height:${size}px;background:${color};left:${Math.random()*100}%;top:${Math.random()*100}%;animation:float ${Math.random()*10+10}s ease-in-out infinite;animation-delay:${Math.random()*5}s;box-shadow:0 0 ${size*2}px ${color};`;
                container.appendChild(particle);
            }
        };
        createParticles();

        const observerOptions = { threshold: 0.5, rootMargin: '0px' };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('animate-in'); });
        }, observerOptions);
        document.querySelectorAll('.card-hover').forEach(card => observer.observe(card));

        console.log('%c👋 Hello Developer!', 'color: #667eea; font-size: 24px; font-weight: bold;');
        console.log('%cLooking for something? Feel free to reach out!', 'color: #764ba2; font-size: 14px;');
        console.log('%c💼 Portfolio built with Laravel & Tailwind CSS', 'color: #8b5cf6; font-size: 12px;');
    </script>

    <style>
        .typing-cursor { animation: blink 0.7s infinite; color: #8b5cf6; font-weight: 300; }
        @keyframes blink { 0%, 50% { opacity: 1; } 51%, 100% { opacity: 0; } }

        .card-hover {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover.animate-in { opacity: 1; transform: translateY(0); }

        .glow-effect { position: relative; overflow: hidden; }
        .glow-effect::after {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: 0; height: 0;
            border-radius: 50%;