<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Dashboard - FTM Society</title>

    @vite('resources/css/app.css')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Sidebar Responsive Styles */
        .sidebar {
            transition: transform 0.3s ease-in-out;
        }
        
        /* Mobile: Hide sidebar by default */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                z-index: 50;
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
            
            .main-content {
                margin-left: 0 !important;
            }
            
            .hamburger-btn {
                display: flex !important;
            }
        }
        
        /* Desktop: Show sidebar always */
        @media (min-width: 769px) {
            .sidebar {
                position: relative;
            }
            
            .sidebar-overlay {
                display: none !important;
            }
            
            .hamburger-btn {
                display: none !important;
            }
        }

        /* Modal scale-in animation (used by logout & QR modal) */
        @keyframes scale-in {
            0% { opacity: 0; transform: scale(0.9) translateY(10px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }
        .animate-scale-in {
            animation: scale-in 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>

<body class="h-screen overflow-hidden" style="background: linear-gradient(180deg, #F5EFE6 0%, #F5EFE6 60%, #E8C4D8 100%);">

<!-- Sidebar Overlay (Mobile Only) -->
<div id="sidebar-overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

<div class="flex h-screen">

    <!-- ========================================
         SIDEBAR
    ======================================== -->
    <aside id="sidebar" class="sidebar w-64 flex flex-col shrink-0 text-[#F5EFE6]" style="background: linear-gradient(180deg, #6B2D4E 0%, #1C1C1E 100%);">
        <a href="{{ route('member.profile') }}" class="px-6 py-5 text-xl font-extrabold tracking-wide border-b border-[#E8C4D8]/25 hover:bg-[#E8618C]/20 transition inline-block w-full" style="color: #F5EFE6;">
            <span style="color: #E8618C;">FTM</span> SOCIETY
        </a>

        <nav class="flex-1 px-4 py-6 space-y-1 text-sm">
            <!-- Dashboard - ACTIVE -->
            <a href="{{ route('member.dashboard') }}" 
               class="block px-4 py-2 rounded font-semibold text-white shadow-lg" style="background: linear-gradient(90deg, #E8618C 0%, #6B2D4E 100%); box-shadow: 0 4px 14px rgba(232,97,140,0.45);">
                <i class="fas fa-home mr-2"></i>Dashboard
            </a>

            <!-- My Packages - LINK KE /member/packages -->
            <a href="{{ route('member.packages.index') }}" 
               class="block px-4 py-2 rounded hover:bg-[#E8618C]/15 hover:text-[#E8C4D8] transition">
                <i class="fas fa-box mr-2 text-[#E8C4D8]"></i>My Packages
            </a>

            <!-- Book Class -->
            <a href="{{ route('member.book') }}"
               class="block px-4 py-2 rounded hover:bg-[#E8618C]/15 hover:text-[#E8C4D8] transition">
                <i class="fas fa-calendar-plus mr-2 text-[#E8C4D8]"></i>Book Class
            </a>

            <!-- My Classes -->
            <a href="{{ route('member.my-classes') }}"
               class="block px-4 py-2 rounded hover:bg-[#E8618C]/15 hover:text-[#E8C4D8] transition">
                <i class="fas fa-dumbbell mr-2 text-[#E8C4D8]"></i>My Classes
            </a>

            <!-- Transactions -->
            <a href="{{ route('member.transactions') }}" 
               class="block px-4 py-2 rounded hover:bg-[#E8618C]/15 hover:text-[#E8C4D8] transition">
                <i class="fas fa-receipt mr-2 text-[#E8C4D8]"></i>Transactions
            </a>

            <!-- Attendance -->
            <a href="{{ route('member.attendance') }}" 
               class="block px-4 py-2 rounded hover:bg-[#E8618C]/15 hover:text-[#E8C4D8] transition">
                <i class="fas fa-calendar-check mr-2 text-[#E8C4D8]"></i>Attendance
            </a>

            <!-- Profile -->
            <a href="{{ route('member.account') }}" 
               class="block px-4 py-2 rounded hover:bg-[#E8618C]/15 hover:text-[#E8C4D8] transition">
                <i class="fas fa-user mr-2 text-[#E8C4D8]"></i>Profile
            </a>
        </nav>

        <!-- Logout Button (Sidebar Footer) -->
        <div class="px-4 pt-4 pb-3 border-t border-[#E8C4D8]/20">
            <button type="button" onclick="showLogoutModal()"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg font-semibold text-sm text-white transition hover:shadow-lg hover:-translate-y-0.5"
                    style="background: linear-gradient(135deg, #E8618C 0%, #6B2D4E 100%); box-shadow: 0 4px 14px rgba(232,97,140,0.35);">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </div>

        <div class="px-6 py-4 border-t border-[#E8C4D8]/20 text-xs" style="color: rgba(245,239,230,0.55);">
            © {{ date('Y') }} FTM Society
        </div>
    </aside>

    <!-- ========================================
         MAIN CONTENT
    ======================================== -->
    <main class="main-content flex-1 p-4 md:p-8 overflow-y-auto">

        <!-- Mobile Hamburger Button -->
        <button id="hamburger-btn" class="hamburger-btn hidden fixed top-4 left-4 z-30 w-10 h-10 text-white rounded-lg items-center justify-center shadow-lg transition" style="background: linear-gradient(135deg, #E8618C 0%, #6B2D4E 100%); box-shadow: 0 6px 18px rgba(107,45,78,0.45);" onclick="toggleSidebar()">
            <i class="fas fa-bars text-lg"></i>
        </button>

        <!-- HEADER -->
        <div class="mb-6 md:mb-8 mt-12 md:mt-0">
            <h1 class="text-xl md:text-2xl font-extrabold" style="color: #1C1C1E; letter-spacing: -0.01em;">
                Member <span style="color: #E8618C;">Dashboard</span>
            </h1>
            <p class="text-xs md:text-sm mt-1" style="color: rgba(28,28,30,0.65);">
                Welcome back, <span style="color: #6B2D4E; font-weight: 600;">{{ $customer->name }}</span>
            </p>
        </div>

        <!-- STATS CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-10">
            <!-- Classes Remaining Card (untuk booking) -->
            <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm hover:shadow-lg transition-shadow relative overflow-hidden" style="border-top: 4px solid #E8618C; box-shadow: 0 4px 14px rgba(232,97,140,0.08);">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs md:text-sm font-semibold uppercase tracking-wider" style="color: #6B2D4E;">Credit</p>
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background: rgba(232,97,140,0.12);">
                        <i class="fas fa-calendar-check text-lg md:text-xl" style="color: #E8618C;"></i>
                    </div>
                </div>
                
                <!-- ✅ Display total remaining classes from ALL active orders -->
                <p class="text-xl md:text-2xl font-extrabold" style="color: #1C1C1E;">
                    {{ $remainingClasses }}
                </p>
                
                <p class="text-[10px] md:text-xs mt-1" style="color: rgba(28,28,30,0.55);">For booking</p>
            </div>

            <!-- Remaining Quota Card (untuk check-in) -->
            <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm hover:shadow-lg transition-shadow relative overflow-hidden" style="border-top: 4px solid #1A7A6E; box-shadow: 0 4px 14px rgba(26,122,110,0.08);">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs md:text-sm font-semibold uppercase tracking-wider" style="color: #1A5C4A;">Remaining Quota</p>
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background: rgba(200,217,160,0.45);">
                        <i class="fas fa-ticket-alt text-lg md:text-xl" style="color: #1A7A6E;"></i>
                    </div>
                </div>
                
                <!-- ✅ Display total remaining quota from ALL active orders -->
                <p class="text-xl md:text-2xl font-extrabold" style="color: #1C1C1E;">
                    {{ $remainingQuota }}
                </p>
                
                <p class="text-[10px] md:text-xs mt-1" style="color: rgba(28,28,30,0.55);">For check-in/out</p>
            </div>

            <!-- Status Card -->
            <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm hover:shadow-lg transition-shadow relative overflow-hidden" style="border-top: 4px solid #6B2D4E; box-shadow: 0 4px 14px rgba(107,45,78,0.08);">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs md:text-sm font-semibold uppercase tracking-wider" style="color: #6B2D4E;">Status</p>
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background: rgba(26,122,110,0.15);">
                        <i class="fas fa-check-circle text-lg md:text-xl" style="color: #1A7A6E;"></i>
                    </div>
                </div>
                <p class="text-xl md:text-2xl font-extrabold flex items-center gap-2" style="color: #1A7A6E;">
                    <span class="inline-block w-2 h-2 rounded-full animate-pulse" style="background: #1A7A6E;"></span>
                    Active
                </p>
            </div>
        </div>

        <!-- QR CARD + QUICK ACTIONS -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-10">

            <!-- MEMBER QR CARD -->
            <div class="rounded-xl shadow-xl p-4 md:p-6 text-center text-white relative overflow-hidden" style="min-height: 350px; background: linear-gradient(140deg, #6B2D4E 0%, #E8618C 55%, #6B2D4E 100%); box-shadow: 0 20px 45px rgba(107,45,78,0.35);">
                <!-- Card Background Pattern -->
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute -top-10 -right-10 w-48 h-48 rounded-full" style="background: radial-gradient(circle, #E8C4D8 0%, transparent 70%);"></div>
                    <div class="absolute -bottom-14 -left-14 w-40 h-40 rounded-full" style="background: radial-gradient(circle, #C8D9A0 0%, transparent 70%);"></div>
                </div>

                <!-- Content -->
                <div class="relative z-10 flex flex-col h-full">
                    <!-- Header -->
                    <div class="mb-4">
                        <div class="text-xs font-extrabold tracking-[0.4em] mb-1" style="color: #E8C4D8;">FTM SOCIETY</div>
                        <div class="text-2xl font-extrabold" style="color: #F5EFE6; letter-spacing: 0.05em;">MEMBER CARD</div>
                    </div>

                    <!-- Member Info -->
                    <div class="flex-1 flex flex-col justify-center mb-4 md:mb-6">
                        <div class="text-center">
                            <div class="w-16 h-16 md:w-20 md:h-20 mx-auto rounded-full flex items-center justify-center text-2xl md:text-3xl font-extrabold shadow-lg mb-2 md:mb-3" style="background: linear-gradient(135deg, #F5EFE6 0%, #E8C4D8 100%); color: #6B2D4E; border: 3px solid rgba(245,239,230,0.3);">
                                {{ substr($customer->name, 0, 1) }}
                            </div>
                            <h3 class="text-lg md:text-xl font-bold" style="color: #F5EFE6;">{{ $customer->name }}</h3>
                            <p class="text-xs md:text-sm mt-1" style="color: rgba(245,239,230,0.85);">Member ID: <span class="font-mono font-bold" style="color: #E8C4D8;">{{ str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}</span></p>
                        </div>
                    </div>

                    <!-- QR Code Section -->
                    <div class="mb-3 md:mb-4 rounded-lg p-2 md:p-3 flex justify-center" style="height: 120px; min-height: 120px; background: #F5EFE6; border: 2px solid rgba(245,239,230,0.3);">
                        @if($customer->qr_token && $customer->qr_active)
                            <div class="flex items-center justify-center w-full cursor-pointer" onclick="openQRPreview()" title="Click to enlarge QR Code">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=110x110&data={{ urlencode($customer->getQRData()) }}&bgcolor=f5efe6&color=1c1c1e" alt="QR Code" style="max-width: 110px; max-height: 110px;" class="hover:scale-105 transition-transform duration-200">
                            </div>
                        @else
                            <div class="flex items-center justify-center w-full" style="color: rgba(28,28,30,0.35);">
                                <div class="text-center">
                                    <i class="fas fa-qrcode text-3xl md:text-4xl mb-2" style="color: #6B2D4E;"></i>
                                    <p class="text-xs">No QR Code</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- Tap hint -->
                    @if($customer->qr_token && $customer->qr_active)
                    <p class="text-[9px] md:text-[10px] -mt-2 mb-2" style="color: rgba(245,239,230,0.7);"><i class="fas fa-expand-alt mr-1"></i>Tap QR to enlarge</p>
                    @endif

                    <!-- Status -->
                    <div class="text-xs text-center border-t pt-2 md:pt-3" style="color: rgba(245,239,230,0.75); border-color: rgba(245,239,230,0.2);">
                        @if($customer->qr_active)
                            <span class="inline-block px-2 md:px-3 py-1 rounded-full text-[10px] md:text-xs font-bold" style="background: #C8D9A0; color: #1A5C4A;">✓ QR ACTIVE</span>
                        @else
                            <span class="inline-block px-2 md:px-3 py-1 rounded-full text-[10px] md:text-xs font-bold" style="background: rgba(232,196,216,0.3); color: #E8C4D8;">✗ QR INACTIVE</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- ACTION BUTTONS + ATTENDANCE -->
            <div class="lg:col-span-2 space-y-4 md:space-y-6">
                <!-- Quick Action Buttons -->
                <div class="bg-white rounded-xl shadow-sm p-4 md:p-6" style="border-top: 4px solid #E8618C; box-shadow: 0 4px 14px rgba(107,45,78,0.06);">
                    <h3 class="font-extrabold text-base md:text-lg mb-3 md:mb-4 flex items-center gap-2" style="color: #6B2D4E;">
                        <span class="inline-block w-1 h-5 rounded-full" style="background: #E8618C;"></span>
                        Quick Actions
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-2 gap-2 md:gap-3">
                        <a href="{{ route('member.account') }}" class="text-white py-2.5 md:py-3 rounded-lg transition text-sm md:text-base font-semibold shadow-md hover:shadow-lg flex items-center justify-center gap-2 hover:-translate-y-0.5" style="background: linear-gradient(135deg, #E8618C 0%, #6B2D4E 100%); box-shadow: 0 6px 16px rgba(232,97,140,0.3);">
                            <i class="fas fa-qrcode text-sm md:text-base"></i>
                            <span class="hidden sm:inline">My QR Card</span>
                            <span class="sm:hidden">QR Card</span>
                        </a>
                        <a href="{{ route('member.attendance') }}" class="text-white py-2.5 md:py-3 rounded-lg transition text-sm md:text-base font-semibold shadow-md hover:shadow-lg flex items-center justify-center gap-2 hover:-translate-y-0.5" style="background: linear-gradient(135deg, #1A7A6E 0%, #1A5C4A 100%); box-shadow: 0 6px 16px rgba(26,122,110,0.3);">
                            <i class="fas fa-history text-sm md:text-base"></i>
                            <span>History</span>
                        </a>
                        <a href="{{ route('member.book') }}" class="py-2.5 md:py-3 rounded-lg transition text-sm md:text-base font-semibold shadow-md hover:shadow-lg flex items-center justify-center gap-2 hover:-translate-y-0.5" style="background: #C8D9A0; color: #1A5C4A; box-shadow: 0 6px 16px rgba(200,217,160,0.4); border: 1px solid rgba(26,92,74,0.15);">
                            <i class="fas fa-calendar-plus text-sm md:text-base"></i>
                            <span class="hidden sm:inline">Book Now</span>
                            <span class="sm:hidden">Book</span>
                        </a>
                    </div>
                </div>

                <!-- QR Info Guide -->
                <div class="rounded-r-xl p-4 relative overflow-hidden" style="background: linear-gradient(90deg, #E8C4D8 0%, rgba(232,196,216,0.4) 100%); border-left: 6px solid #E8618C;">
                    <h4 class="font-extrabold mb-2 flex items-center gap-2" style="color: #6B2D4E;">
                        <i class="fas fa-info-circle" style="color: #E8618C;"></i>
                        How to Use Your QR Card
                    </h4>
                    <ol class="text-sm space-y-1 list-decimal list-inside" style="color: #1C1C1E;">
                        <li>Show this QR code to the staff/trainer</li>
                        <li>Staff scans your QR code at the scanner</li>
                        <li>Your attendance is recorded automatically</li>
                        <li>Your quota visit is deducted by 1</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- ATTENDANCE HISTORY -->
        <div class="bg-white rounded-xl shadow-sm p-4 md:p-6" style="border-top: 4px solid #1A7A6E; box-shadow: 0 4px 14px rgba(26,122,110,0.06);">
            <h3 class="font-extrabold text-base md:text-lg mb-3 md:mb-4 flex items-center gap-2" style="color: #1A5C4A;">
                <span class="inline-block w-1 h-5 rounded-full" style="background: #1A7A6E;"></span>
                <i class="fas fa-history text-sm md:text-base" style="color: #1A7A6E;"></i>
                Recent Attendance
            </h3>

            <div class="divide-y" style="--tw-divide-opacity: 1; divide-color: rgba(232,196,216,0.5);">
                @forelse($attendances->take(5) as $a)
                    <div class="py-3 md:py-4 flex justify-between items-center px-2 rounded transition hover:shadow-sm" style="--hover-bg: #F5EFE6;" onmouseover="this.style.background='#F5EFE6'" onmouseout="this.style.background='transparent'">
                        <div class="flex items-center gap-2 md:gap-3 flex-1 min-w-0">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center flex-shrink-0 shadow-sm" style="background: linear-gradient(135deg, #C8D9A0 0%, #1A7A6E 100%);">
                                <i class="fas fa-check text-xs md:text-sm" style="color: #F5EFE6;"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="font-bold text-sm md:text-base truncate" style="color: #1C1C1E;">{{ $a->program ?? 'General' }}</p>
                                <p class="text-xs" style="color: #1A7A6E;">
                                    <i class="fas fa-circle text-[6px] mr-1"></i>{{ $a->check_in_type ?? 'system' }}
                                </p>
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0 ml-2">
                            <p class="font-bold text-xs md:text-sm whitespace-nowrap" style="color: #6B2D4E;">{{ $a->getFormattedDuration() ?? '-' }}</p>
                            <p class="text-xs md:text-sm whitespace-nowrap" style="color: rgba(28,28,30,0.55);">
                                {{ $a->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 md:py-12">
                        <div class="w-16 h-16 md:w-20 md:h-20 mx-auto rounded-full flex items-center justify-center mb-3 md:mb-4" style="background: linear-gradient(135deg, #E8C4D8 0%, #F5EFE6 100%); box-shadow: 0 8px 20px rgba(107,45,78,0.12);">
                            <i class="fas fa-clipboard-list text-3xl md:text-4xl" style="color: #6B2D4E;"></i>
                        </div>
                        <p class="font-semibold text-sm md:text-base" style="color: #1C1C1E;">
                            No attendance yet.
                        </p>
                        <p class="text-xs md:text-sm mt-1" style="color: rgba(28,28,30,0.55);">
                            Scan your QR code to record attendance
                        </p>
                        <a href="{{ route('member.qr.scanner') }}" class="inline-block mt-3 md:mt-4 text-white px-4 md:px-6 py-2 rounded-lg transition font-semibold text-sm md:text-base shadow-md hover:shadow-lg hover:-translate-y-0.5" style="background: linear-gradient(135deg, #1A7A6E 0%, #1A5C4A 100%); box-shadow: 0 6px 16px rgba(26,122,110,0.3);">
                            Start Scanning
                        </a>
                    </div>
                @endforelse
            </div>

            @if($attendances->count() > 5)
                <div class="text-center mt-3 md:mt-4 pt-3 md:pt-4 border-t" style="border-color: rgba(232,196,216,0.5);">
                    <a href="{{ route('member.attendance') }}" class="font-bold text-xs md:text-sm inline-flex items-center gap-1 transition" style="color: #E8618C;" onmouseover="this.style.color='#6B2D4E'" onmouseout="this.style.color='#E8618C'">
                        View All Attendance Records
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            @endif
        </div>

    </main>
</div>

<!-- ═══════════════════════════════════════════
     QR CODE PREVIEW MODAL
═══════════════════════════════════════════ -->
@if($customer->qr_token && $customer->qr_active)
<div id="qr-preview-modal" class="fixed inset-0 z-50 hidden items-center justify-center" style="background: rgba(28,28,30,0.85); backdrop-filter: blur(14px);">
    <!-- Close area (clicking background closes) -->
    <div class="absolute inset-0" onclick="closeQRPreview()"></div>

    <!-- Modal Content -->
    <div class="relative z-10 w-full max-w-md mx-4 animate-scale-in">
        <!-- Close Button -->
        <button onclick="closeQRPreview()" 
                class="absolute -top-3 -right-3 w-10 h-10 backdrop-blur-sm rounded-full flex items-center justify-center text-white text-lg transition-all duration-200 z-20"
                style="background: #6B2D4E; border: 2px solid #E8C4D8; box-shadow: 0 6px 18px rgba(107,45,78,0.5);">
            <i class="fas fa-times"></i>
        </button>

        <!-- Card -->
        <div class="rounded-3xl p-8 shadow-2xl relative overflow-hidden" style="background: linear-gradient(160deg, #6B2D4E 0%, #E8618C 55%, #E8C4D8 100%);">
            <!-- Decorative circles -->
            <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full" style="background: radial-gradient(circle, rgba(200,217,160,0.5) 0%, transparent 70%);"></div>
            <div class="absolute -bottom-12 -left-12 w-36 h-36 rounded-full" style="background: radial-gradient(circle, rgba(26,122,110,0.35) 0%, transparent 70%);"></div>

            <!-- Header -->
            <div class="text-center mb-6 relative z-10">
                <p class="text-[10px] font-extrabold tracking-[0.3em] uppercase mb-1" style="color: #E8C4D8;">FTM Society</p>
                <h2 class="text-xl font-extrabold tracking-wide" style="color: #F5EFE6;">MEMBER CARD</h2>
            </div>

            <!-- QR Code -->
            <div class="flex justify-center mb-6 relative z-10">
                <div class="rounded-2xl p-5 shadow-lg" style="background: #F5EFE6; box-shadow: 0 20px 40px rgba(28,28,30,0.3); border: 3px solid #E8C4D8;">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=280x280&data={{ urlencode($customer->getQRData()) }}&bgcolor=f5efe6&color=6b2d4e" 
                         alt="QR Code" 
                         class="block"
                         style="width: 240px; height: 240px;">
                </div>
            </div>

            <!-- Member Info -->
            <div class="text-center relative z-10 mb-5">
                <div class="w-12 h-12 mx-auto rounded-xl flex items-center justify-center text-xl font-extrabold shadow-lg mb-3" style="background: linear-gradient(135deg, #F5EFE6 0%, #E8C4D8 100%); color: #6B2D4E; border: 2px solid rgba(245,239,230,0.5);">
                    {{ substr($customer->name, 0, 1) }}
                </div>
                <h3 class="text-lg font-extrabold" style="color: #F5EFE6;">{{ $customer->name }}</h3>
                <p class="text-sm font-mono font-bold mt-1" style="color: rgba(245,239,230,0.8);">Member ID: #{{ str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>

            <!-- Status badge -->
            <div class="text-center relative z-10 mb-4">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold" style="background: #C8D9A0; color: #1A5C4A; box-shadow: 0 4px 12px rgba(200,217,160,0.4);">
                    <span class="w-2 h-2 rounded-full animate-pulse" style="background: #1A7A6E;"></span>
                    QR Active — Ready to Scan
                </span>
            </div>

            <!-- Divider -->
            <div class="pt-4 relative z-10" style="border-top: 1px solid rgba(245,239,230,0.25);">
                <p class="text-center text-[11px]" style="color: rgba(245,239,230,0.7);">Show this code to staff for check-in</p>
            </div>
        </div>

        
    </div>
</div>

<style>
    @keyframes scale-in {
        0% { opacity: 0; transform: scale(0.9) translateY(10px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
    }
    .animate-scale-in {
        animation: scale-in 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>

<script>
    function openQRPreview() {
        const modal = document.getElementById('qr-preview-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeQRPreview() {
        const modal = document.getElementById('qr-preview-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function downloadQRPreview() {
        const link = document.createElement('a');
        link.href = 'https://api.qrserver.com/v1/create-qr-code/?size=400x400&data={{ urlencode($customer->getQRData()) }}&bgcolor=f5efe6&color=6b2d4e';
        link.download = 'ftm-society-qr-{{ str_pad($customer->id, 4, "0", STR_PAD_LEFT) }}.png';
        link.click();
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeQRPreview();
    });
</script>
@endif

<!-- ═══════════════════════════════════════════
     LOGOUT CONFIRMATION MODAL
═══════════════════════════════════════════ -->
<div id="logout-modal" class="fixed inset-0 z-50 hidden items-center justify-center" style="background: rgba(28,28,30,0.65); backdrop-filter: blur(8px);">
    <div class="absolute inset-0" onclick="closeLogoutModal()"></div>

    <div class="relative z-10 w-full max-w-sm mx-4 rounded-2xl shadow-2xl p-7 animate-scale-in" style="background: #F5EFE6; border: 1px solid rgba(232,196,216,0.6);">

        <!-- Icon Header -->
        <div class="flex justify-center mb-4">
            <div class="w-16 h-16 rounded-full flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, #6B2D4E 0%, #E8618C 100%); box-shadow: 0 8px 20px rgba(107,45,78,0.35);">
                <i class="fas fa-sign-out-alt text-2xl text-white"></i>
            </div>
        </div>

        <!-- Title -->
        <h3 class="text-xl font-extrabold text-center mb-2" style="color: #6B2D4E;">Konfirmasi Logout</h3>
        <p class="text-sm text-center mb-6" style="color: rgba(28,28,30,0.65);">
            Apakah Anda yakin ingin keluar dari akun FTM Society?
        </p>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row gap-3">
            <button type="button" onclick="closeLogoutModal()"
                    class="w-full px-4 py-2.5 rounded-lg font-semibold text-sm transition border"
                    style="border-color: rgba(232,196,216,0.8); color: #1C1C1E; background: transparent;"
                    onmouseover="this.style.background='#E8C4D8'" onmouseout="this.style.background='transparent'">
                Batal
            </button>
            <form method="POST" action="{{ route('member.logout') }}" class="w-full">
                @csrf
                <button type="submit"
                        class="w-full px-4 py-2.5 rounded-lg font-semibold text-sm text-white transition hover:shadow-lg"
                        style="background: linear-gradient(135deg, #6B2D4E 0%, #E8618C 100%); box-shadow: 0 4px 14px rgba(107,45,78,0.35);">
                    <i class="fas fa-sign-out-alt mr-1"></i>
                    Ya, Logout
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function showLogoutModal() {
        const modal = document.getElementById('logout-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closeLogoutModal() {
        const modal = document.getElementById('logout-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }
    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLogoutModal();
    });
</script>

<!-- ═══════════════════════════════════════════
     SIDEBAR TOGGLE SCRIPT
═══════════════════════════════════════════ -->
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const hamburger = document.getElementById('hamburger-btn');
        
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
        
        // Change hamburger icon
        const icon = hamburger.querySelector('i');
        if (sidebar.classList.contains('active')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
        
        // Prevent body scroll when sidebar is open on mobile
        if (window.innerWidth <= 768) {
            if (sidebar.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    }
    
    // Close sidebar when clicking on a link (mobile only)
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('#sidebar a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    const sidebar = document.getElementById('sidebar');
                    const overlay = document.getElementById('sidebar-overlay');
                    const hamburger = document.getElementById('hamburger-btn');
                    
                    if (sidebar.classList.contains('active')) {
                        sidebar.classList.remove('active');
                        overlay.classList.remove('active');
                        document.body.style.overflow = '';
                        
                        const icon = hamburger.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            });
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
</script>

</body>
</html>
