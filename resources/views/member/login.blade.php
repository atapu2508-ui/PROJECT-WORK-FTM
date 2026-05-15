<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Member | FTM Society Gym Muslimah</title>
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
<body class="custom-gradient min-h-screen flex items-center justify-center px-4">

    <div class="card-glass shadow-2xl rounded-2xl p-8 w-full max-w-md border border-[#F1CCE3]">
        <div class="text-center mb-6">
            <img src="{{ asset('icons/logo-ftm.jpg') }}" alt="Logo Gym" class="w-20 h-20 mx-auto mb-3 rounded-full logo-shadow">
            <h1 class="text-3xl font-bold text-[#793451]">Selamat Datang</h1>
            <p class="text-sm text-[#26282B]/60">FTM Society</p>
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

        {{-- Form login --}}
        <form method="POST" action="{{ route('member.login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="login" class="block text-sm text-[#26282B]/80 mb-1 font-medium">Email atau Nomor HP</label>
                <input type="text" name="login" id="login" value="{{ old('login') }}" required autofocus
                    placeholder="Masukkan email atau nomor HP"
                    class="w-full px-4 py-3 border border-[#F1CCE3] rounded-lg focus:outline-none input-focus transition-all duration-200 bg-[#F4EEE6] text-[#26282B] placeholder-[#26282B]/40">
            </div>

            <div>
                <label for="password" class="block text-sm text-[#26282B]/80 mb-1 font-medium">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        placeholder="Masukkan password"
                        class="w-full px-4 py-3 border border-[#F1CCE3] rounded-lg focus:outline-none input-focus transition-all duration-200 bg-[#F4EEE6] text-[#26282B] placeholder-[#26282B]/40 pr-12">
                    <button type="button" 
                            id="togglePassword"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-[#26282B]/40 hover:text-[#793451] transition-colors">
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

        <p class="text-center text-xs text-[#26282B]/40 mt-4">
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
</body>
</html>
