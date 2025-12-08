# 📁 Project Structure

## Overview
```
portfolio_web/
├── app/
│   ├── Console/Commands/
│   │   └── CreateAdminUser.php          # Command untuk buat admin
│   ├── Filament/
│   │   ├── Pages/
│   │   │   └── Settings.php             # Settings page (CV, About, Hero)
│   │   └── Resources/
│   │       ├── CertificateResource.php  # CRUD Certificates
│   │       ├── ContactResource.php      # View Contact Messages
│   │       ├── ExperienceResource.php   # CRUD Experiences
│   │       ├── ProjectResource.php      # CRUD Projects
│   │       └── SkillResource.php        # CRUD Skills
│   ├── Http/Controllers/
│   │   └── PortfolioController.php      # Controller untuk public portfolio
│   └── Models/
│       ├── Certificate.php              # Model Certificate
│       ├── Contact.php                  # Model Contact
│       ├── Experience.php               # Model Experience
│       ├── Project.php                  # Model Project
│       ├── Setting.php                  # Model Setting (key-value)
│       ├── Skill.php                    # Model Skill
│       └── User.php                     # Model User (admin)
├── database/
│   ├── migrations/
│   │   ├── *_create_experiences_table.php
│   │   ├── *_create_projects_table.php
│   │   ├── *_create_skills_table.php
│   │   ├── *_create_certificates_table.php
│   │   ├── *_create_contacts_table.php
│   │   └── *_create_settings_table.php
│   └── seeders/
│       └── PortfolioSeeder.php          # Seeder data dummy
├── resources/
│   ├── css/
│   │   └── app.css                      # Tailwind CSS
│   ├── js/
│   │   └── app.js                       # JavaScript
│   └── views/
│       ├── filament/pages/
│       │   └── settings.blade.php       # View Settings page
│       └── portfolio/
│           └── index.blade.php          # Main portfolio page
├── routes/
│   ├── auth.php                         # Auth routes (register disabled)
│   └── web.php                          # Web routes (portfolio)
├── storage/app/public/                  # Storage untuk upload files
│   ├── certificates/                    # Gambar certificates
│   ├── cv/                              # File CV (PDF)
│   ├── experiences/                     # Gambar experiences
│   ├── profile/                         # Profile image
│   ├── projects/                        # Gambar projects
│   │   └── gallery/                     # Multiple images projects
│   └── skills/                          # Icon/logo skills
├── .env                                 # Environment config
├── composer.json                        # PHP dependencies
├── package.json                         # Node dependencies
├── tailwind.config.js                   # Tailwind config
├── vite.config.js                       # Vite config
├── QUICK_START.md                       # Quick start guide
├── README_PORTFOLIO.md                  # Full documentation
└── PROJECT_STRUCTURE.md                 # This file
```

## 🗄️ Database Tables

### users
- id
- name
- email
- password
- timestamps

### experiences
- id
- image (nullable)
- title
- position
- description
- start_year
- end_year (nullable)
- is_current (boolean)
- order
- timestamps

### projects
- id
- name
- main_image
- images (json, nullable)
- description (text)
- demo_link (nullable)
- github_link (nullable)
- technologies (json, nullable)
- is_featured (boolean)
- order
- timestamps

### skills
- id
- name
- icon (nullable)
- level (enum: Beginner, Intermediate, Expert)
- category (nullable)
- order
- timestamps

### certificates
- id
- name
- image
- issuer
- year
- verification_link (nullable)
- order
- timestamps

### contacts
- id
- name
- email
- message (text)
- is_read (boolean)
- timestamps

### settings
- id
- key (unique)
- value (text, nullable)
- timestamps

**Settings Keys:**
- `hero_title` - Hero section title
- `hero_subtitle` - Hero section subtitle
- `about_title` - About section title
- `about_description` - About section description (HTML)
- `profile_image` - Profile image path
- `cv_file` - CV file path (PDF)

## 🎨 Frontend Components

### Navigation
- Fixed navbar dengan backdrop blur
- Mobile menu (hamburger)
- Smooth scroll ke sections

