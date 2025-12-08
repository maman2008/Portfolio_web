# 🚀 Quick Start Guide

## Setup dalam 5 Menit

### 1. Install Dependencies
```bash
cd portfolio_web
composer install
npm install
```

### 2. Setup Database
Edit `.env`:
```env
DB_DATABASE=portfolio_maman
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Migrate & Seed
```bash
php artisan migrate
php artisan db:seed --class=PortfolioSeeder
```

### 4. Build & Link
```bash
npm run build
php artisan storage:link
```

### 5. Run Server
```bash
php artisan serve
```

## 🎯 Login Admin

- URL: http://localhost:8000/admin
- Email: admin@portfolio.com
- Password: password

## ✅ Checklist Setup

- [ ] Install dependencies
- [ ] Setup database
- [ ] Run migrations
- [ ] Seed data (atau buat admin manual)
- [ ] Build assets
- [ ] Storage link
- [ ] Login ke admin panel
- [ ] Upload profile image di Settings
- [ ] Isi About Me di Settings
- [ ] Upload CV di Settings
- [ ] Tambah minimal 3 skills
- [ ] Tambah minimal 1 experience
- [ ] Tambah minimal 1 project (dengan gambar)
- [ ] Test contact form
- [ ] Check responsive di mobile

## 🎨 Customization Cepat

### Ganti Warna Tema
Edit `resources/views/portfolio/index.blade.php`:

**Gradient Hero:**
```html
from-purple-400 via-pink-500 to-cyan-400
```
Ganti dengan:
```html
from-blue-400 via-indigo-500 to-purple-400
```

**Background:**
```html
from-slate-900 via-purple-900 to-slate-900
```

### Ganti Font
Edit di `<head>`:
```html
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
```

Dan di `<style>`:
```css
body {
    font-family: 'Poppins', sans-serif;
}
```

### Ganti Logo/Brand
Edit navigation:
```html
<a href="#home" class="text-2xl font-bold">
    Your Name
</a>
```

## 🐛 Common Issues

### Images tidak muncul
```bash
php artisan storage:link
```

### CSS tidak update
```bash
npm run build
php artisan optimize:clear
```

### Error 500
```bash
php artisan config:clear
php artisan cache:clear
```

### Register masih muncul
Sudah di-disable di `routes/auth.php`. Clear cache:
```bash
php artisan route:clear
```

## 📱 Test Responsive

1. Buka http://localhost:8000
2. Tekan F12 (Developer Tools)
3. Klik icon mobile/tablet
4. Test di berbagai ukuran:
   - iPhone SE (375px)
   - iPad (768px)
   - Desktop (1920px)

## 🎯 Next Steps

1. ✅ Setup selesai
2. 📝 Isi konten via admin panel
3. 🎨 Customize warna & font (opsional)
4. 📱 Test responsive
5. 🚀 Deploy ke hosting
6. 🔐 Ganti password admin
7. 📊 Tambah Google Analytics (opsional)
8. 🔍 Setup SEO meta tags (opsional)

## 💡 Tips

- Gunakan gambar berkualitas tinggi (min 1200px width)
- Compress gambar sebelum upload (gunakan TinyPNG)
- Isi deskripsi yang menarik dan profesional
- Update portfolio secara berkala
- Test di berbagai browser (Chrome, Firefox, Safari)
- Minta feedback dari teman/kolega

## 🎉 Selesai!

Portfolio website sudah siap! Sekarang tinggal:
1. Isi konten
2. Customize sesuai selera
3. Deploy ke hosting

**Happy coding! 🚀**
