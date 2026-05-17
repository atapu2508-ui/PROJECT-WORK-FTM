
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />
    <!-- favicon  -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.jpg') }}" />
    <!-- end favicon  -->
    <title>FTM SOCIETY - Muslimah-Only Gym</title>
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- FTM Brand Typography (local Nord + Instrument Serif) --}}
    <link rel="preload" href="{{ asset('fonts/Nord-Black.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/Nord-Bold.woff2') }}"  as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/Nord-Book.woff2') }}"  as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/ftm-typography.css') }}">

    <!-- Remix Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />

    <!-- Compiled CSS via Vite (Production TailwindCSS) -->
    @vite(['resources/css/member.css'])
    
    <!-- Hero Background Style (dynamic) -->
    <!-- Typography system is now handled via Tailwind classes: font-heading, font-accent, font-body -->
    <style>
      /* ========================================= */
      /* BASE STYLES                               */
      /* ========================================= */

      * {
        box-sizing: border-box;
      }

      body {
        font-size: 16px;
        line-height: 1.65;
        font-weight: 400;
      }

      i[class^="ri-"],
      i[class*=" ri-"] {
        font-family: 'remixicon' !important;
      }
      
      body { 
        scroll-behavior: smooth;
        overflow-x: hidden;
        width: 100%;
        max-width: 100vw;
      }
      
      html {
        overflow-x: hidden;
        width: 100%;
      }
      
      /* Prevent horizontal scroll */
      section {
        max-width: 100vw;
        overflow-x: hidden;
      }
      
      .container {
        max-width: 100%;
        padding-left: 1rem;
        padding-right: 1rem;
      }
      
      /* ========================================= */
      /* MOBILE MENU RESPONSIVE CSS                */
      /* ========================================= */
      
      /* Mobile Menu Slide Animation */
      .mobile-menu {
        transform: translateX(100%);
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
        max-width: 90vw;
      }
      
      .mobile-menu.active {
        transform: translateX(0) !important;
      }
      
      /* Mobile Backdrop */
      #mobile-backdrop {
        opacity: 0;
        transition: opacity 0.25s ease-in-out;
      }
      
      #mobile-backdrop.block {
        opacity: 1;
      }
      
      /* Prevent body scroll when menu is open */
      body.overflow-hidden {
        overflow: hidden;
        position: fixed;
        width: 100%;
      }
      
      /* ========================================= */
      /* HEADER RESPONSIVE                         */
      /* ========================================= */
      
      header {
        position: fixed !important;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
      }
      
      @media (max-width: 767px) {
        header {
          padding: 0.75rem 0;
        }
        
        header .container {
          padding-left: 1rem;
          padding-right: 1rem;
        }
        
        header .logo {
          font-size: 1.25rem !important;
        }
        
        header .logo .font-accent {
          font-size: 1.5rem !important;
        }
      }
      
      /* ========================================= */
      /* HERO SECTION RESPONSIVE                   */
      /* ========================================= */
      
      @media (max-width: 767px) {
        #home {
          min-height: 100vh;
          padding-top: 70px !important;
          padding-left: 0 !important;
          padding-right: 0 !important;
        }
        
        #home .container {
          padding-left: 1.25rem !important;
          padding-right: 1.25rem !important;
        }
        
        /* Hero Typography Mobile */
        #home h1 {
          font-size: 2.25rem !important;
          line-height: 1.15 !important;
          word-break: break-word;
        }
        
        #home .text-5xl,
        #home .text-6xl,
        #home .text-7xl,
        #home .text-8xl {
          font-size: 2.25rem !important;
        }
        
        #home .text-xl {
          font-size: 1rem !important;
        }
        
        #home .text-2xl {
          font-size: 1.15rem !important;
        }
        
        #home .text-3xl {
          font-size: 1.35rem !important;
        }
        
        #home .text-4xl {
          font-size: 1.5rem !important;
        }
        
        /* Hero Buttons */
        #home a[href="#join"],
        #home a[href="#about"] {
          padding: 0.85rem 1.75rem !important;
          font-size: 0.95rem !important;
          width: 100%;
          max-width: 280px;
        }
        
        /* Premium badge */
        #home .inline-flex.items-center.gap-3 {
          padding: 0.7rem 1.4rem !important;
          font-size: 0.75rem !important;
        }
        
        /* Button container */
        #home .flex.flex-wrap.gap-4 {
          flex-direction: column;
          align-items: center;
          gap: 0.75rem !important;
        }
        
        /* Hide scroll indicator on mobile */
        #home .absolute.bottom-8 {
          display: none !important;
        }
        
        /* Background decorative elements - reduce size */
        #home .absolute.w-96 {
          width: 200px !important;
          height: 200px !important;
        }
      }
      
      /* ========================================= */
      /* SECTIONS GENERAL RESPONSIVE               */
      /* ========================================= */
      
      @media (max-width: 767px) {
        section {
          padding-top: 3rem !important;
          padding-bottom: 3rem !important;
          padding-left: 1rem !important;
          padding-right: 1rem !important;
        }
        
        section h2 {
          font-size: 1.875rem !important;
          line-height: 1.2 !important;
        }
        
        section h3 {
          font-size: 1.25rem !important;
        }
        
        section .text-4xl {
          font-size: 1.75rem !important;
        }
        
        section .text-5xl {
          font-size: 2rem !important;
        }
        
        section .text-6xl {
          font-size: 2.25rem !important;
        }
        
        section .text-7xl {
          font-size: 2.5rem !important;
        }
        
        /* Section containers */
        section .container {
          padding-left: 1rem !important;
          padding-right: 1rem !important;
        }
      }
      
      /* ========================================= */
      /* GRID LAYOUTS RESPONSIVE                   */
      /* ========================================= */
      
      @media (max-width: 767px) {
        /* Force all grids to single column on mobile */
        .grid-cols-2,
        .grid-cols-3,
        .grid-cols-4,
        .md\\:grid-cols-2,
        .md\\:grid-cols-3,
        .lg\\:grid-cols-2,
        .lg\\:grid-cols-3,
        .lg\\:grid-cols-4,
        .lg\\:grid-cols-12 {
          grid-template-columns: 1fr !important;
          gap: 1rem !important;
        }
        
        /* Flexbox to column */
        .flex-row {
          flex-direction: column !important;
        }
      }
      
      /* ========================================= */
      /* CARDS & CONTAINERS RESPONSIVE             */
      /* ========================================= */
      
      @media (max-width: 767px) {
        .rounded-xl,
        .rounded-2xl,
        .rounded-3xl {
          border-radius: 1rem !important;
        }
        
        .p-8 {
          padding: 1.5rem !important;
        }
        
        .p-6 {
          padding: 1.25rem !important;
        }
        
        .p-4 {
          padding: 1rem !important;
        }
        
        .px-8 {
          padding-left: 1.5rem !important;
          padding-right: 1.5rem !important;
        }
        
        .px-6 {
          padding-left: 1.25rem !important;
          padding-right: 1.25rem !important;
        }
        
        .py-20,
        .py-28,
        .py-32 {
          padding-top: 3rem !important;
          padding-bottom: 3rem !important;
        }
        
        /* Gaps */
        .gap-8,
        .gap-12 {
          gap: 1.25rem !important;
        }
        
        .gap-6 {
          gap: 1rem !important;
        }
        
        /* Margins */
        .mb-16,
        .mb-24 {
          margin-bottom: 2.5rem !important;
        }
        
        .mb-12 {
          margin-bottom: 2rem !important;
        }
      }
      
      /* ========================================= */
      /* MODALS RESPONSIVE                         */
      /* ========================================= */
      
      @media (max-width: 767px) {
        .modal-box,
        #service-detail-box,
        #logout-modal > div {
          margin: 1rem !important;
          max-width: calc(100vw - 2rem) !important;
          padding: 1.5rem !important;
        }
        
        .modal-box h3,
        .modal-box h4 {
          font-size: 1.125rem !important;
        }
        
        .modal-box p {
          font-size: 0.875rem !important;
        }
      }
      
      /* ========================================= */
      /* IMAGES & MEDIA RESPONSIVE                 */
      /* ========================================= */
      
      @media (max-width: 767px) {
        img {
          max-width: 100%;
          height: auto;
        }
        
        .bg-cover {
          background-size: cover;
          background-position: center;
        }
        
        iframe,
        video {
          max-width: 100%;
          height: auto;
        }
        
        /* Hide large decorative elements on mobile */
        .absolute.w-96.h-96,
        .absolute.w-80.h-80 {
          display: none;
        }
      }
      
      /* ========================================= */
      /* MOBILE MENU VISIBILITY                    */
      /* ========================================= */
      
      @media (max-width: 767px) {
        #mobile-menu-button {
          display: flex !important;
        }
      }
      
      @media (min-width: 768px) {
        #mobile-menu-button {
          display: none !important;
        }
        
        #mobile-menu,
        #mobile-backdrop {
          display: none !important;
        }
      }
      
      /* ========================================= */
      /* TOUCH OPTIMIZATION                        */
      /* ========================================= */
      
      @media (hover: none) and (pointer: coarse) {
        button,
        a {
          min-height: 44px;
        }
        
        * {
          -webkit-tap-highlight-color: rgba(122, 43, 74, 0.1);
        }
      }
      
      /* ========================================= */
      /* LANDSCAPE MOBILE ORIENTATION              */
      /* ========================================= */
      
      @media (max-width: 900px) and (orientation: landscape) {
        #home {
          min-height: auto;
          padding-top: 70px !important;
          padding-bottom: 2rem !important;
        }
        
        #home h1 {
          font-size: 2rem !important;
        }
        
        header {
          padding-top: 0.5rem;
          padding-bottom: 0.5rem;
        }
        
        section {
          padding-top: 2rem !important;
          padding-bottom: 2rem !important;
        }
      }
      
      /* ========================================= */
      /* TABLET OPTIMIZATIONS                      */
      /* ========================================= */
      
      @media (min-width: 640px) and (max-width: 767px) {
        #home h1 {
          font-size: 3rem !important;
        }
        
        .lg\\:grid-cols-3,
        .lg\\:grid-cols-4 {
          grid-template-columns: repeat(2, 1fr) !important;
        }
      }
      
      @media (min-width: 768px) and (max-width: 1023px) {
        #home h1 {
          font-size: 3.5rem !important;
        }
        
        .container {
          padding-left: 1.5rem;
          padding-right: 1.5rem;
        }
      }
      
      /* ========================================= */
      /* UTILITY CLASSES                           */
      /* ========================================= */
      
      @media (max-width: 767px) {
        .mobile-hidden {
          display: none !important;
        }
        
        .mobile-full-width {
          width: 100% !important;
        }
        
        .mobile-text-center {
          text-align: center !important;
        }
        
        .mobile-no-padding {
          padding: 0 !important;
        }
      }
    </style>
  </head>
  <body class="bg-[#FCF9F2] text-[#1C1C1C] font-body">
    
      <!-- Desktop Navigation -->


        <!-- filepath: c:\Users\hp\Desktop\progres\progres\resources\views\member\profile.blade.php -->
