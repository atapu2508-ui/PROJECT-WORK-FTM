<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- favicon  -->
<!-- filepath: resources/views/dashboard.blade.php -->
<link rel="icon" type="image/png" href="{{ asset('icons/favicon.jpg') }}" />
    <!-- end favicon  -->
    <title>FTM SOCIETY - Muslimah-Only Gym</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config = { theme: { extend: { colors: { primary: "#E8618C", secondary: "#6B2D4E", accent: "#1A7A6E", "light-pink": "#E8C4D8", cream: "#F5EFE6", dark: "#1C1C1E", "springs-ivy": "#1A5C4A", "grounded-green": "#C8D9A0", "power-pink": "#E8618C", "burnt-cherry": "#6B2D4E", "soft-petals": "#E8C4D8", "patina-green": "#1A7A6E", "layl": "#1C1C1E", "rising": "#F5EFE6" }, fontFamily: { nord: ['Nord', 'Poppins', 'sans-serif'], instrument: ['"Instrument Serif"', 'Georgia', 'serif'], poppins: ['Poppins', 'sans-serif'] }, borderRadius: { button: "8px" } } } };</script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />

    {{-- ═══════════════════════════════════════════════════════ --}}
    {{-- FTM BRAND TYPOGRAPHY — Self-hosted Nord + Instrument     --}}
    {{-- ═══════════════════════════════════════════════════════ --}}
    <link rel="preload" href="{{ asset('fonts/Nord-Black.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/Nord-Bold.woff2') }}"  as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/Nord-Book.woff2') }}"  as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/ftm-typography.css') }}">
    <style>
            /* Body & layout helpers (typography handled by ftm-typography.css) */
      body {
        scroll-behavior: smooth;
        overflow-x: hidden;
      }
      p {
        line-height: 1.65;
      }
      h1, h2, h3, h4, h5, h6 {
        line-height: 1.15;
        letter-spacing: -0.01em;
      }
      nav,
      button,
      a,
      span,
      label {
        letter-spacing: 0.2px;
      }
      nav a,
      button {
        font-weight: 600;
      }
      input,
      select,
      textarea,
      option,
      summary {
        font-family: 'Poppins', sans-serif;
      }
      i[class^="ri-"],
      i[class*=" ri-"] {
        font-family: 'remixicon' !important;
      }
      @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px);}
        to { opacity: 1; transform: translateY(0);}
      }
      .scroll-animate {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.7s cubic-bezier(.4,0,.2,1), transform 0.7s cubic-bezier(.4,0,.2,1);
      }
      .scroll-animate.visible {
        opacity: 1;
        transform: translateY(0);
        animation: fadeInUp 0.7s cubic-bezier(.4,0,.2,1);
      }
      
      .logo {
        font-family: 'Nord', sans-serif;
        font-weight: 900;
      }
      .hero-section {
      background-image: linear-gradient(135deg, rgba(107, 45, 78, 0.88) 0%, rgba(232, 97, 140, 0.82) 100%), url('./images/IMG_0278.jpg');
      background-size: cover;
      background-position: center;
      }
      .testimonial-section {
      background-image: linear-gradient(rgba(232, 196, 216, 0.15), rgba(200, 217, 160, 0.1)), url('https://readdy.ai/api/search-image?query=subtle%2520elegant%2520pattern%2520background%252C%2520very%2520light%2520and%2520minimal%252C%2520soft%2520pink%2520and%2520beige%2520tones%252C%2520delicate%2520Islamic%2520geometric%2520patterns%252C%2520barely%2520visible%252C%2520extremely%2520subtle%2520texture%252C%2520professional%2520photography&width=1920&height=600&seq=2&orientation=landscape');
      background-size: cover;
      background-position: center;
      }
      .nav-link {
      position: relative;
      }
      .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: primary;
      transition: width 0.3s;
      }
      .nav-link:hover::after {
      width: 100%;
      }
      .class-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px -5px rgba(232, 97, 140, 0.2);
      }
      .feature-card:hover {
      transform: translateY(-5px);
      }
      input:focus, textarea:focus {
      outline: none;
      border-color: primary;
      }
      .custom-checkbox {
      appearance: none;
      -webkit-appearance: none;
      width: 20px;
      height: 20px;
      border: 2px solid primary;
      border-radius: 4px;
      outline: none;
      cursor: pointer;
      position: relative;
      }
      .custom-checkbox:checked {
      background-color: primary;
      }
      .custom-checkbox:checked::after {
      content: '✓';
      position: absolute;
      color: white;
      font-size: 14px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      }
      .faq-item.active .faq-answer {
      max-height: 1000px;
      opacity: 1;
      padding: 1rem 0;
      }
      .faq-item.active .faq-icon {
      transform: rotate(180deg);
      }
      .faq-answer {
      max-height: 0;
      opacity: 0;
      overflow: hidden;
      transition: all 0.3s ease;
      }
      .mobile-menu {
      transform: translateX(100%);
      transition: transform 0.3s ease-in-out;
      }
      .mobile-menu.active {
      transform: translateX(0);
      }
      .Facility-image:hover .overlay {
      opacity: 1;
      }
  @keyframes fadeIn {
  from { opacity: 0; transform: scale(0.95);}
  to { opacity: 1; transform: scale(1);}
}
.animate-fadeIn {
  animation: fadeIn 0.3s ease;
}

/* ============================================ */
/* FTM SOCIETY BRAND ORNAMENTS & SIGNATURE      */
/* Ciri khas visual - Flower, Asterisk, C-mark  */
/* ============================================ */

