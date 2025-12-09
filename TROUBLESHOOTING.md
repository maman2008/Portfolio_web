# 🔧 Troubleshooting Guide - Hero Section

## ❌ Masalah Umum & Solusi

### 1. Typing Animation Tidak Muncul

**Gejala**: Teks tidak beranimasi, langsung muncul semua

**Solusi**:
```bash
# 1. Clear cache browser (Ctrl+Shift+R atau Cmd+Shift+R)

# 2. Rebuild assets
npm run build

# 3. Clear Laravel cache
php artisan cache:clear
php artisan view:clear
```

**Cek JavaScript Console**:
- Buka Developer Tools (F12)
- Lihat tab Console
- Pastikan tidak ada error JavaScript

---

### 2. Gambar Profile Tidak Muncul

**Gejala**: Gambar tidak tampil atau broken image

**Solusi**:
```bash
# 1. Pastikan storage link sudah dibuat
php artisan storage:link

# 2. Cek permission folder
chmod -R 775 storage
chmod -R 775 public/storage

# 3. Cek file ada di storage/app/public
ls -la storage/app/public
```

**Upload ulang gambar** melalui admin panel jika perlu.

---

### 3. Hover Effect Tidak Bekerja

**Gejala**: Gambar tidak bergerak saat di-hover

**Solusi**:
```javascript
// Pastikan JavaScript sudah load
// Cek di browser console:
console.log('Profile container:', document.querySelector('.profile-image-container'));

// Jika null, berarti selector salah atau element belum load
```

**Fix**:
- Pastikan class `profile-image-container` ada di HTML
- Wrap JavaScript dalam `DOMContentLoaded` event
- Clear browser cache

---

### 4. Spacing/Padding Tidak Rapih

**Gejala**: Margin kiri-kanan tidak konsisten

**Solusi**:
```bash
# 1. Rebuild Tailwind CSS
npm run build

# 2. Cek tailwind.config.js
# Pastikan tidak ada custom config yang override

# 3. Inspect element di browser
# Lihat computed styles untuk debug
```

**Manual Fix**:
```css
/* Tambahkan di custom CSS jika perlu */
.container-custom {
    padding-left: 1rem !important;
    padding-right: 1rem !important;
}
```

---

### 5. Animasi Terlalu Cepat/Lambat

**Gejala**: Typing terlalu cepat atau lambat

**Solusi**:
```javascript
// Ubah speed di JavaScript
let typeSpeed = this.isDeleting ? 50 : 100;

// Untuk lebih lambat:
let typeSpeed = this.isDeleting ? 80 : 150;

// Untuk lebih cepat:
let typeSpeed = this.isDeleting ? 30 : 60;
```

---

### 6. Gradient Tidak Muncul

**Gejala**: Teks gradient tampil hitam/putih polos

**Solusi**:
```css
/* Pastikan CSS ini ada */
.gradient-text {
    background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #667eea 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
```

**Browser Support**:
- Chrome: ✅ Full support
- Firefox: ✅ Full support
- Safari: ✅ Full support
- Edge: ✅ Full support

---

### 7. Mobile Responsive Bermasalah

**Gejala**: Layout berantakan di mobile

**Solusi**:
```html
<!-- Pastikan viewport meta tag ada -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

**Test di berbagai ukuran**:
```bash
# Chrome DevTools
# 1. F12 untuk buka DevTools
# 2. Ctrl+Shift+M untuk toggle device toolbar
# 3. Test di berbagai device presets
```

---

### 8. AOS Animation Tidak Jalan

**Gejala**: Scroll animation tidak trigger

**Solusi**:
```javascript
// Pastikan AOS initialized
AOS.init({
    duration: 800,
    once: true,
    offset: 100
});

// Refresh AOS setelah content load
AOS.refresh();
```

**Cek CDN**:
```html
<!-- Pastikan CDN link benar -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
```

---

### 9. Performance Lambat

**Gejala**: Website loading lambat atau lag

**Solusi**:
```javascript
// 1. Disable particle effect jika tidak perlu
// Comment out: createParticles();

// 2. Disable cursor trail jika tidak perlu
// Comment out: createCursorTrail();

