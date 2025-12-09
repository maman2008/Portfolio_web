# ⚡ Quick Reference - Hero Section

## 🎯 Most Common Tasks

### Change Typing Text
**File**: `resources/views/portfolio/index.blade.php`
**Line**: ~870
```javascript
const roles = [
    'Your Role 1',
    'Your Role 2',
    'Your Role 3'
];
```

### Change Colors
**File**: `resources/views/portfolio/index.blade.php`
**Line**: ~150
```css
background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #667eea 100%);
```

### Adjust Animation Speed
**File**: `resources/views/portfolio/index.blade.php`
**Line**: ~860
```javascript
let typeSpeed = this.isDeleting ? 50 : 100;
```

### Change Image Size
**File**: `resources/views/portfolio/index.blade.php`
**Line**: ~330
```html
w-72 h-72 md:w-96 md:h-96 lg:w-[28rem] lg:h-[28rem]
```

### Modify Spacing
**File**: `resources/css/app.css`
**Line**: ~10
```css
.section-padding {
    @apply py-16 md:py-20 lg:py-24 xl:py-28;
}
```

---

## 🎨 Color Presets

### Purple (Default)
```css
#667eea, #764ba2, #8b5cf6
```

### Blue Ocean
```css
#4facfe, #00f2fe, #2196f3
```

### Sunset
```css
#ff6b6b, #feca57, #ff9ff3
```

### Forest
```css
#11998e, #38ef7d, #00d2ff
```

---

## 🔧 Essential Commands

```bash
# Build assets
npm run build

# Development mode
npm run dev

# Clear cache
php artisan optimize:clear

# Restart server
php artisan serve
```

---

## 📱 Breakpoints

| Size | Width | Padding |
|------|-------|---------|
| XS | < 640px | 1rem |
| SM | 640px+ | 1.5rem |
| MD | 768px+ | 2rem |
| LG | 1024px+ | 2.5rem |
| XL | 1280px+ | 3rem |

---

## 🎭 Animation Speeds

```javascript
// Fast
typeSpeed = this.isDeleting ? 30 : 60;

// Normal (Default)
typeSpeed = this.isDeleting ? 50 : 100;

// Slow
typeSpeed = this.isDeleting ? 80 : 150;
```

---

## 🐛 Quick Fixes

### Animation not working?
```bash
npm run build
php artisan cache:clear
# Hard refresh: Ctrl+Shift+R
```

### Image not showing?
```bash
php artisan storage:link
chmod -R 775 storage
```

### Spacing issues?
```bash
npm run build
# Clear browser cache
```

---

## 📚 Documentation Files

| File | Purpose |
|------|---------|
| `HERO_SECTION_UPGRADE.md` | Full feature list |
| `CUSTOMIZATION_GUIDE.md` | How to customize |
| `TROUBLESHOOTING.md` | Fix common issues |
| `UPGRADE_SUMMARY.md` | Overview of changes |
| `QUICK_REFERENCE.md` | This file |

---

## ✅ Testing Checklist

- [ ] Typing animation smooth
- [ ] Image hover works
- [ ] Responsive on mobile
- [ ] No console errors
- [ ] Smooth scrolling
- [ ] Performance > 85

---

## 🎁 Optional Features

```javascript
// Enable cursor trail
createCursorTrail();

// Enable particles
createParticles();
```

---

## 🚀 Performance Tips

1. Optimize images (WebP, < 500KB)
2. Use `npm run build` for production
3. Enable browser caching
4. Lazy load images
5. Minimize animations if needed

---

## 📞 Need Help?

1. Check browser console (F12)
2. Read `TROUBLESHOOTING.md`
3. Clear all caches
4. Test in incognito mode
5. Try different browser

---

**Quick Access**: Keep this file open while working! 📌
