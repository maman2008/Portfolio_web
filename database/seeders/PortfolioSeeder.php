<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('password'),
        ]);

        // Settings
        Setting::create(['key' => 'hero_title', 'value' => 'Hi, I\'m a Full Stack Developer']);
        Setting::create(['key' => 'hero_subtitle', 'value' => 'Building amazing web applications with Laravel & Modern JavaScript']);
        Setting::create(['key' => 'about_title', 'value' => 'About Me']);
        Setting::create(['key' => 'about_description', 'value' => '<p>I\'m a passionate Full Stack Developer with expertise in building modern web applications. I love creating clean, efficient, and user-friendly solutions.</p>']);

        // Skills
        $skills = [
            ['name' => 'Laravel', 'level' => 'Expert', 'category' => 'Backend', 'order' => 1],
            ['name' => 'PHP', 'level' => 'Expert', 'category' => 'Backend', 'order' => 2],
            ['name' => 'MySQL', 'level' => 'Expert', 'category' => 'Database', 'order' => 3],
            ['name' => 'JavaScript', 'level' => 'Expert', 'category' => 'Frontend', 'order' => 4],
            ['name' => 'Vue.js', 'level' => 'Intermediate', 'category' => 'Frontend', 'order' => 5],
            ['name' => 'React', 'level' => 'Intermediate', 'category' => 'Frontend', 'order' => 6],
            ['name' => 'Tailwind CSS', 'level' => 'Expert', 'category' => 'Frontend', 'order' => 7],
            ['name' => 'Git', 'level' => 'Expert', 'category' => 'DevOps', 'order' => 8],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Experiences
        Experience::create([
            'title' => 'Tech Company',
            'position' => 'Senior Full Stack Developer',
            'description' => 'Led development of multiple web applications using Laravel and Vue.js. Managed a team of 5 developers.',
            'start_year' => 2020,
            'end_year' => null,
            'is_current' => true,
            'order' => 1,
        ]);

        Experience::create([
            'title' => 'Startup Inc',
            'position' => 'Full Stack Developer',
            'description' => 'Developed and maintained various web applications. Worked with Laravel, React, and MySQL.',
            'start_year' => 2018,
            'end_year' => 2020,
            'is_current' => false,
            'order' => 2,
        ]);

        // Projects (Note: Add images via admin panel)
        // Project::create([
        //     'name' => 'E-Commerce Platform',
        //     'main_image' => 'projects/demo.jpg',
        //     'description' => '<p>A full-featured e-commerce platform with payment integration, inventory management, and admin dashboard.</p>',
        //     'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL'],
        //     'demo_link' => 'https://demo.example.com',
        //     'github_link' => 'https://github.com/username/project',
        //     'is_featured' => true,
        //     'order' => 1,
        // ]);

        // Certificates (Note: Add images via admin panel)
        // Certificate::create([
        //     'name' => 'Laravel Certified Developer',
        //     'image' => 'certificates/demo.jpg',
        //     'issuer' => 'Laravel',
        //     'year' => 2023,
        //     'verification_link' => 'https://verify.example.com',
        //     'order' => 1,
        // ]);
    }
}
