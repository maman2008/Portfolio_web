<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        // Limit to 3 items for homepage
        $experiences = Experience::orderBy('order')->orderBy('start_year', 'desc')->limit(3)->get();
        $projects = Project::orderBy('order')->orderBy('created_at', 'desc')->limit(3)->get();
        $skills = Skill::orderBy('order')->orderBy('name')->get();
        $certificates = Certificate::orderBy('order')->orderBy('year', 'desc')->limit(3)->get();
        
        $settings = [
            'hero_title' => Setting::get('hero_title', 'Hi, I\'m a Developer'),
            'hero_subtitle' => Setting::get('hero_subtitle', 'Full Stack Developer'),
            'about_title' => Setting::get('about_title', 'About Me'),
            'about_description' => Setting::get('about_description'),
            'profile_image' => Setting::get('profile_image'),
            'cv_file' => Setting::get('cv_file'),
        ];

        return view('portfolio.index', compact('experiences', 'projects', 'skills', 'certificates', 'settings'));
    }

    // Projects Pages
    public function projects()
    {
        $projects = Project::orderBy('order')->orderBy('created_at', 'desc')->paginate(9);
        
        return view('portfolio.projects', compact('projects'));
    }

    public function projectDetail(Project $project)
    {
        return view('portfolio.project-detail', compact('project'));
    }

    // Experience Pages
    public function experience()
    {
        $experiences = Experience::orderBy('order')->orderBy('start_year', 'desc')->paginate(12);
        
        return view('portfolio.experience', compact('experiences'));
    }

    public function experienceDetail(Experience $experience)
    {
        return view('portfolio.experience-detail', compact('experience'));
    }

    // Certificates Pages
    public function certificates()
    {
        $certificates = Certificate::orderBy('order')->orderBy('year', 'desc')->paginate(12);
        
        return view('portfolio.certificates', compact('certificates'));
    }

    public function certificateDetail(Certificate $certificate)
    {
        return view('portfolio.certificate-detail', compact('certificate'));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Thank you for your message! I will get back to you soon.');
    }

    public function downloadCV()
    {
        $cvFile = Setting::get('cv_file');
        
        if (!$cvFile || !Storage::disk('public')->exists($cvFile)) {
            abort(404, 'CV not found');
        }

        return Storage::disk('public')->download($cvFile, 'CV.pdf');
    }

    public function downloadCertificate(Certificate $certificate)
    {
        if (!$certificate->image || !Storage::disk('public')->exists($certificate->image)) {
            abort(404, 'Certificate file not found');
        }

        $extension = pathinfo($certificate->image, PATHINFO_EXTENSION);
        $filename = \Illuminate\Support\Str::slug($certificate->name) . '.' . $extension;

        return Storage::disk('public')->download($certificate->image, $filename);
    }
}
