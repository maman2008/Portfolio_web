# 🎨 Panduan Kustomisasi Hero Section

## 🚀 Quick Start

### 1. Mengubah Teks Typing Animation

**Lokasi**: `resources/views/portfolio/index.blade.php` (bagian JavaScript)

```javascript
// Cari bagian ini:
const roles = [
    'Full Stack Developer',
    'Laravel Expert',
    'Flutter Developer',
    'UI/UX Enthusiast',
    'Problem Solver'
];

// Ganti dengan role Anda:
const roles = [
    'Web Developer',
    'Mobile App Developer',
    'Your Custom Role',
];
```

### 2. Mengubah Kecepatan Typing

```javascript
// Cari bagian ini:
let typeSpeed = this.isDeleting ? 50 : 100;

// Ubah angka:
// - Angka lebih kecil = lebih cepat
// - Angka lebih besar = lebih lambat
let typeSpeed = this.isDeleting ? 30 : 80; // Lebih cepat
```

### 3. Mengubah Warna Gradient

**Lokasi**: `resources/views/portfolio/index.blade.php` (bagian CSS)

```css
/* Cari bagian gradient-text */
background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #667eea 100%);

/* Ganti dengan warna pilihan Anda */
background: linear-gradient(90deg, #FF6B6B 0%, #4ECDC4 50%, #FF6B6B 100%);
```

### 4. Mengubah Ukuran Profile Image

**Lokasi**: `resources/views/portfolio/index.blade.php` (bagian Hero Section)

```html
<!-- Cari bagian ini: -->
<div class="profile-image-container relative w-72 h-72 sm:w-80 sm:h-80 md:w-96 md:h-96 lg:w-[28rem] lg:h-[28rem]">

<!-- Ubah ukuran sesuai kebutuhan: -->
<div class="profile-image-container relative w-64 h-64 sm:w-72 sm:h-72 md:w-80 md:h-80 lg:w-96 lg:h-96">
```

### 5. Mengubah Spacing/Padding

**Lokasi**: `resources/css/app.css`

```css
/* Ubah section padding */
.section-padding {
    @apply py-16 md:py-20 lg:py-24 xl:py-28;
}

/* Ubah container padding */
.container-padding {
    @apply px-4 sm:px-6 md:px-8 lg:px-10 xl:px-12;
}
```

## 🎨 Preset Warna

### Preset 1: Purple Dream (Default)
```css
--primary: #667eea;
--secondary: #764ba2;
--accent: #8b5cf6;
```

### Preset 2: Ocean Blue
```css
--primary: #4facfe;
--secondary: #00f2fe;
--accent: #2196f3;
```

### Preset 3: Sunset Orange
```css
--primary: #ff6b6b;
--secondary: #feca57;
--accent: #ff9ff3;
```

### Preset 4: Forest Green
```css
--primary: #11998e;
--secondary: #38ef7d;
--accent: #00d2ff;
```

### Preset 5: Rose Gold
```css
--primary: #f857a6;
--secondary: #ff5858;
--accent: #ff6b9d;
```

## 🎭 Animasi Presets

### Animasi Cepat
```javascript
// Typing speed
let typeSpeed = this.isDeleting ? 30 : 60;

// Transition duration
transition: all 0.2s ease;
```

### Animasi Lambat (Smooth)
```javascript
// Typing speed
let typeSpeed = this.isDeleting ? 80 : 150;

// Transition duration
transition: all 0.8s ease;
```

### Animasi Sedang (Recommended)
```javascript
// Typing speed
let typeSpeed = this.isDeleting ? 50 : 100;

// Transition duration
transition: all 0.5s ease;
```

## 📱 Responsive Customization

### Mobile First Approach
```css
/* Base (Mobile) */
.hero-title {
    font-size: 2rem; /* 32px */
}

/* Tablet */
@media (min-width: 768px) {
    .hero-title {
        font-size: 3rem; /* 48px */
    }
}

/* Desktop */
@media (min-width: 1024px) {
    .hero-title {
        font-size: 4rem; /* 64px */
    }
}
```

