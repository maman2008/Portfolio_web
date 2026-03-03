<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Projects - Portfolio</title>
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
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border: 1px solid rgba(139, 92, 246, 0.2);
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.3);
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .glow-effect {
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
        }
        .glow-effect:hover {
            box-shadow: 0 0 40px rgba(139, 92, 246, 0.6);
        }
    </style>
</head>
<body class="text-white overflow-x-hidden min-h-screen">
    
    <!-- Navigation -->
    <nav class="fixed w-full z-50 border-b border-white/5" style="background: rgba(15,23,42,0.75); backdrop-filter: blur(20px);">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="text-xl font-bold gradient-text">Portfolio</a>
                
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
                    <a href="{{ route('projects.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-white bg-white/10">Projects</a>
                    <a href="{{ route('experience.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Experience</a>
                    <a href="{{ route('certificates.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Certificates</a>
                    <div class="w-px h-5 bg-white/10 mx-2"></div>
                    <a href="{{ route('home') }}#contact" class="px-5 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 transition-all text-white glow-effect">Contact Me</a>
                </div>

                <!-- Mobile Menu Button -->
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
                <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
                <a href="{{ route('projects.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-white bg-white/10">Projects</a>
                <a href="{{ route('experience.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Experience</a>
                <a href="{{ route('certificates.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Certificates</a>
                <div class="pt-2">
                    <a href="{{ route('home') }}#contact" class="block px-4 py-2.5 rounded-xl text-sm font-semibold bg-gradient-to-r from-violet-600 to-indigo-600 text-center text-white">Contact Me</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="pt-28 pb-12 px-6">
        <div class="max-w-7xl mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-6 tracking-wide">
                Portfolio
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">
                <span class="gradient-text">All Projects</span>
            </h1>
            <p class="text-gray-400 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Explore my complete collection of projects and creative works
            </p>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="pb-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @forelse($projects as $index => $project)
                <div class="gradient-border rounded-3xl overflow-hidden backdrop-blur-sm card-hover" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative h-56 overflow-hidden bg-slate-800">
                        <img src="{{ Storage::url($project->main_image) }}" alt="{{ $project->name }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
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

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-3 hover:text-violet-400 transition-colors line-clamp-2">
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
                            <span class="px-3 py-1 rounded-lg bg-slate-700/50 text-gray-400 text-xs font-medium">+{{ count($project->technologies) - 3 }}</span>
                            @endif
                        </div>
                        @endif
                        
                        <a href="{{ route('projects.detail', $project->slug) }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-sm glow-effect">
                            <span>View Details</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-violet-600/10 mb-4">
                        <svg class="w-10 h-10 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <p class="text-gray-400 text-lg">No projects found.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($projects->hasPages())
            <div class="mt-12">
                {{ $projects->links() }}
            </div>
            @endif
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