// 3. Optimize images
// Compress images sebelum upload
// Recommended: WebP format, max 500KB
```

**Optimize Assets**:
```bash
# Build production
npm run build

# Minify CSS & JS otomatis
```

---

### 10. Scroll Tidak Smooth

**Gejala**: Scroll tersendat atau tidak smooth

**Solusi**:
```css
/* Pastikan CSS ini ada */
html {
    scroll-behavior: smooth;
}

/* Atau gunakan JavaScript */
window.scrollTo({
    top: targetPosition,
    behavior: 'smooth'
});
```

---

## 🔍 Debugging Tools

### 1. Browser Console
```javascript
// Log untuk debug
console.log('Element:', document.querySelector('.profile-image-container'));
console.log('Typing element:', document.getElementById('typing-role'));
```

### 2. Inspect Element
- Right click → Inspect
- Lihat computed styles
- Cek applied CSS classes

### 3. Network Tab
- Cek apakah semua assets load
- Lihat response time
- Cek 404 errors

### 4. Performance Tab
- Record page load
- Analyze bottlenecks
- Check FPS during animations

---

## 🚨 Error Messages & Fixes

### Error: "Cannot read property 'addEventListener' of null"
**Penyebab**: Element tidak ditemukan

**Fix**:
```javascript
// Wrap dalam null check
const element = document.querySelector('.my-element');
if (element) {
    element.addEventListener('click', () => {
        // your code
    });
}
```

### Error: "Uncaught ReferenceError: AOS is not defined"
**Penyebab**: AOS library belum load

**Fix**:
```html
<!-- Pastikan script AOS sebelum init -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
```

### Error: "Failed to load resource: net::ERR_FILE_NOT_FOUND"
**Penyebab**: File path salah atau file tidak ada

**Fix**:
```bash
# Rebuild assets
npm run build

# Clear cache
php artisan cache:clear
php artisan view:clear
```

---

## 📱 Browser Compatibility Issues

### Safari Issues
```css
/* Add vendor prefixes */
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
```

### Firefox Issues
```css
/* Use standard properties */
background-clip: text;
```

### IE11 (Not Supported)
- Gradient text tidak support
- CSS Grid tidak support
- Gunakan fallback styles

---

## 🎯 Performance Checklist

- [ ] Images optimized (WebP, compressed)
- [ ] CSS minified (npm run build)
- [ ] JavaScript minified
- [ ] Unused CSS removed
- [ ] Lazy loading implemented
- [ ] Browser caching enabled
- [ ] CDN untuk static assets
- [ ] Gzip compression enabled

---

## 🔄 Reset to Default

Jika semua gagal, reset ke default:

```bash
# 1. Backup file Anda
cp resources/views/portfolio/index.blade.php resources/views/portfolio/index.blade.php.backup

# 2. Clear all cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear

# 3. Rebuild assets
npm run build

# 4. Restart server
php artisan serve
```

---

## 📞 Getting Help

### Check Documentation
1. `HERO_SECTION_UPGRADE.md` - Feature list
2. `CUSTOMIZATION_GUIDE.md` - How to customize
3. `TROUBLESHOOTING.md` - This file

### Debug Steps
1. Check browser console for errors
2. Inspect element styles
3. Test in incognito mode
4. Try different browser
5. Clear all caches

### Common Commands
```bash
# Clear everything
php artisan optimize:clear

# Rebuild assets
npm run build

# Restart server
php artisan serve

# Check logs
tail -f storage/logs/laravel.log
```

---

## ✅ Verification Checklist

Setelah fix, pastikan:

- [ ] Typing animation berjalan smooth
- [ ] Profile image hover bekerja
- [ ] Spacing konsisten di semua breakpoint
- [ ] No console errors
- [ ] Responsive di mobile
- [ ] Performance score > 90 (Lighthouse)
- [ ] Cross-browser compatible
- [ ] Smooth scrolling works

---

**Masih ada masalah?**
1. Check browser console (F12)
2. Review code comments
3. Test in different browser
4. Clear all caches
5. Rebuild from scratch if needed

**Good luck! 🚀**