## 🎯 Tips & Tricks

### 1. Membuat Gradient Custom
```css
/* Linear Gradient */
background: linear-gradient(135deg, color1, color2);

/* Radial Gradient */
background: radial-gradient(circle, color1, color2);

/* Multi-color Gradient */
background: linear-gradient(135deg, color1 0%, color2 50%, color3 100%);
```

### 2. Mengatur Animation Delay
```css
/* Delay untuk elemen kedua */
animation-delay: 0.2s;

/* Delay untuk elemen ketiga */
animation-delay: 0.4s;
```

### 3. Custom Hover Effect
```css
.custom-hover {
    transition: all 0.3s ease;
}

.custom-hover:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}
```

## 🔧 Advanced Customization

### Mengubah Typing Cursor
```css
.typing-cursor {
    animation: blink 0.7s infinite;
    color: #8b5cf6; /* Ubah warna cursor */
    font-weight: 300;
}

/* Ubah kecepatan blink */
@keyframes blink {
    0%, 50% { opacity: 1; }
    51%, 100% { opacity: 0; }
}
```

### Custom Glow Effect
```css
.custom-glow {
    box-shadow: 
        0 0 20px rgba(139, 92, 246, 0.3),
        0 0 40px rgba(139, 92, 246, 0.2),
        0 0 60px rgba(139, 92, 246, 0.1);
}
```

### Parallax Intensity
```javascript
// Cari bagian parallax effect
const rotateX = (y - centerY) / 20; // Ubah 20 untuk intensity
const rotateY = (centerX - x) / 20; // Lebih kecil = lebih intense
```

## 📦 Component Reusability

### Button Component
```html
<!-- Primary Button -->
<a href="#" class="btn-primary">
    <span>Button Text</span>
    <svg><!-- icon --></svg>
</a>

<!-- Secondary Button -->
<a href="#" class="btn-secondary">
    <span>Button Text</span>
    <svg><!-- icon --></svg>
</a>
```

### Card Component
```html
<div class="card-base card-gradient-border">
    <!-- Card content -->
</div>
```

## 🎨 Color Utilities

### Tailwind Custom Colors
```javascript
// tailwind.config.js
module.exports = {
    theme: {
        extend: {
            colors: {
                'custom-purple': '#667eea',
                'custom-indigo': '#764ba2',
            }
        }
    }
}
```

## 🚀 Performance Tips

1. **Gunakan CSS transforms** untuk animasi (bukan position)
2. **Batasi jumlah particles** jika menggunakan particle effect
3. **Gunakan `will-change`** untuk elemen yang sering beranimasi
4. **Optimize images** sebelum upload
5. **Lazy load** untuk images di bawah fold

## 📝 Checklist Customization

- [ ] Ubah typing roles sesuai profesi
- [ ] Sesuaikan warna gradient dengan brand
- [ ] Atur kecepatan animasi
- [ ] Upload profile image berkualitas tinggi
- [ ] Test responsive di berbagai device
- [ ] Cek performance dengan Lighthouse
- [ ] Validasi accessibility
- [ ] Test di berbagai browser

## 🎉 Bonus Features

### Aktifkan Cursor Trail
```javascript
// Uncomment baris ini:
createCursorTrail();
```

### Aktifkan Particles
```javascript
// Uncomment baris ini:
createParticles();
```

### Custom Particle Count
```javascript
// Ubah jumlah particles
for (let i = 0; i < 30; i++) { // Ubah 30 ke angka lain
    // particle creation code
}
```

---

**Need Help?** 
- Check documentation: `HERO_SECTION_UPGRADE.md`
- Review code comments in the files
- Test changes in development mode first

**Happy Customizing! 🎨✨**
