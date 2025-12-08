# Portfolio Website - Laravel + Filament 4

Portfolio website modern dengan Laravel, Breeze (login only), dan Filament 4 sebagai admin panel.

## 🚀 Fitur

### Admin Panel (Filament 4)
- ✅ CRUD Pengalaman (Experience) - gambar, title, posisi, deskripsi, tahun
- ✅ CRUD Project - gambar utama, multiple images, nama, link demo/github, deskripsi, teknologi
- ✅ CRUD Skill - icon/logo, nama, level (Beginner/Intermediate/Expert), kategori
- ✅ CRUD Sertifikat - gambar, nama, penyelenggara, tahun, link verifikasi
- ✅ Settings Page - Upload CV (PDF), About Me, Hero Section, Profile Image
- ✅ Contact Messages - View pesan dari user (read-only)

### Public Portfolio
- ✅ Hero Section - Modern dengan gradient dan animasi
- ✅ About Section - Profile image dan deskripsi
- ✅ Skills Section - Grid card dengan kategori dan level
- ✅ Experience Section - Timeline pengalaman kerja
- ✅ Projects Section - Grid project dengan hover effect
- ✅ Certificates Section - Grid sertifikat
- ✅ Contact Form - Form kontak yang tersimpan ke database
- ✅ Download CV - Button untuk download CV

### UI/UX
- ✅ Design modern dengan gradient purple, pink, cyan
- ✅ Typography clean (Inter font)
- ✅ Fully responsive (mobile, tablet, desktop)
- ✅ Smooth animations dengan AOS (Animate On Scroll)
- ✅ Hover effects dan transitions
- ✅ Shadow dan border-radius modern

## 📦 Instalasi

### Requirements
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL

### Setup

