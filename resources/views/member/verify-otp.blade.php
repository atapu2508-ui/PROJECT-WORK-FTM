<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP | FTM Society</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Brand Palette */
        .custom-gradient {
            background: linear-gradient(135deg, #793451 0%, #EA6993 55%, #F1CCE3 100%);
        }
        .card-glass {
            background: rgba(244, 238, 230, 0.97);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .otp-input {
            width: 48px;
            height: 56px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            border: 2px solid #F1CCE3;
            border-radius: 12px;
            background: #F4EEE6;
            color: #26282B;
            transition: all 0.2s ease;
        }
        .otp-input:focus {
            outline: none;
            border-color: #EA6993;
            box-shadow: 0 0 0 3px rgba(234, 105, 147, 0.18);
            background: #FFFFFF;
        }
        .otp-input.filled {
            border-color: #793451;
            background: #FFFFFF;
        }
        .btn-primary {
            background: linear-gradient(135deg, #793451 0%, #EA6993 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover:not(:disabled) {
            background: linear-gradient(135deg, #26282B 0%, #793451 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(121, 52, 81, 0.35);
        }
        .btn-primary:disabled {
            opacity: 0.55;
            cursor: not-allowed;
            transform: none;
        }
        .success-alert  { background: linear-gradient(135deg, #00745F 0%, #08513C 100%); }
        .error-alert    { background: linear-gradient(135deg, #793451 0%, #EA6993 100%); }
        .warning-alert  { background: linear-gradient(135deg, #C8851C 0%, #A66B12 100%); }
        a.brand-link    { color: #793451; font-weight: 600; }
        a.brand-link:hover { color: #EA6993; }
    </style>
</head>
<body class="custom-gradient min-h-screen flex items-center justify-center px-4 py-8">

    <div class="card-glass shadow-2xl rounded-2xl p-8 w-full max-w-md border border-[#F1CCE3]">

        <div class="text-center mb-6">
            <img src="{{ asset('icons/logo-ftm.jpg') }}" alt="Logo FTM Society"
                 class="w-20 h-20 mx-auto mb-3 rounded-full"
                 style="box-shadow: 0 4px 16px rgba(121, 52, 81, 0.25);">
            <h1 class="text-2xl font-bold text-[#793451] flex items-center justify-center gap-2">
                <i class="fas fa-shield-alt"></i> Verifikasi Nomor
            </h1>
            <p class="text-sm text-[#26282B]/70 mt-2">
                Kami telah mengirim kode <strong>{{ $codeLength }} digit</strong> ke nomor WhatsApp:
            </p>
            <p class="text-base font-bold text-[#793451] mt-1 tracking-wider">
                {{ $maskedPhone }}
            </p>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="success-alert text-white p-3 mb-4 rounded text-sm flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('warning'))
            <div class="warning-alert text-white p-3 mb-4 rounded text-sm flex items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                {{ session('warning') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-alert text-white p-3 mb-4 rounded text-sm flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Form OTP --}}
        <form method="POST" action="{{ route('member.otp.verify') }}" id="otpForm">
            @csrf

            {{-- Hidden field untuk menampung kode utuh --}}
            <input type="hidden" name="code" id="codeInput" maxlength="{{ $codeLength }}">

            {{-- 6 input boxes --}}
            <div class="flex justify-center gap-2 mb-2" id="otpBoxes">
                @for($i = 0; $i < $codeLength; $i++)
                    <input type="text"
                           inputmode="numeric"
                           pattern="[0-9]"
                           maxlength="1"
                           class="otp-input"
                           data-index="{{ $i }}"
                           autocomplete="one-time-code"
                           @if($i === 0) autofocus @endif>
                @endfor
            </div>

            {{-- Countdown expiration --}}
            @if($expiresAt)
                <p class="text-center text-xs text-[#26282B]/60 mb-4">
                    OTP berlaku hingga
                    <span class="font-bold text-[#793451]" id="expiryTime">
                        {{ $expiresAt->format('H:i:s') }}
                    </span>
                </p>
            @endif

            <button type="submit"
                    id="submitBtn"
                    class="w-full btn-primary text-white px-6 py-3 rounded-xl font-semibold shadow-sm flex items-center justify-center gap-2 mt-4"
                    disabled>
                <i class="fas fa-check"></i> Verifikasi
            </button>
        </form>

        <hr class="my-6" style="border-color: #F1CCE3;">

        {{-- Resend OTP --}}
        <div class="text-center text-sm">
            <p class="text-[#26282B]/70 mb-2">Tidak menerima kode?</p>
            <form method="POST" action="{{ route('member.otp.resend') }}" id="resendForm">
                @csrf
                <button type="submit"
                        id="resendBtn"
                        class="brand-link hover:underline disabled:opacity-50 disabled:cursor-not-allowed disabled:no-underline">
                    <span id="resendText">
                        @if($cooldownSeconds > 0)
                            Kirim Ulang dalam <span id="cooldownCounter">{{ $cooldownSeconds }}</span>s
                        @else
                            <i class="fas fa-paper-plane mr-1"></i> Kirim Ulang OTP
                        @endif
                    </span>
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-[#26282B]/40 mt-6">
            Dengan memasukkan kode, Anda menyetujui syarat &amp; ketentuan FTM Society.
        </p>
    </div>

    <script>
        // ============================================================
        // OTP INPUT HANDLER — auto focus, paste support, submit handling
        // ============================================================
        const inputs     = document.querySelectorAll('.otp-input');
        const codeInput  = document.getElementById('codeInput');
        const submitBtn  = document.getElementById('submitBtn');
        const codeLength = inputs.length;

        function updateHiddenInput() {
            const code = Array.from(inputs).map(i => i.value).join('');
            codeInput.value = code;
            submitBtn.disabled = code.length !== codeLength;
        }

        inputs.forEach((input, idx) => {
            input.addEventListener('input', (e) => {
                // Hanya angka
                e.target.value = e.target.value.replace(/\D/g, '').slice(0, 1);

                if (e.target.value) {
                    e.target.classList.add('filled');
                    if (idx < codeLength - 1) inputs[idx + 1].focus();
                } else {
                    e.target.classList.remove('filled');
                }

                updateHiddenInput();

                // Auto-submit jika semua sudah terisi
                if (codeInput.value.length === codeLength) {
                    setTimeout(() => document.getElementById('otpForm').submit(), 200);
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && idx > 0) {
                    inputs[idx - 1].focus();
                    inputs[idx - 1].value = '';
                    inputs[idx - 1].classList.remove('filled');
                    updateHiddenInput();
                }
                if (e.key === 'ArrowLeft' && idx > 0)              inputs[idx - 1].focus();
                if (e.key === 'ArrowRight' && idx < codeLength - 1) inputs[idx + 1].focus();
            });

            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pasted = (e.clipboardData || window.clipboardData)
                    .getData('text')
                    .replace(/\D/g, '')
                    .slice(0, codeLength);

                pasted.split('').forEach((digit, i) => {
                    if (inputs[i]) {
                        inputs[i].value = digit;
                        inputs[i].classList.add('filled');
                    }
                });
                updateHiddenInput();

                if (codeInput.value.length === codeLength) {
                    setTimeout(() => document.getElementById('otpForm').submit(), 200);
                }
            });
        });

        // ============================================================
        // RESEND COOLDOWN
        // ============================================================
        const resendBtn      = document.getElementById('resendBtn');
        const resendText     = document.getElementById('resendText');
        const cooldownEl     = document.getElementById('cooldownCounter');
        let cooldown         = {{ $cooldownSeconds }};

        function tickCooldown() {
            if (cooldown <= 0) {
                resendBtn.disabled = false;
                resendText.innerHTML = '<i class="fas fa-paper-plane mr-1"></i> Kirim Ulang OTP';
                return;
            }
            cooldown--;
            if (cooldownEl) cooldownEl.textContent = cooldown;
            setTimeout(tickCooldown, 1000);
        }

        if (cooldown > 0) {
            resendBtn.disabled = true;
            tickCooldown();
        }
    </script>
</body>
</html>
