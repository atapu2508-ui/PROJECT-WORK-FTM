<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Member | FTM Society Gym Muslimah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Brand Palette: Burnt Cherry #7A2B4A | Power Pink #EE4E8B |
           Soft Petals #F4C9DF | Patina Green #1A7A5E | Springs Ivy #1D5A4B |
           Grounded Green #C5D79B | Layl #1C1C1C | Rising #FCF9F2 */

        .custom-gradient {
            background: linear-gradient(135deg, #7A2B4A 0%, #EE4E8B 55%, #F4C9DF 100%);
        }

        .card-glass {
            background: rgba(244, 238, 230, 0.97);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .input-focus:focus {
            border-color: #EE4E8B;
            box-shadow: 0 0 0 3px rgba(238, 78, 139, 0.18);
        }

        .btn-primary {
            background: linear-gradient(135deg, #7A2B4A 0%, #EE4E8B 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1C1C1C 0%, #7A2B4A 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(122, 43, 74, 0.35);
        }

        .logo-shadow {
            box-shadow: 0 4px 16px rgba(122, 43, 74, 0.25);
        }

        .success-alert {
            background: linear-gradient(135deg, #1A7A5E 0%, #1D5A4B 100%);
        }

        .error-alert {
            background: linear-gradient(135deg, #7A2B4A 0%, #EE4E8B 100%);
        }

        hr { border-color: #F4C9DF; }

        a.brand-link {
            color: #7A2B4A;
            font-weight: 600;
        }
        a.brand-link:hover {
            color: #EE4E8B;
        }
    </style>
</head>
<body class="custom-gradient min-h-screen flex items-center justify-center px-4">

    <div class="card-glass shadow-2xl rounded-2xl p-8 w-full max-w-md border border-[#F4C9DF]">
        <div class="text-center mb-6">
            <img src="{{ asset('icons/logo-ftm.jpg') }}" alt="Logo Gym" class="w-20 h-20 mx-auto mb-3 rounded-full logo-shadow">
            <h1 class="text-3xl font-bold text-[#7A2B4A]">Selamat Datang</h1>
            <p class="text-sm text-[#1C1C1C]/60">FTM Society</p>
        </div>

        {{-- Notifikasi sukses (suppressed jika popup welcome aktif) --}}
        @if(session('success') && !session('otp_just_verified') && !request()->boolean('welcome'))
            <div class="success-alert text-white p-3 mb-4 rounded text-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        {{-- Notifikasi error --}}
        @if($errors->any())
            <div class="error-alert text-white p-3 mb-4 rounded text-sm">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ $errors->first() }}
                </div>
            </div>
        @endif

        {{-- Form login --}}
        <form method="POST" action="{{ route('member.login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="login" class="block text-sm text-[#1C1C1C]/80 mb-1 font-medium">Email atau Nomor HP</label>
                <input type="text" name="login" id="login" value="{{ old('login') }}" required autofocus
                    placeholder="Masukkan email atau nomor HP"
                    class="w-full px-4 py-3 border border-[#F4C9DF] rounded-lg focus:outline-none input-focus transition-all duration-200 bg-[#FCF9F2] text-[#1C1C1C] placeholder-[#1C1C1C]/40">
            </div>

            <div>
                <label for="password" class="block text-sm text-[#1C1C1C]/80 mb-1 font-medium">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        placeholder="Masukkan password"
                        class="w-full px-4 py-3 border border-[#F4C9DF] rounded-lg focus:outline-none input-focus transition-all duration-200 bg-[#FCF9F2] text-[#1C1C1C] placeholder-[#1C1C1C]/40 pr-12">
                    <button type="button" 
                            id="togglePassword"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-[#1C1C1C]/40 hover:text-[#7A2B4A] transition-colors">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <div class="text-right -mt-2">
                <a href="{{ route('member.forgot-password.form') }}" class="text-sm brand-link hover:underline">
                    Lupa Password?
                </a>
            </div>

            <button type="submit"
                class="w-full btn-primary text-white px-6 py-3 rounded-xl font-semibold shadow-sm">
                Masuk
            </button>
        </form>


        <hr class="my-6">

        <div class="text-center text-sm">
            Belum memiliki akun?
            <a href="{{ route('home') }}#join" class="brand-link hover:underline">Daftar Sekarang</a>
        </div>

        <p class="text-center text-xs text-[#1C1C1C]/40 mt-4">
            Data Anda aman dan terlindungi
        </p>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (password.type === 'password') {
                password.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>

    {{-- ===========================================================
         POPUP: Selamat datang setelah OTP terverifikasi
         Trigger ganda — session flash ATAU URL ?welcome=1
         =========================================================== --}}
    @php
        $showWelcomePopup = session('otp_just_verified') || request()->boolean('welcome');
        $popupName  = session('verified_name')  ?? request()->query('name')  ?? 'Sister';
        $popupEmail = session('verified_email') ?? request()->query('email') ?? null;
    @endphp

    @if($showWelcomePopup)
    <div id="ftm-success-modal" class="ftm-success-overlay" role="dialog" aria-modal="true" aria-labelledby="ftm-success-title">
        <div class="ftm-success-backdrop" onclick="ftmCloseSuccess()"></div>

        <div class="ftm-success-box">
            {{-- Top accent --}}
            <div class="ftm-success-accent"></div>

            {{-- Confetti decorative dots --}}
            <span class="ftm-confetti ftm-confetti-1"></span>
            <span class="ftm-confetti ftm-confetti-2"></span>
            <span class="ftm-confetti ftm-confetti-3"></span>
            <span class="ftm-confetti ftm-confetti-4"></span>
            <span class="ftm-confetti ftm-confetti-5"></span>

            {{-- Close button --}}
            <button type="button" onclick="ftmCloseSuccess()" class="ftm-success-close" aria-label="Tutup">
                <i class="fas fa-times"></i>
            </button>

            {{-- Animated check icon --}}
            <div class="ftm-success-icon-wrap">
                <div class="ftm-success-icon-bg">
                    <svg class="ftm-success-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="ftm-success-circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="ftm-success-check" fill="none" d="M14 27l8 8 16-18"/>
                    </svg>
                </div>
            </div>

            {{-- Content --}}
            <div class="ftm-success-content">
                <p class="ftm-success-eyebrow">FTM Society</p>
                <h2 id="ftm-success-title" class="ftm-success-title">Pendaftaran Berhasil</h2>
                <p class="ftm-success-greet">
                    Selamat datang,
                    <strong>{{ $popupName }}</strong>!
                </p>
                <p class="ftm-success-message">
                    Akun kamu sudah <span class="ftm-success-highlight">aktif</span> dan siap digunakan.
                    Silakan login dengan email
                    @if($popupEmail)
                        <strong>{{ $popupEmail }}</strong>
                    @else
                        terdaftar
                    @endif
                    untuk mulai berlatih bersama kami.
                </p>

                <div class="ftm-success-info">
                    <div class="ftm-success-info-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Nomor WhatsApp tervalidasi</span>
                    </div>
                    <div class="ftm-success-info-item">
                        <i class="fas fa-user-check"></i>
                        <span>Akun siap untuk login</span>
                    </div>
                </div>

                <button type="button" onclick="ftmCloseSuccess()" class="ftm-success-btn">
                    <span>Login Sekarang</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    <style>
        /* ============================================================
           FTM SUCCESS MODAL — Brand 2025
           Power Pink #EE4E8B | Burnt Cherry #7A2B4A | Soft Petals #F4C9DF
           Patina Green #1A7A5E | Springs Ivy #1D5A4B | Grounded #C5D79B
           Layl #1C1C1C | Rising #FCF9F2
           ============================================================ */
        .ftm-success-overlay {
            position: fixed;
            inset: 0;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            font-family: 'Poppins', system-ui, sans-serif;
            animation: ftmFadeOverlay 0.25s ease-out;
        }
        @keyframes ftmFadeOverlay {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        .ftm-success-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(28, 28, 28, 0.65);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .ftm-success-box {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 28rem;
            background: #FCF9F2;
            border: 1px solid #F4C9DF;
            border-radius: 22px;
            box-shadow:
                0 30px 60px rgba(28, 28, 28, 0.35),
                0 0 0 1px rgba(238, 78, 139, 0.15);
            overflow: hidden;
            animation: ftmScaleIn 0.45s cubic-bezier(0.16, 1, 0.3, 1);
            text-align: center;
        }
        @keyframes ftmScaleIn {
            0%   { opacity: 0; transform: scale(0.85) translateY(20px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }

        .ftm-success-accent {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 6px;
            background: linear-gradient(90deg, #EE4E8B 0%, #7A2B4A 50%, #EE4E8B 100%);
            background-size: 200% 100%;
            animation: ftmAccentShift 3s ease-in-out infinite;
        }
        @keyframes ftmAccentShift {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        /* Confetti */
        .ftm-confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            opacity: 0;
            animation: ftmConfettiPop 1.2s ease-out forwards;
        }
        .ftm-confetti-1 { top: 18%; left: 10%; background: #EE4E8B; animation-delay: 0.4s; }
        .ftm-confetti-2 { top: 12%; right: 14%; background: #C5D79B; animation-delay: 0.55s; width: 8px; height: 8px; }
        .ftm-confetti-3 { top: 30%; left: 8%;  background: #7A2B4A; animation-delay: 0.7s;  width: 6px; height: 6px; }
        .ftm-confetti-4 { top: 24%; right: 9%; background: #F4C9DF; animation-delay: 0.85s; width: 12px; height: 12px; }
        .ftm-confetti-5 { top: 8%;  left: 30%; background: #1A7A5E; animation-delay: 1s;    width: 6px; height: 6px; }
        @keyframes ftmConfettiPop {
            0%   { opacity: 0; transform: translateY(0) scale(0); }
            40%  { opacity: 1; transform: translateY(-20px) scale(1.2); }
            100% { opacity: 0; transform: translateY(-60px) scale(0.8); }
        }

        .ftm-success-close {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(244, 201, 223, 0.5);
            border: none;
            color: #7A2B4A;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            transition: background 0.18s ease, transform 0.18s ease;
            z-index: 5;
        }
        .ftm-success-close:hover {
            background: #F4C9DF;
            transform: rotate(90deg);
        }

        /* Icon section */
        .ftm-success-icon-wrap {
            margin: 2.2rem auto 0.5rem;
            display: flex;
            justify-content: center;
        }
        .ftm-success-icon-bg {
            position: relative;
            width: 88px;
            height: 88px;
            border-radius: 50%;
            background: #1A7A5E;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 0 0 8px rgba(26, 122, 94, 0.18),
                0 12px 28px rgba(26, 122, 94, 0.40);
            animation: ftmIconBounce 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
        }
        @keyframes ftmIconBounce {
            0%   { transform: scale(0); opacity: 0; }
            60%  { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }

        .ftm-success-checkmark {
            width: 50px;
            height: 50px;
        }
        .ftm-success-circle {
            stroke: #FCF9F2;
            stroke-width: 3;
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            animation: ftmCircleDraw 0.7s ease-out 0.4s forwards;
        }
        .ftm-success-check {
            stroke: #FCF9F2;
            stroke-width: 4;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: ftmCheckDraw 0.45s ease-out 1s forwards;
        }
        @keyframes ftmCircleDraw {
            to { stroke-dashoffset: 0; }
        }
        @keyframes ftmCheckDraw {
            to { stroke-dashoffset: 0; }
        }

        /* Content */
        .ftm-success-content {
            padding: 1rem 2rem 2rem;
        }
        .ftm-success-eyebrow {
            font-family: 'Nord', 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 0.7rem;
            letter-spacing: 0.32em;
            text-transform: uppercase;
            color: #EE4E8B;
            margin: 0 0 0.4rem;
        }
        .ftm-success-title {
            font-family: 'Nord', 'Poppins', sans-serif;
            font-weight: 900;
            font-size: 1.7rem;
            letter-spacing: -0.01em;
            color: #7A2B4A;
            margin: 0 0 0.6rem;
            line-height: 1.15;
        }
        .ftm-success-greet {
            font-size: 1rem;
            color: #1C1C1C;
            margin: 0 0 0.85rem;
            font-weight: 500;
        }
        .ftm-success-greet strong {
            color: #7A2B4A;
            font-weight: 700;
        }
        .ftm-success-message {
            font-size: 0.88rem;
            color: rgba(28, 28, 28, 0.7);
            line-height: 1.6;
            margin: 0 0 1.2rem;
            font-weight: 500;
        }
        .ftm-success-message strong {
            color: #7A2B4A;
            font-family: 'JetBrains Mono', 'SF Mono', monospace;
            font-size: 0.84rem;
            background: rgba(244, 201, 223, 0.5);
            padding: 1px 6px;
            border-radius: 5px;
            font-weight: 700;
        }
        .ftm-success-highlight {
            color: #1A7A5E;
            font-weight: 700;
        }

        /* Info chips */
        .ftm-success-info {
            display: flex;
            flex-direction: column;
            gap: 0.55rem;
            background: rgba(244, 201, 223, 0.32);
            border: 1px solid rgba(238, 78, 139, 0.18);
            border-radius: 12px;
            padding: 0.85rem 1rem;
            margin: 0 0 1.5rem;
        }
        .ftm-success-info-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.82rem;
            font-weight: 600;
            color: #7A2B4A;
        }
        .ftm-success-info-item i {
            width: 1.2rem;
            color: #1A7A5E;
            font-size: 0.95rem;
        }

        /* CTA button */
        .ftm-success-btn {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            padding: 0.9rem 1.25rem;
            background: #EE4E8B;
            color: #FFFFFF;
            border: none;
            border-radius: 12px;
            font-family: 'Nord', 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 0.92rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(238, 78, 139, 0.35);
            transition: background 0.2s ease, transform 0.18s ease, box-shadow 0.2s ease;
        }
        .ftm-success-btn:hover {
            background: #7A2B4A;
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(122, 43, 74, 0.40);
        }
        .ftm-success-btn i {
            transition: transform 0.18s ease;
        }
        .ftm-success-btn:hover i {
            transform: translateX(3px);
        }

        @media (max-width: 480px) {
            .ftm-success-content { padding: 1rem 1.4rem 1.7rem; }
            .ftm-success-title   { font-size: 1.45rem; }
            .ftm-success-message { font-size: 0.82rem; }
        }
    </style>

    <script>
        function ftmCloseSuccess() {
            const modal = document.getElementById('ftm-success-modal');
            if (!modal) return;
            modal.style.animation = 'ftmFadeOverlay 0.25s ease-out reverse';
            setTimeout(() => modal.remove(), 240);
            // Bersihkan URL ?welcome=1 supaya reload tidak munculin popup lagi
            if (window.history && window.history.replaceState) {
                const cleanUrl = window.location.pathname;
                window.history.replaceState({}, document.title, cleanUrl);
            }
            // Auto-focus ke input login setelah popup tertutup
            const loginInput = document.getElementById('login');
            if (loginInput) setTimeout(() => loginInput.focus(), 280);
        }

        // Esc to close
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') ftmCloseSuccess();
        });

        // Auto-close after 12 seconds
        setTimeout(() => {
            const modal = document.getElementById('ftm-success-modal');
            if (modal) ftmCloseSuccess();
        }, 12000);
    </script>
    @endif
</body>
</html>
