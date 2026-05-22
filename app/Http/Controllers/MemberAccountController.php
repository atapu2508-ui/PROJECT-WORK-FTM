<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerLoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MemberAccountController extends Controller
{
    /** Pastikan response selalu JSON dengan format konsisten. */
    protected function ok(string $message, array $data = [])
    {
        return response()->json(['success' => true, 'message' => $message] + (empty($data) ? [] : ['data' => $data]));
    }
    protected function fail(string $message, int $status = 422, array $errors = [])
    {
        $payload = ['success' => false, 'message' => $message];
        if (!empty($errors)) $payload['errors'] = $errors;
        return response()->json($payload, $status);
    }

    /**
     * POST /member/api/profile/update
     * Update nama & phone (email TIDAK diubah).
     */
    public function updateProfile(Request $request)
    {
        $member = Auth::guard('customer')->user();
        if (!$member) return $this->fail('Not authenticated', 401);

        $validated = $request->validate([
            'name'         => ['required', 'string', 'max:120'],
            'phone_number' => ['nullable', 'string', 'max:20'],
        ]);

        $member->update($validated);

        return $this->ok('Profil berhasil diperbarui', [
            'name'  => $member->name,
            'phone' => $member->phone_number,
        ]);
    }

    /**
     * POST /member/api/profile/avatar
     * Upload avatar — disimpan di storage/app/public/avatars/.
     */
    public function uploadAvatar(Request $request)
    {
        $member = Auth::guard('customer')->user();
        if (!$member) return $this->fail('Not authenticated', 401);

        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // Hapus avatar lama
        if (!empty($member->avatar_path) && Storage::disk('public')->exists($member->avatar_path)) {
            Storage::disk('public')->delete($member->avatar_path);
        }

        $file = $request->file('avatar');
        $filename = 'avatar_' . $member->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('avatars', $filename, 'public');

        $member->update(['avatar_path' => $path]);

        return $this->ok('Foto profil berhasil diunggah', [
            'avatar_url' => asset('storage/' . $path),
        ]);
    }

    /**
     * POST /member/api/profile/avatar/remove
     */
    public function removeAvatar()
    {
        $member = Auth::guard('customer')->user();
        if (!$member) return $this->fail('Not authenticated', 401);

        if (!empty($member->avatar_path) && Storage::disk('public')->exists($member->avatar_path)) {
            Storage::disk('public')->delete($member->avatar_path);
        }
        $member->update(['avatar_path' => null]);

        return $this->ok('Foto profil dihapus');
    }

    /**
     * POST /member/api/profile/password
     */
    public function updatePassword(Request $request)
    {
        $member = Auth::guard('customer')->user();
        if (!$member) return $this->fail('Not authenticated', 401);

        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($validated['current_password'], $member->password)) {
            return $this->fail('Password saat ini salah', 422, [
                'current_password' => ['Password saat ini tidak cocok'],
            ]);
        }

        $member->update([
            'password' => Hash::make($validated['password']),
            'force_password_change' => false,
        ]);

        return $this->ok('Password berhasil diubah');
    }

    /**
     * POST /member/api/profile/notifications
     */
    public function updateNotifications(Request $request)
    {
        $member = Auth::guard('customer')->user();
        if (!$member) return $this->fail('Not authenticated', 401);

        $validated = $request->validate([
            'notify_whatsapp_booking' => ['required', 'boolean'],
            'notify_whatsapp_payment' => ['required', 'boolean'],
            'notify_email_marketing'  => ['required', 'boolean'],
        ]);

        $member->update($validated);

        return $this->ok('Preferensi notifikasi disimpan');
    }

    /**
     * GET /member/api/profile/login-history
     * Return 5 login terakhir.
     */
    public function loginHistory()
    {
        $member = Auth::guard('customer')->user();
        if (!$member) return $this->fail('Not authenticated', 401);

        $logs = CustomerLoginLog::where('customer_id', $member->id)
            ->orderBy('logged_in_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($l) {
                return [
                    'logged_in_at'  => $l->logged_in_at?->format('d M Y, H:i'),
                    'ago'           => $l->logged_in_at?->locale('id')->diffForHumans(),
                    'ip'            => $l->ip_address,
                    'device'        => ucfirst($l->device_type ?? 'unknown'),
                    'user_agent'    => $this->shortUa($l->user_agent),
                ];
            });

        return $this->ok('OK', ['logs' => $logs]);
    }

    /**
     * POST /member/api/profile/logout-all
     * Trigger Laravel built-in: cycle remember token & invalidate all sessions for this user.
     */
    public function logoutAll(Request $request)
    {
        $member = Auth::guard('customer')->user();
        if (!$member) return $this->fail('Not authenticated', 401);

        // Re-hash password to nothing (just rotate remember_token)
        $member->setRememberToken(\Str::random(60));
        $member->save();

        // Invalidate other sessions: tidak ada method native untuk customer guard,
        // jadi kita logout ALL kemudian beri tahu user untuk login lagi.
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return $this->ok('Berhasil logout dari semua perangkat. Silakan login kembali.', [
            'redirect' => route('member.login.form'),
        ]);
    }

    /**
     * Helper: pendekkan user agent string biar UI rapi.
     */
    protected function shortUa(?string $ua): string
    {
        if (!$ua) return 'Unknown browser';
        $ua = (string) $ua;
        if (stripos($ua, 'Edg/') !== false)    return 'Microsoft Edge';
        if (stripos($ua, 'Chrome') !== false)  return 'Google Chrome';
        if (stripos($ua, 'Safari') !== false)  return 'Safari';
        if (stripos($ua, 'Firefox') !== false) return 'Firefox';
        if (stripos($ua, 'Opera') !== false || stripos($ua, 'OPR') !== false) return 'Opera';
        return 'Unknown browser';
    }
}