1. **Clone atau sudah ada project**
```bash
cd portfolio_web
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database di .env**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_maman
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations**
```bash
php artisan migrate
```

6. **Create admin user**
```bash
php artisan admin:create
```
Atau seed data dummy:
```bash
php artisan db:seed --class=PortfolioSeeder
```
Login: admin@portfolio.com / password

7. **Build assets**
```bash
npm run build
# atau untuk development
npm run dev
```

8. **Create storage link**
```bash
php artisan storage:link
```

9. **Run server**
```bash
php artisan serve
```

## 🎯 Akses

- **Public Portfolio**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin
- **Login**: http://localhost:8000/login

## 📝 Cara Penggunaan

### 1. Login ke Admin Panel
- Akses `/admin`
- Login dengan kredensial admin
- Register sudah di-disable

### 2. Setup Settings
- Buka menu "Settings"
- Upload profile image
- Isi Hero Title & Subtitle
- Isi About Me
- Upload CV (PDF)

### 3. Tambah Skills
- Buka menu "Skills"
- Klik "New Skill"
- Isi nama skill
- Upload icon/logo (opsional)
- Pilih level (Beginner/Intermediate/Expert)
- Isi kategori (Backend, Frontend, Database, dll)
- Set display order

### 4. Tambah Experience
- Buka menu "Experiences"
- Klik "New Experience"
- Upload gambar company (opsional)
- Isi title, position, description
- Isi tahun mulai dan akhir
- Centang "is_current" jika masih bekerja

### 5. Tambah Projects
- Buka menu "Projects"
- Klik "New Project"
- Upload gambar utama
- Upload multiple images (opsional)
- Isi nama project dan deskripsi
- Isi link demo dan github
- Tambah teknologi yang digunakan
- Centang "Featured" untuk highlight
- Set display order

### 6. Tambah Certificates
- Buka menu "Certificates"
- Klik "New Certificate"
- Upload gambar sertifikat
- Isi nama, penyelenggara, tahun
- Isi link verifikasi (opsional)

### 7. Lihat Contact Messages
- Buka menu "Contacts"
- Lihat pesan dari user
- Mark as read
- Delete jika perlu

## 🎨 Customization

### Warna
Edit `portfolio_web/resources/views/portfolio/index.blade.php`:
- Gradient: `from-purple-400 to-pink-600`
- Background: `from-slate-900 via-purple-900 to-slate-900`
- Accent: `purple-500`, `pink-600`, `cyan-400`

### Font
Edit di `<head>`:
```html
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
```

### Animasi
Edit AOS settings di bagian bawah:
```javascript
AOS.init({
    duration: 800,  // durasi animasi
    once: true,     // animasi hanya sekali
    offset: 100     // offset trigger
});
```

## 🔧 Teknologi

- **Backend**: Laravel 11
- **Auth**: Laravel Breeze (Login only)
- **Admin Panel**: Filament 4
- **Frontend**: Blade + Tailwind CSS
- **Animations**: AOS (Animate On Scroll)
- **Typography**: Inter Font
- **Database**: MySQL

## 📱 Responsive Breakpoints

- Mobile: < 768px
- Tablet: 768px - 1024px
- Desktop: > 1024px

## 🐛 Troubleshooting

### Images tidak muncul
```bash
php artisan storage:link
```

### CSS tidak update
```bash
npm run build
php artisan optimize:clear
```

### Error 500 di admin
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## 📄 License

Open source - silakan digunakan dan dimodifikasi sesuai kebutuhan.

## 🎉 Selesai!

Portfolio website sudah siap digunakan! Tinggal isi konten via admin panel dan deploy ke hosting.

**Tips**: 
- Gunakan gambar berkualitas tinggi
- Isi deskripsi yang menarik
- Update portfolio secara berkala
- Tambahkan link social media di footer (custom sendiri)

Selamat menggunakan! 🚀


## 🚀 Deployment

### Shared Hosting (cPanel)

1. **Build assets locally**
```bash
npm run build
```

2. **Upload files**
- Upload semua file kecuali `node_modules` dan `.git`
- Pastikan folder `storage` dan `bootstrap/cache` writable (755)

3. **Setup .htaccess di public_html**
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

4. **Setup database**
- Buat database di cPanel
- Import atau jalankan migrations via SSH/terminal

5. **Setup .env**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

6. **Run commands via SSH**
```bash
php artisan migrate --force
php artisan storage:link
php artisan optimize
php artisan admin:create
```

### VPS (Ubuntu/Nginx)

1. **Install requirements**
```bash
sudo apt update
sudo apt install php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl
sudo apt install nginx mysql-server composer nodejs npm
```

2. **Clone & setup**
```bash
cd /var/www
git clone your-repo portfolio
cd portfolio
composer install --optimize-autoloader --no-dev
npm install && npm run build
```

3. **Setup Nginx**
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/portfolio/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

4. **Set permissions**
```bash
sudo chown -R www-data:www-data /var/www/portfolio
sudo chmod -R 755 /var/www/portfolio
sudo chmod -R 775 /var/www/portfolio/storage
sudo chmod -R 775 /var/www/portfolio/bootstrap/cache
```

5. **Setup SSL (Let's Encrypt)**
```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d yourdomain.com
```

## 🔐 Security Tips

1. **Disable register** - Sudah di-disable di `routes/auth.php`
2. **Change admin URL** - Edit `AdminPanelProvider.php`:
```php
->path('admin-secret-path')
```
3. **Enable 2FA** - Install Filament Shield plugin
4. **Rate limiting** - Sudah aktif di Laravel
5. **Update regularly**
```bash
composer update
npm update
```

## 📊 Performance Tips

1. **Enable caching**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

2. **Optimize images**
- Compress images sebelum upload
- Gunakan WebP format
- Lazy loading sudah aktif

3. **Enable CDN**
- Upload assets ke CDN
- Update asset URLs di config

4. **Database indexing**
- Index sudah ada di migrations
- Monitor slow queries

## 🎨 Customization Ideas

### Tambah Social Media Links
Edit footer di `portfolio/index.blade.php`:
```html
<div class="flex justify-center space-x-6 mb-4">
    <a href="https://github.com/username" class="hover:text-purple-400">
        <svg class="w-6 h-6"><!-- GitHub icon --></svg>
    </a>
    <a href="https://linkedin.com/in/username" class="hover:text-purple-400">
        <svg class="w-6 h-6"><!-- LinkedIn icon --></svg>
    </a>
</div>
```

### Tambah Dark/Light Mode Toggle
Install package atau custom dengan JavaScript + Tailwind dark mode.

### Tambah Blog Section
Buat model Blog, migration, Filament resource, dan view.

### Tambah Analytics
Tambahkan Google Analytics di layout:
```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
```

### Tambah SEO Meta Tags
Edit head section:
```html
<meta name="description" content="Portfolio description">
<meta property="og:title" content="Portfolio Title">
<meta property="og:image" content="image-url">
```

## 📞 Support

Jika ada pertanyaan atau issue:
1. Check dokumentasi Laravel: https://laravel.com/docs
2. Check dokumentasi Filament: https://filamentphp.com/docs
3. Check Tailwind CSS: https://tailwindcss.com/docs

---

**Dibuat dengan ❤️ menggunakan Laravel + Filament + Tailwind CSS**
