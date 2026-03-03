<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Certificates - Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { 
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            background-attachment: fixed;
        }
        .gradient-text {
            background: linear-gradient(90deg, #667eea 0%, #06b6d4 50%, #667eea 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .gradient-border {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border: 1px solid rgba(139, 92, 246, 0.2);
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
        }
    </style>
</head>
<body class="text-white overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed w-full bg-slate-900/70 backdrop-blur-xl z-50 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-xl sm:text-2xl font-bold gradient-text">Portfolio</a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Home</a>
                    <a href="{{ route('projects.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Projects</a>
                    <a href="{{ route('experience.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Experience</a>
                    <a href="{{ route('certificates.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium bg-white/5">Certificates</a>
                    <a href="{{ route('home') }}#contact" class="px-5 py-2.5 ml-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 transition-all">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg hover:bg-white/5 transition-all" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-slate-900/95 backdrop-blur-xl border-t border-white/5">
            <div class="px-4 py-3 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Home</a>
                <a href="{{ route('projects.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Projects</a>
                <a href="{{ route('experience.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Experience</a>
                <a href="{{ route('certificates.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium bg-white/5">Certificates</a>
                <a href="{{ route('home') }}#contact" class="block px-4 py-3 mt-2 rounded-xl text-sm font-semibold text-center bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 transition-all">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="pt-24 sm:pt-28 md:pt-32 pb-12 sm:pb-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-xs sm:text-sm font-medium mb-3 sm:mb-4">
                Achievements
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-3 sm:mb-4 px-2">
                <span class="gradient-text">All Certificates</span>
            </h1>
            <p class="text-gray-400 text-sm sm:text-base md:text-lg max-w-2xl mx-auto px-4">
                My professional certifications and achievements
            </p>
        </div>
    </section>

    <!-- Certificates Grid -->
    <section class="pb-16 sm:pb-20 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6 lg:gap-8">
                @forelse($certificates as $index => $certificate)
                <div class="group gradient-border rounded-xl sm:rounded-2xl lg:rounded-3xl overflow-hidden backdrop-blur-sm card-hover cursor-pointer" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $index * 100 }}" 
                     onclick="window.location='{{ route('certificates.detail', $certificate->slug) }}'">
                    
                    <!-- Image Container -->
                    <div class="relative h-40 sm:h-44 md:h-48 overflow-hidden bg-slate-800">
                        <img src="{{ Storage::url($certificate->image) }}" 
                             alt="{{ $certificate->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent opacity-60"></div>
                        
                        <!-- Badge Icon -->
                        <div class="absolute top-3 right-3 sm:top-4 sm:right-4">
                            <div class="w-8 h-8 sm:w-9 sm:h-9 lg:w-10 lg:h-10 rounded-full bg-violet-600/90 backdrop-blur-sm flex items-center justify-center">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-4 sm:p-5 lg:p-6">
                        <h3 class="text-base sm:text-lg font-bold text-white group-hover:text-violet-400 transition-colors mb-1.5 sm:mb-2 line-clamp-2">
                            {{ $certificate->name }}
                        </h3>
                        
                        <p class="text-violet-400 font-semibold text-xs sm:text-sm mb-2 sm:mb-3 truncate">{{ $certificate->issuer }}</p>
                        
                        <div class="flex items-center gap-2 mb-3 sm:mb-4">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-400 text-xs sm:text-sm">{{ $certificate->year }}</span>
                        </div>
                        
                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                            <a href="{{ route('certificates.detail', $certificate->slug) }}" 
                               class="flex-1 text-center px-3 sm:px-4 py-2 sm:py-2.5 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-lg sm:rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-xs sm:text-sm flex items-center justify-center gap-1 sm:gap-2" 
                               onclick="event.stopPropagation()">
                                <span>View Details</span>
                                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            
                            @if($certificate->verification_link)
                            <a href="{{ $certificate->verification_link }}" 
                               target="_blank" 
                               class="px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg sm:rounded-xl font-semibold border border-white/10 hover:border-violet-500/50 hover:bg-white/5 transition-all text-xs sm:text-sm flex items-center justify-center gap-1 sm:gap-2" 
                               onclick="event.stopPropagation()">
                                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="hidden xs:inline">Verify</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 sm:py-16 md:py-20">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-4 rounded-full bg-white/5 flex items-center justify-center">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-400 text-sm sm:text-base md:text-lg">No certificates found.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($certificates->hasPages())
            <div class="mt-8 sm:mt-10 md:mt-12">
                {{ $certificates->links() }}
            </div>
            @endif
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ 
            duration: 800, 
            once: true,
            disable: 'mobile' // Optional: disable AOS on mobile for better performance
        });

        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobileMenu').classList.add('hidden');
            });
        });
    </script>
</body>
</html>