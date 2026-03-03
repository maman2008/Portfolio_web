<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->name }} - Project Detail</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { 
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            background-attachment: fixed;
            overflow-x: hidden;
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
        .glow-effect {
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
        }
        .glow-effect:hover {
            box-shadow: 0 0 40px rgba(139, 92, 246, 0.6);
        }
        .prose img {
            border-radius: 1.5rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body class="text-white overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed w-full z-50 border-b border-white/5" style="background: rgba(15,23,42,0.85); backdrop-filter: blur(20px);">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="text-xl font-bold gradient-text">Portfolio</a>
                
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
                    <a href="{{ route('projects.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-white bg-white/10">Projects</a>
                    <a href="{{ route('experience.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Experience</a>
                    <a href="{{ route('certificates.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Certificates</a>
                </div>

                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-white/5 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <section class="pt-24 pb-6 px-6">
        <div class="max-w-6xl mx-auto">
            <nav class="flex items-center space-x-2 text-sm" data-aos="fade-right">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('projects.index') }}" class="text-gray-400 hover:text-white transition-colors">Projects</a>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-violet-400 font-medium">{{ $project->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Project Header -->
    <section class="pb-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12" data-aos="fade-up">
                @if($project->is_featured)
                <span class="inline-block px-4 py-2 rounded-full bg-violet-600/20 border border-violet-500/30 text-xs font-bold mb-6 tracking-widest uppercase">
                    ⭐ Featured Project
                </span>
                @endif
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 tracking-tight">
                    <span class="gradient-text">{{ $project->name }}</span>
                </h1>
            </div>

            <!-- Hero Image -->
            <div class="relative group mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-cyan-600 rounded-[2rem] blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative gradient-border rounded-[2rem] overflow-hidden shadow-2xl">
                    <img src="{{ Storage::url($project->main_image) }}" alt="{{ $project->name }}" class="w-full h-auto object-cover">
                </div>
            </div>

            <!-- Stats & Links -->
            <div class="grid md:grid-cols-3 gap-6 mb-16">
                <!-- Technologies -->
                <div class="gradient-border rounded-3xl p-8 card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-violet-600/20 flex items-center justify-center text-violet-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Stack</h3>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->technologies as $tech)
                        <span class="px-3 py-1.5 rounded-xl bg-violet-600/10 text-violet-300 text-sm font-semibold border border-violet-500/20 hover:bg-violet-600/20 transition-colors">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                </div>

                <!-- Links -->
                <div class="gradient-border rounded-3xl p-8 card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-cyan-600/20 flex items-center justify-center text-cyan-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Launch</h3>
                    </div>
                    <div class="space-y-4">
                        @if($project->demo_link)
                        <a href="{{ $project->demo_link }}" target="_blank" class="flex items-center justify-between group/link text-cyan-400 hover:text-cyan-300 transition-colors">
                            <span class="font-bold">Live Preview</span>
                            <svg class="w-5 h-5 group-hover/link:translate-x-1 group-hover/link:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                        @endif
                        @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank" class="flex items-center justify-between group/link text-gray-300 hover:text-white transition-colors">
                            <span class="font-bold">Source Code</span>
                            <svg class="w-5 h-5 group-hover/link:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Status -->
                <div class="gradient-border rounded-3xl p-8 card-hover" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-600/20 flex items-center justify-center text-emerald-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Status</h3>
                    </div>
                    <div>
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-500/10 text-emerald-400 text-sm font-bold border border-emerald-500/20">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Production Ready
                        </span>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="gradient-border rounded-[2.5rem] p-8 md:p-12 lg:p-16 mb-16" data-aos="fade-up" data-aos-delay="500">
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="text-3xl md:text-4xl font-extrabold gradient-text">Overview</h2>
                    <div class="h-1 flex-1 bg-gradient-to-r from-violet-600/20 to-transparent rounded-full"></div>
                </div>
                <div class="prose prose-invert prose-xl max-w-none text-gray-300 leading-relaxed">
                    {!! $project->description !!}
                </div>
            </div>

            <!-- Gallery -->
            @if($project->images && count($project->images) > 0)
            <div class="mb-20" data-aos="fade-up" data-aos-delay="600">
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="text-3xl md:text-4xl font-extrabold gradient-text">Gallery</h2>
                    <div class="h-1 flex-1 bg-gradient-to-r from-violet-600/20 to-transparent rounded-full"></div>
                </div>
                <div class="grid sm:grid-cols-2 gap-8">
                    @foreach($project->images as $image)
                    <div class="group relative gradient-border rounded-3xl overflow-hidden cursor-zoom-in">
                        <img src="{{ Storage::url($image) }}" alt="{{ $project->name }}" class="w-full h-[400px] object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="p-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Bottom Navigation -->
            <div class="flex justify-center" data-aos="fade-up" data-aos-delay="700">
                <a href="{{ route('projects.index') }}" class="group inline-flex items-center gap-4 px-10 py-5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-violet-500/50 rounded-2xl font-bold transition-all duration-300 glow-effect">
                    <svg class="w-6 h-6 group-hover:-translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Projects</span>
                </a>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
        
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                // Logic for mobile menu could be added here if needed
            });
        }
    </script>
</body>
</html>
