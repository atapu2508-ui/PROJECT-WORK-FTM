{{--
    FTM Society — Unified Member Sidebar + Logout Modal
    --------------------------------------------------------------
    Dipakai di: Dashboard, My Packages, Book Class, My Classes,
                Transactions, Attendance, Profile/Account
    --------------------------------------------------------------
    Cara include:  @include('partials.member-sidebar')
    Active state otomatis berdasarkan route name.
--}}

@php
    $currentRoute = request()->route()?->getName() ?? '';

    $menus = [
        ['route' => 'member.dashboard',         'label' => 'DASHBOARD',     'icon' => 'fa-home',           'match' => ['member.dashboard', 'member.profile']],
        ['route' => 'member.packages.index',    'label' => 'MY PACKAGES',   'icon' => 'fa-box',            'match' => ['member.packages.index', 'member.packages.detail']],
        ['route' => 'member.book',              'label' => 'BOOK CLASS',    'icon' => 'fa-calendar-plus',  'match' => ['member.book']],
        ['route' => 'member.my-classes',        'label' => 'MY CLASSES',    'icon' => 'fa-dumbbell',       'match' => ['member.my-classes']],
        ['route' => 'member.transactions',      'label' => 'TRANSACTIONS',  'icon' => 'fa-receipt',        'match' => ['member.transactions']],
        ['route' => 'member.attendance',        'label' => 'ATTENDANCE',    'icon' => 'fa-calendar-check', 'match' => ['member.attendance']],
        ['route' => 'member.account',           'label' => 'PROFILE',       'icon' => 'fa-user',           'match' => ['member.account']],
    ];
@endphp

<aside id="sidebar" class="ftm-sidebar">
    {{-- Logo / Brand — klik kembali ke /member/profile#home (landing member) --}}
    <a href="{{ route('member.profile') }}#home" class="ftm-sidebar-brand" title="Kembali ke beranda member">
        <div class="ftm-sidebar-logo">
            <span class="ftm-logo-pink">FTM</span> <span class="ftm-logo-cream">SOCIETY</span>
        </div>
        <div class="ftm-sidebar-tagline">MEMBER PORTAL</div>
    </a>

    {{-- Navigation --}}
    <nav class="ftm-sidebar-nav">
        @foreach($menus as $menu)
            @php $isActive = in_array($currentRoute, $menu['match']); @endphp
            <a href="{{ route($menu['route']) }}"
               class="ftm-nav-item {{ $isActive ? 'active' : '' }}">
                <i class="fas {{ $menu['icon'] }}"></i>
                <span>{{ $menu['label'] }}</span>
            </a>
        @endforeach
    </nav>

    {{-- Logout button --}}
    <div class="ftm-sidebar-footer">
        <button type="button" onclick="ftmShowLogoutModal()" class="ftm-logout-btn">
            <i class="fas fa-sign-out-alt"></i>
            <span>LOGOUT</span>
        </button>

        <div class="ftm-sidebar-copyright">
            © {{ date('Y') }} FTM Society
        </div>
    </div>
</aside>

{{-- ===========================================================
     LOGOUT CONFIRMATION MODAL — Brand FTM Society
     =========================================================== --}}
<div id="ftm-logout-modal" class="ftm-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="ftm-logout-title">
    {{-- Click outside to close --}}
    <div class="ftm-modal-backdrop" onclick="ftmCloseLogoutModal()"></div>

    {{-- Modal box --}}
    <div class="ftm-modal-box" role="document">
        {{-- Decorative top accent --}}
        <div class="ftm-modal-accent"></div>

        {{-- Icon header --}}
        <div class="ftm-modal-icon-wrap">
            <div class="ftm-modal-icon">
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>

        {{-- Content --}}
        <h3 id="ftm-logout-title" class="ftm-modal-title">Konfirmasi Logout</h3>
        <p class="ftm-modal-message">
            Apakah Anda yakin ingin keluar dari akun <strong>FTM Society</strong>?
            <br>
            <span class="ftm-modal-hint">Sesi Anda akan diakhiri dan kembali ke halaman login.</span>
        </p>

        {{-- Actions --}}
        <div class="ftm-modal-actions">
            <button type="button" class="ftm-btn-cancel" onclick="ftmCloseLogoutModal()">
                <i class="fas fa-arrow-left"></i> Batal
            </button>
            <form method="POST" action="{{ route('member.logout') }}" class="ftm-modal-form">
                @csrf
                <button type="submit" class="ftm-btn-confirm">
                    <i class="fas fa-sign-out-alt"></i> Ya, Logout
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    /* ============================================================
       FTM Logout Modal — show/hide controls
       Expose juga sebagai window.showLogoutModal supaya kompatibel
       dengan trigger lama yang masih pakai showLogoutModal()
       ============================================================ */
    function ftmShowLogoutModal() {
        const modal = document.getElementById('ftm-logout-modal');
        if (!modal) return;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function ftmCloseLogoutModal() {
        const modal = document.getElementById('ftm-logout-modal');
        if (!modal) return;
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Backward compatibility
    window.showLogoutModal  = ftmShowLogoutModal;
    window.closeLogoutModal = ftmCloseLogoutModal;

    // Esc to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') ftmCloseLogoutModal();
    });
</script>
