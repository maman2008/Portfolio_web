<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Experience - Portfolio</title>
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
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="text-white overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed w-full bg-slate-900/70 backdrop-blur-xl z-50 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text">Portfolio</a>
                
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Home</a>
                    <a href="{{ route('projects.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Projects</a>
                    <a href="{{ route('experience.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium bg-white/5">Experience</a>
                    <a href="{{ route('certificates.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition-all">Certificates</a>
                    <a href="{{ route('home') }}#contact" class="px-5 py-2.5 ml-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-500 hover:to-indigo-500 transition-all">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="pt-32 pb-16 px-6">
        <div class="max-w-7xl mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-violet-600/20 to-indigo-600/20 border border-violet-500/30 text-sm font-medium mb-4">
                Career Journey
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                <span class="gradient-text">All Experience</span>
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                My professional journey and achievements throughout my career
            </p>
        </div>
    </section>

    <!-- Experience Timeline -->
    <section class="pb-20 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="relative">
                <!-- Timeline Line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-gradient-to-b from-violet-600 via-indigo-600 to-violet-600 opacity-20"></div>

                @forelse($experiences as $index => $experience)
                <div class="relative mb-12 last:mb-0" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="md:flex items-center {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                        <!-- Content -->
                        <div class="md:w-5/12 {{ $index % 2 === 0 ? 'md:pr-12' : 'md:pl-12' }}">
                            <div class="gradient-border rounded-2xl p-6 backdrop-blur-sm card-hover group cursor-pointer" onclick="window.location='{{ route('experience.detail', $experience->slug) }}'">
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
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-gray-400 text-sm">{{ $experience->start_year }} - {{ $experience->is_current ? 'Present' : $experience->end_year }}</span>
                                    @if($experience->is_current)
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-medium border border-emerald-500/30">Current</span>
                                    @endif
                                </div>
                                
                                <p class="text-gray-300 leading-relaxed mb-4 line-clamp-3">{!! Str::limit(strip_tags($experience->description), 150) !!}</p>
                                
                                <a href="{{ route('experience.detail', $experience->slug) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl font-semibold hover:from-violet-500 hover:to-indigo-500 transition-all text-sm">
                                    <span>View Details</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Timeline Dot -->
                        <div class="hidden md:flex md:w-2/12 justify-center">
                            <div class="w-4 h-4 rounded-full bg-gradient-to-r from-violet-600 to-indigo-600 border-4 border-slate-900 relative z-10"></div>
                        </div>

                        <!-- Empty Space -->
                        <div class="hidden md:block md:w-5/12"></div>
                    </div>
                </div>
                @empty
                <div class="text-center py-20">
                    <p class="text-gray-400 text-lg">No experience found.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($experiences->hasPages())
            <div class="mt-12">
                {{ $experiences->links() }}
            </div>
            @endif
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html>
