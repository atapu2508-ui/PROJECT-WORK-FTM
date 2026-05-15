<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password | FTM Society Gym Muslimah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Brand Palette: Burnt Cherry #793451 | Power Pink #EA6993 |
           Soft Petals #F1CCE3 | Patina Green #00745F | Springs Ivy #08513C |
           Grounded Green #D2DCA5 | Layl #26282B | Rising #F4EEE6 */

        .custom-gradient {
            background: linear-gradient(135deg, #793451 0%, #EA6993 55%, #F1CCE3 100%);
        }

        .card-glass {
            background: rgba(244, 238, 230, 0.97);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .input-focus:focus {
            border-color: #EA6993;
            box-shadow: 0 0 0 3px rgba(234, 105, 147, 0.18);
        }

        .btn-primary {
            background: linear-gradient(135deg, #793451 0%, #EA6993 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #26282B 0%, #793451 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(121, 52, 81, 0.35);
        }

        .logo-shadow {
            box-shadow: 0 4px 16px rgba(121, 52, 81, 0.25);
        }

        .success-alert {
            background: linear-gradient(135deg, #00745F 0%, #08513C 100%);
        }

        .error-alert {
            background: linear-gradient(135deg, #793451 0%, #EA6993 100%);
        }

        .info-alert {
            background: #F1CCE3;
            border-left: 4px solid #EA6993;
            color: #793451;
        }

        hr { border-color: #F1CCE3; }

        a.brand-link {
            color: #793451;
            font-weight: 600;
        }
        a.brand-link:hover {
            color: #EA6993;
        }
    </style>
</head>
<body class="custom-gradient min-h-screen flex items-center justify-center px-4 py-8">

    <div class="card-glass shadow-2xl rounded-2xl p-8 w-full max-w-md border border-[#F1CCE3]">
        <div class="text-center mb-6">
            <img src="{{ asset('icons/logo-ftm.jpg') }}" alt="Logo FTM Society" class="w-20 h-20 mx-auto mb-3 rounded-full logo-shadow">
            <h1 class="text-3xl font-bold text-[#793451] flex items-center justify-center gap-2">
                <i class="fas fa-key"></i> Lupa Password
            </h1>
            <p class="text-sm text-[#26282B]/60 mt-1">FTM Society</p>
        </div>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
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

        {{-- Info verifikasi identitas --}}
        <div class="info-alert px-4 py-3 rounded mb-5 text-xs flex items-start gap-2">
            <i class="fas fa-shield-alt mt-0.5"></i>
            <span>
                Untuk verifikasi identitas, masukkan <strong>email</strong> dan <strong>nomor HP</strong> yang terdaftar pada akun Anda. Keduanya harus cocok.
            </span>
        </div>

        {{-- Form lupa password --}}
        <form method="POST" action="{{ route('member.forgot-password.submit') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm text-[#26282B]/80 mb-1 font-medium">Email Terdaftar</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    placeholder="contoh@email.com"
                    class="w-full px-4 py-3 border border-[#F1CCE3] rounded-lg focus:outline-none input-focus transition-all duration-200 bg-[#F4EEE6] text-[#26282B] placeholder-[#26282B]/40">
            </div>

            <div>
                <label for="phone_number" class="block text-sm text-[#26282B]/80 mb-1 font-medium">Nomor HP Terdaftar</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required
                    placeholder="08xxxxxxxxxx"
                    class="w-full px-4 py-3 border border-[#F1CCE3] rounded-lg focus:outline-none input-focus transition-all duration-200 bg-[#F4EEE6] text-[#26282B] placeholder-[#26282B]/40">
            </div>

            <div>
                <label for="new_password" class="block text-sm text-[#26282B]/80 mb-1 font-medium">Password Baru</label>
                <div class="relative">
                    <input type="password" name="new_password" id="new_password" required minlength="8"
                        placeholder="Minimal 8 karakter"
                        class="w-full px-4 py-3 border border-[#F1CCE3] rounded-lg focus:outline-none input-focus transition-all duration-200 bg-[#F4EEE6] text-[#26282B] placeholder-[#26282B]/40 pr-12">
                    <button type="button" data-toggle="new_password"
                            class="toggle-eye absolute right-3 top-1/2 transform -translate-y-1/2 text-[#26282B]/40 hover:text-[#793451] transition-colors">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

            <div>
                <label for="new_password_confirmation" class="block text-sm text-[#26282B]/80 mb-1 font-medium">Konfirmasi Password Baru</label>
                <div class="relative">
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" required minlength="8"
                        placeholder="Ulangi password baru"
                        class="w-full px-4 py-3 border border-[#F1CCE3] rounded-lg focus:outline-none input-focus transition-all duration-200 bg-[#F4EEE6] text-[#26282B] placeholder-[#26282B]/40 pr-12">
                    <button type="button" data-toggle="new_password_confirmation"
                            class="toggle-eye absolute right-3 top-1/2 transform -translate-y-1/2 text-[#26282B]/40 hover:text-[#793451] transition-colors">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full btn-primary text-white px-6 py-3 rounded-xl font-semibold shadow-sm flex items-center justify-center gap-2">
                <i class="fas fa-save"></i> Reset Password
            </button>
        </form>

        <hr class="my-6">

        <div class="text-center text-sm">
            Ingat password Anda?
            <a href="{{ route('member.login.form') }}" class="brand-link hover:underline">Kembali ke Login</a>
        </div>

        <p class="text-center text-xs text-[#26282B]/40 mt-4">
            Jika mengalami kendala, hubungi admin via WhatsApp.
        </p>
    </div>

    <script>
        // Toggle visibility untuk semua field password
        document.querySelectorAll('.toggle-eye').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const targetId = this.getAttribute('data-toggle');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>
</html>
