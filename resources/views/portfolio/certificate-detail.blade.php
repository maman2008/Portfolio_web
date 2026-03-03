<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>{{ $certificate->name }} - Credential Detail</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { 
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            background-attachment: fixed;
            overflow-x: hidden;
            min-height: 100vh;
        }
        .gradient-text {
            background: linear-gradient(90deg, #667eea 0%, #06b6d4 50%, #667eea 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s linear infinite;
        }
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        .gradient-border {
            position: relative;
            background: linear-gradient(135deg, rgba(102,126,234,0.05), rgba(6,182,212,0.05));
            border: 1px solid rgba(139,92,246,0.3);
            backdrop-filter: blur(10px);
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.3);
            border-color: rgba(139, 92, 246, 0.6);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .text-balance {
            text-wrap: balance;
        }
    </style>
</head>
<body class="text-white overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed w-full z-50 border-b border-white/5" style="background: rgba(15,23,42,0.95); backdrop-filter: blur(20px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                <a href="{{ route('home') }}" class="text-xl sm:text-2xl font-bold gradient-text">Portfolio</a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
                    <a href="{{ route('projects.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Projects</a>
                    <a href="{{ route('experience.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Experience</a>
                    <a href="{{ route('certificates.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-violet-600 to-cyan-600">Certificates</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2.5 rounded-xl hover:bg-white/5 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-white/5">
            <div class="max-w-7xl mx-auto px-4 py-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
                <a href="{{ route('projects.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Projects</a>
                <a href="{{ route('experience.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Experience</a>
                <a href="{{ route('certificates.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium text-white bg-gradient-to-r from-violet-600 to-cyan-600">Certificates</a>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <section class="pt-24 sm:pt-28 pb-6 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <nav class="flex items-center space-x-2 text-xs sm:text-sm" data-aos="fade-right">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Home</a>
                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('certificates.index') }}" class="text-gray-400 hover:text-white transition-colors">Certificates</a>
                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-violet-400 font-medium truncate max-w-[150px] sm:max-w-none">{{ $certificate->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="pb-16 sm:pb-20 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-8 sm:mb-12 lg:mb-16" data-aos="fade-up">
                <div class="flex flex-wrap justify-center gap-3 mb-6">
                    <span class="inline-block px-4 py-2 rounded-full bg-violet-600/20 border border-violet-500/30 text-xs font-bold tracking-widest uppercase">
                        Verified Certificate
                    </span>
                    @if($certificate->verification_link)
                    <span class="inline-block px-4 py-2 rounded-full bg-emerald-600/20 border border-emerald-500/30 text-xs font-bold tracking-widest uppercase">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.040L3 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622l-.382-3.376z"></path>
                            </svg>
                            Verifiable
                        </span>
                    </span>
                    @endif
                </div>
                
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 sm:mb-6 tracking-tight leading-tight px-2">
                    <span class="gradient-text text-balance">{{ $certificate->name }}</span>
                </h1>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-3 text-base sm:text-lg md:text-xl text-gray-400 font-medium">
                    <span>Issued by <span class="text-white font-bold">{{ $certificate->issuer }}</span></span>
                    <span class="hidden sm:inline text-gray-600">•</span>
                    <span>{{ $certificate->year }}</span>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid lg:grid-cols-2 gap-6 lg:gap-8 xl:gap-12 items-start mb-12 lg:mb-20">
                <!-- Certificate Preview -->
                <div class="relative group" data-aos="fade-right" data-aos-delay="100">
                    <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-cyan-600 rounded-2xl sm:rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                    <div class="relative gradient-border rounded-2xl sm:rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ Storage::url($certificate->image) }}" 
                             alt="{{ $certificate->name }}" 
                             class="w-full h-auto object-cover transform transition duration-700 group-hover:scale-105"
                             loading="lazy">
                        
                        @if($certificate->verification_link)
                        <div class="absolute inset-x-0 bottom-0 p-4 sm:p-6 bg-gradient-to-t from-black/90 via-black/60 to-transparent">
                            <a href="{{ $certificate->verification_link }}" 
                               target="_blank" 
                               class="flex items-center justify-center gap-2 w-full py-3.5 sm:py-4 bg-white text-slate-900 rounded-xl sm:rounded-2xl font-bold hover:bg-violet-50 transition-all hover:scale-[1.02] active:scale-[0.98] shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.040L3 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622l-.382-3.376z"></path>
                                </svg>
                                <span class="text-sm sm:text-base">Verify Credential</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Certificate Details -->
                <div class="space-y-5 sm:space-y-6 lg:space-y-8" data-aos="fade-left" data-aos-delay="200">
                    <!-- Description Card -->
                    <div class="gradient-border rounded-2xl sm:rounded-3xl p-6 sm:p-8 backdrop-blur-sm card-hover">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-4 sm:mb-6 flex items-center gap-3">
                            <span class="w-1 h-6 sm:w-1.5 sm:h-8 bg-gradient-to-b from-violet-500 to-cyan-500 rounded-full"></span>
                            Description
                        </h2>
                        <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed text-sm sm:text-base lg:text-lg">
                            @if($certificate->description)
                                {!! $certificate->description !!}
                            @else
                                <p class="text-balance">Successfully completed the curriculum and rigorous assessments for <span class="text-white font-semibold">{{ $certificate->name }}</span>, demonstrating proficiency in the core concepts and practical applications required by <span class="text-white font-semibold">{{ $certificate->issuer }}</span>.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 gap-3 sm:gap-5">
                        <div class="gradient-border rounded-xl sm:rounded-2xl p-4 sm:p-6 text-center card-hover">
                            <p class="text-gray-400 text-xs sm:text-sm font-medium mb-1 tracking-widest uppercase">Year</p>
                            <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-white">{{ $certificate->year }}</p>
                        </div>
                        <div class="gradient-border rounded-xl sm:rounded-2xl p-4 sm:p-6 text-center card-hover">
                            <p class="text-gray-400 text-xs sm:text-sm font-medium mb-1 tracking-widest uppercase">Status</p>
                            <div class="flex items-center justify-center gap-2">
                                <span class="relative flex h-2 w-2 sm:h-3 sm:w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 sm:h-3 sm:w-3 bg-emerald-500"></span>
                                </span>
                                <p class="text-lg sm:text-xl lg:text-2xl font-bold text-emerald-400">Active</p>
                            </div>
                        </div>
                    </div>

                    <!-- Credential ID Card -->
                    @if($certificate->verification_link)
                    <div class="gradient-border rounded-xl sm:rounded-2xl p-5 sm:p-6 card-hover">
                        <p class="text-gray-400 text-xs sm:text-sm font-medium mb-3 sm:mb-4 tracking-widest uppercase">Credential ID</p>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                            <div class="flex-1 w-full sm:w-auto bg-white/5 rounded-xl p-3 sm:p-4 border border-white/10">
                                <code class="text-violet-300 font-mono text-xs sm:text-sm break-all">CRED-{{ strtoupper(substr(md5($certificate->id), 0, 12)) }}-{{ $certificate->year }}</code>
                            </div>
                            <button onclick="copyToClipboard(this)" 
                                    class="inline-flex items-center justify-center gap-2 px-4 sm:px-6 py-3 sm:py-4 bg-white/5 hover:bg-white/10 rounded-xl transition-all group/btn w-full sm:w-auto">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                                </svg>
                                <span class="text-xs sm:text-sm font-medium">Copy ID</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <!-- Additional Info Card -->
                    <div class="glass-effect rounded-xl sm:rounded-2xl p-5 sm:p-6">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-violet-600/20 rounded-xl">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-sm sm:text-base mb-1">About this credential</h3>
                                <p class="text-gray-400 text-xs sm:text-sm leading-relaxed">
                                    This credential represents the successful completion of all requirements and assessments for the {{ $certificate->name }} program offered by {{ $certificate->issuer }}.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 lg:gap-6" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('certificates.index') }}" 
                   class="group inline-flex items-center justify-center gap-3 w-full sm:w-auto px-6 sm:px-8 lg:px-10 py-4 sm:py-5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-violet-500/50 rounded-xl sm:rounded-2xl font-bold transition-all duration-300 text-sm sm:text-base">
                    <svg class="w-5 h-5 group-hover:-translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Certificates</span>
                </a>
                
                <a href="{{ route('certificates.download', $certificate->id) }}" 
                   class="group inline-flex items-center justify-center gap-3 w-full sm:w-auto px-6 sm:px-8 lg:px-10 py-4 sm:py-5 bg-gradient-to-r from-violet-600 to-cyan-600 hover:from-violet-500 hover:to-cyan-500 rounded-xl sm:rounded-2xl font-bold transition-all duration-300 text-sm sm:text-base shadow-lg hover:shadow-xl hover:scale-[1.02] active:scale-[0.98]">
                    <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span>Download Certificate</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-white/5 py-6 sm:py-8 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-gray-400 text-xs sm:text-sm">
                © {{ date('Y') }} Portfolio. All rights reserved. | 
                <a href="#" class="hover:text-violet-400 transition-colors">Privacy</a> • 
                <a href="#" class="hover:text-violet-400 transition-colors">Terms</a>
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({ 
            duration: 800, 
            once: true,
            offset: 50,
            delay: 0
        });

        // Mobile Menu Toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!menuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        // Copy to clipboard function
        function copyToClipboard(button) {
            const codeElement = button.previousElementSibling.querySelector('code');
            if (codeElement) {
                const text = codeElement.innerText;
                navigator.clipboard.writeText(text).then(() => {
                    // Show success feedback
                    const originalText = button.innerHTML;
                    button.innerHTML = `
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-xs sm:text-sm font-medium">Copied!</span>
                    `;
                    
                    setTimeout(() => {
                        button.innerHTML = originalText;
                    }, 2000);
                });
            }
        }

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                mobileMenu?.classList.add('hidden');
            }
        });
    </script>
</body>
</html>