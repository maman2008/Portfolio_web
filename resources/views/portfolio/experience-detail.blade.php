<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $experience->title }} - Career Detail</title>
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
        .timeline-dot {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #667eea, #06b6d4);
            border-radius: 50%;
            border: 4px solid #1e1b4b;
            box-shadow: 0 0 15px rgba(102, 126, 234, 0.5);
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
                    <a href="{{ route('projects.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all">Projects</a>
                    <a href="{{ route('experience.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-white bg-white/10">Experience</a>
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
        <div class="max-w-5xl mx-auto">
            <nav class="flex items-center space-x-2 text-sm" data-aos="fade-right">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('experience.index') }}" class="text-gray-400 hover:text-white transition-colors">Experience</a>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-violet-400 font-medium">{{ $experience->title }}</span>
            </nav>
        </div>
    </section>

    <!-- Experience Header -->
    <section class="pb-20 px-6">
        <div class="max-w-5xl mx-auto">
            <!-- Company & Position Card -->
            <div class="gradient-border rounded-[2.5rem] p-8 md:p-12 mb-12" data-aos="fade-up">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-10">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-500"></div>
                        <div class="relative w-32 h-32 md:w-40 md:h-40 rounded-3xl overflow-hidden border-2 border-white/10 bg-slate-800">
                            @if($experience->image)
                                <img src="{{ Storage::url($experience->image) }}" alt="{{ $experience->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="flex-1 text-center md:text-left">
                        <div class="mb-4">
                            @if($experience->is_current)
                                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/10 text-emerald-400 text-xs font-bold border border-emerald-500/20 tracking-widest uppercase mb-4">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    Current Role
                                </span>
                            @endif
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4">
                                <span class="gradient-text">{{ $experience->title }}</span>
                            </h1>
                            <p class="text-2xl md:text-3xl font-bold text-white/90 mb-4">{{ $experience->position }}</p>
                        </div>
                        
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-6 text-gray-400 font-medium">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $experience->start_year }} — {{ $experience->is_current ? 'Present' : $experience->end_year }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid lg:grid-cols-3 gap-10 mb-16">
                <!-- Description -->
                <div class="lg:col-span-2 space-y-10">
                    <div class="gradient-border rounded-[2.5rem] p-8 md:p-12" data-aos="fade-up">
                        <h2 class="text-3xl font-extrabold text-white mb-8 flex items-center gap-4">
                            <span class="w-1.5 h-8 bg-violet-600 rounded-full"></span>
                            Role & Description
                        </h2>
                        <div class="prose prose-invert prose-xl max-w-none text-gray-300 leading-relaxed">
                            {!! $experience->description !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar / Timeline -->
                <div class="space-y-8">
                    <div class="gradient-border rounded-3xl p-8 sticky top-24" data-aos="fade-left">
                        <h3 class="text-2xl font-bold text-white mb-8">Career Timeline</h3>
                        <div class="relative pl-8 border-l-2 border-white/5 space-y-10">
                            <!-- End / Present -->
                            <div class="relative">
                                <div class="absolute -left-[41px] top-0 timeline-dot"></div>
                                <div class="mb-1">
                                    <span class="text-xs font-bold text-violet-400 tracking-widest uppercase">{{ $experience->is_current ? 'Currently' : 'Ended' }}</span>
                                </div>
                                <h4 class="text-xl font-extrabold text-white">{{ $experience->is_current ? 'Present' : $experience->end_year }}</h4>
                                <p class="text-gray-400 text-sm">{{ $experience->is_current ? 'Still making an impact' : 'Transitioned to new challenges' }}</p>
                            </div>

                            <!-- Start -->
                            <div class="relative">
                                <div class="absolute -left-[41px] top-0 timeline-dot" style="background: rgba(102, 126, 234, 0.3); border-color: #334155;"></div>
                                <div class="mb-1">
                                    <span class="text-xs font-bold text-gray-500 tracking-widest uppercase">Started</span>
                                </div>
                                <h4 class="text-xl font-extrabold text-gray-300">{{ $experience->start_year }}</h4>
                                <p class="text-gray-500 text-sm">Joined the team at {{ $experience->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="flex justify-center" data-aos="fade-up">
                <a href="{{ route('experience.index') }}" class="group inline-flex items-center gap-4 px-10 py-5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-violet-500/50 rounded-2xl font-bold transition-all duration-300">
                    <svg class="w-6 h-6 group-hover:-translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Experience</span>
                </a>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
    </script>
</body>
</html>