<!-- HEADER -->
<header class="fixed w-full bg-[#FCF9F2] bg-opacity-95 shadow-sm z-50">
    <div class="container mx-auto px-4 py-3 grid grid-cols-3 items-center">

        <!-- LOGO (LEFT) -->
        <a href="{{ route('member.dashboard') }}" class="logo text-2xl hover:opacity-80 transition tracking-tight inline-flex items-baseline gap-1.5 justify-self-start">
          <span class="font-nord font-black text-[#EE4E8B]">FTM</span>
          <span class="font-instrument italic text-[#7A2B4A] text-3xl">Society</span>
        </a>

        <!-- DESKTOP NAVIGATION (CENTER) -->
        <nav class="hidden md:flex items-center justify-center gap-8 justify-self-center">
            <a href="#home" class="text-[#1C1C1C] hover:text-[#EE4E8B] transition font-heading font-medium">Home</a>
            <a href="#Programs" class="text-[#1C1C1C] hover:text-[#EE4E8B] transition font-heading font-medium">Programs</a>
            <a href="#about" class="text-[#1C1C1C] hover:text-[#EE4E8B] transition font-heading font-medium">About</a>
            <a href="#Facility" class="text-[#1C1C1C] hover:text-[#EE4E8B] transition font-heading font-medium">Gallery</a>
            <a href="#contact" class="text-[#1C1C1C] hover:text-[#EE4E8B] transition font-heading font-medium">Contact</a>
        </nav>

        <!-- LOGIN BUTTON (RIGHT) — guest sees Login; authed sees avatar that goes to dashboard -->
        <div class="hidden md:flex items-center gap-3 justify-self-end">
            @auth('customer')
                @php
                    $authCustomer = auth('customer')->user();
                    $authInitial  = strtoupper(mb_substr($authCustomer->name ?? 'M', 0, 1));
                @endphp
                <a href="{{ route('member.dashboard') }}"
                   title="Buka Dashboard"
                   aria-label="Buka Dashboard Member"
                   class="inline-flex items-center gap-3 pl-1 pr-4 py-1 rounded-full bg-white border border-[#F4C9DF] hover:border-[#EE4E8B] hover:shadow-md transition-all group">
                    {{-- Avatar --}}
                    <span class="w-9 h-9 rounded-full flex items-center justify-center text-white font-nord font-black text-sm shadow"
                          style="background:#EE4E8B; box-shadow:0 4px 10px rgba(238,78,139,0.30); border:2px solid #FCF9F2;">
                        {{ $authInitial }}
                    </span>
                    {{-- Name + label --}}
                    <span class="flex flex-col leading-tight">
                        <span class="text-xs font-poppins font-semibold text-[#7A2B4A] truncate max-w-[120px]">
                            {{ $authCustomer->name ?? 'Member' }}
                        </span>
                        <span class="text-[10px] uppercase tracking-widest font-nord font-bold text-[#EE4E8B]">
                            Dashboard
                        </span>
                    </span>
                    {{-- Arrow icon --}}
                    <i class="ri-arrow-right-s-line text-[#7A2B4A] text-lg group-hover:translate-x-0.5 transition-transform"></i>
                </a>
            @else
                <a href="{{ route('member.login') }}"
                    class="bg-[#EE4E8B] text-white px-6 py-2 rounded-button hover:bg-[#7A2B4A] hover:scale-105 transition font-heading font-bold">
                    Login
                </a>
            @endauth
        </div>

        <!-- AUTHED MOBILE — avatar bulat di kanan (next to hamburger) -->
        @auth('customer')
            <div class="md:hidden flex items-center gap-2 justify-self-end">
                @php
                    $authCustomerMobile = auth('customer')->user();
                    $authInitialMobile  = strtoupper(mb_substr($authCustomerMobile->name ?? 'M', 0, 1));
                @endphp
                <a href="{{ route('member.dashboard') }}"
                   aria-label="Buka Dashboard"
                   class="w-10 h-10 rounded-full flex items-center justify-center font-nord font-black text-sm shadow text-white"
                   style="background:#EE4E8B; box-shadow:0 4px 10px rgba(238,78,139,0.30); border:2px solid #FCF9F2;">
                    {{ $authInitialMobile }}
                </a>
                <button id="mobile-menu-button"
                    class="w-10 h-10 flex items-center justify-center text-[#EE4E8B]"
                    aria-label="Toggle mobile menu">
                    <i class="ri-menu-line ri-lg"></i>
                </button>
            </div>
        @else
            <!-- HAMBURGER (MOBILE) — guest only -->
            <div class="md:hidden flex items-center justify-self-end">
              <button id="mobile-menu-button"
                  class="w-10 h-10 flex items-center justify-center text-[#EE4E8B]"
                  aria-label="Toggle mobile menu">
                <i class="ri-menu-line ri-lg"></i>
              </button>
            </div>
        @endauth

    </div>
</header>



    <!-- Mobile Navigation + Backdrop -->
    <div id="mobile-backdrop" class="fixed inset-0 bg-[#1C1C1C] bg-opacity-40 hidden" style="z-index:9998; transition: opacity .25s; pointer-events:none;"></div>
    <div id="mobile-menu" class="mobile-menu fixed top-16 bottom-0 right-0 w-72 bg-[#FCF9F2] shadow-lg p-6 transform overflow-y-auto" style="z-index:9999;">
      <div class="flex items-center justify-between mb-6">
        <a href="{{ route('member.dashboard') }}" class="logo text-[#EE4E8B] font-heading font-bold hover:text-[#7A2B4A] transition tracking-tight">
          <span class="font-accent italic text-2xl align-top mr-1">F</span>TM <span class="font-accent italic text-2xl align-top ml-1">SOCIETY</span>
        </a>
        <button id="close-menu-button" type="button" aria-label="Tutup menu" class="w-9 h-9 inline-flex items-center justify-center rounded-md text-[#1C1C1C]/80 hover:bg-[#F4C9DF]" style="position:relative; z-index:10001; pointer-events:auto;">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <nav class="flex flex-col gap-3 font-heading font-medium">
        @auth('customer')
          <a href="{{ route('member.dashboard') }}" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition font-semibold">Dashboard</a>
        @else
          <a href="{{ route('member.login') }}" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition font-semibold">Login</a>
          <a href="{{ route('member.register') }}" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition font-semibold">Register</a>
        @endauth

        <hr class="my-2">
        <a href="{{ route('member.dashboard') }}" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">Dashboard</a>
        <a href="{{ route('member.account') }}" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">My QR Card</a>
        <a href="{{ route('member.attendance') }}" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">Attendance</a>
        <a href="#about" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">About</a>
        <a href="#Programs" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">Programs</a>
        <a href="#Classes" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">Classes</a>
        <a href="#schedule" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">Schedule</a>
        <a href="#Facility" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">Facility</a>
        <a href="#contact" class="block px-4 py-3 rounded-md text-[#1C1C1C] hover:bg-[#EE4E8B] hover:text-white transition">Contact</a>

      </nav>
    </div>

  <!-- ========================================= -->
<!-- HERO SECTION - REFACTORED & PROFESSIONAL -->
<!-- ========================================= -->