### Sections
1. **Hero** - Gradient title, subtitle, CTA buttons
2. **About** - Profile image + description
3. **Skills** - Grid cards dengan kategori dan level
4. **Experience** - Timeline cards
5. **Projects** - Grid cards dengan hover effect
6. **Certificates** - Grid cards
7. **Contact** - Form kontak
8. **Footer** - Copyright

### Styling
- **Colors**: Purple, Pink, Cyan gradients
- **Font**: Inter (Google Fonts)
- **Animations**: AOS (Animate On Scroll)
- **Responsive**: Mobile-first design
- **Effects**: Hover, shadow, transitions

## 🔧 Key Files

### Configuration
- `.env` - Environment variables
- `config/filesystems.php` - Storage config
- `tailwind.config.js` - Tailwind customization
- `vite.config.js` - Asset bundling

### Routes
- `routes/web.php` - Public routes
- `routes/auth.php` - Auth routes (register disabled)
- Filament routes auto-registered

### Controllers
- `PortfolioController` - Handle public portfolio
  - `index()` - Show portfolio
  - `contact()` - Handle contact form
  - `downloadCV()` - Download CV file

### Models
All models use:
- `$fillable` - Mass assignment protection
- `$casts` - Type casting (json, boolean)
- Relationships (if any)

### Filament Resources
Each resource has:
- `form()` - Form fields untuk create/edit
- `table()` - Table columns untuk list
- `getPages()` - Pages (index, create, edit)
- Navigation icon & group

### Migrations
- Create tables dengan proper columns
- Indexes untuk performance
- Foreign keys (if any)

## 🚀 Workflow

### Development
1. Edit models/migrations
2. Run `php artisan migrate`
3. Edit Filament resources
4. Edit views
5. Edit Tailwind classes
6. Run `npm run dev`
7. Test di browser

### Production
1. Run `npm run build`
2. Run `php artisan optimize`
3. Upload to server
4. Run migrations
5. Setup storage link
6. Create admin user

## 📦 Dependencies

### PHP (Composer)
- `laravel/framework` - Laravel core
- `laravel/breeze` - Authentication
- `filament/filament` - Admin panel
- Other Laravel packages

### JavaScript (NPM)
- `vite` - Asset bundler
- `tailwindcss` - CSS framework
- `@tailwindcss/typography` - Prose styling
- `@tailwindcss/forms` - Form styling
- `aos` - Scroll animations (CDN)

## 🔐 Security

### Authentication
- Laravel Breeze (login only)
- Register disabled
- Password hashing (bcrypt)
- CSRF protection

### File Upload
- Validation (image, pdf)
- Max size limits
- Stored in `storage/app/public`
- Accessed via symlink

### Database
- Prepared statements (Eloquent)
- Mass assignment protection
- Input validation

## 🎯 Features Checklist

### Admin Panel ✅
- [x] CRUD Experiences
- [x] CRUD Projects (with multiple images)
- [x] CRUD Skills (with categories)
- [x] CRUD Certificates
- [x] Settings (CV, About, Hero)
- [x] View Contact Messages
- [x] File uploads (images, PDF)
- [x] Rich text editor
- [x] Image editor
- [x] Sorting/ordering

### Public Portfolio ✅
- [x] Modern hero section
- [x] About section
- [x] Skills grid (categorized)
- [x] Experience timeline
- [x] Projects showcase
- [x] Certificates gallery
- [x] Contact form
- [x] Download CV
- [x] Responsive design
- [x] Smooth animations
- [x] Mobile menu

### UI/UX ✅
- [x] Modern gradient design
- [x] Clean typography
- [x] Smooth animations
- [x] Hover effects
- [x] Mobile responsive
- [x] Fast loading
- [x] Accessible

## 📝 Notes

- Register sudah di-disable di `routes/auth.php`
- Storage link harus dibuat: `php artisan storage:link`
- Assets harus di-build: `npm run build`
- Seeder optional, bisa buat data manual via admin
- Customize warna di view portfolio
- Tambah social media links di footer (manual)
- SEO meta tags bisa ditambahkan di head
- Google Analytics bisa ditambahkan (optional)

---

**Happy coding! 🚀**