/* Brand Flower Ornament (4-petal) - inline SVG as background */
.brand-flower {
  display: inline-block;
  width: 40px;
  height: 40px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%231C1C1E' d='M50 8c-13 0-20 10-20 20 0 6 3 11 7 14-6 3-10 8-10 15 0 10 9 18 23 18s23-8 23-18c0-7-4-12-10-15 4-3 7-8 7-14 0-10-7-20-20-20z'/%3E%3C/svg%3E");
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  opacity: 0.85;
}
.brand-flower-pink  { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23E8618C' d='M50 8c-13 0-20 10-20 20 0 6 3 11 7 14-6 3-10 8-10 15 0 10 9 18 23 18s23-8 23-18c0-7-4-12-10-15 4-3 7-8 7-14 0-10-7-20-20-20z'/%3E%3C/svg%3E"); }
.brand-flower-cherry{ background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%236B2D4E' d='M50 8c-13 0-20 10-20 20 0 6 3 11 7 14-6 3-10 8-10 15 0 10 9 18 23 18s23-8 23-18c0-7-4-12-10-15 4-3 7-8 7-14 0-10-7-20-20-20z'/%3E%3C/svg%3E"); }
.brand-flower-ivory { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23F5EFE6' d='M50 8c-13 0-20 10-20 20 0 6 3 11 7 14-6 3-10 8-10 15 0 10 9 18 23 18s23-8 23-18c0-7-4-12-10-15 4-3 7-8 7-14 0-10-7-20-20-20z'/%3E%3C/svg%3E"); }

/* Brand Asterisk/Star Ornament (8-point) */
.brand-asterisk {
  display: inline-block;
  width: 28px;
  height: 28px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23E8618C' d='M45 5h10v90h-10zM5 45h90v10H5zM14.64 21.71l7.07-7.07 63.64 63.64-7.07 7.07zM85.36 14.64l7.07 7.07-63.64 63.64-7.07-7.07z'/%3E%3C/svg%3E");
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}
.brand-asterisk-ivory { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23F5EFE6' d='M45 5h10v90h-10zM5 45h90v10H5zM14.64 21.71l7.07-7.07 63.64 63.64-7.07 7.07zM85.36 14.64l7.07 7.07-63.64 63.64-7.07-7.07z'/%3E%3C/svg%3E"); }

/* C-mark (half-moon/lotus curve) ornament */
.brand-cmark {
  display: inline-block;
  width: 32px;
  height: 32px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%236B2D4E' d='M10 50C10 28 28 10 50 10v18c-12 0-22 10-22 22s10 22 22 22v18C28 90 10 72 10 50zm80 0C90 28 72 10 50 10v18c12 0 22 10 22 22s-10 22-22 22v18c22 0 40-18 40-40z'/%3E%3C/svg%3E");
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}

/* Three-dots ornament (Rising/trio) */
.brand-trio {
  display: inline-block;
  width: 32px;
  height: 32px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='28' r='18' fill='%23E8618C'/%3E%3Ccircle cx='26' cy='72' r='18' fill='%236B2D4E'/%3E%3Ccircle cx='74' cy='72' r='18' fill='%231A7A6E'/%3E%3C/svg%3E");
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}

/* Brand gradient utility classes */
.bg-brand-pink-gradient   { background: linear-gradient(135deg, #E8618C 0%, #6B2D4E 100%); }
.bg-brand-green-gradient  { background: linear-gradient(135deg, #1A7A6E 0%, #1A5C4A 100%); }
.bg-brand-soft-gradient   { background: linear-gradient(135deg, #F5EFE6 0%, #E8C4D8 100%); }
.bg-brand-nature-gradient { background: linear-gradient(135deg, #C8D9A0 0%, #1A7A6E 100%); }

.text-brand-gradient {
  background: linear-gradient(135deg, #E8618C 0%, #6B2D4E 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  color: transparent;
}

/* Signature decorative divider with flower + asterisk */
.brand-divider {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
}
.brand-divider::before,
.brand-divider::after {
  content: "";
  height: 1px;
  width: 80px;
  background: linear-gradient(90deg, transparent, #E8618C, transparent);
}

/* Keyframe: gentle float for ornaments */
@keyframes brandFloat {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50%      { transform: translateY(-10px) rotate(8deg); }
}
.brand-float {
  animation: brandFloat 5s ease-in-out infinite;
}
    </style>
  </head>
  <body class="bg-cream text-dark">
    
  <!-- Header -->
<header class="fixed w-full bg-cream bg-opacity-95 shadow-sm z-50">
    <div class="container mx-auto px-4 py-3 grid grid-cols-3 items-center">

        <!-- LOGO (kiri) -->
        <a href="{{ route('member.dashboard') }}" class="logo text-2xl hover:opacity-80 transition tracking-tight flex items-baseline gap-1.5 justify-self-start">
            <span class="font-nord font-black text-[#E8618C]">FTM</span>
            <span class="font-instrument italic text-[#6B2D4E] text-3xl">Society</span>
        </a>

        <!-- DESKTOP NAVIGATION (tengah) -->
        <nav class="hidden md:flex items-center justify-center space-x-8">
            <a href="#home" class="text-dark hover:text-primary transition">Home</a>
            <a href="#Programs" class="text-dark hover:text-primary transition">Programs</a>
            <a href="#about" class="text-dark hover:text-primary transition">About</a>
            <a href="#Facility" class="text-dark hover:text-primary transition">Gallery</a>
            <a href="#contact" class="text-dark hover:text-primary transition">Contact</a>
        </nav>

        <!-- LOGIN + HAMBURGER (kanan) -->
        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('member.login') }}"
               class="hidden md:inline-flex bg-primary text-white px-6 py-2 rounded-button hover:bg-secondary hover:scale-105 transition font-semibold">
                Login
            </a>
            <button id="mobile-menu-button"
                class="block md:hidden text-dark text-4xl font-bold leading-none">
                ⋮
            </button>
        </div>

    </div>
</header>

<!-- MOBILE OVERLAY -->
<div id="mobile-overlay" class="fixed inset-0 bg-dark/50 hidden z-[9999]"></div>

<!-- MOBILE MENU SLIDE -->
<div id="mobile-menu"
    class="fixed top-0 right-[-100%] h-full w-64 bg-cream shadow-lg z-[10000] p-6 transition-all duration-300">

    <div class="flex justify-end mb-8">
        <button id="close-menu-button" class="w-10 h-10 flex items-center justify-center text-primary">
            <i class="ri-close-line ri-lg"></i>
        </button>
    </div>

    <nav class="flex flex-col space-y-6">
        <a href="#home" class="text-dark hover:text-primary transition">Home</a>
        <a href="#about" class="text-dark hover:text-primary transition">About</a>
        <a href="#Programs" class="text-dark hover:text-primary transition">Programs</a>
        <a href="#classes" class="text-dark hover:text-primary transition">Classes</a>
        <a href="#schedule" class="text-dark hover:text-primary transition">Schedule</a>
        <a href="#Facility" class="text-dark hover:text-primary transition">Gallery</a>
        <a href="#contact" class="text-dark hover:text-primary transition">Contact</a>

        <a href="#join"
            class="bg-primary text-white px-6 py-3 rounded-button text-center hover:bg-accent hover:scale-105 transition font-semibold">
            Join Now
        </a>

        <!-- LOGIN BUTTON (DITAMBAHKAN) -->
        <a href="{{ route('member.login') }}"
            class="border border-primary text-primary px-6 py-3 rounded-button text-center hover:bg-primary hover:text-white hover:scale-105 transition font-semibold">
            Login
        </a>
    </nav>
</div>


<!-- SCRIPT NAVBAR MOBILE -->
<script>
  (function(){
    const menuBtn = document.getElementById("mobile-menu-button");
    const closeBtn = document.getElementById("close-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    const overlay = document.getElementById("mobile-overlay");

    if (!menuBtn || !mobileMenu) return;

    function showBackdrop(){
      if (!overlay) return;
      overlay.classList.remove('hidden');
      overlay.style.pointerEvents = 'auto';
    }
    function hideBackdrop(){
      if (!overlay) return;
      overlay.classList.add('hidden');
      overlay.style.pointerEvents = 'none';
    }

    function openMenu(){
      // ensure nothing auto-opens the menu — only run on explicit click
      console.log('[mobile] openMenu');
      mobileMenu.style.right = '0';
      menuBtn.setAttribute('aria-expanded','true');
      showBackdrop();
      document.body.classList.add('overflow-hidden');
    }

    function closeMenu(){
      console.log('[mobile] closeMenu');
      mobileMenu.style.right = '-100%';
      menuBtn.setAttribute('aria-expanded','false');
      hideBackdrop();
      document.body.classList.remove('overflow-hidden');
    }

    // toggle on hamburger click (no automatic open anywhere else)
    menuBtn.addEventListener('click', function(e){ e.preventDefault(); const isOpen = mobileMenu.style.right === '0' || mobileMenu.style.right === '' && mobileMenu.classList.contains('open'); if (isOpen) closeMenu(); else openMenu(); });

    // close button — stop propagation so it can't re-open
    if (closeBtn) closeBtn.addEventListener('click', function(e){ e.preventDefault(); e.stopPropagation(); try { e.stopImmediatePropagation(); } catch(_){} closeMenu(); return false; });

    // clicking any link inside menu should close the menu so the user can see the page change
    mobileMenu.querySelectorAll('a, button[type="submit"]').forEach(function(el){ el.addEventListener('click', function(){ setTimeout(closeMenu, 60); }); });

    // backdrop click closes
    if (overlay) overlay.addEventListener('click', function(){ closeMenu(); });

    // Escape to close
    document.addEventListener('keydown', function(e){ if (e.key === 'Escape') closeMenu(); });

    // expose helper
    window.closeMobileMenu = closeMenu;
  })();
</script>


  <!-- ========================================= -->
<!-- HERO SECTION - REFACTORED & PROFESSIONAL -->
<!-- ========================================= -->

<section id="home" class="relative min-h-screen flex items-center overflow-hidden">
    
    <!-- Background Image Layer with Premium Effects -->
    <div class="absolute inset-0 z-0">
        <div id="hero-bg" 
             class="absolute inset-0 bg-cover bg-center transition-all duration-700 scale-105 backdrop-blur-xs"
             style="background-image: url('/images/bg.png');"></div>
        
        <!-- Luxury Gradient Overlay - Rose/Burgundy Blend -->
        <div class="absolute inset-0 bg-gradient-to-br from-secondary/85 via-primary/70 to-dark/80"></div>
        
        <!-- Premium Dark Accent Layer for Text Contrast -->
        <div class="absolute inset-0 bg-gradient-to-t from-dark/40 via-transparent to-transparent"></div>
    </div>

    <!-- Decorative Background Elements - Soft Luxury Ambiance -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 -right-48 w-96 h-96 bg-light-pink/15 rounded-full blur-3xl opacity-60 animate-pulse" style="animation-duration: 6s;"></div>
        <div class="absolute bottom-1/4 -left-48 w-96 h-96 bg-cream/10 rounded-full blur-3xl opacity-50 animate-pulse" style="animation-duration: 7s; animation-delay: 1.5s;"></div>

        <!-- Brand Ornament Signatures -->
        <div class="brand-flower brand-flower-ivory brand-float absolute top-24 right-[12%] opacity-20" style="width: 70px; height: 70px;"></div>
        <div class="brand-asterisk brand-asterisk-ivory brand-float absolute bottom-32 right-[8%] opacity-25" style="width: 42px; height: 42px; animation-delay: 1s;"></div>
        <div class="brand-cmark brand-float absolute top-1/3 left-[6%] opacity-15" style="width: 60px; height: 60px; filter: invert(96%) sepia(10%) saturate(200%) hue-rotate(330deg); animation-delay: 2s;"></div>
    </div>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center min-h-[calc(100vh-80px)]">
            
            <!-- LEFT COLUMN - Text Content (Premium Updated) -->
            <div class="lg:col-span-7 text-center lg:text-left space-y-6 md:space-y-8 animate-fade-in">
                
                <!-- Premium Glass Effect Badge -->
                <div data-aos="fade-right" 
                     class="inline-flex items-center gap-3 px-6 py-3 rounded-full backdrop-blur-xl bg-white/[0.08] border-2 border-white/30 shadow-2xl hover:bg-white/[0.12] hover:border-white/50 transition-all duration-300 group">
                    <span class="brand-flower brand-flower-ivory" style="width: 18px; height: 18px;"></span>
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-light-pink opacity-80"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-light-pink shadow-lg"></span>
                    </span>
                    <span class="text-white text-sm md:text-base font-semibold tracking-widest uppercase opacity-95">
                        Muslimah-Only Fitness
                    </span>
                </div>

                <!-- Main Heading - Premium Typography with Gradient & Shadow -->
                <div data-aos="fade-right" data-aos-delay="100" class="space-y-6">
                    <h1 class="font-nord text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-black text-white leading-[0.95] tracking-tighter drop-shadow-2xl" style="text-shadow: 0 20px 40px rgba(0,0,0,0.3);">
                        YOUR<br/>
                        <span class="relative inline-block my-3">
                            <span class="font-instrument italic font-normal text-transparent bg-clip-text bg-gradient-to-r from-light-pink via-primary to-light-pink bg-[length:200%_auto] animate-gradient-shift drop-shadow-2xl" style="text-shadow: 0 10px 30px rgba(232,97,140,0.4); filter: drop-shadow(0 20px 40px rgba(107,45,78,0.3)); letter-spacing: -0.02em;">
                                Productive
                            </span>
                            <!-- Elegant Gradient Underline -->
                            <div class="absolute -bottom-4 left-0 right-0 h-1.5 bg-gradient-to-r from-transparent via-light-pink to-transparent rounded-full opacity-80 blur-sm"></div>
                            <div class="absolute -bottom-3 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-primary to-transparent rounded-full"></div>
                        </span><br/>
                        <span class="font-nord bg-gradient-to-r from-white to-cream bg-clip-text text-transparent">SISTER</span>
                    </h1>
                </div>

                <!-- Subtitle - Refined Spacing & Hierarchy -->
                <div data-aos="fade-right" data-aos-delay="200" class="space-y-3 pt-4">
                    <p class="font-poppins text-xl sm:text-2xl md:text-3xl text-white font-medium leading-relaxed tracking-wide">
                        Good Habit inside
                    </p>
                    <p class="font-instrument italic text-3xl sm:text-4xl md:text-5xl bg-gradient-to-r from-light-pink to-primary bg-clip-text text-transparent drop-shadow-lg" style="text-shadow: 0 8px 20px rgba(232,97,140,0.3);">
                        Productive Muslimah
                    </p>
                </div>

                <!-- CTA Buttons - Premium Styling & Effects -->
                <div data-aos="fade-right" data-aos-delay="300" 
                     class="flex flex-wrap gap-4 justify-center lg:justify-start pt-6">
                    @auth('customer')
                    @else
                        <a href="#join" 
                           class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 text-lg font-black text-white bg-gradient-to-r from-primary to-secondary rounded-full overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-300 ease-out hover:scale-105 hover:-translate-y-1">
                            <span class="relative z-10 tracking-wide">Join Now</span>
                            <i class="ri-arrow-right-line text-xl relative z-10 transition-all group-hover:translate-x-2 group-hover:scale-110"></i>
                            <div class="absolute inset-0 bg-gradient-to-r from-secondary to-primary opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                            <div class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-20 bg-white group-hover:scale-150 transition-all duration-500"></div>
                        </a>
                    @endauth
                    
                    <a href="#about" 
                       class="group inline-flex items-center justify-center gap-3 px-8 py-4 text-lg font-bold text-white bg-white/10 backdrop-blur-sm border-2 border-white/60 rounded-full hover:bg-cream hover:text-primary hover:border-cream transition-all duration-300 ease-out hover:scale-105 hover:-translate-y-1">
                        <span>Learn More</span>
                        <i class="ri-arrow-down-line text-xl transition-all group-hover:translate-y-2"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Scroll Indicator - Perfectly Centered (Auto Hide on Scroll) -->
    <div id="scroll-indicator" class="fixed bottom-10 left-0 right-0 z-20 hidden md:flex justify-center pointer-events-none opacity-100 transition-opacity duration-300">
        <a href="#about" class="flex flex-col items-center justify-center gap-5 pointer-events-auto cursor-pointer">
            <!-- Text Indicator -->
            <span class="text-xs font-black uppercase tracking-[0.15em] text-white/70 hover:text-white/100 transition-all duration-300 whitespace-nowrap">Scroll Down</span>
            
            <!-- Animated Container -->
            <div class="flex flex-col items-center justify-center" style="animation: bounce-smooth 2.2s cubic-bezier(0.4, 0, 0.6, 1) infinite;">
                <!-- Outer Border Circle -->
                <div class="w-6 h-9 border-2 border-white/50 rounded-full flex flex-col items-center justify-start pt-2 hover:border-white/90 transition-all duration-300">
                    <!-- Inner Animated Dot -->
                    <div class="w-1 h-1.5 bg-white/70 rounded-full" style="animation: scroll-dot-bounce 1.5s ease-in-out infinite;"></div>
                </div>
            </div>
        </a>
    </div>

</section>

<!-- ========================================= -->
<!-- ABOUT SECTION - ULTIMATE PROFESSIONAL VERSION -->
<!-- Perfectly Refined & Beautiful UI/UX -->
<!-- ========================================= -->

<section id="about" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">
    
    <!-- Multi-Layer Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-white via-cream/50 to-light-pink/30"></div>
    
    <!-- Animated Decorative Background Pattern -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
        <div class="absolute inset-0" 
             style="background-image: 
                radial-gradient(circle at 20% 50%, transparent 0%, transparent 10%, primary 10%, primary 11%, transparent 11%),
                radial-gradient(circle at 80% 80%, transparent 0%, transparent 10%, #793451 10%, #793451 11%, transparent 11%);
                background-size: 100px 100px;">
        </div>
    </div>

    <!-- Floating Gradient Orbs -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute -top-48 -left-48 w-96 h-96 bg-gradient-to-br from-secondary/20 to-light-pink/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 4s;"></div>
        <div class="absolute top-1/3 -right-64 w-[500px] h-[500px] bg-gradient-to-tl from-primary/15 to-light-pink/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 6s; animation-delay: 1s;"></div>
        <div class="absolute -bottom-32 left-1/3 w-80 h-80 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 5s; animation-delay: 2s;"></div>

        <!-- Brand Ornaments -->
        <div class="brand-flower brand-flower-pink brand-float absolute top-12 right-[10%]" style="width: 55px; height: 55px; opacity: 0.35;"></div>
        <div class="brand-asterisk brand-float absolute bottom-24 left-[8%]" style="width: 38px; height: 38px; opacity: 0.4; animation-delay: 1.5s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header - Premium Design -->
        <div class="text-center mb-16 md:mb-24" data-aos="fade-up">
            
            <!-- Top Badge with Shimmer Effect -->
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-secondary/10 via-light-pink/50 to-secondary/10 rounded-full border border-secondary/20 shadow-lg backdrop-blur-sm">
                <span class="brand-flower brand-flower-cherry" style="width: 16px; height: 16px;"></span>
                <div class="relative">
                    <div class="w-2 h-2 bg-secondary rounded-full animate-ping absolute"></div>
                    <div class="w-2 h-2 bg-secondary rounded-full relative"></div>
                </div>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary">
                    Tentang Kami
                </span>
            </div>

            <!-- Main Title with Gradient -->
            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="text-primary">About</span>
                <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary animate-gradient-shift bg-[length:200%_auto]">
                    FTM Society
                </span>
            </h2>

            <!-- Decorative Divider -->
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-secondary rounded-full"></div>
                <div class="w-3 h-3 bg-secondary rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-secondary via-primary to-secondary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-primary rounded-full"></div>
            </div>

            <!-- Subtitle -->
            <p class="text-lg md:text-xl text-dark max-w-3xl mx-auto leading-relaxed font-light">
                Ruang bagi muslimah untuk hidup <span class="font-semibold text-primary">aktif</span>, <span class="font-semibold text-secondary">produktif</span>, dan sesuai <span class="font-semibold text-primary">syariat</span>
            </p>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

            <!-- LEFT COLUMN - Image Gallery (5 cols) -->
            <div class="lg:col-span-5 order-2 lg:order-1" data-aos="fade-right" data-aos-delay="100">
                <div class="relative">
                    
                    <!-- Main Image Frame -->
                    <div class="relative group">
                        
                        <!-- Decorative Border Frame -->
                        <div class="absolute -inset-4 bg-gradient-to-r from-secondary via-primary to-primary rounded-[2rem] opacity-20 group-hover:opacity-30 blur-xl transition-all duration-500"></div>
                        
                        <!-- Main Image Container -->
                        <div class="relative rounded-[2rem] overflow-hidden shadow-2xl ring-4 ring-white/50 transform group-hover:scale-[1.02] transition-all duration-500">
                            <img src="./images/logo ftm (1).jpg"
                                 alt="FTM Society - Empowering Muslimah"
                                 class="w-full h-auto object-cover" />
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <!-- Hover Content -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="text-center text-white transform scale-75 group-hover:scale-100 transition-transform duration-500">
                                    <i class="ri-heart-pulse-fill text-5xl mb-3 drop-shadow-lg"></i>
                                    <p class="text-lg font-bold drop-shadow-lg">Empowering Muslimah</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <!-- Floating Trust Badge -->
                    <div class="absolute -top-6 -left-6 bg-cream rounded-2xl shadow-xl p-4 border-2 border-secondary/20 backdrop-blur-sm hidden lg:block"
                         data-aos="fade-down" data-aos-delay="300">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-secondary rounded-full animate-pulse"></div>
                            <span class="font-bold text-primary text-sm">Trusted Community</span>
                        </div>
                    </div>

                    <!-- Signature Brand Flower Ornament -->
                    <div class="brand-flower brand-flower-pink brand-float absolute -bottom-8 -right-8 hidden lg:block" style="width: 80px; height: 80px; z-index: 5;"></div>
                    <div class="brand-asterisk brand-float absolute -top-10 right-10 hidden lg:block" style="width: 36px; height: 36px; animation-delay: 1s; z-index: 5;"></div>

                    <!-- Decorative Blur Elements -->
                    <div class="absolute -top-8 -left-8 w-32 h-32 bg-secondary/30 rounded-full blur-3xl -z-10"></div>
                    <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-primary/30 rounded-full blur-3xl -z-10"></div>
                    
                </div>
            </div>

            <!-- RIGHT COLUMN - Content (7 cols) -->
            <div class="lg:col-span-7 order-1 lg:order-2 space-y-8" data-aos="fade-left" data-aos-delay="200">
                
                <!-- Title with Icon -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-1 h-16 bg-gradient-to-b from-primary via-secondary to-primary rounded-full"></div>
                    <div>
                        <h3 class="text-3xl md:text-4xl lg:text-5xl font-black text-primary mb-2">
                            Vision & Mission
                        </h3>
                        <p class="text-sm text-dark/55 font-medium uppercase tracking-wider">Our Purpose & Goals</p>
                    </div>
                </div>

                <!-- Description with Enhanced Typography -->
                <div class="space-y-5 pl-5">
                    <p class="text-dark leading-relaxed text-base md:text-lg relative">
                        <span class="absolute -left-5 top-2 w-2 h-2 bg-secondary rounded-full"></span>
                        <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">FTM Society</span> adalah memberikan ruang bagi para muslimah untuk memiliki gaya hidup <span class="font-semibold text-primary">aktif</span> dan <span class="font-semibold text-secondary">produktif</span> yang sesuai dengan syariat Islam.
                    </p>
                    <p class="text-dark leading-relaxed text-base md:text-lg relative">
                        <span class="absolute -left-5 top-2 w-2 h-2 bg-primary rounded-full"></span>
                        Oleh karena itu, FTM Society hadir menyelenggarakan kegiatan olahraga dan kegiatan aktif sosial lainnya, seperti <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-secondary/10 text-secondary font-semibold rounded-md text-sm"><i class="ri-presentation-line"></i>webinar</span> dan <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-primary/10 text-primary font-semibold rounded-md text-sm"><i class="ri-calendar-event-line"></i>event</span>.
                    </p>
                </div>

                <!-- Feature Cards Grid - Premium Design -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                    
                    <!-- Feature Card 1 - Enhanced -->
                    <div class="group relative bg-cream rounded-2xl p-5 shadow-lg hover:shadow-2xl border border-light-pink/60 hover:border-secondary/30 transition-all duration-300 overflow-hidden cursor-pointer"
                         data-aos="fade-up" data-aos-delay="300">
                        
                        <!-- Gradient Background on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-br from-light-pink to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="relative flex items-start gap-4">
                            <!-- Icon Container -->
                            <div class="relative flex-shrink-0">
                                <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gradient-to-br from-light-pink to-light-pink text-primary group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                                    <i class="ri-shield-check-line text-3xl"></i>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-secondary rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-1">
                                <h4 class="font-black text-dark text-base mb-1 group-hover:text-primary transition-colors duration-300">
                                    Muslimah Only
                                </h4>
                                <p class="text-sm text-dark/70 leading-relaxed">
                                    100% Private & Safe Environment
                                </p>
                                <!-- Decorative Line -->
                                <div class="mt-2 h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-secondary to-transparent transition-all duration-500"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 2 - Enhanced -->
                    <div class="group relative bg-cream rounded-2xl p-5 shadow-lg hover:shadow-2xl border border-light-pink/60 hover:border-primary/30 transition-all duration-300 overflow-hidden cursor-pointer"
                         data-aos="fade-up" data-aos-delay="400">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-light-pink to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="relative flex items-start gap-4">
                            <div class="relative flex-shrink-0">
                                <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gradient-to-br from-light-pink to-light-pink text-primary group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                                    <i class="ri-heart-pulse-line text-3xl"></i>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-primary rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            
                            <div class="flex-1">
                                <h4 class="font-black text-dark text-base mb-1 group-hover:text-primary transition-colors duration-300">
                                    Certified Trainers
                                </h4>
                                <p class="text-sm text-dark/70 leading-relaxed">
                                    Professional Muslimah Coaches
                                </p>
                                <div class="mt-2 h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-primary to-transparent transition-all duration-500"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 3 - Full Width Enhanced -->
                    <div class="group relative bg-cream rounded-2xl p-5 shadow-lg hover:shadow-2xl border border-light-pink/60 hover:border-secondary/30 transition-all duration-300 overflow-hidden cursor-pointer sm:col-span-2"
                         data-aos="fade-up" data-aos-delay="500">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-light-pink via-light-pink to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="relative flex items-start gap-4">
                            <div class="relative flex-shrink-0">
                                <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gradient-to-br from-grounded-green to-patina-green text-white group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                                    <i class="ri-pray-line text-3xl"></i>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-secondary rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            
                            <div class="flex-1">
                                <h4 class="font-black text-dark text-base mb-1 group-hover:text-primary transition-colors duration-300">
                                    No Music & No Camera
                                </h4>
                                <p class="text-sm text-dark/70 leading-relaxed">
                                    Fully Islamic-Compliant Environment for Your Comfort
                                </p>
                                <div class="mt-2 h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-secondary via-primary to-transparent transition-all duration-500"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- CTA Section - Premium -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6" data-aos="fade-up" data-aos-delay="600">
                    
                   
                    
                </div>

            </div>

        </div>

            </div>
        </div>

    </div>
</section>

<!-- ========================================= -->
<!-- ENHANCED CSS - Tambahkan/Update di <style> -->
<!-- ========================================= -->

<style>
    /* Gradient Shift Animation */
    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Premium Fade In Animation for Hero */
    @keyframes fadeInHero {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeInHero 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }

    /* Smooth Bounce Animation for Scroll Indicator */
    @keyframes bounce-smooth {
        0%, 100% {
            transform: translateY(0);
            opacity: 1;
        }
        50% {
            transform: translateY(-10px);
            opacity: 0.85;
        }
    }

    /* Scroll Dot Bounce Animation */
    @keyframes scroll-dot-bounce {
        0% {
            opacity: 0;
            transform: translateY(-8px);
        }
        50% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            transform: translateY(8px);
        }
    }

    /* Enhanced AOS Animations */
    [data-aos] {
        opacity: 0;
        transition-property: opacity, transform;
        transition-duration: 0.8s;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    [data-aos].aos-animate {
        opacity: 1;
        transform: translate(0, 0) !important;
    }

    [data-aos="fade-right"] { transform: translateX(-60px); }
    [data-aos="fade-left"] { transform: translateX(60px); }
    [data-aos="fade-up"] { transform: translateY(60px); }
    [data-aos="fade-down"] { transform: translateY(-60px); }

    /* Smooth Transitions */
    * {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Prevent horizontal scroll */
    body {
        overflow-x: hidden;
    }

    /* Scroll Indicator Auto-Hide on Scroll */
    #scroll-indicator {
        transition: opacity 0.3s ease-in-out;
    }
</style>

<!-- ========================================= -->
<!-- ENHANCED JAVASCRIPT - Update existing atau tambahkan -->
<!-- ========================================= -->

<script>
    // Enhanced AOS Implementation
    function initEnhancedAOS() {
        const elements = document.querySelectorAll('[data-aos]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.getAttribute('data-aos-delay') || 0;
                    setTimeout(() => {
                        entry.target.classList.add('aos-animate');
                    }, delay);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -80px 0px'
        });

        elements.forEach(el => observer.observe(el));
    }

    // Smooth Scroll Enhancement
    function initEnhancedSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    const offsetTop = target.offsetTop - 80; // Account for fixed header
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Initialize on Load
    document.addEventListener('DOMContentLoaded', function() {
        initEnhancedAOS();
        initEnhancedSmoothScroll();
        
        // Trigger immediate animations for visible elements
        setTimeout(() => {
            const visibleElements = document.querySelectorAll('#about [data-aos]');
            visibleElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    el.classList.add('aos-animate');
                }
            });
        }, 100);

        // Initialize Scroll Indicator Auto-Hide
        initScrollIndicator();
    });

    // Scroll Indicator Auto Hide Function
    function initScrollIndicator() {
        const scrollIndicator = document.getElementById('scroll-indicator');
        const heroSection = document.getElementById('home');
        
        if (!scrollIndicator || !heroSection) return;
        
        window.addEventListener('scroll', function() {
            const heroBottom = heroSection.offsetHeight;
            const scrollPosition = window.scrollY;
            
            // Hide indicator when scrolled past hero section
            if (scrollPosition > heroBottom - 100) {
                scrollIndicator.style.opacity = '0';
                scrollIndicator.style.pointerEvents = 'none';
            } else {
                scrollIndicator.style.opacity = '1';
                scrollIndicator.style.pointerEvents = 'auto';
            }
        });
    }
</script>


  <!-- ========================================= -->
<!-- WHY CHOOSE FTM SECTION - ULTIMATE PROFESSIONAL -->
<!-- Enhanced Slider with Premium UI/UX -->
<!-- ========================================= -->

<section id="packages" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">
    
    <!-- Multi-Layer Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-cream via-light-pink/30 to-white"></div>
    
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none">
        <div class="absolute inset-0" 
             style="background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 15px, primary 15px, primary 16px),
                repeating-linear-gradient(-45deg, transparent, transparent 15px, #793451 15px, #793451 16px);
                background-size: 80px 80px;">
        </div>
    </div>

    <!-- Floating Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -left-32 w-80 h-80 bg-gradient-to-br from-secondary/20 to-primary/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 5s;"></div>
        <div class="absolute top-1/2 -right-48 w-96 h-96 bg-gradient-to-tl from-primary/15 to-light-pink/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 7s; animation-delay: 1.5s;"></div>
        <div class="absolute -bottom-24 left-1/4 w-72 h-72 bg-gradient-to-tr from-light-pink/20 to-secondary/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 6s; animation-delay: 0.5s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header - Premium Design -->
        <div class="text-center mb-16 md:mb-20" data-aos="fade-up">
            
            <!-- Top Badge -->
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-primary/10 via-secondary/10 to-primary/10 rounded-full border border-primary/20 shadow-lg backdrop-blur-sm">
                <span class="brand-flower brand-flower-pink" style="width: 16px; height: 16px;"></span>
                <div class="relative">
                    <div class="w-2 h-2 bg-primary rounded-full animate-ping absolute"></div>
                    <div class="w-2 h-2 bg-primary rounded-full relative"></div>
                </div>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary">
                    Our Advantages
                </span>
            </div>

            <!-- Main Title -->
            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="text-primary">Why Choose</span>
                <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-secondary via-primary to-secondary animate-gradient-shift bg-[length:200%_auto]">
                    FTM Society
                </span>
            </h2>

            <!-- Decorative Divider -->
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-primary via-secondary to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-secondary rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-secondary rounded-full"></div>
            </div>

            <!-- Subtitle -->
            <p class="text-lg md:text-xl text-dark/70 max-w-3xl mx-auto leading-relaxed">
                Temukan keunggulan yang membuat FTM Society menjadi pilihan terbaik untuk muslimah aktif
            </p>
        </div>

        <!-- Slider Container -->
        <div class="relative max-w-7xl mx-auto">
            
            <!-- Navigation Button Left -->
            <button
                type="button"
                onclick="slideFeature(-1)"
                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 items-center justify-center w-14 h-14 bg-cream text-primary rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-primary hover:to-secondary hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Left"
                id="featureScrollLeft"
                style="display:none"
            >
                <i class="ri-arrow-left-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>

            <!-- Slider Track -->
            <div
                id="feature-slider"
                class="flex overflow-x-auto gap-6 md:gap-8 scroll-smooth pb-6 px-2"
                style="scrollbar-width: none; -ms-overflow-style: none;"
                onscroll="toggleFeatureScroll()"
            >
                <!-- Feature Card 1 - Enhanced -->
                <div class="min-w-[300px] sm:min-w-[340px] max-w-[360px] flex-shrink-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-light-pink/60 hover:border-secondary/30 overflow-hidden h-full flex flex-col">
                        
                        <!-- Gradient Background on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-br from-light-pink/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Content -->
                        <div class="relative z-10 flex flex-col items-center text-center flex-1">
                            
                            <!-- Icon Container -->
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-light-pink to-light-pink text-primary group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                    <i class="ri-women-line text-4xl"></i>
                                </div>
                                <!-- Decorative Ring -->
                                <div class="absolute -inset-2 rounded-2xl border-2 border-secondary/20 group-hover:border-secondary/40 group-hover:scale-110 transition-all duration-500"></div>
                                <!-- Floating Dot -->
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-secondary rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl md:text-2xl font-black text-primary mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Muslimah-Only Space
                            </h3>

                            <!-- Description -->
                            <p class="text-dark/70 text-sm md:text-base leading-relaxed flex-1">
                                Fasilitas kami hanya untuk wanita, dengan staf wanita saja. Nikmati privasi lengkap tanpa jendela yang menghadap area publik dan sistem masuk yang aman.
                            </p>

                            <!-- Bottom Accent Line -->
                            <div class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-secondary via-primary to-secondary rounded-full transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 - Enhanced -->
                <div class="min-w-[300px] sm:min-w-[340px] max-w-[360px] flex-shrink-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-light-pink/60 hover:border-primary/30 overflow-hidden h-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-light-pink/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10 flex flex-col items-center text-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-light-pink to-light-pink text-primary group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                    <i class="ri-user-star-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-primary/20 group-hover:border-primary/40 group-hover:scale-110 transition-all duration-500"></div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-primary rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                            </div>

                            <h3 class="text-xl md:text-2xl font-black text-primary mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Certified Muslimah Trainer
                            </h3>

                            <p class="text-dark/70 text-sm md:text-base leading-relaxed flex-1">
                                Dibimbing langsung oleh coach tersertifikasi dengan pengalaman profesional dan pemahaman mendalam tentang kebutuhan muslimah.
                            </p>

                            <div class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-primary via-secondary to-primary rounded-full transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 - Enhanced -->
                <div class="min-w-[300px] sm:min-w-[340px] max-w-[360px] flex-shrink-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-light-pink/60 hover:border-secondary/30 overflow-hidden h-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10 flex flex-col items-center text-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-grounded-green to-patina-green text-white group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                    <i class="ri-shield-user-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-secondary/20 group-hover:border-secondary/40 group-hover:scale-110 transition-all duration-500"></div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-secondary rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                            </div>

                            <h3 class="text-xl md:text-2xl font-black text-primary mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Privacy is Our Priority
                            </h3>

                            <p class="text-dark/70 text-sm md:text-base leading-relaxed flex-1">
                                Ruang latihan khusus muslimah, tanpa kamera dan tanpa musik. Kami mengutamakan kenyamanan, keamanan, dan privasimu saat berolahraga.
                            </p>

                            <div class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-secondary via-primary to-secondary rounded-full transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 4 - Enhanced -->
                <div class="min-w-[300px] sm:min-w-[340px] max-w-[360px] flex-shrink-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-light-pink/60 hover:border-primary/30 overflow-hidden h-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-rose-50/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10 flex flex-col items-center text-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-soft-petals to-power-pink text-white group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                    <i class="ri-user-heart-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-primary/20 group-hover:border-primary/40 group-hover:scale-110 transition-all duration-500"></div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-primary rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                            </div>

                            <h3 class="text-xl md:text-2xl font-black text-primary mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Muslimah Friendly
                            </h3>

                            <p class="text-dark/70 text-sm md:text-base leading-relaxed flex-1">
                                Dirancang khusus untuk muslimah: area khusus wanita, pelatih perempuan bersertifikat, dan suasana nyaman sesuai nilai-nilai islami.
                            </p>

                            <div class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-primary via-secondary to-primary rounded-full transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Navigation Button Right -->
            <button
                type="button"
                onclick="slideFeature(1)"
                class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 items-center justify-center w-14 h-14 bg-cream text-primary rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-primary hover:to-secondary hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Right"
                id="featureScrollRight"
            >
                <i class="ri-arrow-right-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>

        </div>

        <!-- Slider Indicators (Optional) -->
        <div class="flex justify-center gap-2 mt-12" data-aos="fade-up" data-aos-delay="500">
            <div class="w-2 h-2 bg-primary rounded-full"></div>
            <div class="w-8 h-2 bg-secondary rounded-full"></div>
            <div class="w-2 h-2 bg-primary/40 rounded-full"></div>
            <div class="w-2 h-2 bg-primary/40 rounded-full"></div>
        </div>

        <!-- Bottom CTA (Optional) -->
        <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="600">
            <a href="#join" 
               class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary via-secondary to-primary bg-[length:200%_auto] text-white font-bold rounded-full shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 group">
                <span>Bergabung Sekarang</span>
                <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

    </div>
</section>

<!-- ========================================= -->
<!-- ENHANCED JAVASCRIPT FOR SLIDER -->
<!-- ========================================= -->

<script>
  function slideFeature(direction) {
    const slider = document.getElementById('feature-slider');
    const scrollAmount = 360; // card width + gap
    slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    setTimeout(toggleFeatureScroll, 300);
  }

  function toggleFeatureScroll() {
    const slider = document.getElementById('feature-slider');
    const leftBtn = document.getElementById('featureScrollLeft');
    const rightBtn = document.getElementById('featureScrollRight');
    
    if (leftBtn && rightBtn) {
      // Show/hide left button
      if (slider.scrollLeft > 20) {
        leftBtn.style.display = 'flex';
      } else {
        leftBtn.style.display = 'none';
      }
      
      // Show/hide right button
      const isAtEnd = (slider.scrollLeft + slider.clientWidth) >= (slider.scrollWidth - 20);
      if (isAtEnd) {
        rightBtn.style.display = 'none';
      } else {
        rightBtn.style.display = 'flex';
      }
    }
  }

  // Initialize on page load
  window.addEventListener('DOMContentLoaded', toggleFeatureScroll);
  window.addEventListener('resize', toggleFeatureScroll);

  // Auto-hide scrollbar
  const featureSlider = document.getElementById('feature-slider');
  if (featureSlider) {
    featureSlider.style.scrollbarWidth = 'none';
    featureSlider.style.msOverflowStyle = 'none';
  }
</script>

<!-- ========================================= -->
<!-- ADDITIONAL CSS -->
<!-- ========================================= -->

<style>
  /* Hide scrollbar for slider */
  #feature-slider::-webkit-scrollbar {
    display: none;
  }

  /* Gradient Animation */
  @keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .animate-gradient-shift {
        /* DISABLED FOR PERFORMANCE: animation: gradient-shift 4s ease infinite; */
  }

  /* Enhanced Hover Effects */
  .feature-card {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Smooth Card Entrance */
  [data-aos="fade-up"] {
    opacity: 0;
    transform: translateY(60px);
    transition: opacity 0.8s, transform 0.8s;
  }

  [data-aos="fade-up"].aos-animate {
    opacity: 1;
    transform: translateY(0);
  }
</style>

<script>
  function slideFeature(direction) {
    const slider = document.getElementById('feature-slider');
    const scrollAmount = 360; // card width + gap
    slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    setTimeout(toggleFeatureScroll, 300);
  }
  function toggleFeatureScroll() {
    const slider = document.getElementById('feature-slider');
    const leftBtn = document.getElementById('featureScrollLeft');
    const rightBtn = document.getElementById('featureScrollRight');
    leftBtn.style.display = slider.scrollLeft > 0 ? 'block' : 'none';
    rightBtn.style.display = (slider.scrollLeft + slider.clientWidth) < slider.scrollWidth ? 'block' : 'none';
  }
  window.addEventListener('DOMContentLoaded', toggleFeatureScroll);
</script>

<<!-- ========================================= -->
<!-- PROGRAMS SECTION - FIXED & STABLE        -->
<!-- Cards tidak bergoyang, slider smooth      -->
<!-- ========================================= -->

<section id="Programs" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">
    
    <!-- Multi-Layer Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-white via-cream/50 to-light-pink/30"></div>
    
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none">
        <div class="absolute inset-0" 
             style="background-image: 
                radial-gradient(circle at 25% 25%, transparent 0%, transparent 12%, primary 12%, primary 13%, transparent 13%),
                radial-gradient(circle at 75% 75%, transparent 0%, transparent 12%, #793451 12%, #793451 13%, transparent 13%);
                background-size: 120px 120px;">
        </div>
    </div>

    <!-- Floating Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 -left-40 w-96 h-96 bg-gradient-to-br from-secondary/15 to-light-pink/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 6s;"></div>
        <div class="absolute -top-20 right-1/4 w-80 h-80 bg-gradient-to-tl from-primary/10 to-light-pink/10 rounded-full blur-3xl animate-pulse" style="animation-duration: 8s; animation-delay: 2s;"></div>
        <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-gradient-to-tr from-primary/15 to-secondary/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 7s; animation-delay: 1s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="text-center mb-16 md:mb-20">
            
            <!-- Top Badge -->
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-secondary/10 via-light-pink/50 to-secondary/10 rounded-full border border-secondary/20 shadow-lg backdrop-blur-sm">
                <span class="brand-flower brand-flower-cherry" style="width: 16px; height: 16px;"></span>
                <div class="relative">
                    <div class="w-2 h-2 bg-secondary rounded-full animate-ping absolute"></div>
                    <div class="w-2 h-2 bg-secondary rounded-full relative"></div>
                </div>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary">
                    Our Program 
                </span>
            </div>

            <!-- Main Title -->
            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-secondary via-primary to-secondary animate-gradient-shift bg-[length:200%_auto]">
                    Programs
                </span>
            </h2>

            <!-- Decorative Divider -->
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-secondary rounded-full"></div>
                <div class="w-3 h-3 bg-secondary rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-secondary via-primary to-secondary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-primary rounded-full"></div>
            </div>

            <!-- Subtitle -->
            <p class="text-lg md:text-xl text-dark/70 max-w-3xl mx-auto leading-relaxed">
                Temukan program yang sesuai dengan kebutuhan dan gaya hidup Anda
            </p>
        </div>

        <!-- Slider Container -->
        <div class="relative max-w-7xl mx-auto">
            
            <!-- Navigation Button Left -->
            <button
                type="button"
                onclick="slideService(-1)"
                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 items-center justify-center w-14 h-14 bg-cream text-primary rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-primary hover:to-secondary hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Left"
                id="serviceScrollLeft"
                style="display:none"
            >
                <i class="ri-arrow-left-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>

            <!-- Slider Track -->
            <div
                id="service-slider"
                class="flex items-stretch overflow-x-auto gap-6 md:gap-8 scroll-smooth pb-6 px-2"
                style="scrollbar-width: none; -ms-overflow-style: none;"
                onscroll="toggleServiceScroll()"
            >
                <!-- ================================ -->
                <!-- Card 1: Private Group Class      -->
                <!-- FIX: Hapus data-aos dari wrapper -->
                <!-- ================================ -->
                <div class="min-w-[85vw] sm:min-w-[300px] max-w-[320px] flex-shrink-0 flex">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-light-pink/60 hover:border-secondary/30 overflow-hidden w-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-light-pink/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
                        <div class="relative z-10 flex flex-col items-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-light-pink to-light-pink text-primary shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                                    <i class="ri-team-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-secondary/20 group-hover:border-secondary/40 transition-colors duration-300"></div>
                                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-secondary to-primary text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    Popular
                                </div>
                            </div>

                            <h4 class="text-xl font-black text-primary mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Private Group Class
                            </h4>

                            <p class="text-dark/70 text-sm leading-relaxed text-center mb-6 flex-1">
                                Latihan kelompok privat dengan instruktur berpengalaman, cocok untuk komunitas atau teman-teman.
                            </p>

                            <div class="w-full mb-6 space-y-2 text-xs text-dark/55">
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-secondary"></i>
                                    <span>Max 8-10 orang</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-secondary"></i>
                                    <span>Jadwal fleksibel</span>
                                </div>
                            </div>

                            <!-- Bottom Accent -->
                            <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-secondary via-primary to-secondary rounded-full transition-all duration-300 mb-3"></div>

                            <!-- FIX: Hapus hover:scale-105 dari button -->
                            <a href="https://wa.me/6287785767395" target="_blank" 
                               class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
                                <i class="ri-whatsapp-line text-lg"></i>
                                <span>Booking Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ================================ -->
                <!-- Card 2: Private Training         -->
                <!-- ================================ -->
                <div class="min-w-[85vw] sm:min-w-[300px] max-w-[320px] flex-shrink-0 flex">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-light-pink/60 hover:border-primary/30 overflow-hidden w-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-light-pink/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
                        <div class="relative z-10 flex flex-col items-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-light-pink to-light-pink text-primary shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                                    <i class="ri-user-heart-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-primary/20 group-hover:border-primary/40 transition-colors duration-300"></div>
                                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-primary to-primary text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    1-on-1
                                </div>
                            </div>

                            <h4 class="text-xl font-black text-primary mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Private Training
                            </h4>

                            <p class="text-dark/70 text-sm leading-relaxed text-center mb-6 flex-1">
                                Sesi latihan personal sesuai kebutuhan Anda, didampingi pelatih profesional untuk hasil optimal.
                            </p>

                            <div class="w-full mb-6 space-y-2 text-xs text-dark/55">
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-primary"></i>
                                    <span>Personal attention</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-primary"></i>
                                    <span>Custom program</span>
                                </div>
                            </div>

                            <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-primary via-secondary to-primary rounded-full transition-all duration-300 mb-3"></div>

                            <a href="https://wa.me/6287785767395" target="_blank" 
                               class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
                                <i class="ri-whatsapp-line text-lg"></i>
                                <span>Booking Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ================================ -->
                <!-- Card 3: Single Visit Class       -->
                <!-- ================================ -->
                <div class="min-w-[85vw] sm:min-w-[300px] max-w-[320px] flex-shrink-0 flex">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-light-pink/60 hover:border-secondary/30 overflow-hidden w-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
                        <div class="relative z-10 flex flex-col items-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-soft-petals to-power-pink text-white shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                                    <i class="ri-calendar-check-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-secondary/20 group-hover:border-secondary/40 transition-colors duration-300"></div>
                                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-secondary to-primary text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    Flexible
                                </div>
                            </div>

                            <h4 class="text-xl font-black text-primary mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Single Visit Class
                            </h4>

                            <p class="text-dark/70 text-sm leading-relaxed text-center mb-6 flex-1">
                                Ikuti kelas tanpa harus menjadi member tetap. Fleksibel untuk Anda yang ingin mencoba atau punya jadwal padat.
                            </p>

                            <div class="w-full mb-6 space-y-2 text-xs text-dark/55">
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-secondary"></i>
                                    <span>No commitment</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-secondary"></i>
                                    <span>Try first</span>
                                </div>
                            </div>

                            <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-secondary via-primary to-secondary rounded-full transition-all duration-300 mb-3"></div>

                            <a href="https://wa.me/6287785767395" target="_blank" 
                               class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
                                <i class="ri-whatsapp-line text-lg"></i>
                                <span>Booking Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ================================ -->
                <!-- Card 4: Reformer Pilates         -->
                <!-- ================================ -->
                <div class="min-w-[85vw] sm:min-w-[300px] max-w-[320px] flex-shrink-0 flex">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-light-pink/60 hover:border-primary/30 overflow-hidden w-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-green-50/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
                        <div class="relative z-10 flex flex-col items-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-grounded-green to-patina-green text-white shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                                    <i class="ri-group-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-primary/20 group-hover:border-primary/40 transition-colors duration-300"></div>
                                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-primary to-patina-green text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    Trending
                                </div>
                            </div>

                            <h4 class="text-xl font-black text-primary mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Reformer Pilates
                            </h4>

                            <p class="text-dark/70 text-sm leading-relaxed text-center mb-6 flex-1">
                                Latihan pilates dengan alat reformer untuk kekuatan, fleksibilitas, dan postur tubuh yang lebih baik.
                            </p>

                            <div class="w-full mb-6 space-y-2 text-xs text-dark/55">
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-primary"></i>
                                    <span>Alat reformer</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-primary"></i>
                                    <span>Improve posture</span>
                                </div>
                            </div>

                            <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-primary via-secondary to-primary rounded-full transition-all duration-300 mb-3"></div>

                            <a href="https://wa.me/6287785767395" target="_blank" 
                               class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
                                <i class="ri-whatsapp-line text-lg"></i>
                                <span>Booking Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ================================ -->
                <!-- Card 5: Exclusive Class Program  -->
                <!-- FIX: Hapus hover:scale-105 btn  -->
                <!-- ================================ -->
                <div class="min-w-[85vw] sm:min-w-[300px] max-w-[320px] flex-shrink-0 flex">
                    <div class="group relative bg-cream rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-light-pink/60 hover:border-secondary/30 overflow-hidden w-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-50/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
                        <div class="relative z-10 flex flex-col items-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-burnt-cherry to-power-pink text-white shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                                    <i class="ri-award-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-secondary/20 group-hover:border-secondary/40 transition-colors duration-300"></div>
                                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-secondary to-primary text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    Premium
                                </div>
                            </div>

                            <h4 class="text-xl font-black text-primary mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary transition-all duration-300">
                                Exclusive Class Program
                            </h4>

                            <p class="text-dark/70 text-sm leading-relaxed text-center mb-6 flex-1">
                                Program kelas eksklusif dengan materi pilihan, peserta terbatas, dan pendampingan intensif.
                            </p>

                            <div class="w-full mb-6 space-y-2 text-xs text-dark/55">
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-secondary"></i>
                                    <span>Limited seats</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-secondary"></i>
                                    <span>Intensive coaching</span>
                                </div>
                            </div>

                            <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-secondary via-primary to-secondary rounded-full transition-all duration-300 mb-3"></div>

                            <!-- FIX: hover:scale-105 dihapus -->
                            <a href="https://wa.me/6287785767395" target="_blank" 
                               class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
                                <i class="ri-whatsapp-line text-lg"></i>
                                <span>Booking Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Navigation Button Right -->
            <button
                type="button"
                onclick="slideService(1)"
                class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 items-center justify-center w-14 h-14 bg-cream text-primary rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-primary hover:to-secondary hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Right"
                id="serviceScrollRight"
            >
                <i class="ri-arrow-right-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>

        </div>

        <!-- Bottom CTA -->
        <div class="mt-16 text-center">
            <p class="text-dark/70 mb-6">
                Tidak yakin program mana yang cocok? <span class="font-semibold text-primary">Konsultasi gratis</span> dengan tim kami
            </p>
            <!-- FIX: hover:scale-105 dihapus dari CTA ini juga -->
            <a href="https://wa.me/6287785767395" 
               target="_blank"
               class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary via-secondary to-primary bg-[length:200%_auto] text-white font-bold rounded-full shadow-xl hover:shadow-2xl transition-shadow duration-300 group">
                <i class="ri-customer-service-2-line text-xl"></i>
                <span>Hubungi Kami</span>
                <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

    </div>
</section>

<!-- ================================ -->
<!-- ================================ -->
<style>
    /* Hide scrollbar */
    #service-slider::-webkit-scrollbar { display: none; }

    /* Gradient animation */
    @keyframes gradient-shift {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .animate-gradient-shift { animation: gradient-shift 4s ease infinite; }
</style>

<!-- ================================ -->
<!-- ================================ -->
<script>
    function slideService(direction) {
        const slider = document.getElementById('service-slider');
        const isMobile = window.innerWidth < 768;
        const scrollAmount = isMobile ? (window.innerWidth * 0.85 + 24) : 330;
        slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
        setTimeout(toggleServiceScroll, 350);
    }

    function toggleServiceScroll() {
        const slider   = document.getElementById('service-slider');
        const leftBtn  = document.getElementById('serviceScrollLeft');
        const rightBtn = document.getElementById('serviceScrollRight');
        if (!leftBtn || !rightBtn) return;

        leftBtn.style.display  = slider.scrollLeft > 10 ? 'flex' : 'none';
        const atEnd = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 10;
        rightBtn.style.display = atEnd ? 'none' : 'flex';
    }

    document.addEventListener('DOMContentLoaded', toggleServiceScroll);
    window.addEventListener('resize', toggleServiceScroll);
</script>
<!-- ========================================= -->
<!-- ENHANCED JAVASCRIPT FOR SLIDER -->
<!-- ========================================= -->

<script>
  function slideService(direction) {
    const slider = document.getElementById('service-slider');
    const isMobile = window.innerWidth < 768;
    const scrollAmount = isMobile ? (window.innerWidth * 0.85 + 24) : 340;
    slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    setTimeout(toggleServiceScroll, 300);
  }

  function toggleServiceScroll() {
    const slider = document.getElementById('service-slider');
    const leftBtn = document.getElementById('serviceScrollLeft');
    const rightBtn = document.getElementById('serviceScrollRight');
    
    if (leftBtn && rightBtn) {
      // Show/hide left button
      if (slider.scrollLeft > 20) {
        leftBtn.style.display = 'flex';
      } else {
        leftBtn.style.display = 'none';
      }
      
      // Show/hide right button
      const isAtEnd = (slider.scrollLeft + slider.clientWidth) >= (slider.scrollWidth - 20);
      if (isAtEnd) {
        rightBtn.style.display = 'none';
      } else {
        rightBtn.style.display = 'flex';
      }
    }
  }

  // Initialize on page load
  window.addEventListener('DOMContentLoaded', toggleServiceScroll);
  window.addEventListener('resize', toggleServiceScroll);

  // Auto-hide scrollbar
  const serviceSlider = document.getElementById('service-slider');
  if (serviceSlider) {
    serviceSlider.style.scrollbarWidth = 'none';
    serviceSlider.style.msOverflowStyle = 'none';
  }
</script>

<!-- ========================================= -->
<!-- ADDITIONAL CSS -->
<!-- ========================================= -->

<style>
  /* Hide scrollbar for slider */
  #service-slider::-webkit-scrollbar {
    display: none;
  }

  /* Gradient Animation */
  @keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .animate-gradient-shift {
    animation: gradient-shift 4s ease infinite;
  }
</style>

<script>
  function slideService(direction) {
    const slider = document.getElementById('service-slider');
    const isMobile = window.innerWidth < 768;
    const scrollAmount = isMobile ? (window.innerWidth * 0.9 + 24) : 260;
    slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    setTimeout(toggleServiceScroll, 300);
  }

  function toggleServiceScroll() {
    const slider = document.getElementById('service-slider');
    const leftBtn = document.getElementById('serviceScrollLeft');
    const rightBtn = document.getElementById('serviceScrollRight');
    leftBtn.style.display = slider.scrollLeft > 0 ? 'block' : 'none';
    rightBtn.style.display = (slider.scrollLeft + slider.clientWidth) < slider.scrollWidth ? 'block' : 'none';
  }

  window.addEventListener('DOMContentLoaded', toggleServiceScroll);
  window.addEventListener('resize', toggleServiceScroll);
</script>


<!-- Modal Detail Service -->
<div 
  id="service-detail-modal"
  class="fixed inset-0 hidden z-50 bg-dark bg-opacity-60 items-center justify-center transition-opacity duration-200"
>
  <div 
    id="service-detail-box"
    class="bg-cream rounded-lg shadow-xl max-w-md w-full p-8 relative transform transition-all duration-200 scale-95 opacity-0"
  >
    <button 
      onclick="closeServiceDetail()" 
      class="absolute top-2 right-2 text-dark/55 hover:text-primary text-2xl"
      aria-label="Close Modal"
    >
      &times;
    </button>

    <h3 id="service-detail-title" class="text-xl font-bold text-primary mb-4"></h3>
    <div id="service-detail-content" class="text-dark text-sm leading-relaxed"></div>
  </div>
</div>

<script>
  const serviceDetails = {
    'private-group': {
      title: 'Private Group Class',
      content: `
        <ul class="mb-3 list-disc pl-5">
          <li>Latihan kelompok privat dengan instruktur profesional</li>
          <li>Cocok untuk komunitas, keluarga, atau teman</li>
          <li>Jadwal fleksibel & suasana eksklusif</li>
        </ul>
        <p class="mb-2 font-semibold">Fasilitas:</p>
        <ul class="mb-3 list-disc pl-5">
          <li>Ruang latihan khusus</li>
          <li>Peralatan lengkap</li>
          <li>Free konsultasi awal</li>
        </ul>
      `
    },
    'private-training': {
      title: 'Private Training',
      content: `
        <ul class="mb-3 list-disc pl-5">
          <li>Latihan 1-on-1 dengan trainer profesional</li>
          <li>Program disesuaikan dengan kebutuhan Anda</li>
        </ul>
      `
    },
    'single-visit': {
      title: 'Single Visit Class',
      content: `
        <ul class="mb-3 list-disc pl-5">
          <li>Semi privat max 6–7 orang</li>
          <li>Coach perempuan tersertifikasi</li>
        </ul>
      `
    },
    'reformer-pilates': {
      title: 'Reformer Pilates',
      content: `
        <ul class="mb-3 list-disc pl-5">
          <li>Group Class: semi private max 3 orang</li>
          <li>Private Class untuk special case</li>
        </ul>
      `
    },
    'exclusive-program': {
      title: 'Exclusive Class Program',
      content: `
        <ul class="mb-3 list-disc pl-5">
          <li>8 sesi per bulan (2x/minggu)</li>
          <li>Dilatih oleh pelatih perempuan muslim tersertifikasi</li>
          <li>Semi private max 6–7 orang</li>
        </ul>
      `
    },
  };

  function showServiceDetail(key) {
    const modal = document.getElementById('service-detail-modal');
    const box = document.getElementById('service-detail-box');

    document.getElementById('service-detail-title').textContent = serviceDetails[key].title;
    document.getElementById('service-detail-content').innerHTML = serviceDetails[key].content;

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    // animasi masuk
    setTimeout(() => {
      box.classList.remove('opacity-0', 'scale-95');
      box.classList.add('opacity-100', 'scale-100');
    }, 10);
  }

  function closeServiceDetail() {
    const modal = document.getElementById('service-detail-modal');
    const box = document.getElementById('service-detail-box');

    // animasi keluar
    box.classList.add('opacity-0', 'scale-95');
    box.classList.remove('opacity-100', 'scale-100');

    setTimeout(() => {
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }, 200);
  }
</script>

<!-- ========================================= -->
<!-- PACKAGES & PRICING SECTION - STABLE FIXED -->
<!-- Cards tidak bergoyang sama sekali          -->
<!-- ========================================= -->

<section class="relative py-20 md:py-28 lg:py-32 overflow-hidden">
    
    <!-- Multi-Layer Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-cream via-light-pink/40 to-white"></div>
    
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-[0.015] pointer-events-none">
        <div class="absolute inset-0" 
             style="background-image: 
                repeating-linear-gradient(0deg, transparent, transparent 50px, primary 50px, primary 51px),
                repeating-linear-gradient(90deg, transparent, transparent 50px, #793451 50px, #793451 51px);
                background-size: 100px 100px;">
        </div>
    </div>

    <!-- Floating Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-48 left-0 w-96 h-96 bg-gradient-to-br from-secondary/15 to-primary/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 7s;"></div>
        <div class="absolute top-1/3 -right-32 w-[500px] h-[500px] bg-gradient-to-tl from-primary/10 to-light-pink/10 rounded-full blur-3xl animate-pulse" style="animation-duration: 9s; animation-delay: 2s;"></div>
        <div class="absolute -bottom-32 left-1/4 w-80 h-80 bg-gradient-to-tr from-light-pink/15 to-secondary/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 8s; animation-delay: 1s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="text-center mb-16 md:mb-24">
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-primary/10 via-secondary/10 to-primary/10 rounded-full border border-primary/20 shadow-lg backdrop-blur-sm">
                <span class="brand-flower brand-flower-pink" style="width: 16px; height: 16px;"></span>
                <div class="relative">
                    <div class="w-2 h-2 bg-primary rounded-full animate-ping absolute"></div>
                    <div class="w-2 h-2 bg-primary rounded-full relative"></div>
                </div>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary">
                    The Best Investment for Your Health
                </span>
            </div>

            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="text-primary">Packages &</span>
                <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-secondary via-primary to-secondary animate-gradient-shift bg-[length:200%_auto]">
                    Pricing
                </span>
            </h2>

            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-primary via-secondary to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-secondary rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-secondary rounded-full"></div>
            </div>

            <p class="text-lg md:text-xl text-dark/70 max-w-3xl mx-auto leading-relaxed">
                Pilih rencana yang sempurna yang sesuai dengan perjalanan kebugaran dan gaya hidup Anda
            </p>
        </div>

        <!-- Slider Container -->
        <div class="relative max-w-7xl mx-auto">
            
            <!-- Nav Left -->
            <button type="button" onclick="slideMembership(-1)"
                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 items-center justify-center w-14 h-14 bg-cream text-primary rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-primary hover:to-secondary hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Left" id="membershipScrollLeft" style="display:none">
                <i class="ri-arrow-left-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>

            <div id="membershipList"
                 class="flex items-stretch overflow-x-auto gap-6 md:gap-8 scroll-smooth pb-6 px-2"
                 style="scrollbar-width:none; -ms-overflow-style:none;"
                 onscroll="toggleMembershipScroll()">

                {{-- Dynamic Packages from Admin Panel --}}
                @if(isset($packages) && $packages->count() > 0)
                    @foreach($packages as $package)
                    <div class="min-w-[90vw] sm:min-w-[340px] max-w-[360px] flex-shrink-0 flex">
                        <div class="group relative bg-cream rounded-3xl p-8 shadow-lg
                                    hover:shadow-2xl transition-shadow duration-300
                                    border-2 border-light-pink/40 hover:border-primary/30
                                    overflow-hidden w-full flex flex-col">

                            {{-- Hover gradient overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-light-pink/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">

                                {{-- Badge: Dynamic Package --}}
                                <div class="mb-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-primary to-secondary text-white text-xs font-bold rounded-full shadow-md">
                                        <i class="ri-heart-pulse-fill"></i>
                                        <span>EKSKLUSIF</span>
                                    </span>
                                </div>

                                {{-- Package Name --}}
                                <h3 class="text-2xl font-black text-primary mb-3 leading-tight group-hover:text-secondary transition-colors">
                                    {{ $package->name }}
                                </h3>

                                {{-- Price --}}
                                <div class="mb-6">
                                    <div class="flex items-baseline gap-2">
                                        <span class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary">
                                            Rp {{ number_format($package->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    @if($package->duration_days)
                                        <p class="text-dark/60 text-sm mt-1">Valid {{ $package->duration_days }} hari</p>
                                    @endif
                                </div>

                                {{-- Features --}}
                                <ul class="w-full space-y-3 mb-6 flex-1">
                                    @if($package->quota)
                                    <li class="flex items-center gap-3 text-sm text-dark">
                                        <i class="ri-checkbox-circle-fill text-xl text-secondary flex-shrink-0"></i>
                                        <span>{{ $package->quota }} Sessions</span>
                                    </li>
                                    @endif
                                    @if($package->description)
                                    <li class="flex items-start gap-3 text-sm text-dark/80">
                                        <i class="ri-information-fill text-xl text-primary flex-shrink-0 mt-0.5"></i>
                                        <span>{{ Str::limit($package->description, 80) }}</span>
                                    </li>
                                    @endif
                                </ul>

                                <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-primary via-secondary to-primary rounded-full transition-all duration-500 mb-4"></div>

                                {{-- CTA Button --}}
                                <div class="w-full mt-auto">
                                    @auth('customer')
                                        <a href="#signup"
                                           class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-4 rounded-full hover:shadow-xl hover:brightness-110 transition-all font-bold text-center block">
                                            Daftar Sekarang
                                        </a>
                                    @else
                                        <a href="#signup"
                                           class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-4 rounded-full hover:shadow-xl hover:brightness-110 transition-all font-bold text-center block">
                                            Sign Up Now
                                        </a>
                                    @endauth
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div><!-- end #membershipList -->

            <!-- Nav Right -->
            <button type="button" onclick="slideMembership(1)"
                class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 items-center justify-center w-14 h-14 bg-cream text-primary rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-primary hover:to-secondary hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Right" id="membershipScrollRight">
                <i class="ri-arrow-right-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>

        </div>

        <!-- Bottom Notes -->
        <div class="mt-16 text-center">
            <p class="text-dark/70 text-sm max-w-2xl mx-auto">
                All packages include Schedule will continue to be updated
            </p>
        </div>

    </div>
</section>

<style>
    #membershipList::-webkit-scrollbar { display: none; }

    @keyframes gradient-shift {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .animate-gradient-shift { animation: gradient-shift 4s ease infinite; }
</style>

<script>
    function slideMembership(direction) {
        const slider = document.getElementById('membershipList');
        slider.scrollBy({ left: direction * 370, behavior: 'smooth' });
        setTimeout(toggleMembershipScroll, 350);
    }

    function toggleMembershipScroll() {
        const slider   = document.getElementById('membershipList');
        const leftBtn  = document.getElementById('membershipScrollLeft');
        const rightBtn = document.getElementById('membershipScrollRight');
        if (!leftBtn || !rightBtn) return;
        leftBtn.style.display  = slider.scrollLeft > 10 ? 'flex' : 'none';
        const atEnd = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 10;
        rightBtn.style.display = atEnd ? 'none' : 'flex';
    }

    document.addEventListener('DOMContentLoaded', toggleMembershipScroll);
    window.addEventListener('resize', toggleMembershipScroll);
</script>

<!-- ========================================= -->
<!-- ENHANCED JAVASCRIPT FOR SLIDER -->
<!-- ========================================= -->

<script>
  function slideMembership(direction) {
    const slider = document.getElementById('membershipList');
    const scrollAmount = 380;
    slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    setTimeout(toggleMembershipScroll, 300);
  }

  function toggleMembershipScroll() {
    const slider = document.getElementById('membershipList');
    const leftBtn = document.getElementById('membershipScrollLeft');
    const rightBtn = document.getElementById('membershipScrollRight');
    
    if (leftBtn && rightBtn) {
      if (slider.scrollLeft > 20) {
        leftBtn.style.display = 'flex';
      } else {
        leftBtn.style.display = 'none';
      }
      
      const isAtEnd = (slider.scrollLeft + slider.clientWidth) >= (slider.scrollWidth - 20);
      if (isAtEnd) {
        rightBtn.style.display = 'none';
      } else {
        rightBtn.style.display = 'flex';
      }
    }
  }

  window.addEventListener('DOMContentLoaded', toggleMembershipScroll);
  window.addEventListener('resize', toggleMembershipScroll);

  const membershipSlider = document.getElementById('membershipList');
  if (membershipSlider) {
    membershipSlider.style.scrollbarWidth = 'none';
    membershipSlider.style.msOverflowStyle = 'none';
  }
</script>

<!-- ========================================= -->
<!-- ADDITIONAL CSS -->
<!-- ========================================= -->

<style>
  #membershipList::-webkit-scrollbar {
    display: none;
  }

  @keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .animate-gradient-shift {
    animation: gradient-shift 4s ease infinite;
  }
</style>


<!-- Tambahkan link Remix Icon di <head> jika belum -->
<!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"> -->

<script>
  function slideMembership(direction) {
    const slider = document.getElementById('membershipList');
    const scrollAmount = 350;
    slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    setTimeout(toggleMembershipScroll, 300);
  }

  function toggleMembershipScroll() {
    const slider = document.getElementById('membershipList');
    const leftBtn = document.getElementById('membershipScrollLeft');
    const rightBtn = document.getElementById('membershipScrollRight');
    leftBtn.style.display = slider.scrollLeft > 0 ? 'block' : 'none';
    rightBtn.style.display = (slider.scrollLeft + slider.clientWidth) < slider.scrollWidth ? 'block' : 'none';
  }

  window.addEventListener('DOMContentLoaded', toggleMembershipScroll);
  window.addEventListener('resize', toggleMembershipScroll);
</script>


<!-- ========================================= -->
<!-- CLASSES SECTION - ULTIMATE PROFESSIONAL  -->
<!-- Consistent with FTM Society design style -->
<!-- Cards TIDAK bergoyang                     -->
<!-- ========================================= -->

<section id="classes" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">

    <!-- Multi-Layer Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-white via-light-pink/30 to-cream"></div>

    <!-- Subtle Grid Pattern -->
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
         style="background-image:
            repeating-linear-gradient(0deg, transparent, transparent 50px, primary 50px, primary 51px),
            repeating-linear-gradient(90deg, transparent, transparent 50px, #793451 50px, #793451 51px);
            background-size: 100px 100px;">
    </div>

    <!-- Floating Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-gradient-to-br from-secondary/15 to-primary/15 rounded-full blur-3xl animate-pulse" style="animation-duration:7s;"></div>
        <div class="absolute top-1/2 -right-40 w-[500px] h-[500px] bg-gradient-to-tl from-primary/10 to-light-pink/10 rounded-full blur-3xl animate-pulse" style="animation-duration:9s; animation-delay:2s;"></div>
        <div class="absolute -bottom-20 left-1/3 w-80 h-80 bg-gradient-to-tr from-light-pink/15 to-secondary/15 rounded-full blur-3xl animate-pulse" style="animation-duration:8s; animation-delay:1s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="text-center mb-16 md:mb-20">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-primary/10 via-secondary/10 to-primary/10 rounded-full border border-primary/20 shadow-lg backdrop-blur-sm">
                <span class="brand-flower brand-flower-pink" style="width: 16px; height: 16px;"></span>
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                </span>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary">
                   Our Class Program
                </span>
            </div>

            <!-- Title -->
            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                
                <span class="block mt-1 text-transparent bg-clip-text bg-gradient-to-r from-secondary via-primary to-secondary animate-gradient-shift bg-[length:200%_auto]">
                    Classes
                </span>
            </h2>

            <!-- Decorative Divider -->
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-primary via-secondary to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-secondary rounded-full animate-pulse" style="animation-delay:0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-secondary rounded-full"></div>
            </div>

            <p class="text-lg md:text-xl text-dark/70 max-w-2xl mx-auto leading-relaxed">
                Temukan berbagai program kebugaran yang dirancang khusus untuk kebutuhan Anda.
            </p>
        </div>

        <!-- KEY: grid layout, tidak pakai slider -> tidak perlu hover:scale pada card -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">

            <!-- CARD 1 : Muaythai         -->
            <div class="group relative bg-cream rounded-3xl overflow-hidden
                        shadow-lg hover:shadow-2xl transition-shadow duration-300
                        border-2 border-light-pink/60 hover:border-secondary/30 flex flex-col">

                <!-- Hover tint -->
                <div class="absolute inset-0 bg-gradient-to-br from-light-pink/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                <!-- Image -->
                <div class="relative h-52 overflow-hidden flex-shrink-0">
                    <img src="./images/muaythai.png" alt="Muaythai"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Badge -->
                    <div class="absolute top-3 left-3 bg-gradient-to-r from-secondary to-primary text-white text-xs font-black px-3 py-1 rounded-full shadow-lg">
                        Popular
                    </div>
                    <!-- Duration chip -->
                    <div class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold px-2.5 py-1 rounded-full shadow">
                        45 min
                    </div>
                </div>

                <!-- Content -->
                <div class="relative z-10 p-6 flex-1 flex flex-col">

                    <!-- Icon + Title Row -->
                    <div class="flex items-center gap-3 mb-3">
                        <!-- Icon: HANYA icon yang scale pada hover -->
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                                    bg-gradient-to-br from-light-pink to-light-pink text-primary
                                    shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                             style="will-change:transform; flex-shrink:0;">
                            <i class="ri-boxing-line text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-primary leading-tight
                                       group-hover:text-transparent group-hover:bg-clip-text
                                       group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary
                                       transition-all duration-300">
                                Muaythai
                            </h3>
                            <span class="text-xs text-dark/40 font-medium">All Levels</span>
                        </div>
                    </div>

                    <p class="text-sm text-dark/70 leading-relaxed flex-1 mb-5">
                        Seni bela diri asal Thailand menggunakan delapan titik kontak tubuh: tangan, siku, lutut, dan kaki — melibatkan teknik serangan dan pertahanan.
                    </p>

                    <!-- Bottom accent line -->
                    <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-secondary via-primary to-secondary rounded-full transition-all duration-500 mb-4"></div>

                    <button onclick="openModal('muaythai')"
                            class="w-full bg-gradient-to-r from-primary to-secondary text-white px-4 py-3 rounded-full
                                   hover:shadow-xl hover:brightness-110 transition-all text-sm font-bold
                                   flex items-center justify-center gap-2 mt-auto">
                        <i class="ri-eye-line text-base"></i>
                        Cek Sekarang
                    </button>
                </div>
            </div>

            <!-- CARD 2 : Body Shaping     -->
            <div class="group relative bg-cream rounded-3xl overflow-hidden
                        shadow-lg hover:shadow-2xl transition-shadow duration-300
                        border-2 border-light-pink/60 hover:border-primary/30 flex flex-col">

                <div class="absolute inset-0 bg-gradient-to-br from-light-pink/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                <div class="relative h-52 overflow-hidden flex-shrink-0">
                    <img src="./images/body shaping.png" alt="Body Shaping"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <div class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold px-2.5 py-1 rounded-full shadow">
                        30 min
                    </div>
                </div>

                <div class="relative z-10 p-6 flex-1 flex flex-col">

                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                                    bg-gradient-to-br from-light-pink to-light-pink text-primary
                                    shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                             style="will-change:transform; flex-shrink:0;">
                            <i class="ri-body-scan-line text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-primary leading-tight
                                       group-hover:text-transparent group-hover:bg-clip-text
                                       group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary
                                       transition-all duration-300">
                                Body Shaping
                            </h3>
                            <span class="text-xs text-dark/40 font-medium">All Levels</span>
                        </div>
                    </div>

                    <p class="text-sm text-dark/70 leading-relaxed flex-1 mb-5">
                        Kelas strength training full body workout untuk toning dan shaping tubuh — dari calisthenics hingga gerakan dengan beban dan equipment pendukung.
                    </p>

                    <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-primary via-secondary to-primary rounded-full transition-all duration-500 mb-4"></div>

                    <button onclick="openModal('body-shaping')"
                            class="w-full bg-gradient-to-r from-primary to-secondary text-white px-4 py-3 rounded-full
                                   hover:shadow-xl hover:brightness-110 transition-all text-sm font-bold
                                   flex items-center justify-center gap-2 mt-auto">
                        <i class="ri-eye-line text-base"></i>
                        Cek Sekarang
                    </button>
                </div>
            </div>

            <!-- CARD 3 : Mat Pilates      -->
            <div class="group relative bg-cream rounded-3xl overflow-hidden
                        shadow-lg hover:shadow-2xl transition-shadow duration-300
                        border-2 border-light-pink/60 hover:border-secondary/30 flex flex-col">

                <div class="absolute inset-0 bg-gradient-to-br from-blue-50/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                <div class="relative h-52 overflow-hidden flex-shrink-0">
                    <img src="./images/mat pilates.png" alt="Mat Pilates"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <div class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold px-2.5 py-1 rounded-full shadow">
                        60 min
                    </div>
                </div>

                <div class="relative z-10 p-6 flex-1 flex flex-col">

                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                                    bg-gradient-to-br from-soft-petals to-power-pink text-white
                                    shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                             style="will-change:transform; flex-shrink:0;">
                            <i class="ri-mental-health-line text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-primary leading-tight
                                       group-hover:text-transparent group-hover:bg-clip-text
                                       group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary
                                       transition-all duration-300">
                                Mat Pilates
                            </h3>
                            <span class="text-xs text-dark/40 font-medium">All Levels</span>
                        </div>
                    </div>

                    <p class="text-sm text-dark/70 leading-relaxed flex-1 mb-5">
                        Latihan di atas matras fokus pada kekuatan inti (core), stabilitas, postur, pernapasan, dan fleksibilitas — dilakukan secara perlahan dan terkontrol.
                    </p>

                    <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-secondary via-primary to-secondary rounded-full transition-all duration-500 mb-4"></div>

                    <button onclick="openModal('mat-pilates')"
                            class="w-full bg-gradient-to-r from-primary to-secondary text-white px-4 py-3 rounded-full
                                   hover:shadow-xl hover:brightness-110 transition-all text-sm font-bold
                                   flex items-center justify-center gap-2 mt-auto">
                        <i class="ri-eye-line text-base"></i>
                        Cek Sekarang
                    </button>
                </div>
            </div>

            <!-- CARD 4 : Reformer Pilates      -->
            <div class="group relative bg-cream rounded-3xl overflow-hidden
                        shadow-lg hover:shadow-2xl transition-shadow duration-300
                        border-2 border-light-pink/60 hover:border-primary/30 flex flex-col">

                <div class="absolute inset-0 bg-gradient-to-br from-green-50/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                <div class="relative h-52 overflow-hidden flex-shrink-0">
                    <img src="./images/revormer pilates.png" alt="Reformer Pilates"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Badge -->
                    <div class="absolute top-3 left-3 bg-gradient-to-r from-primary to-secondary text-white text-xs font-black px-3 py-1 rounded-full shadow-lg">
                        Popular
                    </div>
                    <div class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-sm text-primary text-xs font-bold px-2.5 py-1 rounded-full shadow">
                        45 min
                    </div>
                </div>

                <div class="relative z-10 p-6 flex-1 flex flex-col">

                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                                    bg-gradient-to-br from-grounded-green to-patina-green text-white
                                    shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                             style="will-change:transform; flex-shrink:0;">
                            <i class="ri-focus-3-line text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-primary leading-tight
                                       group-hover:text-transparent group-hover:bg-clip-text
                                       group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary
                                       transition-all duration-300">
                                Reformer Pilates
                            </h3>
                            <span class="text-xs text-dark/40 font-medium">All Levels</span>
                        </div>
                    </div>

                    <p class="text-sm text-dark/70 leading-relaxed flex-1 mb-5">
                        Menggunakan alat reformer dengan pegas dan tali untuk resistensi tambahan — variasi Mat Pilates yang dibantu alat untuk hasil lebih optimal.
                    </p>

                    <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-primary via-secondary to-primary rounded-full transition-all duration-500 mb-4"></div>

                    <button onclick="openModal('reformer-pilates')"
                            class="w-full bg-gradient-to-r from-primary to-secondary text-white px-4 py-3 rounded-full
                                   hover:shadow-xl hover:brightness-110 transition-all text-sm font-bold
                                   flex items-center justify-center gap-2 mt-auto">
                        <i class="ri-eye-line text-base"></i>
                        Cek Sekarang
                    </button>
                </div>
            </div>

        </div><!-- end grid -->

    </div>
</section>

<div id="class-modal"
     class="fixed inset-0 bg-dark/60 backdrop-blur-sm hidden justify-center items-center z-50 px-4">
    <div class="bg-cream w-full max-w-lg rounded-3xl shadow-2xl relative overflow-hidden">

        <!-- Modal gradient top bar -->
        <div class="h-1.5 w-full bg-gradient-to-r from-primary via-secondary to-primary"></div>

        <!-- Close Button -->
        <button onclick="closeModal()"
                class="absolute top-4 right-4 w-9 h-9 flex items-center justify-center rounded-full bg-cream hover:bg-light-pink hover:text-primary text-dark/55 text-lg font-bold transition-colors duration-200 z-10">
            &times;
        </button>

        <!-- Modal Content -->
        <div class="p-7">
            <h3 id="modal-title" class="text-2xl font-black text-primary mb-1"></h3>
            <div id="modal-content" class="text-sm text-dark/70 mt-3"></div>

            <div class="mt-6">
                <a id="modal-wa-btn"
                   href="#"
                   target="_blank"
                   class="w-full bg-gradient-to-r from-primary to-secondary text-white px-6 py-3.5 rounded-full
                          hover:shadow-xl hover:brightness-110 transition-all font-bold
                          flex items-center justify-center gap-2 text-sm">
                    <i class="ri-whatsapp-line text-xl"></i>
                    Daftar via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes gradient-shift {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .animate-gradient-shift { animation: gradient-shift 4s ease infinite; }

    /* Pastikan image zoom tidak keluar card -->
    #classes .group { isolation: isolate; }
</style>

@php
    use Illuminate\Support\Str;

    // flatten dulu (ini kunci)
    $flatSchedules = $schedules->flatten();

    $classKeywords = ['muaythai', 'pilates'];
    $groupedSchedules = [];

    foreach ($classKeywords as $keyword) {
        $groupedSchedules[$keyword] = $flatSchedules->filter(function ($schedule) use ($keyword) {
            return Str::contains(
                Str::lower($schedule->classModel->class_name ?? ''),
                $keyword
            );
        });
    }
@endphp


<script>
const classSchedules = {
    @foreach($groupedSchedules as $keyword => $entries)
        '{{ $keyword }}': [
            @foreach($entries->take(100) as $entry)
                {
                    hari: '{{ $entry->day }}',
                    tanggal: '{{ $entry->schedule_date }}',
                    jam: '{{ \Carbon\Carbon::parse($entry->class_time)->format('H:i') }}',
                    instruktur: '{{ $entry->instructor ?? '-' }}',
                    kelas: '{{ optional($entry->classModel)->class_name ?? '-' }}'
                }@if(!$loop->last),@endif
            @endforeach
        ]@if(!$loop->last),@endif
    @endforeach
};

  const classPrograms = {
    'muaythai': ["Exclusive Class Program", "Single Visit Class Program", "Private Program"],
    'body-shaping': ["Exclusive Class Program", "Single Visit Class Program", "Private Program"],
    'mat-pilates': ["Exclusive Class Program", "Single Visit Class Program", "Private Program"],
    'reformer-pilates': ["Single Visit Group Class", "Single Visit Packages"]
  };

  const waMessages = {
    'muaythai': "Halo FTM Society, saya ingin daftar kelas Muaythai.",
    'body-shaping': "Halo FTM Society, saya tertarik dengan kelas Body Shaping.",
    'mat-pilates': "Halo FTM Society, saya ingin info dan daftar Mat Pilates.",
    'reformer-pilates': "Halo FTM Society, saya ingin ikut Reformer Pilates."
  };

  const waNumber = "6287785767395";

  function openModal(key) {
    const modal = document.getElementById('class-modal');
    const title = document.getElementById('modal-title');
    const content = document.getElementById('modal-content');
    const waBtn = document.getElementById('modal-wa-btn');
    title.textContent = "Jadwal Kelas Exclusive Program";

    waBtn.onclick = function (e) {
      e.preventDefault();
      const waText = encodeURIComponent(waMessages[key] || "Halo FTM Society, saya ingin daftar kelas.");
      const waLink = `https://wa.me/${waNumber}?text=${waText}`;
      window.open(waLink, '_blank');
    };

    let jadwalHTML = `<h4 class="font-semibold text-primary mb-2 text-lg">Jadwal Kelas ${key.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase())}</h4>`;
    if (classSchedules[key]) {
      jadwalHTML += `<table class="w-full mb-4 text-sm">
        <thead>
          <tr>
            <th class="text-left py-1 px-2 text-dark/70">Class</th>
            <th class="text-left py-1 px-2 text-dark/70">Hari</th>
            <th class="text-left py-1 px-2 text-dark/70">Tanggal</th>
            <th class="text-left py-1 px-2 text-dark/70">Jam</th>
            <th class="text-left py-1 px-2 text-dark/70">Instruktur</th>
          </tr>
        </thead>
        <tbody>
          ${classSchedules[key].map(j => `
          <tr>
            <td class="py-1 px-2 text-xs text-dark/55">${j.kelas}</td>
            <td class="py-1 px-2">${j.hari}</td>
            <td class="py-1 px-2">${j.tanggal}</td>
            <td class="py-1 px-2">${j.jam ? j.jam.split(' ')[1].slice(0,5) : ''}</td>
            <td class="py-1 px-2">${j.instruktur}</td>
          </tr>
        `).join('')}
        </tbody>
      </table>`;
    } else {
      jadwalHTML += `<p class="text-dark/55 mb-4">Jadwal belum tersedia.</p>`;
    }

    let programs = classPrograms[key] || [];
    let serviceHTML = `<h4 class="font-semibold text-primary mb-2 text-lg">Pilihan Programs</h4>
      <ul class="mb-4 grid grid-cols-2 gap-2">
        ${programs.map(s => `
          <li class="bg-cream border-2 border-secondary rounded-full px-3 py-2 text-xs text-primary font-semibold text-center shadow-sm transition-all duration-200 hover:bg-secondary hover:text-white cursor-pointer" style="border-color:primary;">
            ${s}
          </li>
        `).join('')}
      </ul>`;

    content.innerHTML = jadwalHTML + serviceHTML;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    const modal = document.getElementById('class-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }
</script>



        <!-- Notes -->
        <div class="mt-12 text-center">
          <p class="text-dark/70 text-sm">
            All packages including Schedule will continue to be updated
          </p>
          <div class="mt-8">
          </div>
        </div>
      </div>
    </section>
  <!-- Modal Service Detail -->
<div 
  id="service-detail-modal"
  class="fixed inset-0 hidden z-50 bg-dark bg-opacity-60 items-center justify-center transition-opacity"
>
  <div 
    id="service-detail-box"
    class="bg-cream rounded-lg shadow-xl max-w-md w-full p-8 relative transform transition-all scale-95 opacity-0"
  >
    <button 
      onclick="closeServiceDetail()" 
      class="absolute top-2 right-2 text-dark/55 hover:text-primary text-2xl"
      aria-label="Close Modal"
    >
      &times;
    </button>

    <h3 id="service-detail-title" class="text-xl font-bold text-primary mb-4"></h3>

    <p id="service-detail-desc" class="text-dark leading-relaxed"></p>
  </div>
</div>

   <!-- Jadwal Kelas Simpel & Modern -->
<section id="schedule" class="py-10 px-4 bg-cream">
  <div class="max-w-3xl mx-auto text-center">
    <h2 class="text-2xl md:text-3xl font-semibold text-dark mb-6 uppercase tracking-wide">
      Jadwal Kelas Exclusive Program
    </h2>

    <!-- WRAPPER supaya tabel bisa discroll jika layar kecil -->
    <div class="overflow-x-auto rounded-xl shadow-md bg-cream border border-light-pink/60">
      <table class="min-w-[600px] w-full border-collapse text-sm md:text-base text-dark">
        <thead class="bg-dark text-white">
          <tr>
            <th class="py-3 px-4 text-center uppercase text-xs font-semibold">Class</th>
            <th class="py-3 px-4 text-center uppercase text-xs font-semibold">Day</th>
            <th class="py-3 px-4 text-center uppercase text-xs font-semibold">Date</th>
            <th class="py-3 px-4 text-center uppercase text-xs font-semibold">Time</th>
            <th class="py-3 px-4 text-center uppercase text-xs font-semibold">Coach</th>
          </tr>
        </thead>
        <tbody>
@foreach($schedules as $day => $items)

    

    {{-- DATA JADWAL --}}
    @foreach($items->take(50) as $schedule)
        <tr class="border-t hover:bg-cream transition">
            <td class="py-3 px-4 text-center font-medium">
                {{ $schedule->classModel->class_name ?? '-' }}
            </td>

            <td class="py-3 px-4 text-center">
                {{ $schedule->day }}
            </td>

            <td class="py-3 px-4 text-center">
                {{ $schedule->schedule_date }}
            </td>

            <td class="py-3 px-4 text-center">
                {{ \Carbon\Carbon::parse($schedule->class_time)->format('H:i') }}
            </td>

            <td class="py-3 px-4 text-center">
                {{ $schedule->instructor ?? '-' }}
            </td>
        </tr>
    @endforeach

@endforeach
</tbody>
      </table>
    </div>
  </div>
</section>
{{-- ========================================= --}}
{{-- GALLERY SECTION - Selaras dengan Classes --}}
{{-- ========================================= --}}

<section id="Facility" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">

    {{-- Multi-Layer Background --}}
    <div class="absolute inset-0 bg-gradient-to-b from-white via-light-pink/30 to-cream"></div>

    {{-- Subtle Grid Pattern --}}
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
         style="background-image:
            repeating-linear-gradient(0deg, transparent, transparent 50px, primary 50px, primary 51px),
            repeating-linear-gradient(90deg, transparent, transparent 50px, #793451 50px, #793451 51px);
            background-size: 100px 100px;">
    </div>

    {{-- Floating Gradient Orbs --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-gradient-to-bl from-secondary/15 to-primary/15 rounded-full blur-3xl animate-pulse" style="animation-duration:7s;"></div>
        <div class="absolute top-1/2 -left-40 w-[500px] h-[500px] bg-gradient-to-tr from-primary/10 to-light-pink/10 rounded-full blur-3xl animate-pulse" style="animation-duration:9s; animation-delay:2s;"></div>
        <div class="absolute -bottom-20 right-1/3 w-80 h-80 bg-gradient-to-tl from-light-pink/15 to-secondary/15 rounded-full blur-3xl animate-pulse" style="animation-duration:8s; animation-delay:1s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- ── Section Header ── --}}
        <div class="text-center mb-16 md:mb-20">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-primary/10 via-secondary/10 to-primary/10 rounded-full border border-primary/20 shadow-lg backdrop-blur-sm">
                <span class="brand-flower brand-flower-pink" style="width: 16px; height: 16px;"></span>
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                </span>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary">
                    Our Facilities
                </span>
            </div>

            {{-- Title --}}
            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-secondary via-primary to-secondary" style="background-size:200% auto; animation: gradientShift 4s ease infinite;">
                    Our Gallery
                </span>
            </h2>

            {{-- Decorative Divider --}}
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-primary via-secondary to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-secondary rounded-full animate-pulse" style="animation-delay:0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-secondary rounded-full"></div>
            </div>

            <p class="text-lg md:text-xl text-dark/70 max-w-2xl mx-auto leading-relaxed">
                Jelajahi fasilitas kelas dunia kami yang dirancang untuk menginspirasi, menantang, dan mengubah Anda.
            </p>
        </div>

        {{-- ── Slider ── --}}
        <div class="relative max-w-5xl mx-auto">

            {{-- Slider Card --}}
            <div id="facility-slider"
                 class="relative overflow-hidden rounded-3xl shadow-2xl border-2 border-light-pink/60"
                 style="aspect-ratio:16/9; background:#26282B;">

                {{-- Image Track --}}
                <div id="facility-track"
                     class="flex h-full"
                     style="width:1000%; transition: transform 0.7s cubic-bezier(0.25,0.46,0.45,0.94);">

                    @php $facilityImages = [
                        ['src'=>'bg1.png',             'label'=>'Studio Utama'],
                        ['src'=>'muaythai.png',         'label'=>'Muaythai'],
                        ['src'=>'revormer pilates.png', 'label'=>'Reformer Pilates'],
                        ['src'=>'foto5.png',            'label'=>'Fasilitas'],
                        ['src'=>'mat pilates.png',      'label'=>'Mat Pilates'],
                        ['src'=>'body shaping.png',     'label'=>'Body Shaping'],
                        ['src'=>'foto1.png',            'label'=>'Area Latihan'],
                        ['src'=>'foto2.png',            'label'=>'Area Latihan'],
                        ['src'=>'foto3.png',            'label'=>'Area Latihan'],
                        ['src'=>'foto4.png',            'label'=>'Area Latihan'],
                    ]; @endphp

                    @foreach($facilityImages as $img)
                    <div class="relative h-full flex-shrink-0" style="width:10%;">
                        <img src="{{ asset('images/' . $img['src']) }}"
                             alt="{{ $img['label'] }}"
                             class="w-full h-full object-cover"/>
                        {{-- Gradient overlay --}}
                        <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(38,40,43,0.6) 0%, rgba(38,40,43,0.1) 40%, transparent 70%);"></div>
                        {{-- Image Label --}}
                        <div class="absolute bottom-5 left-6 z-10">
                            <span class="text-white font-black text-xl md:text-2xl tracking-wide drop-shadow-lg">{{ $img['label'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- ── PREV BUTTON ── --}}
                <button id="facility-prev"
                        type="button"
                        class="absolute left-4 top-1/2 z-30 flex items-center justify-center w-12 h-12 rounded-full"
                        style="transform:translateY(-50%);
                               background:linear-gradient(135deg,#793451,primary);
                               box-shadow:0 4px 20px rgba(234,105,147,0.5);
                               border:none; cursor:pointer;
                               transition: transform 0.2s, filter 0.2s;"
                        onmouseover="this.style.filter='brightness(1.15)'; this.style.transform='translateY(-50%) scale(1.1)';"
                        onmouseout="this.style.filter='brightness(1)'; this.style.transform='translateY(-50%) scale(1)';">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                {{-- ── NEXT BUTTON ── --}}
                <button id="facility-next"
                        type="button"
                        class="absolute right-4 top-1/2 z-30 flex items-center justify-center w-12 h-12 rounded-full"
                        style="transform:translateY(-50%);
                               background:linear-gradient(135deg,primary,#793451);
                               box-shadow:0 4px 20px rgba(234,105,147,0.5);
                               border:none; cursor:pointer;
                               transition: transform 0.2s, filter 0.2s;"
                        onmouseover="this.style.filter='brightness(1.15)'; this.style.transform='translateY(-50%) scale(1.1)';"
                        onmouseout="this.style.filter='brightness(1)'; this.style.transform='translateY(-50%) scale(1)';">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>

                {{-- Counter Badge --}}
                <div class="absolute top-4 left-4 z-20">
                    <span id="facility-counter"
                          class="text-xs font-black px-3 py-1 rounded-full text-white"
                          style="background:linear-gradient(to right,primary,#793451);
                                 box-shadow:0 2px 12px rgba(234,105,147,0.5);
                                 letter-spacing:0.1em;">
                        01 / 10
                    </span>
                </div>

                {{-- Live Badge --}}
                <div class="absolute top-4 right-4 z-20">
                    <div class="flex items-center gap-1.5 rounded-full px-3 py-1"
                         style="background:rgba(255,255,255,0.15); backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.25);">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75" style="background:primary;"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2" style="background:primary;"></span>
                        </span>
                        <span class="text-white text-xs font-bold">Gallery</span>
                    </div>
                </div>

            </div>{{-- end slider --}}

            {{-- Dot Indicators --}}
            <div id="facility-dots" class="flex justify-center gap-2 mt-6"></div>

            {{-- Thumbnail Strip --}}
            <div class="flex gap-3 mt-4 overflow-x-auto pb-1 justify-center" style="-ms-overflow-style:none; scrollbar-width:none;">
                @foreach($facilityImages as $i => $img)
                <button type="button"
                        class="facility-thumb flex-shrink-0 rounded-2xl overflow-hidden border-2"
                        data-index="{{ $i }}"
                        style="width:68px; height:48px; opacity:0.45; border-color:transparent; cursor:pointer; transition:all 0.3s ease; padding:0; background:none;">
                    <img src="{{ asset('images/' . $img['src']) }}"
                         alt="{{ $img['label'] }}"
                         class="w-full h-full object-cover pointer-events-none"/>
                </button>
                @endforeach
            </div>

        </div>{{-- end relative wrapper --}}

    </div>
</section>


{{-- ========================================= --}}
{{-- PARTNER SECTION - Selaras dengan Classes  --}}
{{-- ========================================= --}}

<section class="relative py-20 md:py-28 overflow-hidden">

    <div class="absolute inset-0 bg-gradient-to-b from-cream via-light-pink/20 to-cream"></div>

    <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
         style="background-image:
            repeating-linear-gradient(0deg, transparent, transparent 50px, primary 50px, primary 51px),
            repeating-linear-gradient(90deg, transparent, transparent 50px, #793451 50px, #793451 51px);
            background-size: 100px 100px;">
    </div>

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-br from-secondary/10 to-light-pink/10 rounded-full blur-3xl animate-pulse" style="animation-duration:8s;"></div>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-gradient-to-tl from-primary/10 to-light-pink/10 rounded-full blur-3xl animate-pulse" style="animation-duration:6s; animation-delay:1.5s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Header --}}
        <div class="text-center mb-14">

            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-primary/10 via-secondary/10 to-primary/10 rounded-full border border-primary/20 shadow-lg backdrop-blur-sm">
                <span class="brand-flower brand-flower-pink" style="width: 16px; height: 16px;"></span>
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                </span>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary">
                    Trusted By
                </span>
            </div>

            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-secondary via-primary to-secondary" style="background-size:200% auto; animation: gradientShift 4s ease infinite;">
                    Our Partners
                </span>
            </h2>

            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-primary via-secondary to-primary rounded-full"></div>
                <div class="w-3 h-3 bg-secondary rounded-full animate-pulse" style="animation-delay:0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-secondary rounded-full"></div>
            </div>

            <p class="text-lg md:text-xl text-dark/70 max-w-2xl mx-auto leading-relaxed">
                Didukung oleh merek-merek terkemuka di industri yang berkomitmen pada kesehatan, kesejahteraan, dan keunggulan.
            </p>
        </div>

        {{-- Scrolling Partner Strip --}}
        <div class="relative overflow-hidden py-3">

            {{-- Fade edges --}}
            <div class="absolute left-0 top-0 bottom-0 w-28 z-10 pointer-events-none"
                 style="background:linear-gradient(to right,cream,transparent);"></div>
            <div class="absolute right-0 top-0 bottom-0 w-28 z-10 pointer-events-none"
                 style="background:linear-gradient(to left,cream,transparent);"></div>

            {{-- Track --}}
            <div class="flex items-center partner-scroll-track" style="animation: partnerScroll 24s linear infinite;">

                @php $partners = ['partner 2..png','partner 3..png','partner 4..png','partner 5..png','partner 6..png','partner 1..png']; @endphp

                @foreach(array_merge($partners, $partners) as $p)
                {{-- Card identik dengan card Classes --}}
                <div class="group relative flex-shrink-0 mx-4 px-7 py-5 rounded-3xl
                            bg-cream border-2 border-light-pink/60
                            shadow-lg transition-shadow duration-300 hover:shadow-2xl hover:border-secondary/30"
                     style="cursor:default;">
                    {{-- Hover tint sama dengan Classes --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-light-pink/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-3xl pointer-events-none"></div>
                    {{-- Logo BERWARNA (tidak grayscale) --}}
                    <img src="icons/{{ $p }}"
                         class="relative z-10 h-14 object-contain transition-transform duration-300 group-hover:scale-110"
                         style="min-width:80px;" />
                    {{-- Bottom accent line identik Classes --}}
                    <div class="h-0.5 w-0 group-hover:w-full rounded-full transition-all duration-500 mt-3"
                         style="background:linear-gradient(to right,primary,#793451,primary);"></div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>


{{-- ========================================= --}}
{{-- STYLES                                    --}}
{{-- ========================================= --}}
<style>
    /* Gradient title animation */
    @keyframes gradientShift {
        0%,100% { background-position: 0% 50%; }
        50%      { background-position: 100% 50%; }
    }

    /* Partner scroll */
    @keyframes partnerScroll {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .partner-scroll-track {
        animation: partnerScroll 24s linear infinite;
    }
    .partner-scroll-track:hover {
        animation-play-state: paused;
    }

    /* Dot indicator */
    .facility-dot {
        width: 8px;
        height: 8px;
        border-radius: 9999px;
        background: light-pink;
        border: none;
        padding: 0;
        cursor: pointer;
        transition: all 0.35s ease;
        flex-shrink: 0;
    }
    .facility-dot.active {
        width: 28px;
        background: primary;
    }

    /* Hide scrollbar on thumb strip */
    #facility-slider + div + div::-webkit-scrollbar { display:none; }
</style>


{{-- ========================================= --}}
{{-- SLIDER SCRIPT                             --}}
{{-- ========================================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const TOTAL   = 10;
    const track   = document.getElementById('facility-track');
    const counter = document.getElementById('facility-counter');
    const dotsWrap= document.getElementById('facility-dots');
    const thumbs  = document.querySelectorAll('.facility-thumb');
    const btnPrev = document.getElementById('facility-prev');
    const btnNext = document.getElementById('facility-next');

    let idx   = 0;
    let timer = null;

    // ── Buat dots ──
    const dots = [];
    for (let i = 0; i < TOTAL; i++) {
        const btn = document.createElement('button');
        btn.type      = 'button';
        btn.className = 'facility-dot' + (i === 0 ? ' active' : '');
        btn.addEventListener('click', () => { idx = i; render(); resetTimer(); });
        dotsWrap.appendChild(btn);
        dots.push(btn);
    }

    // ── Render state ──
    function render() {
        // Track
        track.style.transform = `translateX(-${idx * 10}%)`;

        // Counter
        counter.textContent = `${String(idx + 1).padStart(2,'0')} / ${String(TOTAL).padStart(2,'0')}`;

        // Dots
        dots.forEach((d, i) => {
            d.classList.toggle('active', i === idx);
        });

        // Thumbnails
        thumbs.forEach((t, i) => {
            const active = i === idx;
            t.style.opacity     = active ? '1'         : '0.45';
            t.style.borderColor = active ? 'primary'   : 'transparent';
            t.style.transform   = active ? 'scale(1.07)' : 'scale(1)';
        });
    }

    // ── Navigation ──
    function next() { idx = (idx + 1) % TOTAL; render(); resetTimer(); }
    function prev() { idx = (idx - 1 + TOTAL) % TOTAL; render(); resetTimer(); }

    function resetTimer() {
        clearInterval(timer);
        timer = setInterval(next, 4500);
    }

    // ── Button Events ──
    btnNext.addEventListener('click', next);
    btnPrev.addEventListener('click', prev);

    // ── Thumbnail Events ──
    thumbs.forEach(t => {
        t.addEventListener('click', () => {
            idx = parseInt(t.dataset.index);
            render();
            resetTimer();
        });
    });

    // ── Pause on hover ──
    const sliderEl = document.getElementById('facility-slider');
    sliderEl.addEventListener('mouseenter', () => clearInterval(timer));
    sliderEl.addEventListener('mouseleave', () => resetTimer());

    // ── Touch swipe ──
    let startX = 0;
    sliderEl.addEventListener('touchstart', e => startX = e.touches[0].clientX, { passive:true });
    sliderEl.addEventListener('touchend', e => {
        const diff = startX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 40) diff > 0 ? next() : prev();
    });

    // ── Init ──
    render();
    resetTimer();
});
</script>





    <!-- Join Now Section -->
    <section id="join" class="py-20 bg-cream">
      <div class="container mx-auto px-4">
        <div class="relative bg-gradient-to-br from-burnt-cherry via-primary to-burnt-cherry rounded-lg overflow-hidden shadow-2xl">

          <!-- Decorative ornaments -->
          <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="brand-flower brand-flower-ivory absolute -top-8 -right-8 opacity-15" style="width: 180px; height: 180px;"></div>
            <div class="brand-asterisk brand-asterisk-ivory absolute bottom-10 left-10 opacity-15 brand-float" style="width: 60px; height: 60px;"></div>
            <div class="brand-flower brand-flower-ivory absolute top-1/3 left-[45%] opacity-10 brand-float" style="width: 90px; height: 90px; animation-delay: 2s;"></div>
          </div>

          <div class="flex flex-col md:flex-row relative z-10">
            <div class="md:w-1/2 p-10 md:p-16 flex flex-col justify-center">
              <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Start Your Journey Today
              </h2>
              <p class="text-white text-opacity-90 mb-8">
                Join our community of strong, motivated Muslimah women. Take the
                first step toward a healthier, more balanced life in a space
                designed just for you.
              </p>
              <div class="space-y-6">
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-cream text-primary flex-shrink-0 mt-1"
                  >
                    <i class="ri-check-line ri-lg"></i>
                  </div>
                  <div>
                    <h3 class="text-white font-semibold text-lg">
                      Exclusive Access to Members-Only Class
                    </h3>
                    <p class="text-white text-opacity-80">
                      Step into a private, peaceful training space — thoughtfully designed for Muslimah who value comfort, privacy, and premium quality.
                    </p>
                  </div>
                </div>
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-cream text-primary flex-shrink-0 mt-1"
                  >
                    <i class="ri-check-line ri-lg"></i>
                  </div>
                  <div>
                    <h3 class="text-white font-semibold text-lg">
                      Personal Guidance from Muslimah Trainers
                    </h3>
                    <p class="text-white text-opacity-80">
                      Train with experienced female instructors who understand your values and ensure a safe, modest, and effective workout experience.
                    </p>
                  </div>
                </div>
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-cream text-primary flex-shrink-0 mt-1"
                  >
                    <i class="ri-check-line ri-lg"></i>
                  </div>
                  <div>
                    <h3 class="text-white font-semibold text-lg">
                      Flexible Membership Options
                    </h3>
                    <p class="text-white text-opacity-80">
                      Choose the plan that works best for your schedule and
                      budget.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
           <div id="signup" class="md:w-1/2 bg-cream p-10 md:p-16">
    <h3 class="text-2xl font-semibold text-primary mb-6">
    Sign Up Now
</h3>

{{-- Error Validasi --}}
@if ($errors->any())
  <div id="error-popup" class="fixed inset-0 flex items-center justify-center z-50 bg-dark bg-opacity-40">
    <div class="bg-cream rounded-xl shadow-2xl px-8 py-8 max-w-md w-full text-center border-t-4 border-primary animate-fadeIn">
      <div class="flex justify-center mb-4">
        <div class="bg-primary bg-opacity-15 rounded-full p-4">
          <i class="ri-error-warning-line text-4xl text-primary"></i>
        </div>
      </div>
      <h4 class="text-xl font-bold text-primary mb-2">Pendaftaran gagal</h4>
      <div class="text-dark mb-6 text-sm text-left space-y-2">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
      <button onclick="document.getElementById('error-popup').remove()" class="bg-primary text-white px-6 py-2 rounded hover:bg-opacity-90 transition font-semibold">
        Tutup
      </button>
    </div>
    </div>
@endif

{{-- Popup Sukses --}}
@if(session('success'))
    <div id="success-popup" class="fixed inset-0 flex items-center justify-center z-50 bg-dark bg-opacity-40">
        <div class="bg-cream rounded-xl shadow-2xl px-8 py-8 max-w-sm w-full text-center border-t-4 border-secondary animate-fadeIn">
            <div class="flex justify-center mb-4">
                <div class="bg-secondary bg-opacity-20 rounded-full p-4">
                    <i class="ri-checkbox-circle-line text-4xl text-secondary"></i>
                </div>
            </div>
            <h4 class="text-xl font-bold text-primary mb-2">Berhasil!</h4>
            <p class="text-dark mb-6">{{ session('success') }}</p>
            <button onclick="document.getElementById('success-popup').remove()" class="bg-secondary text-white px-6 py-2 rounded hover:bg-opacity-90 transition font-semibold">
                Tutup
            </button>
        </div>
    </div>
@endif

<form name="Data-Member" method="POST" action="{{ route('signup.store') }}" class="space-y-6">
    @csrf
    <div>
        <label for="name" class="block text-dark mb-2">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" required
            class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary" />
    </div>

    <div>
        <label for="phone_number" class="block text-dark mb-2">Phone Number</label>
        <input type="tel" id="phone_number" name="phone_number" placeholder="08xxx" value="{{ old('phone_number') }}" required
            class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary" />
    </div>

    <div>
        <label for="email" class="block text-dark mb-2">Email</label>
        <input type="email" id="email" name="email" placeholder="you@example.com" value="{{ old('email') }}" required
            class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary" />
    </div>

    {{-- Password Fields - untuk login member sendiri --}}
    <div>
        <label for="signup_password" class="block text-dark mb-2">
            Password
            <span class="text-xs text-dark/55 font-normal">(minimal 8 karakter)</span>
        </label>
        <div class="relative">
            <input type="password" id="signup_password" name="password" placeholder="Buat password Anda" required minlength="8"
                class="w-full px-4 py-3 pr-12 rounded border border-light-pink focus:border-secondary" />
            <button type="button" data-toggle-target="signup_password"
                    class="toggle-password absolute right-3 top-1/2 -translate-y-1/2 text-dark/40 hover:text-secondary transition">
                <i class="ri-eye-line text-lg"></i>
            </button>
        </div>
    </div>

    <div>
        <label for="signup_password_confirmation" class="block text-dark mb-2">Konfirmasi Password</label>
        <div class="relative">
            <input type="password" id="signup_password_confirmation" name="password_confirmation" placeholder="Ulangi password Anda" required minlength="8"
                class="w-full px-4 py-3 pr-12 rounded border border-light-pink focus:border-secondary" />
            <button type="button" data-toggle-target="signup_password_confirmation"
                    class="toggle-password absolute right-3 top-1/2 -translate-y-1/2 text-dark/40 hover:text-secondary transition">
                <i class="ri-eye-line text-lg"></i>
            </button>
        </div>
        <p id="password-match-status" class="text-xs mt-1 hidden"></p>
    </div>

    {{-- Info OTP --}}
    <div class="bg-light-pink/40 border-l-4 border-primary px-4 py-3 rounded text-xs text-dark">
        <div class="flex items-start gap-2">
            <i class="ri-shield-check-line text-primary text-base mt-0.5"></i>
            <div>
                <strong class="text-secondary">Verifikasi WhatsApp:</strong>
                Setelah daftar, Anda akan menerima kode OTP via WhatsApp ke nomor di atas. Pastikan nomor aktif.
            </div>
        </div>
    </div>

    <div>
        <label for="birth_date" class="block text-dark mb-2">Tanggal Lahir</label>
<input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required
    class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary" />
    </div>

    <div>
        <label for="goals" class="block text-dark mb-2">Goals</label>
        <textarea id="goals" name="goals" rows="3" placeholder="Contoh: Ingin menurunkan berat badan" class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary">{{ old('goals') }}</textarea>
    </div>

    <div>
        <label for="kondisi_khusus" class="block text-dark mb-2">Kondisi Khusus</label>
        <textarea id="kondisi_khusus" name="kondisi_khusus" rows="3" placeholder="Contoh: Riwayat asma, cedera lutut" class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary">{{ old('kondisi_khusus') }}</textarea>
    </div>

    <div>
        <label for="referensi" class="block text-dark mb-2">Mengenal FTM dari</label>
        <input type="text" id="referensi" name="referensi" placeholder="Contoh: Instagram, teman, Google" value="{{ old('referensi') }}"
            class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary" />
    </div>

    <div>
        <label for="pengalaman" class="block text-dark mb-2">Pengalaman ikut olahraga?</label>
        <input type="text" id="pengalaman" name="pengalaman" placeholder="Contoh: Pernah ikut yoga, gym, dll" value="{{ old('pengalaman') }}"
            class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary" />
    </div>

    <div>
    <label for="is_muslim" class="block text-dark mb-2">Apakah Anda Muslimah?</label>
    <div class="mb-2 text-xs text-dark bg-[#D2DCA5] rounded px-3 py-2">
        <strong>P.S:</strong> Kolom Agama Islam diperlukan karena adanya perbedaan pendapat di kalangan para ulama tentang batasan aurat perempuan muslim di hadapan perempuan non-muslim. Karenanya, kami mengambil pendapat yang paling hati-hati dalam perkara ini. Kami tidak meminta bukti KTP Anda, oleh karena itu, kami mohon kerjasamanya agar mengisi form dengan jujur sebagai bentuk toleransi terhadap apa yang kami yakini. Semoga ridho dan berkenan.
    </div>
    <select id="is_muslim" name="is_muslim" required class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary">
        <option value="">-- Pilih --</option>
        <option value="ya" {{ old('is_muslim') == 'ya' ? 'selected' : '' }}>Ya</option>
        <option value="tidak" {{ old('is_muslim') == 'tidak' ? 'selected' : '' }}>Tidak</option>
    </select>
</div>

    <div>
        <label class="flex items-start">
            <input type="checkbox" name="agree" class="custom-checkbox mr-3 mt-1" {{ old('agree') ? 'checked' : '' }} />
            <span class="text-sm text-dark/70">
                Saya bersedia menerima informasi promo, kelas baru, dan event komunitas melalui email.
            </span>
        </label>
    </div>

    <button type="submit"
        class="w-full bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary hover:scale-105 hover:shadow-lg transition-all text-sm font-semibold text-center mx-auto block flex items-center justify-center gap-2">
        <i class="ri-shield-check-line"></i>
        Daftar &amp; Verifikasi via WhatsApp
    </button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    /* ====== Auto scroll ke #signup kalau ada popup atau hash ====== */
    const signupSection = document.getElementById('join');
    const successPopup  = document.getElementById('success-popup');
    const errorPopup    = document.getElementById('error-popup');

    if (signupSection && (successPopup || errorPopup || window.location.hash === '#signup')) {
        signupSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    /* ====== Toggle visibility untuk semua field password ====== */
    document.querySelectorAll('.toggle-password').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const targetId = this.getAttribute('data-toggle-target');
            const input    = document.getElementById(targetId);
            const icon     = this.querySelector('i');

            if (!input) return;

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('ri-eye-line');
                icon.classList.add('ri-eye-off-line');
            } else {
                input.type = 'password';
                icon.classList.remove('ri-eye-off-line');
                icon.classList.add('ri-eye-line');
            }
        });
    });

    /* ====== Realtime password match indicator ====== */
    const pw1    = document.getElementById('signup_password');
    const pw2    = document.getElementById('signup_password_confirmation');
    const status = document.getElementById('password-match-status');

    function checkMatch() {
        if (!pw1 || !pw2 || !status) return;
        if (!pw2.value) {
            status.classList.add('hidden');
            return;
        }
        status.classList.remove('hidden');
        if (pw1.value === pw2.value) {
            status.textContent = '✓ Password cocok';
            status.className   = 'text-xs mt-1 text-secondary font-semibold';
        } else {
            status.textContent = '✗ Password belum cocok';
            status.className   = 'text-xs mt-1 text-primary font-semibold';
        }
    }

    if (pw1 && pw2) {
        pw1.addEventListener('input', checkMatch);
        pw2.addEventListener('input', checkMatch);
    }
});
</script>

</div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-cream">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">
            Get in Touch
          </h2>
          <p class="text-dark/70 max-w-2xl mx-auto">
            Have questions or want to learn more? We're here to help you on your
            fitness journey.
          </p>
          <div class="w-24 h-1 bg-secondary mx-auto mt-4"></div>
        </div>
        <div class="flex flex-col md:flex-row gap-10">
          <div class="md:w-1/2">
            <div class="bg-cream p-8 rounded-lg shadow-md h-full">
              <h3 class="text-2xl font-semibold text-primary mb-6">
                Contact Information
              </h3>
              <div class="space-y-6">
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-primary bg-opacity-10 text-primary flex-shrink-0"
                  >
                    <i class="ri-map-pin-line ri-lg"></i>
                  </div>
                  <div>
                    <h4 class="font-medium text-dark">Address</h4>
                    <p class="text-dark/70">
                    📍Jakarta Selatan: <br />
                      Jl. Wijaya 8 No.2, RT.6/RW.7. <br />Melawai, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160
                    </p>
                    📍Jakarta Pusat: <br />
                      Jl. Cempaka Putih Tengah XIII No.56, RT.4/RW.6. <br />Cemp. Putih Tim., Kec. Cemp. Putih, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10510
                    </p>
                  </div>
                </div>
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-primary bg-opacity-10 text-primary flex-shrink-0"
                  >
                    <i class="ri-time-line ri-lg"></i>
                  </div>
                  <div>
                    <h4 class="font-medium text-dark">Opening Hours</h4>
                    <p class="text-dark/70">
                      Monday - Saturday: 08:00 AM - 20:00 PM <br />Sunday: 08:00 AM -15:00 AM
                    </p>
                  </div>
                </div>
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-primary bg-opacity-10 text-primary flex-shrink-0"
                  >
                    <i class="ri-phone-line ri-lg"></i>
                  </div>
                  <div>
                    <h4 class="font-medium text-dark">Phone & WhatsApp</h4>
                    <p class="text-dark/70">+62 877-8576-7395</p>
                    <a
                     href="https://wa.me/6287785767395"
                      class="inline-flex items-center text-secondary mt-2 hover:underline"
                    >
                      <i class="ri-whatsapp-line mr-2"></i> Message us on
                      WhatsApp
                    </a>
                  </div>
                </div>
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-primary bg-opacity-10 text-primary flex-shrink-0"
                  >
                    <i class="ri-mail-line ri-lg"></i>
                  </div>
                  <div>
                    <h4 class="font-medium text-dark">Email</h4>
                    <p class="text-dark/70">ftmsociety@gmail.com</p>
                  </div>
                </div>
              </div>
              <div class="mt-8">
                <h4 class="font-medium text-dark mb-4">Follow Us</h4>
                <div class="flex space-x-4">
                  <a
                    href="https://www.instagram.com/ftmsociety.id"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white 
                    hover:bg-secondary hover:scale-105 hover:shadow-lg 
                    transition-all text-sm font-semibold"
                  >
                    <i class="ri-instagram-line"></i>
                  </a>
                  <a
                    href="https://www.facebook.com/share/129JRu5DDXa/"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white 
                    hover:bg-secondary hover:scale-105 hover:shadow-lg 
                    transition-all text-sm font-semibold"
                  >
                    <i class="ri-facebook-fill"></i>
                  </a>
                <a
                    href="https://www.tiktok.com/@ftm.society"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white 
                    hover:bg-secondary hover:scale-105 hover:shadow-lg 
                    transition-all text-sm font-semibold"
                    target="_blank" rel="noopener"
                  >
                    <i class="ri-tiktok-line"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="md:w-1/2">
            <div class="bg-cream p-8 rounded-lg shadow-md">
              <h3 class="text-2xl font-semibold text-primary mb-6">
                Send Us a Message
              </h3>
              <form class="space-y-6" method="POST" action="{{ route('feedback.store') }}">
                @csrf
                <div>
                  <label for="contact-name" class="block text-dark mb-2">Your Name</label>
                  <input
                    type="text"
                    id="contact-name"
                    name="name"
                    class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary"
                    placeholder="Your name"
                    required
                  />
                </div>
                <div>
                  <label for="contact-email" class="block text-dark mb-2">Email Address</label>
                  <input
                    type="email"
                    id="contact-email"
                    name="email"
                    class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary"
                    placeholder="your.email@example.com"
                    required
                  />
                </div>
                <div>
                  <label for="subject" class="block text-dark mb-2">Subject</label>
                  <select
                    id="subject"
                    name="subject"
                    class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary pr-8 appearance-none bg-cream"
                    required
                  >
                    <option value="" selected disabled>Select a subject</option>
                    <option value="membership">Membership Inquiry</option>
                    <option value="classes">Class Information</option>
                    <option value="trial">Free Trial</option>
                    <option value="feedback">Feedback</option>
                    <option value="other">Other</option>
                  </select>
                </div>
                <div>
                  <label for="message" class="block text-dark mb-2">Your Message</label>
                  <textarea
                    id="message"
                    name="message"
                    rows="5"
                    class="w-full px-4 py-3 rounded border border-light-pink focus:border-secondary"
                    placeholder="How can we help you?"
                    required
                  ></textarea>
                </div>
                <button
                  type="submit"
                class="w-full py-3 text-white bg-primary rounded-button 
                hover:bg-secondary hover:scale-105 hover:shadow-lg 
                transition-all duration-200 text-sm font-semibold text-center shadow-lg">     
                  Send Message
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
          <!-- filepath: resources/views/dashboard.blade.php -->
        <!-- filepath: resources/views/dashboard.blade.php -->
<section id="maps" class="py-12 bg-cream">
  <div class="container mx-auto px-4">
    <div class="rounded-lg overflow-hidden shadow-md h-80">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.692581073393!2d106.8020902!3d-6.2463343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f100300812e3%3A0xf433b3d8a738f209!2sFTM%20Society!5e0!3m2!1sen!2sid!4v1716463880000!5m2!1sen!2sid"
        width="100%"
        height="100%"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="w-full h-full"
      ></iframe>
    </div>
  </div>
</section>
   <!-- Footer -->
<footer class="relative bg-gradient-to-br from-burnt-cherry via-secondary to-burnt-cherry text-white pt-16 pb-8 overflow-hidden">

  <!-- Footer decorative ornaments -->
  <div class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="brand-flower brand-flower-ivory absolute top-10 right-[8%] opacity-10" style="width: 120px; height: 120px;"></div>
    <div class="brand-asterisk brand-asterisk-ivory absolute bottom-20 left-[5%] opacity-10" style="width: 80px; height: 80px;"></div>
    <div class="brand-flower brand-flower-pink absolute -bottom-10 right-1/4 opacity-15" style="width: 160px; height: 160px;"></div>
  </div>

  <div class="container mx-auto px-4 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

      <!-- Column 1: Tentang Brand -->
      <div>
        <h4 class="text-lg font-semibold mb-6">Tentang FTM Society</h4>
        <p class="text-white text-opacity-80 text-sm leading-relaxed">
          FTM Society adalah pusat kebugaran eksklusif untuk muslimah yang mengedepankan kenyamanan, privasi, dan pendekatan islami. Bergabunglah dengan komunitas wanita kuat dan sehat yang saling mendukung dalam perjalanan hidup sehat dan seimbang.
        </p>
      </div>

      <!-- Column 2: Link Navigasi -->
      <div>
        <h4 class="text-lg font-semibold mb-6">Navigasi Cepat</h4>
        <ul class="space-y-3">
          <li><a href="#home" class="text-white text-opacity-80 hover:text-secondary transition-colors">Beranda</a></li>
          <li><a href="#about" class="text-white text-opacity-80 hover:text-secondary transition-colors">Tentang Kami</a></li>
          <li><a href="#classes" class="text-white text-opacity-80 hover:text-secondary transition-colors">Kelas</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-secondary transition-colors">Program</a></li>
          <li><a href="#schedule" class="text-white text-opacity-80 hover:text-secondary transition-colors">Jadwal</a></li>
          <li><a href="#Facility" class="text-white text-opacity-80 hover:text-secondary transition-colors">Fasilitas</a></li>
          <li><a href="#contact" class="text-white text-opacity-80 hover:text-secondary transition-colors">Hubungi Kami</a></li>
        </ul>
      </div>

      <!-- Column 3: Program Unggulan -->
      <div>
        <h4 class="text-lg font-semibold mb-6">Program Unggulan</h4>
        <ul class="space-y-3">
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-secondary transition-colors">Private Group Class</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-secondary transition-colors">Private Training</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-secondary transition-colors">Single Visit Class</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-secondary transition-colors">Reformer Pilates</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-secondary transition-colors">Exclusive Class Program</a></li>
        </ul>
      </div>

      <!-- Column 4: Newsletter & Komunitas -->
      <div>
        <h4 class="text-lg font-semibold mb-6">Gabung Komunitas Kami</h4>
        <p class="text-white text-opacity-80 mb-4">
          Dapatkan update eksklusif, promo menarik, dan tips kebugaran langsung ke email Anda.
        </p>
        <form class="mb-4">
          <div class="flex">
            <input
              type="email"
              placeholder="Alamat email Anda"
              class="px-4 py-2 rounded-l text-dark w-full border-none"
            />
            <button
              type="submit"
              class="bg-power-pink text-white px-4 py-2 rounded-r hover:bg-patina-green transition-all whitespace-nowrap font-semibold"
            >
              Langganan
            </button>
          </div>
        </form>
        <p class="text-white text-opacity-60 text-sm">
          Dengan berlangganan, Anda menyetujui kebijakan privasi kami.
        </p>
      </div>
    </div>

    <div class="border-t border-white border-opacity-20 mt-12 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <p class="text-white text-opacity-60 text-sm mb-4 md:mb-0">
          &copy; 2025 FTM Society. Empowering Muslimah. Elevating Wellness.
        </p>
        <div class="flex space-x-6">
          <a href="#" class="text-white text-opacity-60 text-sm hover:text-secondary transition-colors">Kebijakan Privasi</a>
          <a href="#" class="text-white text-opacity-60 text-sm hover:text-secondary transition-colors">Syarat & Ketentuan</a>
          <a href="#" class="text-white text-opacity-60 text-sm hover:text-secondary transition-colors">Kontak Bantuan</a>
        </div>
      </div>
    </div>
  </div>
</footer>

  </body>
</html>