<section id="home" class="relative min-h-screen flex items-center overflow-hidden">
    
  <!-- Background Image Layer with Premium Effects -->
  <div class="absolute inset-0 z-0">
    <div id="hero-bg" 
       class="absolute inset-0 bg-cover bg-center transition-all duration-700 scale-105 backdrop-blur-xs"
       style="background-image: url('/images/bg.JPG');"></div>
        
    <!-- Luxury Gradient Overlay - Rose/Burgundy Blend -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#7A2B4A]/85 via-[#EE4E8B]/70 to-[#1C1C1C]/80"></div>
        
    <!-- Premium Dark Accent Layer for Text Contrast -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#1C1C1C]/40 via-transparent to-transparent"></div>
  </div>

  <!-- Decorative Background Elements - Soft Luxury Ambiance -->
  <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
    <div class="absolute top-1/4 -right-48 w-96 h-96 bg-[#F4C9DF]/15 rounded-full blur-3xl opacity-60 animate-pulse" style="animation-duration: 6s;"></div>
    <div class="absolute bottom-1/4 -left-48 w-96 h-96 bg-[#FCF9F2]/10 rounded-full blur-3xl opacity-50 animate-pulse" style="animation-duration: 7s; animation-delay: 1.5s;"></div>
  </div>

  <!-- Main Content Container -->
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center min-h-[calc(100vh-80px)]">
            
      <!-- LEFT COLUMN - Text Content -->
      <div class="lg:col-span-7 text-center lg:text-left space-y-6 md:space-y-8 animate-fade-in">
                
        <!-- Premium Glass Effect Badge -->
        <div data-aos="fade-right" 
           class="inline-flex items-center gap-3 px-6 py-3 rounded-full backdrop-blur-xl bg-white/[0.08] border-2 border-white/30 shadow-2xl hover:bg-white/[0.12] hover:border-white/50 transition-all duration-300 group">
          <span class="relative flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#F4C9DF] opacity-80"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-[#F4C9DF] shadow-lg"></span>
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
              <span class="font-instrument italic font-normal text-transparent bg-clip-text bg-gradient-to-r from-[#F4C9DF] via-[#EE4E8B] to-[#F4C9DF] bg-[length:200%_auto] animate-gradient-shift drop-shadow-2xl" style="text-shadow: 0 10px 30px rgba(238, 78, 139, 0.4); filter: drop-shadow(0 20px 40px rgba(122, 43, 74, 0.3)); letter-spacing: -0.02em;">
                Productive
              </span>
              <!-- Elegant Gradient Underline -->
              <div class="absolute -bottom-4 left-0 right-0 h-1.5 bg-gradient-to-r from-transparent via-[#F4C9DF] to-transparent rounded-full opacity-80 blur-sm"></div>
              <div class="absolute -bottom-3 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-[#EE4E8B] to-transparent rounded-full"></div>
            </span><br/>
            <span class="font-nord bg-gradient-to-r from-white to-[#FCF9F2] bg-clip-text text-transparent">SISTER</span>
          </h1>
        </div>

        <!-- Subtitle - Refined Spacing & Hierarchy -->
        <div data-aos="fade-right" data-aos-delay="200" class="space-y-3 pt-4">
          <p class="font-poppins text-xl sm:text-2xl md:text-3xl text-white font-medium leading-relaxed tracking-wide">
            Good Habit inside
          </p>
          <p class="font-instrument italic text-3xl sm:text-4xl md:text-5xl bg-gradient-to-r from-[#F4C9DF] to-[#EE4E8B] bg-clip-text text-transparent drop-shadow-lg" style="text-shadow: 0 8px 20px rgba(238, 78, 139, 0.3);">
            Productive Muslimah
          </p>
        </div>

        <!-- CTA Buttons - Premium Styling & Effects -->
        <div data-aos="fade-right" data-aos-delay="300" 
           class="flex flex-wrap gap-4 justify-center lg:justify-start pt-6">
          @auth('customer')
          @else
            <a href="#join" 
               class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 text-lg font-black text-white bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] rounded-full overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-300 ease-out hover:scale-105 hover:-translate-y-1">
              <span class="relative z-10 tracking-wide">Join Now</span>
              <i class="ri-arrow-right-line text-xl relative z-10 transition-all group-hover:translate-x-2 group-hover:scale-110"></i>
              <div class="absolute inset-0 bg-gradient-to-r from-[#7A2B4A] to-[#EE4E8B] opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
              <div class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-20 bg-white group-hover:scale-150 transition-all duration-500"></div>
            </a>
          @endauth
                    
          <a href="#about" 
             class="group inline-flex items-center justify-center gap-3 px-8 py-4 text-lg font-bold text-white bg-white/10 backdrop-blur-sm border-2 border-white/60 rounded-full hover:bg-[#FCF9F2] hover:text-[#EE4E8B] hover:border-[#FCF9F2] transition-all duration-300 ease-out hover:scale-105 hover:-translate-y-1">
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
      <span class="text-xs font-black uppercase tracking-[0.15em] text-white hover:text-white transition-all duration-300 whitespace-nowrap">Scroll Down</span>
      <div class="flex flex-col items-center justify-center" style="animation: bounce-smooth 2.2s cubic-bezier(0.4, 0, 0.6, 1) infinite;">
        <div class="w-6 h-9 border-2 border-white/50 rounded-full flex flex-col items-center justify-start pt-2 hover:border-white/90 transition-all duration-300">
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
  <div class="absolute inset-0 bg-gradient-to-br from-[#FCF9F2] via-[#FCF9F2]/50 to-[#F4C9DF]/30"></div>
    
  <!-- Animated Decorative Background Pattern -->
  <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
    <div class="absolute inset-0" 
       style="background-image: 
        radial-gradient(circle at 20% 50%, transparent 0%, transparent 10%, #EE4E8B 10%, #EE4E8B 11%, transparent 11%),
        radial-gradient(circle at 80% 80%, transparent 0%, transparent 10%, #7A2B4A 10%, #7A2B4A 11%, transparent 11%);
        background-size: 100px 100px;">
    </div>
  </div>

  <!-- Floating Gradient Orbs -->
  <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
    <div class="absolute -top-48 -left-48 w-96 h-96 bg-gradient-to-br from-[#7A2B4A]/20 to-[#F4C9DF]/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 4s;"></div>
    <div class="absolute top-1/3 -right-64 w-[500px] h-[500px] bg-gradient-to-tl from-[#EE4E8B]/15 to-[#EE4E8B]/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 6s; animation-delay: 1s;"></div>
    <div class="absolute -bottom-32 left-1/3 w-80 h-80 bg-gradient-to-tr from-[#EE4E8B]/20 to-[#7A2B4A]/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 5s; animation-delay: 2s;"></div>
  </div>

  <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
    <!-- Section Header - Premium Design -->
    <div class="text-center mb-16 md:mb-24" data-aos="fade-up">
            
      <!-- Top Badge with Shimmer Effect -->
      <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-[#7A2B4A]/10 via-[#F4C9DF]/50 to-[#7A2B4A]/10 rounded-full border border-[#7A2B4A]/20 shadow-lg backdrop-blur-sm">
        <div class="relative">
          <div class="w-2 h-2 bg-[#7A2B4A] rounded-full animate-ping absolute"></div>
          <div class="w-2 h-2 bg-[#7A2B4A] rounded-full relative"></div>
        </div>
        <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]">
          Tentang Kami
        </span>
      </div>

      <!-- Main Title with Gradient -->
      <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
        <span class="text-[#EE4E8B]">About</span>
        <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] animate-gradient-shift bg-[length:200%_auto]">
          FTM Society
        </span>
      </h2>

      <!-- Decorative Divider -->
      <div class="flex items-center justify-center gap-3 mb-6">
        <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-[#7A2B4A] rounded-full"></div>
        <div class="w-3 h-3 bg-[#7A2B4A] rounded-full animate-pulse"></div>
        <div class="w-24 h-1 bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full"></div>
        <div class="w-3 h-3 bg-[#EE4E8B] rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
        <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-[#EE4E8B] rounded-full"></div>
      </div>

      <!-- Subtitle -->
      <p class="text-lg md:text-xl text-[#1C1C1C] max-w-3xl mx-auto leading-relaxed font-light">
        Ruang bagi muslimah untuk hidup <span class="font-semibold text-[#EE4E8B]">aktif</span>, <span class="font-semibold text-[#7A2B4A]">produktif</span>, dan sesuai <span class="font-semibold text-[#EE4E8B]">syariat</span>
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
            <div class="absolute -inset-4 bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#EE4E8B] rounded-[2rem] opacity-20 group-hover:opacity-30 blur-xl transition-all duration-500"></div>
                        
            <!-- Main Image Container -->
                        <div class="relative rounded-[2rem] overflow-hidden shadow-2xl ring-4 ring-white/50 transform group-hover:scale-[1.02] transition-all duration-500">
                          <img src="{{ asset('images/logo ftm (1).jpg') }}"
                             alt="FTM Society - Empowering Muslimah"
                             class="w-full h-auto object-cover" />
                            
              <!-- Gradient Overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-[#EE4E8B]/80 via-[#EE4E8B]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
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
          <div class="absolute -top-6 -left-6 bg-[#FCF9F2] rounded-2xl shadow-xl p-4 border-2 border-[#7A2B4A]/20 backdrop-blur-sm hidden lg:block"
             data-aos="fade-down" data-aos-delay="300">
            <div class="flex items-center gap-2">
              <div class="w-3 h-3 bg-[#7A2B4A] rounded-full animate-pulse"></div>
              <span class="font-bold text-[#EE4E8B] text-sm">Trusted Community</span>
            </div>
          </div>

          <!-- Decorative Blur Elements -->
          <div class="absolute -top-8 -left-8 w-32 h-32 bg-[#7A2B4A]/30 rounded-full blur-3xl -z-10"></div>
          <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-[#EE4E8B]/30 rounded-full blur-3xl -z-10"></div>
                    
        </div>
      </div>

      <!-- RIGHT COLUMN - Content (7 cols) -->
      <div class="lg:col-span-7 order-1 lg:order-2 space-y-8" data-aos="fade-left" data-aos-delay="200">
                
        <!-- Title with Icon -->
        <div class="flex items-start gap-4">
          <div class="flex-shrink-0 w-1 h-16 bg-gradient-to-b from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full"></div>
          <div>
            <h3 class="text-3xl md:text-4xl lg:text-5xl font-black text-[#EE4E8B] mb-2">
              Vision & Mission
            </h3>
            <p class="text-sm text-[#1C1C1C] font-medium uppercase tracking-wider">Our Purpose & Goals</p>
          </div>
        </div>

        <!-- Description with Enhanced Typography -->
        <div class="space-y-5 pl-5">
          <p class="text-[#1C1C1C] leading-relaxed text-base md:text-lg relative">
            <span class="absolute -left-5 top-2 w-2 h-2 bg-[#7A2B4A] rounded-full"></span>
            <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A]">FTM Society</span> adalah memberikan ruang bagi para muslimah untuk memiliki gaya hidup <span class="font-semibold text-[#EE4E8B]">aktif</span> dan <span class="font-semibold text-[#7A2B4A]">produktif</span> yang sesuai dengan syariat Islam.
          </p>
          <p class="text-[#1C1C1C] leading-relaxed text-base md:text-lg relative">
            <span class="absolute -left-5 top-2 w-2 h-2 bg-[#EE4E8B] rounded-full"></span>
            Oleh karena itu, FTM Society hadir menyelenggarakan kegiatan olahraga dan kegiatan aktif sosial lainnya, seperti <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-[#7A2B4A]/10 text-[#7A2B4A] font-semibold rounded-md text-sm"><i class="ri-presentation-line"></i>webinar</span> dan <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-[#EE4E8B]/10 text-[#EE4E8B] font-semibold rounded-md text-sm"><i class="ri-calendar-event-line"></i>event</span>.
          </p>
        </div>

        <!-- Feature Cards Grid - Premium Design -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                    
          <!-- Feature Card 1 - Enhanced -->
          <div class="group relative bg-[#FCF9F2] rounded-2xl p-5 shadow-lg hover:shadow-2xl border border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 transition-all duration-300 overflow-hidden cursor-pointer"
             data-aos="fade-up" data-aos-delay="300">
                        
            <!-- Gradient Background on Hover -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
            <div class="relative flex items-start gap-4">
              <!-- Icon Container -->
              <div class="relative flex-shrink-0">
                <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#F4C9DF] to-[#F4C9DF] text-[#7A2B4A] group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                  <i class="ri-shield-check-line text-3xl"></i>
                </div>
                <div class="absolute -top-1 -right-1 w-4 h-4 bg-[#7A2B4A] rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              </div>
                            
              <!-- Content -->
              <div class="flex-1">
                <h4 class="font-black text-[#1C1C1C] text-base mb-1 group-hover:text-[#EE4E8B] transition-colors duration-300">
                  Muslimah Only
                </h4>
                <p class="text-sm text-[#1C1C1C] leading-relaxed">
                  100% Private & Safe Environment
                </p>
                <!-- Decorative Line -->
                <div class="mt-2 h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] to-transparent transition-all duration-500"></div>
              </div>
            </div>
          </div>

          <!-- Feature Card 2 - Enhanced -->
          <div class="group relative bg-[#FCF9F2] rounded-2xl p-5 shadow-lg hover:shadow-2xl border border-[#F4C9DF]/40 hover:border-[#EE4E8B]/30 transition-all duration-300 overflow-hidden cursor-pointer"
             data-aos="fade-up" data-aos-delay="400">
                        
            <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
            <div class="relative flex items-start gap-4">
              <div class="relative flex-shrink-0">
                <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#F4C9DF] to-[#EE4E8B] text-[#7A2B4A] group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                  <i class="ri-heart-pulse-line text-3xl"></i>
                </div>
                <div class="absolute -top-1 -right-1 w-4 h-4 bg-[#EE4E8B] rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              </div>
                            
              <div class="flex-1">
                <h4 class="font-black text-[#1C1C1C] text-base mb-1 group-hover:text-[#EE4E8B] transition-colors duration-300">
                  Certified Trainers
                </h4>
                <p class="text-sm text-[#1C1C1C] leading-relaxed">
                  Professional Muslimah Coaches
                </p>
                <div class="mt-2 h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#EE4E8B] to-transparent transition-all duration-500"></div>
              </div>
            </div>
          </div>

          <!-- Feature Card 3 - Full Width Enhanced -->
          <div class="group relative bg-[#FCF9F2] rounded-2xl p-5 shadow-lg hover:shadow-2xl border border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 transition-all duration-300 overflow-hidden cursor-pointer sm:col-span-2"
             data-aos="fade-up" data-aos-delay="500">
                        
            <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF] via-[#F4C9DF] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
            <div class="relative flex items-start gap-4">
              <div class="relative flex-shrink-0">
                <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-100 to-indigo-200 text-primary group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                  <i class="ri-pray-line text-3xl"></i>
                </div>
                <div class="absolute -top-1 -right-1 w-4 h-4 bg-[#7A2B4A] rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              </div>
                            
              <div class="flex-1">
                <h4 class="font-black text-[#1C1C1C] text-base mb-1 group-hover:text-[#EE4E8B] transition-colors duration-300">
                  No Music & No Camera
                </h4>
                <p class="text-sm text-[#1C1C1C] leading-relaxed">
                  Fully Islamic-Compliant Environment for Your Comfort
                </p>
                <div class="mt-2 h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-transparent transition-all duration-500"></div>
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
<!-- WHY CHOOSE FTM SECTION - ULTIMATE PROFESSIONAL -->
<!-- Enhanced Slider with Premium UI/UX -->
<!-- ========================================= -->

<section id="packages" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">
    
    <!-- Multi-Layer Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#FCF9F2] via-[#F4C9DF]/30 to-white"></div>
    
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none">
        <div class="absolute inset-0" 
             style="background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 15px, #EE4E8B 15px, #EE4E8B 16px),
                repeating-linear-gradient(-45deg, transparent, transparent 15px, #7A2B4A 15px, #7A2B4A 16px);
                background-size: 80px 80px;">
        </div>
    </div>

    <!-- Floating Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -left-32 w-80 h-80 bg-gradient-to-br from-[#7A2B4A]/20 to-[#EE4E8B]/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 5s;"></div>
        <div class="absolute top-1/2 -right-48 w-96 h-96 bg-gradient-to-tl from-[#EE4E8B]/15 to-[#EE4E8B]/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 7s; animation-delay: 1.5s;"></div>
        <div class="absolute -bottom-24 left-1/4 w-72 h-72 bg-gradient-to-tr from-[#F4C9DF]/20 to-[#7A2B4A]/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 6s; animation-delay: 0.5s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header - Premium Design -->
        <div class="text-center mb-16 md:mb-20" data-aos="fade-up">
            
            <!-- Top Badge -->
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-[#EE4E8B]/10 via-[#7A2B4A]/10 to-[#EE4E8B]/10 rounded-full border border-[#EE4E8B]/20 shadow-lg backdrop-blur-sm">
                <div class="relative">
                    <div class="w-2 h-2 bg-[#EE4E8B] rounded-full animate-ping absolute"></div>
                    <div class="w-2 h-2 bg-[#EE4E8B] rounded-full relative"></div>
                </div>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]">
                    Our Advantages
                </span>
            </div>

            <!-- Main Title -->
            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="text-[#EE4E8B]">Why Choose</span>
                <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] animate-gradient-shift bg-[length:200%_auto]">
                    FTM Society
                </span>
            </h2>

            <!-- Decorative Divider -->
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#EE4E8B] rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#7A2B4A] rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-[#7A2B4A] rounded-full"></div>
            </div>

            <!-- Subtitle -->
            <p class="text-lg md:text-xl text-[#1C1C1C] max-w-3xl mx-auto leading-relaxed">
                Temukan keunggulan yang membuat FTM Society menjadi pilihan terbaik untuk muslimah aktif
            </p>
        </div>

        <!-- Slider Container -->
        <div class="relative max-w-7xl mx-auto">
            
            <!-- Navigation Button Left -->
            <button
                type="button"
                onclick="slideFeature(-1)"
                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 items-center justify-center w-14 h-14 bg-[#FCF9F2] text-[#EE4E8B] rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-[#EE4E8B] hover:to-[#7A2B4A] hover:text-white transition-all duration-300 z-20 group"
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
                    <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 overflow-hidden h-full flex flex-col">
                        
                        <!-- Gradient Background on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Content -->
                        <div class="relative z-10 flex flex-col items-center text-center flex-1">
                            
                            <!-- Icon Container -->
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#F4C9DF] to-[#F4C9DF] text-[#7A2B4A] group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                    <i class="ri-women-line text-4xl"></i>
                                </div>
                                <!-- Decorative Ring -->
                                <div class="absolute -inset-2 rounded-2xl border-2 border-[#7A2B4A]/20 group-hover:border-[#7A2B4A]/40 group-hover:scale-110 transition-all duration-500"></div>
                                <!-- Floating Dot -->
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-[#7A2B4A] rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl md:text-2xl font-black text-[#EE4E8B] mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                                Muslimah-Only Space
                            </h3>

                            <!-- Description -->
                            <p class="text-[#1C1C1C]/70 text-sm md:text-base leading-relaxed flex-1">
                                Fasilitas kami hanya untuk wanita, dengan staf wanita saja. Nikmati privasi lengkap tanpa jendela yang menghadap area publik dan sistem masuk yang aman.
                            </p>

                            <!-- Bottom Accent Line -->
                            <div class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 2 - Enhanced -->
                <div class="min-w-[300px] sm:min-w-[340px] max-w-[360px] flex-shrink-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-[#F4C9DF]/40 hover:border-[#EE4E8B]/30 overflow-hidden h-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10 flex flex-col items-center text-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#F4C9DF] to-[#EE4E8B] text-[#7A2B4A] group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                    <i class="ri-user-star-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-[#EE4E8B]/20 group-hover:border-[#EE4E8B]/40 group-hover:scale-110 transition-all duration-500"></div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-[#EE4E8B] rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                            </div>

                            <h3 class="text-xl md:text-2xl font-black text-[#EE4E8B] mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                                Certified Muslimah Trainer
                            </h3>

                            <p class="text-[#1C1C1C]/70 text-sm md:text-base leading-relaxed flex-1">
                                Dibimbing langsung oleh coach tersertifikasi dengan pengalaman profesional dan pemahaman mendalam tentang kebutuhan muslimah.
                            </p>

                            <div class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 3 - Enhanced -->
                <div class="min-w-[300px] sm:min-w-[340px] max-w-[360px] flex-shrink-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 overflow-hidden h-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10 flex flex-col items-center text-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-100 to-indigo-200 text-primary group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                    <i class="ri-shield-user-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-[#7A2B4A]/20 group-hover:border-[#7A2B4A]/40 group-hover:scale-110 transition-all duration-500"></div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-[#7A2B4A] rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                            </div>

                            <h3 class="text-xl md:text-2xl font-black text-[#EE4E8B] mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                                Privacy is Our Priority
                            </h3>

                            <p class="text-[#1C1C1C]/70 text-sm md:text-base leading-relaxed flex-1">
                                Ruang latihan khusus muslimah, tanpa kamera dan tanpa musik. Kami mengutamakan kenyamanan, keamanan, dan privasimu saat berolahraga.
                            </p>

                            <div class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Feature Card 4 - Enhanced -->
                <div class="min-w-[300px] sm:min-w-[340px] max-w-[360px] flex-shrink-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-[#F4C9DF]/40 hover:border-[#EE4E8B]/30 overflow-hidden h-full flex flex-col">
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-rose-50/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10 flex flex-col items-center text-center flex-1">
                            
                            <div class="relative mb-6">
                                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-rose-100 to-rose-200 text-rose-600 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                                    <i class="ri-user-heart-line text-4xl"></i>
                                </div>
                                <div class="absolute -inset-2 rounded-2xl border-2 border-[#EE4E8B]/20 group-hover:border-[#EE4E8B]/40 group-hover:scale-110 transition-all duration-500"></div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-[#EE4E8B] rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                            </div>

                            <h3 class="text-xl md:text-2xl font-black text-[#EE4E8B] mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                                Muslimah Friendly
                            </h3>

                            <p class="text-[#1C1C1C]/70 text-sm md:text-base leading-relaxed flex-1">
                                Dirancang khusus untuk muslimah: area khusus wanita, pelatih perempuan bersertifikat, dan suasana nyaman sesuai nilai-nilai islami.
                            </p>

                            <div class="mt-6 h-1 w-0 group-hover:w-full bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Navigation Button Right -->
            <button
                type="button"
                onclick="slideFeature(1)"
                class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 items-center justify-center w-14 h-14 bg-[#FCF9F2] text-[#EE4E8B] rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-[#EE4E8B] hover:to-[#7A2B4A] hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Right"
                id="featureScrollRight"
            >
                <i class="ri-arrow-right-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>

        </div>

        <!-- Slider Indicators (Optional) -->
        <div class="flex justify-center gap-2 mt-12" data-aos="fade-up" data-aos-delay="500">
            <div class="w-2 h-2 bg-[#EE4E8B] rounded-full"></div>
            <div class="w-8 h-2 bg-[#7A2B4A] rounded-full"></div>
            <div class="w-2 h-2 bg-[#EE4E8B]/40 rounded-full"></div>
            <div class="w-2 h-2 bg-[#EE4E8B]/40 rounded-full"></div>
        </div>

        <!-- Bottom CTA (Optional) -->
        <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="600">
            <a href="#join" 
               class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] bg-[length:200%_auto] text-white font-bold rounded-full shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 group">
                <span>Bergabung Sekarang</span>
                <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

    </div>
</section>

<!-- ========================================= -->
<!-- PROGRAMS SECTION - FIXED & STABLE        -->
<!-- Cards tidak bergoyang, slider smooth      -->
<!-- ========================================= -->

<section id="Programs" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">
    
  <!-- Multi-Layer Background -->
  <div class="absolute inset-0 bg-gradient-to-b from-[#FCF9F2] via-[#FCF9F2]/50 to-[#F4C9DF]/30"></div>
    
  <!-- Animated Background Pattern -->
  <div class="absolute inset-0 opacity-[0.02] pointer-events-none">
    <div class="absolute inset-0" 
       style="background-image: 
        radial-gradient(circle at 25% 25%, transparent 0%, transparent 12%, #EE4E8B 12%, #EE4E8B 13%, transparent 13%),
        radial-gradient(circle at 75% 75%, transparent 0%, transparent 12%, #7A2B4A 12%, #7A2B4A 13%, transparent 13%);
        background-size: 120px 120px;">
    </div>
  </div>

  <!-- Floating Gradient Orbs -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-20 -left-40 w-96 h-96 bg-gradient-to-br from-[#7A2B4A]/15 to-[#F4C9DF]/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 6s;"></div>
    <div class="absolute -top-20 right-1/4 w-80 h-80 bg-gradient-to-tl from-[#EE4E8B]/10 to-[#EE4E8B]/10 rounded-full blur-3xl animate-pulse" style="animation-duration: 8s; animation-delay: 2s;"></div>
    <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-gradient-to-tr from-[#EE4E8B]/15 to-[#7A2B4A]/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 7s; animation-delay: 1s;"></div>
  </div>

  <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
    <!-- Section Header -->
    <div class="text-center mb-16 md:mb-20">
            
      <!-- Top Badge -->
      <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-[#7A2B4A]/10 via-[#F4C9DF]/50 to-[#7A2B4A]/10 rounded-full border border-[#7A2B4A]/20 shadow-lg backdrop-blur-sm">
        <div class="relative">
          <div class="w-2 h-2 bg-[#7A2B4A] rounded-full animate-ping absolute"></div>
          <div class="w-2 h-2 bg-[#7A2B4A] rounded-full relative"></div>
        </div>
        <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]">
          Our Program 
        </span>
      </div>

      <!-- Main Title -->
      <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] animate-gradient-shift bg-[length:200%_auto]">
          Programs
        </span>
      </h2>

      <!-- Decorative Divider -->
      <div class="flex items-center justify-center gap-3 mb-6">
        <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-[#7A2B4A] rounded-full"></div>
        <div class="w-3 h-3 bg-[#7A2B4A] rounded-full animate-pulse"></div>
        <div class="w-24 h-1 bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full"></div>
        <div class="w-3 h-3 bg-[#EE4E8B] rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
        <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-[#EE4E8B] rounded-full"></div>
      </div>

      <!-- Subtitle -->
      <p class="text-lg md:text-xl text-[#1C1C1C] max-w-3xl mx-auto leading-relaxed">
        Temukan program yang sesuai dengan kebutuhan dan gaya hidup Anda
      </p>
    </div>

    <!-- Slider Container -->
    <div class="relative max-w-7xl mx-auto">
            
      <!-- Navigation Button Left -->
      <button
        type="button"
        onclick="slideService(-1)"
        class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 items-center justify-center w-14 h-14 bg-[#FCF9F2] text-[#EE4E8B] rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-[#EE4E8B] hover:to-[#7A2B4A] hover:text-white transition-all duration-300 z-20 group"
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
          <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 overflow-hidden w-full flex flex-col">
                        
            <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
            <div class="relative z-10 flex flex-col items-center flex-1">
                            
              <!-- Icon — hanya icon yg bergerak, bukan card -->
              <div class="relative mb-6">
                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#F4C9DF] to-[#F4C9DF] text-[#7A2B4A] shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                  <i class="ri-team-line text-4xl"></i>
                </div>
                <div class="absolute -inset-2 rounded-2xl border-2 border-[#7A2B4A]/20 group-hover:border-[#7A2B4A]/40 transition-colors duration-300"></div>
                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-[#7A2B4A] to-[#EE4E8B] text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  Popular
                </div>
              </div>

              <h4 class="text-xl font-black text-[#EE4E8B] mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                Private Group Class
              </h4>

              <p class="text-[#1C1C1C]/70 text-sm leading-relaxed text-center mb-6 flex-1">
                Latihan kelompok privat dengan instruktur berpengalaman, cocok untuk komunitas atau teman-teman.
              </p>

              <div class="w-full mb-6 space-y-2 text-xs text-[#1C1C1C]/55">
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#7A2B4A]"></i>
                  <span>Max 8-10 orang</span>
                </div>
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#7A2B4A]"></i>
                  <span>Jadwal fleksibel</span>
                </div>
              </div>

              <!-- Bottom Accent -->
              <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full transition-all duration-300 mb-3"></div>

              <!-- FIX: Hapus hover:scale-105 dari button -->
              <a href="https://wa.me/6287785767395" target="_blank" 
                 class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
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
          <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-[#F4C9DF]/40 hover:border-[#EE4E8B]/30 overflow-hidden w-full flex flex-col">
                        
            <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
            <div class="relative z-10 flex flex-col items-center flex-1">
                            
              <div class="relative mb-6">
                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#F4C9DF] to-[#EE4E8B] text-[#7A2B4A] shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                  <i class="ri-user-heart-line text-4xl"></i>
                </div>
                <div class="absolute -inset-2 rounded-2xl border-2 border-[#EE4E8B]/20 group-hover:border-[#EE4E8B]/40 transition-colors duration-300"></div>
                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-[#EE4E8B] to-[#EE4E8B] text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  1-on-1
                </div>
              </div>

              <h4 class="text-xl font-black text-[#EE4E8B] mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                Private Training
              </h4>

              <p class="text-[#1C1C1C]/70 text-sm leading-relaxed text-center mb-6 flex-1">
                Sesi latihan personal sesuai kebutuhan Anda, didampingi pelatih profesional untuk hasil optimal.
              </p>

              <div class="w-full mb-6 space-y-2 text-xs text-[#1C1C1C]/55">
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#EE4E8B]"></i>
                  <span>Personal attention</span>
                </div>
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#EE4E8B]"></i>
                  <span>Custom program</span>
                </div>
              </div>

              <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full transition-all duration-300 mb-3"></div>

              <a href="https://wa.me/6287785767395" target="_blank" 
                 class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
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
          <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 overflow-hidden w-full flex flex-col">
                        
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
            <div class="relative z-10 flex flex-col items-center flex-1">
                            
              <div class="relative mb-6">
                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-blue-100 to-blue-200 text-primary shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                  <i class="ri-calendar-check-line text-4xl"></i>
                </div>
                <div class="absolute -inset-2 rounded-2xl border-2 border-[#7A2B4A]/20 group-hover:border-[#7A2B4A]/40 transition-colors duration-300"></div>
                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-[#7A2B4A] to-blue-400 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  Flexible
                </div>
              </div>

              <h4 class="text-xl font-black text-[#EE4E8B] mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                Single Visit Class
              </h4>

              <p class="text-[#1C1C1C]/70 text-sm leading-relaxed text-center mb-6 flex-1">
                Ikuti kelas tanpa harus menjadi member tetap. Fleksibel untuk Anda yang ingin mencoba atau punya jadwal padat.
              </p>

              <div class="w-full mb-6 space-y-2 text-xs text-[#1C1C1C]/55">
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#7A2B4A]"></i>
                  <span>No commitment</span>
                </div>
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#7A2B4A]"></i>
                  <span>Try first</span>
                </div>
              </div>

              <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full transition-all duration-300 mb-3"></div>

              <a href="https://wa.me/6287785767395" target="_blank" 
                 class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
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
          <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-[#F4C9DF]/40 hover:border-[#EE4E8B]/30 overflow-hidden w-full flex flex-col">
                        
            <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
            <div class="relative z-10 flex flex-col items-center flex-1">
                            
              <div class="relative mb-6">
                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-[#F4C9DF] to-[#EE4E8B] text-[#7A2B4A] shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                  <i class="ri-group-line text-4xl"></i>
                </div>
                <div class="absolute -inset-2 rounded-2xl border-2 border-[#EE4E8B]/20 group-hover:border-[#EE4E8B]/40 transition-colors duration-300"></div>
                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  Trending
                </div>
              </div>

              <h4 class="text-xl font-black text-[#EE4E8B] mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                Reformer Pilates
              </h4>

              <p class="text-[#1C1C1C]/70 text-sm leading-relaxed text-center mb-6 flex-1">
                Latihan pilates dengan alat reformer untuk kekuatan, fleksibilitas, dan postur tubuh yang lebih baik.
              </p>

              <div class="w-full mb-6 space-y-2 text-xs text-[#1C1C1C]/55">
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#EE4E8B]"></i>
                  <span>Alat reformer</span>
                </div>
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#EE4E8B]"></i>
                  <span>Improve posture</span>
                </div>
              </div>

              <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full transition-all duration-300 mb-3"></div>

              <a href="https://wa.me/6287785767395" target="_blank" 
                 class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
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
          <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-shadow duration-300 border-2 border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 overflow-hidden w-full flex flex-col">
                        
            <div class="absolute inset-0 bg-gradient-to-br from-amber-50/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
            <div class="relative z-10 flex flex-col items-center flex-1">
                            
              <div class="relative mb-6">
                <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-amber-100 to-amber-200 text-springs-ivy shadow-lg transition-transform duration-300 group-hover:scale-110" style="will-change:transform;">
                  <i class="ri-award-line text-4xl"></i>
                </div>
                <div class="absolute -inset-2 rounded-2xl border-2 border-[#7A2B4A]/20 group-hover:border-[#7A2B4A]/40 transition-colors duration-300"></div>
                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-[#7A2B4A] to-amber-400 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  Premium
                </div>
              </div>

              <h4 class="text-xl font-black text-[#EE4E8B] mb-3 text-center group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A] transition-all duration-300">
                Exclusive Class Program
              </h4>

              <p class="text-[#1C1C1C]/70 text-sm leading-relaxed text-center mb-6 flex-1">
                Program kelas eksklusif dengan materi pilihan, peserta terbatas, dan pendampingan intensif.
              </p>

              <div class="w-full mb-6 space-y-2 text-xs text-[#1C1C1C]/55">
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#7A2B4A]"></i>
                  <span>Limited seats</span>
                </div>
                <div class="flex items-center gap-2">
                  <i class="ri-check-line text-[#7A2B4A]"></i>
                  <span>Intensive coaching</span>
                </div>
              </div>

              <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full transition-all duration-300 mb-3"></div>

              <!-- FIX: hover:scale-105 dihapus -->
              <a href="https://wa.me/6287785767395" target="_blank" 
                 class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-6 py-3 rounded-full hover:shadow-xl transition-shadow duration-300 text-sm font-bold text-center flex items-center justify-center gap-2 mt-auto">
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
        class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 items-center justify-center w-14 h-14 bg-[#FCF9F2] text-[#EE4E8B] rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-[#EE4E8B] hover:to-[#7A2B4A] hover:text-white transition-all duration-300 z-20 group"
        aria-label="Scroll Right"
        id="serviceScrollRight"
      >
        <i class="ri-arrow-right-s-line text-3xl group-hover:scale-110 transition-transform"></i>
      </button>

    </div>

    <!-- Bottom CTA -->
    <div class="mt-16 text-center">
      <p class="text-[#1C1C1C] mb-6">
        Tidak yakin program mana yang cocok? <span class="font-semibold text-[#EE4E8B]">Konsultasi gratis</span> dengan tim kami
      </p>
      <!-- FIX: hover:scale-105 dihapus dari CTA ini juga -->
      <a href="https://wa.me/6287785767395" 
         target="_blank"
         class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] bg-[length:200%_auto] text-white font-bold rounded-full shadow-xl hover:shadow-2xl transition-shadow duration-300 group">
        <i class="ri-customer-service-2-line text-xl"></i>
        <span>Hubungi Kami</span>
        <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
      </a>
    </div>

  </div>
</section>

<!-- Modal Detail Service -->
<div 
  id="service-detail-modal"
  class="fixed inset-0 hidden z-50 bg-[#1C1C1C] bg-opacity-60 items-center justify-center transition-opacity duration-200"
>
  <div 
    id="service-detail-box"
    class="bg-[#FCF9F2] rounded-lg shadow-xl max-w-md w-full p-8 relative transform transition-all duration-200 scale-95 opacity-0"
  >
    <button 
      onclick="closeServiceDetail()" 
      class="absolute top-2 right-2 text-[#1C1C1C]/55 hover:text-[#EE4E8B] text-2xl"
      aria-label="Close Modal"
    >
      &times;
    </button>

    <h3 id="service-detail-title" class="text-xl font-bold text-[#EE4E8B] mb-4"></h3>
    <div id="service-detail-content" class="text-[#1C1C1C]/80 text-sm leading-relaxed"></div>
  </div>
</div>


<!-- ========================================= -->
<!-- PACKAGES & PRICING SECTION - STABLE FIXED -->
<!-- Cards tidak bergoyang sama sekali          -->
<!-- ========================================= -->

<section id="Packages" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">
    <!-- Multi-Layer Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#FCF9F2] via-[#F4C9DF]/40 to-white"></div>

    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-[0.015] pointer-events-none">
        <div class="absolute inset-0"
             style="background-image:
                repeating-linear-gradient(0deg, transparent, transparent 50px, #EE4E8B 50px, #EE4E8B 51px),
                repeating-linear-gradient(90deg, transparent, transparent 50px, #7A2B4A 50px, #7A2B4A 51px);
                background-size: 100px 100px;">
        </div>
    </div>

    <!-- Floating Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-48 left-0 w-96 h-96 bg-gradient-to-br from-[#7A2B4A]/15 to-[#EE4E8B]/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 7s;"></div>
        <div class="absolute top-1/3 -right-32 w-[500px] h-[500px] bg-gradient-to-tl from-[#EE4E8B]/10 to-[#EE4E8B]/10 rounded-full blur-3xl animate-pulse" style="animation-duration: 9s; animation-delay: 2s;"></div>
        <div class="absolute -bottom-32 left-1/4 w-80 h-80 bg-gradient-to-tr from-[#F4C9DF]/15 to-[#7A2B4A]/15 rounded-full blur-3xl animate-pulse" style="animation-duration: 8s; animation-delay: 1s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Section Header -->
        <div class="text-center mb-16 md:mb-24">
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-[#EE4E8B]/10 via-[#7A2B4A]/10 to-[#EE4E8B]/10 rounded-full border border-[#EE4E8B]/20 shadow-lg backdrop-blur-sm">
                <div class="relative">
                    <div class="w-2 h-2 bg-[#EE4E8B] rounded-full animate-ping absolute"></div>
                    <div class="w-2 h-2 bg-[#EE4E8B] rounded-full relative"></div>
                </div>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]">
                    The Best Investment for Your Health
                </span>
            </div>

            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="text-[#EE4E8B]">Packages &</span>
                <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] animate-gradient-shift bg-[length:200%_auto]">
                    Pricing
                </span>
            </h2>

            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#EE4E8B] rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#7A2B4A] rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-[#7A2B4A] rounded-full"></div>
            </div>

            <p class="text-lg md:text-xl text-[#1C1C1C]/70 max-w-3xl mx-auto leading-relaxed">
                Pilih rencana yang sempurna yang sesuai dengan perjalanan kebugaran dan gaya hidup Anda
            </p>
        </div>

        <!-- Slider Container -->
        <div class="relative max-w-7xl mx-auto">

            <!-- Nav Left -->
            <button type="button" onclick="slideMembership(-1)"
                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 items-center justify-center w-14 h-14 bg-[#FCF9F2] text-[#EE4E8B] rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-[#EE4E8B] hover:to-[#7A2B4A] hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Left" id="membershipScrollLeft" style="display:none">
                <i class="ri-arrow-left-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>

            <!-- Slider Track -->
            <div id="membershipList"
                 class="flex items-stretch overflow-x-auto gap-6 md:gap-8 scroll-smooth pb-6 px-2"
                 style="scrollbar-width:none; -ms-overflow-style:none;"
                 onscroll="toggleMembershipScroll()">

                {{-- Dynamic Packages from Admin Panel --}}
                @if(isset($packages) && $packages->count() > 0)
                    @foreach($packages as $package)
                    <div class="min-w-[90vw] sm:min-w-[340px] max-w-[360px] flex-shrink-0 flex">
                        <div class="group relative bg-[#FCF9F2] rounded-3xl p-8 shadow-lg
                                    hover:shadow-2xl transition-shadow duration-300
                                    border-2 border-[#F4C9DF]/40 hover:border-[#EE4E8B]/30
                                    overflow-hidden w-full flex flex-col">

                            {{-- Hover gradient overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">

                                {{-- Badge: Dynamic Package --}}
                                <div class="mb-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white text-xs font-bold rounded-full shadow-md">
                                        <i class="ri-heart-pulse-fill"></i>
                                        <span>EKSKLUSIF</span>
                                    </span>
                                </div>

                                {{-- Package Name --}}
                                <h3 class="text-2xl font-black text-[#EE4E8B] mb-3 leading-tight group-hover:text-[#7A2B4A] transition-colors">
                                    {{ $package->name }}
                                </h3>

                                {{-- Price --}}
                                <div class="mb-6">
                                    <div class="flex items-baseline gap-2">
                                        <span class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]">
                                            Rp {{ number_format($package->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    @if($package->duration_days)
                                        <p class="text-[#1C1C1C]/60 text-sm mt-1">Valid {{ $package->duration_days }} hari</p>
                                    @endif
                                </div>

                                {{-- Features --}}
                                <ul class="w-full space-y-3 mb-6 flex-1">
                                    @if($package->quota)
                                    <li class="flex items-center gap-3 text-sm text-[#1C1C1C]/80">
                                        <i class="ri-checkbox-circle-fill text-xl text-[#7A2B4A] flex-shrink-0"></i>
                                        <span>{{ $package->quota }} Sessions</span>
                                    </li>
                                    @endif
                                    @if($package->description)
                                    <li class="flex items-start gap-3 text-sm text-[#1C1C1C]/80">
                                        <i class="ri-information-fill text-xl text-[#EE4E8B] flex-shrink-0 mt-0.5"></i>
                                        <span class="break-words">{{ $package->description }}</span>
                                    </li>
                                    @endif
                                </ul>

                                <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full transition-all duration-500 mb-4"></div>

                                {{-- CTA Button --}}
                                <div class="w-full mt-auto">
                                    @auth('customer')
                                        <a href="{{ route('join.package', ['package' => $package->slug ?? $package->id]) }}"
                                           class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-6 py-4 rounded-full hover:shadow-xl hover:brightness-110 transition-all font-bold text-center block">
                                            Daftar Sekarang
                                        </a>
                                    @else
                                        <a href="{{ route('member.login') }}"
                                           class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-6 py-4 rounded-full hover:shadow-xl hover:brightness-110 transition-all font-bold text-center block">
                                            Login untuk Membeli
                                        </a>
                                    @endauth
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>

            <!-- Nav Right -->
            <button type="button" onclick="slideMembership(1)"
                class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 items-center justify-center w-14 h-14 bg-[#FCF9F2] text-[#EE4E8B] rounded-full shadow-xl hover:shadow-2xl hover:bg-gradient-to-br hover:from-[#EE4E8B] hover:to-[#7A2B4A] hover:text-white transition-all duration-300 z-20 group"
                aria-label="Scroll Right" id="membershipScrollRight">
                <i class="ri-arrow-right-s-line text-3xl group-hover:scale-110 transition-transform"></i>
            </button>
        </div>

        <!-- Bottom Notes -->
        <div class="mt-16 text-center">
            <p class="text-[#1C1C1C]/70 text-sm max-w-2xl mx-auto">
                All packages include Schedule will continue to be updated
            </p>
        </div>
    </div>
</section>

<!-- Package Variant Modal -->
<div id="package-variant-modal" class="fixed inset-0 bg-[#1C1C1C] bg-opacity-60 hidden items-center justify-center z-50">
  <div class="bg-[#FCF9F2] rounded-lg shadow-xl max-w-md w-full p-6 mx-4">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-bold text-[#EE4E8B]">Pilih Paket</h3>
      <button type="button" onclick="closeVariantModal()" class="text-[#1C1C1C]/70 text-2xl">&times;</button>
    </div>
    <div id="package-variant-list" class="flex flex-col gap-3"></div>
    <div class="mt-4 text-right">
      <button type="button" onclick="closeVariantModal()" class="px-4 py-2 rounded-button border border-[#F4C9DF]">Batal</button>
    </div>
  </div>
</div>

<!-- ========================================= -->
<!-- CLASSES SECTION - ULTIMATE PROFESSIONAL  -->
<!-- Consistent with FTM Society design style -->
<!-- Cards TIDAK bergoyang                     -->
<!-- ========================================= -->

<section id="classes" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">

    <!-- Multi-Layer Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#FCF9F2] via-[#F4C9DF]/30 to-[#FCF9F2]"></div>

    <!-- Subtle Grid Pattern -->
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
         style="background-image:
            repeating-linear-gradient(0deg, transparent, transparent 50px, #EE4E8B 50px, #EE4E8B 51px),
            repeating-linear-gradient(90deg, transparent, transparent 50px, #7A2B4A 50px, #7A2B4A 51px);
            background-size: 100px 100px;">
    </div>

    <!-- Floating Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-gradient-to-br from-[#7A2B4A]/15 to-[#EE4E8B]/15 rounded-full blur-3xl animate-pulse" style="animation-duration:7s;"></div>
        <div class="absolute top-1/2 -right-40 w-[500px] h-[500px] bg-gradient-to-tl from-[#EE4E8B]/10 to-[#EE4E8B]/10 rounded-full blur-3xl animate-pulse" style="animation-duration:9s; animation-delay:2s;"></div>
        <div class="absolute -bottom-20 left-1/3 w-80 h-80 bg-gradient-to-tr from-[#F4C9DF]/15 to-[#7A2B4A]/15 rounded-full blur-3xl animate-pulse" style="animation-duration:8s; animation-delay:1s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- ── Section Header ── -->
        <div class="text-center mb-16 md:mb-20">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-[#EE4E8B]/10 via-[#7A2B4A]/10 to-[#EE4E8B]/10 rounded-full border border-[#EE4E8B]/20 shadow-lg backdrop-blur-sm">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#7A2B4A] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#7A2B4A]"></span>
                </span>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]">
                    Our Class Program
                </span>
            </div>

            <!-- Title -->
            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                
                <span class="block mt-1 text-transparent bg-clip-text bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] animate-gradient-shift bg-[length:200%_auto]">
                    Classes
                </span>
            </h2>

            <!-- Decorative Divider -->
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#EE4E8B] rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#7A2B4A] rounded-full animate-pulse" style="animation-delay:0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-[#7A2B4A] rounded-full"></div>
            </div>

            <p class="text-lg md:text-xl text-[#1C1C1C]/70 max-w-2xl mx-auto leading-relaxed">
                Temukan berbagai program kebugaran yang dirancang khusus untuk kebutuhan Anda.
            </p>
        </div>

        <!-- ── 4-Column Grid ── -->
        <!-- KEY: grid layout, tidak pakai slider → tidak perlu hover:scale pada card -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">

            <!-- ══════════════════════════ -->
            <!-- CARD 1 : Muaythai         -->
            <!-- ══════════════════════════ -->
            <div class="group relative bg-[#FCF9F2] rounded-3xl overflow-hidden
                        shadow-lg hover:shadow-2xl transition-shadow duration-300
                        border-2 border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 flex flex-col">

                <!-- Hover tint -->
                <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                <!-- Image -->
                <div class="relative h-52 overflow-hidden flex-shrink-0">
                    <img src="{{ asset('images/muaythai.png') }}" alt="Muaythai" loading="lazy"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Badge -->
                    <div class="absolute top-3 left-3 bg-gradient-to-r from-[#7A2B4A] to-[#EE4E8B] text-white text-xs font-black px-3 py-1 rounded-full shadow-lg">
                        Popular
                    </div>
                    <!-- Duration chip -->
                    <div class="absolute bottom-3 right-3 bg-[#FCF9F2]/90 backdrop-blur-sm text-[#EE4E8B] text-xs font-bold px-2.5 py-1 rounded-full shadow">
                        45 min
                    </div>
                </div>

                <!-- Content -->
                <div class="relative z-10 p-6 flex-1 flex flex-col">

                    <!-- Icon + Title Row -->
                    <div class="flex items-center gap-3 mb-3">
                        <!-- Icon: HANYA icon yang scale pada hover -->
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                                    bg-gradient-to-br from-[#F4C9DF] to-[#F4C9DF] text-[#7A2B4A]
                                    shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                             style="will-change:transform; flex-shrink:0;">
                            <i class="ri-boxing-line text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-[#EE4E8B] leading-tight
                                       group-hover:text-transparent group-hover:bg-clip-text
                                       group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A]
                                       transition-all duration-300">
                                Muaythai
                            </h3>
                            <span class="text-xs text-[#1C1C1C]/40 font-medium">All Levels</span>
                        </div>
                    </div>

                    <p class="text-sm text-[#1C1C1C]/70 leading-relaxed flex-1 mb-5">
                        Seni bela diri asal Thailand menggunakan delapan titik kontak tubuh: tangan, siku, lutut, dan kaki — melibatkan teknik serangan dan pertahanan.
                    </p>

                    <!-- Bottom accent line -->
                    <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full transition-all duration-500 mb-4"></div>

                    <!-- CTA — hapus hover:scale-105 -->
                    <button onclick="openModal('muaythai')"
                            class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-4 py-3 rounded-full
                                   hover:shadow-xl hover:brightness-110 transition-all text-sm font-bold
                                   flex items-center justify-center gap-2 mt-auto">
                        <i class="ri-eye-line text-base"></i>
                        Cek Sekarang
                    </button>
                </div>
            </div>

            <!-- ══════════════════════════ -->
            <!-- CARD 2 : Body Shaping     -->
            <!-- ══════════════════════════ -->
            <div class="group relative bg-[#FCF9F2] rounded-3xl overflow-hidden
                        shadow-lg hover:shadow-2xl transition-shadow duration-300
                        border-2 border-[#F4C9DF]/40 hover:border-[#EE4E8B]/30 flex flex-col">

                <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                <div class="relative h-52 overflow-hidden flex-shrink-0">
                    <img src="{{ asset('images/body shaping.png') }}" alt="Body Shaping" loading="lazy"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <div class="absolute bottom-3 right-3 bg-[#FCF9F2]/90 backdrop-blur-sm text-[#EE4E8B] text-xs font-bold px-2.5 py-1 rounded-full shadow">
                        30 min
                    </div>
                </div>

                <div class="relative z-10 p-6 flex-1 flex flex-col">

                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                                    bg-gradient-to-br from-[#F4C9DF] to-[#EE4E8B] text-[#7A2B4A]
                                    shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                             style="will-change:transform; flex-shrink:0;">
                            <i class="ri-body-scan-line text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-[#EE4E8B] leading-tight
                                       group-hover:text-transparent group-hover:bg-clip-text
                                       group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A]
                                       transition-all duration-300">
                                Body Shaping
                            </h3>
                            <span class="text-xs text-[#1C1C1C]/40 font-medium">All Levels</span>
                        </div>
                    </div>

                    <p class="text-sm text-[#1C1C1C]/70 leading-relaxed flex-1 mb-5">
                        Kelas strength training full body workout untuk toning dan shaping tubuh — dari calisthenics hingga gerakan dengan beban dan equipment pendukung.
                    </p>

                    <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full transition-all duration-500 mb-4"></div>

                    <button onclick="openModal('body-shaping')"
                            class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-4 py-3 rounded-full
                                   hover:shadow-xl hover:brightness-110 transition-all text-sm font-bold
                                   flex items-center justify-center gap-2 mt-auto">
                        <i class="ri-eye-line text-base"></i>
                        Cek Sekarang
                    </button>
                </div>
            </div>

            <!-- ══════════════════════════ -->
            <!-- CARD 3 : Mat Pilates      -->
            <!-- ══════════════════════════ -->
            <div class="group relative bg-[#FCF9F2] rounded-3xl overflow-hidden
                        shadow-lg hover:shadow-2xl transition-shadow duration-300
                        border-2 border-[#F4C9DF]/40 hover:border-[#7A2B4A]/30 flex flex-col">

                <div class="absolute inset-0 bg-gradient-to-br from-blue-50/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                <div class="relative h-52 overflow-hidden flex-shrink-0">
                    <img src="{{ asset('images/mat pilates.png') }}" alt="Mat Pilates" loading="lazy"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <div class="absolute bottom-3 right-3 bg-[#FCF9F2]/90 backdrop-blur-sm text-[#EE4E8B] text-xs font-bold px-2.5 py-1 rounded-full shadow">
                        60 min
                    </div>
                </div>

                <div class="relative z-10 p-6 flex-1 flex flex-col">

                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                                    bg-gradient-to-br from-blue-100 to-blue-200 text-primary
                                    shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                             style="will-change:transform; flex-shrink:0;">
                            <i class="ri-mental-health-line text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-[#EE4E8B] leading-tight
                                       group-hover:text-transparent group-hover:bg-clip-text
                                       group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A]
                                       transition-all duration-300">
                                Mat Pilates
                            </h3>
                            <span class="text-xs text-[#1C1C1C]/40 font-medium">All Levels</span>
                        </div>
                    </div>

                    <p class="text-sm text-[#1C1C1C]/70 leading-relaxed flex-1 mb-5">
                        Latihan di atas matras fokus pada kekuatan inti (core), stabilitas, postur, pernapasan, dan fleksibilitas — dilakukan secara perlahan dan terkontrol.
                    </p>

                    <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A] rounded-full transition-all duration-500 mb-4"></div>

                    <button onclick="openModal('mat-pilates')"
                            class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-4 py-3 rounded-full
                                   hover:shadow-xl hover:brightness-110 transition-all text-sm font-bold
                                   flex items-center justify-center gap-2 mt-auto">
                        <i class="ri-eye-line text-base"></i>
                        Cek Sekarang
                    </button>
                </div>
            </div>

            <!-- ══════════════════════════════ -->
            <!-- CARD 4 : Reformer Pilates      -->
            <!-- ══════════════════════════════ -->
            <div class="group relative bg-[#FCF9F2] rounded-3xl overflow-hidden
                        shadow-lg hover:shadow-2xl transition-shadow duration-300
                        border-2 border-[#F4C9DF]/40 hover:border-[#EE4E8B]/30 flex flex-col">

                <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-0"></div>

                <div class="relative h-52 overflow-hidden flex-shrink-0">
                    <img src="{{ asset('images/revormer pilates.png') }}" alt="Reformer Pilates" loading="lazy"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Badge -->
                    <div class="absolute top-3 left-3 bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white text-xs font-black px-3 py-1 rounded-full shadow-lg">
                        Popular
                    </div>
                    <div class="absolute bottom-3 right-3 bg-[#FCF9F2]/90 backdrop-blur-sm text-[#EE4E8B] text-xs font-bold px-2.5 py-1 rounded-full shadow">
                        45 min
                    </div>
                </div>

                <div class="relative z-10 p-6 flex-1 flex flex-col">

                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                                    bg-gradient-to-br from-[#F4C9DF] to-[#EE4E8B] text-[#7A2B4A]
                                    shadow-sm transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
                             style="will-change:transform; flex-shrink:0;">
                            <i class="ri-focus-3-line text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-[#EE4E8B] leading-tight
                                       group-hover:text-transparent group-hover:bg-clip-text
                                       group-hover:bg-gradient-to-r group-hover:from-[#EE4E8B] group-hover:to-[#7A2B4A]
                                       transition-all duration-300">
                                Reformer Pilates
                            </h3>
                            <span class="text-xs text-[#1C1C1C]/40 font-medium">All Levels</span>
                        </div>
                    </div>

                    <p class="text-sm text-[#1C1C1C]/70 leading-relaxed flex-1 mb-5">
                        Menggunakan alat reformer dengan pegas dan tali untuk resistensi tambahan — variasi Mat Pilates yang dibantu alat untuk hasil lebih optimal.
                    </p>

                    <div class="h-0.5 w-0 group-hover:w-full bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full transition-all duration-500 mb-4"></div>

                    <button onclick="openModal('reformer-pilates')"
                            class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-4 py-3 rounded-full
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

<!-- ══════════════════════════════════════ -->
<!-- MODAL — Enhanced Premium Design       -->
<!-- ══════════════════════════════════════ -->
<div id="class-modal"
     class="fixed inset-0 bg-[#1C1C1C]/60 backdrop-blur-sm hidden justify-center items-center z-50 px-4">
    <div class="bg-[#FCF9F2] w-full max-w-lg rounded-3xl shadow-2xl relative overflow-hidden">

        <!-- Modal gradient top bar -->
        <div class="h-1.5 w-full bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]"></div>

        <!-- Close Button -->
        <button onclick="closeModal()"
                class="absolute top-4 right-4 w-9 h-9 flex items-center justify-center rounded-full bg-[#FCF9F2] hover:bg-[#F4C9DF] hover:text-[#7A2B4A] text-[#1C1C1C]/55 text-lg font-bold transition-colors duration-200 z-10">
            &times;
        </button>

        <!-- Modal Content -->
        <div class="p-7">
            <h3 id="modal-title" class="text-2xl font-black text-[#EE4E8B] mb-1"></h3>
            <div id="modal-content" class="text-sm text-[#1C1C1C]/70 mt-3"></div>

            <!-- WA Button — hapus hover:scale-105 -->
            <div class="mt-6">
                <a id="modal-wa-btn"
                   href="#"
                   target="_blank"
                   class="w-full bg-gradient-to-r from-[#EE4E8B] to-[#7A2B4A] text-white px-6 py-3.5 rounded-full
                          hover:shadow-xl hover:brightness-110 transition-all font-bold
                          flex items-center justify-center gap-2 text-sm">
                    <i class="ri-whatsapp-line text-xl"></i>
                    Daftar via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

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
window.classSchedules = {
    @foreach($groupedSchedules as $keyword => $entries)
        '{{ $keyword }}': [
            @foreach($entries as $entry)
                {
                    hari: '{{ $entry->day }}',
                    jam: '{{ \Carbon\Carbon::parse($entry->class_time)->format('H:i') }}',
                    instruktur: '{{ $entry->instructor ?? '-' }}',
                    kelas: '{{ optional($entry->classModel)->class_name ?? '-' }}'
                }@if(!$loop->last),@endif
            @endforeach
        ]@if(!$loop->last),@endif
    @endforeach
};
</script>


        <!-- Notes -->
        <div class="mt-12 text-center">
          <p class="text-[#1C1C1C]/70 text-sm">
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
  class="fixed inset-0 hidden z-50 bg-[#1C1C1C] bg-opacity-60 items-center justify-center transition-opacity"
>
  <div 
    id="service-detail-box"
    class="bg-[#FCF9F2] rounded-lg shadow-xl max-w-md w-full p-8 relative transform transition-all scale-95 opacity-0"
  >
    <button 
      onclick="closeServiceDetail()" 
      class="absolute top-2 right-2 text-[#1C1C1C]/55 hover:text-[#EE4E8B] text-2xl"
      aria-label="Close Modal"
    >
      &times;
    </button>

    <h3 id="service-detail-title" class="text-xl font-bold text-[#EE4E8B] mb-4"></h3>

    <p id="service-detail-desc" class="text-[#1C1C1C]/80 leading-relaxed"></p>
  </div>
</div>

    <!-- Jadwal Kelas Simpel & Modern -->
<section id="schedule" class="max-w-4xl mx-auto p-6 bg-[#FCF9F2] rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">JADWAL KELAS</h2>

    <!-- Tambahan: tampilkan membership -->
    <div class="mb-4 text-center text-lg font-semibold text-[#1C1C1C]/80">
        Membership Anda: <span class="text-[#EE4E8B]">{{ $customer->membership }}</span>
    </div>

    @if ($schedules->count())
        <div class="overflow-x-auto">
            <table class="w-full text-left border border-[#F4C9DF] rounded-lg">
                <thead class="bg-[#FCF9F2]">
                    <tr>
                        <th class="p-3">KELAS</th>
                        <th class="p-3">HARI</th>
                        <th class="p-3">JAM</th>
                        <th class="p-3">INSTRUKTUR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customer->schedules as $schedule)
                        <tr class="border-t">
                            <td class="p-3">{{ $schedule->class_name }}</td>
                            <td class="p-3">{{ $schedule->day }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($schedule->class_time)->format('H:i') }}</td>
                            <td class="p-3">{{ $schedule->instructor }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-3">Anda belum terdaftar di kelas manapun.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-[#1C1C1C]/55">Belum ada jadwal tersedia.</p>
    @endif
</section>

{{-- ========================================= --}}
{{-- GALLERY SECTION - Selaras dengan Classes --}}
{{-- ========================================= --}}

<section id="Facility" class="relative py-20 md:py-28 lg:py-32 overflow-hidden">

    {{-- Multi-Layer Background --}}
    <div class="absolute inset-0 bg-gradient-to-b from-[#FCF9F2] via-[#F4C9DF]/30 to-[#FCF9F2]"></div>

    {{-- Subtle Grid Pattern --}}
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
         style="background-image:
            repeating-linear-gradient(0deg, transparent, transparent 50px, #EE4E8B 50px, #EE4E8B 51px),
            repeating-linear-gradient(90deg, transparent, transparent 50px, #7A2B4A 50px, #7A2B4A 51px);
            background-size: 100px 100px;">
    </div>

    {{-- Floating Gradient Orbs --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-gradient-to-bl from-[#7A2B4A]/15 to-[#EE4E8B]/15 rounded-full blur-3xl animate-pulse" style="animation-duration:7s;"></div>
        <div class="absolute top-1/2 -left-40 w-[500px] h-[500px] bg-gradient-to-tr from-[#EE4E8B]/10 to-[#EE4E8B]/10 rounded-full blur-3xl animate-pulse" style="animation-duration:9s; animation-delay:2s;"></div>
        <div class="absolute -bottom-20 right-1/3 w-80 h-80 bg-gradient-to-tl from-[#F4C9DF]/15 to-[#7A2B4A]/15 rounded-full blur-3xl animate-pulse" style="animation-duration:8s; animation-delay:1s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- ── Section Header ── --}}
        <div class="text-center mb-16 md:mb-20">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-[#EE4E8B]/10 via-[#7A2B4A]/10 to-[#EE4E8B]/10 rounded-full border border-[#EE4E8B]/20 shadow-lg backdrop-blur-sm">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#7A2B4A] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#7A2B4A]"></span>
                </span>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]">
                    Our Facilities
                </span>
            </div>

            {{-- Title --}}
            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A]" style="background-size:200% auto; animation: gradientShift 4s ease infinite;">
                    Our Gallery
                </span>
            </h2>

            {{-- Decorative Divider --}}
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#EE4E8B] rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#7A2B4A] rounded-full animate-pulse" style="animation-delay:0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-[#7A2B4A] rounded-full"></div>
            </div>

            <p class="text-lg md:text-xl text-[#1C1C1C]/70 max-w-2xl mx-auto leading-relaxed">
                Jelajahi fasilitas kelas dunia kami yang dirancang untuk menginspirasi, menantang, dan mengubah Anda.
            </p>
        </div>

        {{-- ── Slider ── --}}
        <div class="relative max-w-5xl mx-auto">

            {{-- Slider Card --}}
            <div id="facility-slider"
                 class="relative overflow-hidden rounded-3xl shadow-2xl border-2 border-[#F4C9DF]/40"
                 style="aspect-ratio:16/9; background:#1C1C1C;">

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
                             alt="{{ $img['label'] }}" loading="lazy"
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
                               background:linear-gradient(135deg,#7A2B4A,#EE4E8B);
                               box-shadow:0 4px 20px rgba(238, 78, 139,0.5);
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
                               background:linear-gradient(135deg,#EE4E8B,#7A2B4A);
                               box-shadow:0 4px 20px rgba(238, 78, 139,0.5);
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
                          style="background:linear-gradient(to right,#EE4E8B,#7A2B4A);
                                 box-shadow:0 2px 12px rgba(238, 78, 139,0.5);
                                 letter-spacing:0.1em;">
                        01 / 10
                    </span>
                </div>

                {{-- Live Badge --}}
                <div class="absolute top-4 right-4 z-20">
                    <div class="flex items-center gap-1.5 rounded-full px-3 py-1"
                         style="background:rgba(255,255,255,0.15); backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.25);">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75" style="background:#EE4E8B;"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2" style="background:#EE4E8B;"></span>
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
                         alt="{{ $img['label'] }}" loading="lazy"
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

    <div class="absolute inset-0 bg-gradient-to-b from-[#FCF9F2] via-[#F4C9DF]/20 to-white"></div>

    <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
         style="background-image:
            repeating-linear-gradient(0deg, transparent, transparent 50px, #EE4E8B 50px, #EE4E8B 51px),
            repeating-linear-gradient(90deg, transparent, transparent 50px, #7A2B4A 50px, #7A2B4A 51px);
            background-size: 100px 100px;">
    </div>

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-br from-[#7A2B4A]/10 to-[#F4C9DF]/10 rounded-full blur-3xl animate-pulse" style="animation-duration:8s;"></div>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-gradient-to-tl from-[#EE4E8B]/10 to-[#EE4E8B]/10 rounded-full blur-3xl animate-pulse" style="animation-duration:6s; animation-delay:1.5s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Header --}}
        <div class="text-center mb-14">

            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-6 bg-gradient-to-r from-[#EE4E8B]/10 via-[#7A2B4A]/10 to-[#EE4E8B]/10 rounded-full border border-[#EE4E8B]/20 shadow-lg backdrop-blur-sm">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#7A2B4A] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#7A2B4A]"></span>
                </span>
                <span class="text-sm md:text-base font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B]">
                    Trusted By
                </span>
            </div>

            <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#7A2B4A] via-[#EE4E8B] to-[#7A2B4A]" style="background-size:200% auto; animation: gradientShift 4s ease infinite;">
                    Our Partners
                </span>
            </h2>

            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-16 h-0.5 bg-gradient-to-r from-transparent to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#EE4E8B] rounded-full animate-pulse"></div>
                <div class="w-24 h-1 bg-gradient-to-r from-[#EE4E8B] via-[#7A2B4A] to-[#EE4E8B] rounded-full"></div>
                <div class="w-3 h-3 bg-[#7A2B4A] rounded-full animate-pulse" style="animation-delay:0.5s;"></div>
                <div class="w-16 h-0.5 bg-gradient-to-l from-transparent to-[#7A2B4A] rounded-full"></div>
            </div>

            <p class="text-lg md:text-xl text-[#1C1C1C]/70 max-w-2xl mx-auto leading-relaxed">
                Didukung oleh merek-merek terkemuka di industri yang berkomitmen pada kesehatan, kesejahteraan, dan keunggulan.
            </p>
        </div>

        {{-- Scrolling Partner Strip --}}
        <div class="relative overflow-hidden py-3">

            {{-- Fade edges --}}
            <div class="absolute left-0 top-0 bottom-0 w-28 z-10 pointer-events-none"
                 style="background:linear-gradient(to right,#FCF9F2,transparent);"></div>
            <div class="absolute right-0 top-0 bottom-0 w-28 z-10 pointer-events-none"
                 style="background:linear-gradient(to left,#FCF9F2,transparent);"></div>

            {{-- Track --}}
            <div class="flex items-center partner-scroll-track" style="animation: partnerScroll 24s linear infinite;">

                @php 
                    $partners = [
                        'partner 1..png',
                        'partner 2..png',
                        'partner 3..png',
                        'partner 4..png',
                        'partner 5..png',
                        'partner 6..png'
                    ]; 
                @endphp

                @foreach(array_merge($partners, $partners) as $p)
                {{-- Card identik dengan card Classes --}}
                <div class="group relative flex-shrink-0 mx-4 px-7 py-5 rounded-3xl
                            bg-[#FCF9F2] border-2 border-[#F4C9DF]/40
                            shadow-lg transition-shadow duration-300 hover:shadow-2xl hover:border-[#7A2B4A]/30"
                     style="cursor:default; min-height:100px; display:flex; align-items:center; justify-content:center;">
                    {{-- Hover tint sama dengan Classes --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-[#F4C9DF]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-3xl pointer-events-none"></div>
                    {{-- Logo BERWARNA (tidak grayscale) --}}
                    <img src="{{ asset('icons/' . $p) }}"
                         alt="Partner Logo" loading="lazy"
                         class="relative z-10 h-16 w-auto object-contain transition-transform duration-300 group-hover:scale-110"
                         style="min-width:80px; max-width:130px;" />
                    {{-- Bottom accent line identik Classes --}}
                    <div class="h-0.5 w-0 group-hover:w-full rounded-full transition-all duration-500 mt-3"
                         style="background:linear-gradient(to right,#EE4E8B,#7A2B4A,#EE4E8B);"></div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-[#FCF9F2]">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-[#EE4E8B] mb-4">
            Get in Touch
          </h2>
          <p class="text-[#1C1C1C]/70 max-w-2xl mx-auto">
            Have questions or want to learn more? We're here to help you on your
            fitness journey.
          </p>
          <div class="w-24 h-1 bg-[#7A2B4A] mx-auto mt-4"></div>
        </div>
        <div class="flex flex-col md:flex-row gap-10">
          <div class="md:w-1/2">
            <div class="bg-[#FCF9F2] p-8 rounded-lg shadow-md h-full">
              <h3 class="text-2xl font-semibold text-[#EE4E8B] mb-6">
                Contact Information
              </h3>
              <div class="space-y-6">
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#EE4E8B] bg-opacity-10 text-[#EE4E8B] flex-shrink-0"
                  >
                    <i class="ri-map-pin-line ri-lg"></i>
                  </div>
                  <div>
                    <h4 class="font-medium text-[#1C1C1C]">Address</h4>
                    <p class="text-[#1C1C1C]/70">
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
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#EE4E8B] bg-opacity-10 text-[#EE4E8B] flex-shrink-0"
                  >
                    <i class="ri-time-line ri-lg"></i>
                  </div>
                  <div>
                    <h4 class="font-medium text-[#1C1C1C]">Opening Hours</h4>
                    <p class="text-[#1C1C1C]/70">
                      Monday - Saturday: 08:00 AM - 20:00 PM <br />Sunday: 08:00 AM -15:00 AM
                    </p>
                  </div>
                </div>
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#EE4E8B] bg-opacity-10 text-[#EE4E8B] flex-shrink-0"
                  >
                    <i class="ri-phone-line ri-lg"></i>
                  </div>
                  <div>
                    <h4 class="font-medium text-[#1C1C1C]">Phone & WhatsApp</h4>
                    <p class="text-[#1C1C1C]/70">+62 877-8576-7395</p>
                    <a
                     href="https://wa.me/6287785767395"
                      class="inline-flex items-center text-[#7A2B4A] mt-2 hover:underline"
                    >
                      <i class="ri-whatsapp-line mr-2"></i> Message us on
                      WhatsApp
                    </a>
                  </div>
                </div>
                <div class="flex items-start space-x-4">
                  <div
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#EE4E8B] bg-opacity-10 text-[#EE4E8B] flex-shrink-0"
                  >
                    <i class="ri-mail-line ri-lg"></i>
                  </div>
                  <div>
                    <h4 class="font-medium text-[#1C1C1C]">Email</h4>
                    <p class="text-[#1C1C1C]/70">ftmsociety@gmail.com</p>
                  </div>
                </div>
              </div>
              <div class="mt-8">
                <h4 class="font-medium text-[#1C1C1C] mb-4">Follow Us</h4>
                <div class="flex space-x-4">
                  <a
                    href="https://www.instagram.com/ftmsociety.id"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#EE4E8B] text-white 
                    hover:bg-[#7A2B4A] hover:scale-105 hover:shadow-lg 
                    transition-all text-sm font-semibold"
                  >
                    <i class="ri-instagram-line"></i>
                  </a>
                  <a
                    href="https://www.facebook.com/share/129JRu5DDXa/"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#EE4E8B] text-white 
                    hover:bg-[#7A2B4A] hover:scale-105 hover:shadow-lg 
                    transition-all text-sm font-semibold"
                  >
                    <i class="ri-facebook-fill"></i>
                  </a>
                <a
                    href="https://www.tiktok.com/@ftm.society"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-[#EE4E8B] text-white 
                    hover:bg-[#7A2B4A] hover:scale-105 hover:shadow-lg 
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
            <div class="bg-[#FCF9F2] p-8 rounded-lg shadow-md">
              <h3 class="text-2xl font-semibold text-[#EE4E8B] mb-6">
                Send Us a Message
              </h3>
              <form class="space-y-6" method="POST" action="{{ route('feedback.store') }}">
                @csrf
                <div>
                  <label for="contact-name" class="block text-[#1C1C1C]/80 mb-2">Your Name</label>
                  <input
                    type="text"
                    id="contact-name"
                    name="name"
                    class="w-full px-4 py-3 rounded border border-[#F4C9DF] focus:border-[#7A2B4A]"
                    placeholder="Your name"
                    required
                  />
                </div>
                <div>
                  <label for="contact-email" class="block text-[#1C1C1C]/80 mb-2">Email Address</label>
                  <input
                    type="email"
                    id="contact-email"
                    name="email"
                    class="w-full px-4 py-3 rounded border border-[#F4C9DF] focus:border-[#7A2B4A]"
                    placeholder="your.email@example.com"
                    required
                  />
                </div>
                <div>
                  <label for="subject" class="block text-[#1C1C1C]/80 mb-2">Subject</label>
                  <select
                    id="subject"
                    name="subject"
                    class="w-full px-4 py-3 rounded border border-[#F4C9DF] focus:border-[#7A2B4A] pr-8 appearance-none bg-[#FCF9F2]"
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
                  <label for="message" class="block text-[#1C1C1C]/80 mb-2">Your Message</label>
                  <textarea
                    id="message"
                    name="message"
                    rows="5"
                    class="w-full px-4 py-3 rounded border border-[#F4C9DF] focus:border-[#7A2B4A]"
                    placeholder="How can we help you?"
                    required
                  ></textarea>
                </div>
                <button
                  type="submit"
                class="w-full py-3 text-white bg-[#EE4E8B] rounded-button 
                hover:bg-[#7A2B4A] hover:scale-105 hover:shadow-lg 
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
<section id="maps" class="py-12 bg-[#FCF9F2]">
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
<footer class="bg-[#EE4E8B] text-white pt-16 pb-8">
  <div class="container mx-auto px-4">
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
          <li><a href="#home" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Beranda</a></li>
          <li><a href="#about" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Tentang Kami</a></li>
          <li><a href="#classes" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Kelas</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Program</a></li>
          <li><a href="#schedule" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Jadwal</a></li>
          <li><a href="#Facility" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Fasilitas</a></li>
          <li><a href="#contact" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Hubungi Kami</a></li>
        </ul>
      </div>

      <!-- Column 3: Program Unggulan -->
      <div>
        <h4 class="text-lg font-semibold mb-6">Program Unggulan</h4>
        <ul class="space-y-3">
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Private Group Class</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Private Training</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Single Visit Class</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Reformer Pilates</a></li>
          <li><a href="#Programs" class="text-white text-opacity-80 hover:text-[#7A2B4A] transition-colors">Exclusive Class Program</a></li>
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
              class="px-4 py-2 rounded-l text-[#1C1C1C] w-full border-none"
            />
            <button
              type="submit"
              class="bg-[#7A2B4A] text-white px-4 py-2 rounded-r hover:bg-opacity-90 transition-all whitespace-nowrap"
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
          <a href="#" class="text-white text-opacity-60 text-sm hover:text-[#7A2B4A] transition-colors">Kebijakan Privasi</a>
          <a href="#" class="text-white text-opacity-60 text-sm hover:text-[#7A2B4A] transition-colors">Syarat & Ketentuan</a>
          <a href="#" class="text-white text-opacity-60 text-sm hover:text-[#7A2B4A] transition-colors">Kontak Bantuan</a>
        </div>
      </div>
    </div>
  </div>
</footer>

    <!-- Blade Data Injection -->
    <script>
      // Auth status for JS logic
      window.isCustomerAuthenticated = @json(auth('customer')->check());
      window.homeRoute = '{{ route('home') }}';
    </script>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const scrollIndicator = document.getElementById('scroll-indicator');
        if (!scrollIndicator) return;

        const updateScrollIndicator = function () {
          const shouldHide = window.scrollY > 24;
          scrollIndicator.style.opacity = shouldHide ? '0' : '1';
          scrollIndicator.style.visibility = shouldHide ? 'hidden' : 'visible';
          scrollIndicator.style.pointerEvents = shouldHide ? 'none' : 'auto';
        };

        updateScrollIndicator();
        window.addEventListener('scroll', updateScrollIndicator, { passive: true });
      });
    </script>

    <!-- Compiled JavaScript via Vite -->
    @vite(['resources/js/member.js'])
  </body>
</html>






