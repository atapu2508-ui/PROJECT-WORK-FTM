@extends('layouts.app')

@section('content')

@php
    $member = auth('customer')->user();
    $qrData = $member->getQRData();
    $activeOrder = $member->orders()
        ->where('status', 'paid')
        ->where(function($q) {
            $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
        })->first();
    $memberId = str_pad($member->id, 4, '0', STR_PAD_LEFT);
    $hasAvatar = !empty($member->avatar_path);
    $avatarUrl = $hasAvatar ? asset('storage/' . $member->avatar_path) : null;
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=JetBrains+Mono:wght@600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/ftm-typography.css') }}">

<style>
    /* ============================================================
       FTM SOCIETY — MY PROFILE PAGE
       Brand: Burnt Cherry #7A2B4A · Power Pink #EE4E8B
              Soft Petals #F4C9DF · Rising #FCF9F2 · Layl #1C1C1C
              Patina Green #1A7A5E · Grounded #C5D79B
       ============================================================ */

    .acct-main { background: #FCF9F2; min-height: 100vh; font-family: 'Poppins', system-ui, sans-serif; }
    .acct-container { max-width: 1100px; margin: 0 auto; }

    .acct-header { margin-bottom: 1.5rem; }
    .acct-header h1 {
        font-family: 'Nord', 'Poppins', sans-serif;
        font-size: 1.6rem;
        font-weight: 800;
        color: #7A2B4A;
        letter-spacing: -0.01em;
    }
    .acct-header p { font-size: 0.85rem; color: rgba(28,28,28,0.6); margin-top: 4px; }

    /* ── HERO (member card) — Brand Burnt Cherry ── */
    .member-hero {
        background: linear-gradient(135deg, #7A2B4A 0%, #5A1F37 60%, #1C1C1C 100%);
        border-radius: 22px;
        padding: 2rem;
        margin-bottom: 1.25rem;
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 2.25rem;
        align-items: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 16px 40px rgba(122, 43, 74, 0.30);
    }
    .member-hero::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(238,78,139,0.32) 0%, transparent 70%);
        pointer-events: none;
    }
    .member-hero::after {
        content: '';
        position: absolute;
        bottom: -50px; left: -50px;
        width: 180px; height: 180px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(244,201,223,0.18) 0%, transparent 70%);
        pointer-events: none;
    }

    /* QR card */
    .qr-card {
        background: #FCF9F2;
        border: 1px solid rgba(244,201,223,0.5);
        border-radius: 18px;
        padding: 1.25rem;
        text-align: center;
        position: relative;
        z-index: 2;
        box-shadow: 0 8px 24px rgba(28,28,28,0.18);
        cursor: pointer;
        transition: transform .25s, box-shadow .25s;
    }
    .qr-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 32px rgba(28,28,28,0.22);
    }
    .qr-card img {
        display: block;
        margin: 0 auto;
        border-radius: 10px;
        background: #FFFFFF;
        padding: 0.5rem;
    }
    .qr-card-id {
        margin-top: 0.85rem;
        padding-top: 0.85rem;
        border-top: 1px solid rgba(244,201,223,0.7);
    }
    .qr-card-id .label {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 0.62rem;
        font-weight: 700;
        color: rgba(28,28,28,0.55);
        text-transform: uppercase;
        letter-spacing: 0.16em;
    }
    .qr-card-id .value {
        font-family: 'JetBrains Mono', monospace;
        font-size: 1.1rem;
        font-weight: 800;
        color: #7A2B4A;
        margin-top: 0.35rem;
    }
    .qr-tap-hint {
        margin-top: 0.5rem;
        font-size: 0.62rem;
        color: rgba(28,28,28,0.45);
    }

    /* Avatar bulat di hero (replace inisial) */
    .member-info { position: relative; z-index: 2; }
    .member-avatar-wrap {
        position: relative;
        width: 72px; height: 72px;
        margin-bottom: 1rem;
    }
    .member-avatar {
        width: 100%; height: 100%;
        border-radius: 18px;
        background: linear-gradient(135deg, #EE4E8B 0%, #7A2B4A 100%);
        display: flex; align-items: center; justify-content: center;
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 1.85rem; font-weight: 800;
        color: #FFFFFF;
        box-shadow: 0 6px 18px rgba(238, 78, 139, 0.45);
        border: 2px solid rgba(252, 249, 242, 0.25);
        overflow: hidden;
    }
    .member-avatar img {
        width: 100%; height: 100%; object-fit: cover;
    }
    .avatar-edit-btn {
        position: absolute;
        bottom: -4px; right: -4px;
        width: 28px; height: 28px;
        border-radius: 50%;
        background: #FCF9F2;
        border: 2px solid #7A2B4A;
        color: #7A2B4A;
        cursor: pointer;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.7rem;
        transition: background .15s, transform .15s;
    }
    .avatar-edit-btn:hover { background: #F4C9DF; transform: scale(1.08); }

    .member-info .name {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 1.6rem;
        font-weight: 800;
        color: #FCF9F2;
        margin-bottom: 0.3rem;
        letter-spacing: -0.005em;
    }
    .member-info .email {
        font-size: 0.85rem;
        color: rgba(244, 201, 223, 0.85);
        margin-bottom: 1.1rem;
    }
    .member-info .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.65rem;
        margin-bottom: 0.75rem;
    }
    .detail-item {
        background: rgba(252, 249, 242, 0.10);
        border: 1px solid rgba(252, 249, 242, 0.18);
        border-radius: 12px;
        padding: 0.7rem 0.85rem;
        backdrop-filter: blur(8px);
    }
    .detail-item .dlabel {
        font-size: 0.65rem;
        font-weight: 700;
        color: rgba(244, 201, 223, 0.85);
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 0.3rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .detail-item .dvalue {
        font-size: 0.92rem;
        font-weight: 700;
        color: #FCF9F2;
        line-height: 1.2;
    }
    .qr-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 0.72rem;
        font-weight: 700;
        margin-top: 0.5rem;
        letter-spacing: 0.05em;
    }
    .qr-badge.active {
        background: rgba(26, 122, 94, 0.18);
        color: #C5D79B;
        border: 1px solid rgba(26, 122, 94, 0.4);
    }
    .qr-badge.inactive {
        background: rgba(238, 78, 139, 0.15);
        color: #F4C9DF;
        border: 1px solid rgba(238, 78, 139, 0.4);
    }
    .qr-badge .dot {
        width: 7px; height: 7px; border-radius: 50%;
        background: currentColor;
        animation: pulse-dot 1.6s ease-in-out infinite;
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%      { opacity: 0.45; transform: scale(1.25); }
    }

    /* ── Renewal banner ── */
    .renewal-banner {
        background: linear-gradient(90deg, #F4C9DF 0%, #FAE0EE 100%);
        border: 1px solid #EE4E8B;
        border-radius: 14px;
        padding: 0.95rem 1.1rem;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .renewal-banner .rb-text {
        font-size: 0.88rem;
        color: #7A2B4A;
        flex: 1;
        min-width: 220px;
    }
    .renewal-banner .rb-text strong { color: #5A1F37; }
    .renewal-banner .rb-cta {
        background: #EE4E8B;
        color: #FFFFFF;
        font-family: 'Nord','Poppins',sans-serif;
        font-weight: 700;
        font-size: 0.78rem;
        padding: 0.55rem 1rem;
        border-radius: 10px;
        text-decoration: none;
        white-space: nowrap;
        transition: background .15s, transform .15s;
    }
    .renewal-banner .rb-cta:hover { background: #7A2B4A; transform: translateY(-1px); color: #fff; }

    /* ── Stats cards ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-bottom: 1.25rem;
    }
    .stat-card {
        background: #FFFFFF;
        border: 1px solid rgba(244, 201, 223, 0.6);
        border-radius: 16px;
        padding: 1.25rem;
        position: relative;
        overflow: hidden;
        transition: transform .2s, box-shadow .2s;
        box-shadow: 0 2px 8px rgba(122, 43, 74, 0.05);
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 22px rgba(122, 43, 74, 0.10);
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
    }
    .stat-card.sc-pink::before  { background: #EE4E8B; }
    .stat-card.sc-green::before { background: #1A7A5E; }
    .stat-card.sc-amber::before { background: #C5D79B; }

    .stat-card .sc-icon {
        width: 42px; height: 42px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.05rem;
        margin-bottom: 0.85rem;
    }
    .stat-card.sc-pink  .sc-icon { background: rgba(238, 78, 139, 0.12); color: #EE4E8B; }
    .stat-card.sc-green .sc-icon { background: rgba(26, 122, 94, 0.12); color: #1A7A5E; }
    .stat-card.sc-amber .sc-icon { background: rgba(197, 215, 155, 0.30); color: #1D5A4B; }

    .stat-card .sc-label {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 0.7rem;
        font-weight: 700;
        color: rgba(28,28,28,0.55);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 0.4rem;
    }
    .stat-card .sc-value {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 1.65rem;
        font-weight: 800;
        color: #1C1C1C;
        line-height: 1;
        letter-spacing: -0.01em;
    }
    .stat-card .sc-sub {
        font-size: 0.75rem;
        color: rgba(28,28,28,0.55);
        margin-top: 0.5rem;
    }
    .stat-card .quota-bar {
        height: 6px;
        background: #F4C9DF;
        border-radius: 999px;
        margin-top: 0.85rem;
        overflow: hidden;
    }
    .stat-card .quota-bar-fill {
        height: 100%;
        border-radius: 999px;
        transition: width .6s ease;
    }

    /* ── Content cards ── */
    .content-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
        margin-bottom: 1.25rem;
    }
    .content-card {
        background: #FFFFFF;
        border: 1px solid rgba(244, 201, 223, 0.6);
        border-radius: 16px;
        padding: 1.25rem 1.4rem;
        box-shadow: 0 2px 8px rgba(122, 43, 74, 0.05);
    }
    .cc-title {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 0.95rem;
        font-weight: 700;
        color: #7A2B4A;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 1rem;
    }
    .cc-title i { font-size: 1rem; color: #EE4E8B; }

    /* QR action buttons */
    .qr-actions { display: flex; flex-direction: column; gap: 0.5rem; }
    .qr-action-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0.8rem 1rem;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        font-size: 0.85rem;
        font-weight: 600;
        transition: background .15s, transform .12s, box-shadow .15s;
        text-decoration: none;
        width: 100%;
        text-align: left;
    }
    .qr-action-btn:active { transform: scale(0.99); }
    .qr-action-btn i { width: 20px; text-align: center; }

    .qr-action-btn.btn-download { background: #1C1C1C; color: #FCF9F2; }
    .qr-action-btn.btn-download:hover { background: #000; }

    .qr-action-btn.btn-print { background: #EE4E8B; color: #FFFFFF; box-shadow: 0 4px 10px rgba(238, 78, 139, 0.28); }
    .qr-action-btn.btn-print:hover { background: #7A2B4A; }

    .qr-action-btn.btn-regen { background: #FCF9F2; color: #7A2B4A; border: 1px solid #F4C9DF; }
    .qr-action-btn.btn-regen:hover { background: #F4C9DF; }

    .qr-action-btn.btn-disable { background: #FFF0F2; color: #B22336; border: 1px solid #FAD0D5; }
    .qr-action-btn.btn-disable:hover { background: #FFE5E9; }

    .qr-action-btn.btn-generate {
        background: linear-gradient(135deg, #EE4E8B 0%, #7A2B4A 100%);
        color: #FFFFFF;
        justify-content: center;
        padding: 0.95rem 1rem;
        box-shadow: 0 6px 14px rgba(238, 78, 139, 0.32);
    }

    .info-tip {
        background: rgba(244, 201, 223, 0.35);
        border-left: 3px solid #EE4E8B;
        border-radius: 0 10px 10px 0;
        padding: 0.7rem 0.9rem;
        font-size: 0.78rem;
        color: #7A2B4A;
        display: flex;
        gap: 8px;
        align-items: flex-start;
        margin-top: 0.85rem;
    }

    /* ── Quick links ── */
    .quick-links { display: grid; grid-template-columns: 1fr 1fr; gap: 0.6rem; }
    .quick-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0.75rem 0.85rem;
        background: #FCF9F2;
        border: 1px solid #F4C9DF;
        border-radius: 12px;
        text-decoration: none;
        color: #1C1C1C;
        transition: background .15s, border-color .15s, transform .15s;
        font-size: 0.82rem;
        font-weight: 600;
    }
    .quick-link:hover {
        background: #F4C9DF;
        border-color: #EE4E8B;
        transform: translateX(2px);
        color: #7A2B4A;
    }
    .quick-link .ql-icon {
        width: 32px; height: 32px;
        border-radius: 8px;
        background: rgba(238,78,139,0.12);
        color: #EE4E8B;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .quick-link .ql-arrow { margin-left: auto; color: rgba(28,28,28,0.4); }

    /* ── Settings rows (toggles) ── */
    .setting-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.7rem 0;
        border-bottom: 1px solid rgba(244, 201, 223, 0.5);
    }
    .setting-row:last-child { border-bottom: none; }
    .setting-row-info { padding-right: 1rem; flex: 1; min-width: 0; }
    .setting-row-info .sr-title { font-size: 0.85rem; font-weight: 600; color: #1C1C1C; }
    .setting-row-info .sr-sub   { font-size: 0.74rem; color: rgba(28,28,28,0.55); margin-top: 2px; }

    /* Toggle switch */
    .toggle {
        position: relative;
        width: 42px; height: 24px;
        flex-shrink: 0;
    }
    .toggle input { opacity: 0; width: 0; height: 0; }
    .toggle .slider {
        position: absolute;
        cursor: pointer;
        inset: 0;
        background-color: #E5C7C7;
        transition: 0.3s;
        border-radius: 999px;
    }
    .toggle .slider::before {
        position: absolute;
        content: "";
        height: 18px; width: 18px;
        left: 3px; bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
        box-shadow: 0 1px 3px rgba(0,0,0,0.15);
    }
    .toggle input:checked + .slider { background-color: #EE4E8B; }
    .toggle input:checked + .slider::before { transform: translateX(18px); }

    /* Login history list */
    .lh-list { display: flex; flex-direction: column; gap: 0.6rem; }
    .lh-item {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        padding: 0.6rem 0.8rem;
        background: #FCF9F2;
        border: 1px solid rgba(244, 201, 223, 0.5);
        border-radius: 10px;
    }
    .lh-icon {
        width: 32px; height: 32px;
        border-radius: 8px;
        background: rgba(122, 43, 74, 0.10);
        color: #7A2B4A;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 0.85rem;
    }
    .lh-info { flex: 1; min-width: 0; }
    .lh-info .lh-title { font-size: 0.82rem; font-weight: 600; color: #1C1C1C; }
    .lh-info .lh-sub   { font-size: 0.72rem; color: rgba(28,28,28,0.55); margin-top: 1px; }
    .lh-time { font-size: 0.7rem; color: rgba(28,28,28,0.5); white-space: nowrap; }

    /* Danger button (logout all) */
    .btn-danger-outline {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 0.6rem 1rem;
        border: 1px solid #B22336;
        color: #B22336;
        background: transparent;
        border-radius: 10px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 0.8rem;
        cursor: pointer;
        margin-top: 0.85rem;
        transition: background .15s;
    }
    .btn-danger-outline:hover { background: #FFF0F2; }

    /* ─── Modal generic ─── */
    .ftm-modal-overlay {
        position: fixed; inset: 0;
        background: rgba(28, 28, 28, 0.55);
        backdrop-filter: blur(6px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        padding: 1rem;
    }
    .ftm-modal-overlay.open { display: flex; }
    .ftm-modal-box {
        background: #FCF9F2;
        border: 1px solid #F4C9DF;
        border-radius: 18px;
        max-width: 460px;
        width: 100%;
        padding: 1.5rem;
        position: relative;
        box-shadow: 0 20px 50px rgba(122, 43, 74, 0.25);
        animation: ftmScale 0.25s cubic-bezier(0.16,1,0.3,1) forwards;
    }
    @keyframes ftmScale {
        from { opacity: 0; transform: scale(0.92); }
        to   { opacity: 1; transform: scale(1); }
    }
    .ftm-modal-close {
        position: absolute;
        top: 12px; right: 12px;
        width: 30px; height: 30px;
        border-radius: 999px;
        border: 1px solid #F4C9DF;
        background: transparent;
        color: #7A2B4A;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background .15s, transform .15s;
    }
    .ftm-modal-close:hover { background: #F4C9DF; transform: rotate(90deg); }
    .ftm-modal-title {
        font-family: 'Nord','Poppins',sans-serif;
        font-weight: 800;
        font-size: 1.1rem;
        color: #7A2B4A;
        margin: 0 0 0.4rem;
    }
    .ftm-modal-sub {
        font-size: 0.82rem;
        color: rgba(28,28,28,0.6);
        margin: 0 0 1.2rem;
    }
    .ftm-form-group { margin-bottom: 0.85rem; }
    .ftm-form-group label {
        display: block;
        font-size: 0.75rem;
        font-weight: 600;
        color: rgba(28,28,28,0.7);
        margin-bottom: 0.35rem;
    }
    .ftm-input {
        width: 100%;
        padding: 0.7rem 0.85rem;
        border: 1px solid #F4C9DF;
        border-radius: 10px;
        background: #FFFFFF;
        font-family: 'Poppins', sans-serif;
        font-size: 0.88rem;
        color: #1C1C1C;
        transition: border-color .15s, box-shadow .15s;
    }
    .ftm-input:focus {
        outline: none;
        border-color: #EE4E8B;
        box-shadow: 0 0 0 3px rgba(238, 78, 139, 0.15);
    }
    .ftm-form-error {
        color: #B22336;
        font-size: 0.72rem;
        margin-top: 0.3rem;
    }
    .ftm-modal-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1.25rem;
    }
    .btn-cancel {
        flex: 1;
        padding: 0.7rem;
        border-radius: 10px;
        border: 1px solid #F4C9DF;
        background: transparent;
        color: #7A2B4A;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-cancel:hover { background: #F4C9DF; }
    .btn-submit {
        flex: 1;
        padding: 0.7rem;
        border-radius: 10px;
        border: none;
        background: #EE4E8B;
        color: #FFFFFF;
        font-family: 'Nord','Poppins',sans-serif;
        font-weight: 700;
        cursor: pointer;
        transition: background .15s;
    }
    .btn-submit:hover:not(:disabled) { background: #7A2B4A; }
    .btn-submit:disabled { opacity: 0.55; cursor: not-allowed; }

    /* QR preview modal */
    .qr-preview-overlay {
        position: fixed; inset: 0;
        background: rgba(28, 28, 28, 0.75);
        backdrop-filter: blur(8px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 100;
        padding: 1rem;
    }
    .qr-preview-overlay.open { display: flex; }
    .qr-preview-card {
        position: relative;
        width: 100%;
        max-width: 380px;
        animation: ftmScale 0.3s ease-out forwards;
    }
    .qp-close {
        position: absolute;
        top: -14px; right: -14px;
        width: 38px; height: 38px;
        background: #1C1C1C;
        border: 1px solid rgba(252, 249, 242, 0.2);
        border-radius: 50%;
        cursor: pointer;
        color: #FCF9F2;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 20;
    }
    .qp-close:hover { background: #7A2B4A; }
    .qp-inner {
        background: #FCF9F2;
        border-radius: 22px;
        padding: 1.75rem;
        position: relative;
        overflow: hidden;
        border: 1px solid #F4C9DF;
    }
    .qp-inner::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 180px; height: 180px;
        border-radius: 50%;
        background: rgba(238, 78, 139, 0.18);
    }
    .qp-header { text-align: center; margin-bottom: 1.25rem; position: relative; z-index: 1; }
    .qp-header .qp-brand {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 0.6rem;
        font-weight: 800;
        letter-spacing: 0.32em;
        color: #EE4E8B;
        text-transform: uppercase;
    }
    .qp-header .qp-title {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 1.15rem;
        font-weight: 800;
        color: #7A2B4A;
        letter-spacing: 0.08em;
        margin-top: 0.15rem;
    }
    .qp-qr-wrap { display: flex; justify-content: center; margin-bottom: 1.1rem; position: relative; z-index: 1; }
    .qp-qr-box {
        background: #FFFFFF;
        border-radius: 14px;
        padding: 1rem;
        box-shadow: 0 4px 14px rgba(122, 43, 74, 0.12);
        border: 1px solid #F4C9DF;
    }
    .qp-qr-box img { display: block; width: 220px; height: 220px; }
    .qp-member-info { text-align: center; position: relative; z-index: 1; margin-bottom: 1rem; }
    .qp-name { font-size: 1.05rem; font-weight: 700; color: #1C1C1C; }
    .qp-id   { font-family: 'JetBrains Mono', monospace; font-size: 0.82rem; color: #7A2B4A; font-weight: 700; margin-top: 2px; }
    .qp-status { text-align: center; margin-top: 0.75rem; position: relative; z-index: 1; }
    .qp-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(26, 122, 94, 0.12);
        color: #1A7A5E;
        padding: 5px 14px;
        border-radius: 999px;
        font-size: 0.7rem;
        font-weight: 700;
        border: 1px solid rgba(26, 122, 94, 0.3);
    }
    .qp-status-badge .qp-dot { width: 6px; height: 6px; border-radius: 50%; background: #1A7A5E; animation: pulse-dot 1.6s infinite; }

    /* Print modal */
    .print-member-card {
        background: linear-gradient(135deg, #7A2B4A 0%, #5A1F37 100%);
        border-radius: 14px;
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 1rem;
        position: relative;
        overflow: hidden;
    }
    .print-member-card::before {
        content: ''; position: absolute; top: -40px; right: -40px;
        width: 110px; height: 110px; border-radius: 50%;
        background: rgba(238, 78, 139, 0.18);
    }
    .print-member-card .brand {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 0.6rem;
        font-weight: 800;
        letter-spacing: 0.25em;
        color: #F4C9DF;
        text-transform: uppercase;
        position: relative;
    }
    .print-member-card .card-type {
        font-family: 'Nord','Poppins',sans-serif;
        font-size: 0.9rem;
        font-weight: 800;
        color: #FCF9F2;
        letter-spacing: 0.06em;
        margin-bottom: 1rem;
        position: relative;
    }
    .print-member-card .qr-wrap {
        background: #FFFFFF;
        border-radius: 10px;
        padding: 0.6rem;
        display: inline-block;
        margin-bottom: 0.85rem;
        position: relative;
    }
    .print-member-card .pmname {
        font-size: 0.9rem;
        font-weight: 700;
        color: #FCF9F2;
        position: relative;
    }
    .print-member-card .pmid {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.72rem;
        color: rgba(244, 201, 223, 0.85);
        margin-top: 2px;
        position: relative;
    }
    .btn-print-now {
        width: 100%;
        padding: 0.8rem;
        border-radius: 12px;
        border: none;
        background: #EE4E8B;
        color: #FFFFFF;
        font-family: 'Nord','Poppins',sans-serif;
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        transition: background .15s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .btn-print-now:hover { background: #7A2B4A; }

    /* Toast */
    .toast-stack {
        position: fixed;
        top: 20px; right: 20px;
        z-index: 2000;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        max-width: 360px;
    }
    .toast {
        background: #FFFFFF;
        border-left: 4px solid #EE4E8B;
        border-radius: 10px;
        padding: 0.85rem 1rem;
        box-shadow: 0 8px 22px rgba(122, 43, 74, 0.15);
        display: flex;
        align-items: flex-start;
        gap: 0.6rem;
        animation: toastIn 0.3s ease-out;
        min-width: 260px;
    }
    .toast.success { border-left-color: #1A7A5E; }
    .toast.error   { border-left-color: #B22336; }
    .toast i { font-size: 1.05rem; flex-shrink: 0; margin-top: 2px; }
    .toast.success i { color: #1A7A5E; }
    .toast.error i   { color: #B22336; }
    .toast.info i    { color: #EE4E8B; }
    .toast .t-body { flex: 1; min-width: 0; }
    .toast .t-title { font-weight: 700; font-size: 0.85rem; color: #1C1C1C; }
    .toast .t-msg   { font-size: 0.78rem; color: rgba(28,28,28,0.65); margin-top: 2px; }
    @keyframes toastIn {
        from { opacity: 0; transform: translateX(20px); }
        to   { opacity: 1; transform: translateX(0); }
    }

    /* Sidebar mobile */
    .hamburger-btn { display: none !important; }
    .sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(28, 28, 28, 0.5);
        z-index: 20;
        backdrop-filter: blur(4px);
    }
    .sidebar-overlay.active { display: block; }

    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            left: 0; top: 0;
            height: 100vh;
            z-index: 30;
            transform: translateX(-100%);
            box-shadow: 4px 0 12px rgba(0,0,0,0.15);
            transition: transform .3s ease;
        }
        .sidebar.open { transform: translateX(0); }
        .hamburger-btn { display: flex !important; }
        body.sidebar-open { overflow: hidden; }
        .acct-main { margin-top: 3rem; padding: 1.25rem !important; overflow-x: hidden; }
        .acct-header h1 { font-size: 1.35rem !important; }
        .member-hero {
            grid-template-columns: 1fr !important;
            gap: 1.5rem !important;
            padding: 1.5rem !important;
        }
        .member-hero::before { width: 140px !important; height: 140px !important; top: -50px !important; right: -50px !important; }
        .qr-card img { max-width: 100%; height: auto; }
        .member-info { text-align: center; }
        .member-avatar-wrap { margin: 0 auto 1rem !important; }
        .member-info .name { font-size: 1.4rem !important; }
        .member-info .detail-grid { grid-template-columns: 1fr !important; }
        .stats-grid { grid-template-columns: 1fr !important; }
        .content-grid { grid-template-columns: 1fr !important; }
        .quick-links { grid-template-columns: 1fr !important; }
    }

    @keyframes spin { to { transform: rotate(360deg); } }
    .spin { animation: spin 1s linear infinite; }

    @media print {
        body > *:not(#print-modal) { display: none; }
        #print-modal { display: block !important; position: static; background: none; }
        .ftm-modal-box { box-shadow: none; border: none; }
        .ftm-modal-close, button { display: none !important; }
    }
</style>

<div style="display:flex; height:100vh;">
    @include('partials.member-sidebar')

    <div id="sidebar-overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>
    <button id="hamburger-btn" class="hamburger-btn fixed top-4 left-4 z-30 w-10 h-10 bg-[#7A2B4A] text-white rounded-lg items-center justify-center shadow-lg hover:bg-[#EE4E8B] transition" onclick="toggleSidebar()" type="button">
        <i class="fas fa-bars text-lg"></i>
    </button>

    <main class="acct-main" style="flex:1; overflow-y:auto; padding: 2rem 2.5rem;">
        <div class="acct-container">

            {{-- ── Page header ── --}}
            <div class="acct-header">
                <h1><i class="fas fa-user-circle" style="color:#EE4E8B; margin-right:8px;"></i>My Profile</h1>
                <p>Kelola informasi akun, QR code, dan preferensi notifikasi</p>
            </div>

            {{-- ── Renewal banner kalau paket mau expire dalam 7 hari ── --}}
            @if($activeOrder && $activeOrder->expired_at && \Carbon\Carbon::parse($activeOrder->expired_at)->diffInDays(now(), false) >= -7 && \Carbon\Carbon::parse($activeOrder->expired_at)->isFuture())
                @php $daysLeft = (int) now()->diffInDays(\Carbon\Carbon::parse($activeOrder->expired_at), false); @endphp
                <div class="renewal-banner">
                    <div class="rb-text">
                        <i class="fas fa-clock" style="margin-right:6px;color:#EE4E8B;"></i>
                        Paket Anda akan berakhir dalam <strong>{{ $daysLeft }} hari</strong>. Perpanjang sekarang untuk lanjut tanpa jeda.
                    </div>
                    <a href="{{ route('home') }}#packages" class="rb-cta">Perpanjang Paket</a>
                </div>
            @endif

            {{-- ══════════════════════════════════════
                 HERO MEMBER CARD
            ══════════════════════════════════════ --}}
            <div class="member-hero">
                {{-- QR Card --}}
                <div class="qr-card" onclick="openQRPreview()" title="Click to enlarge">
                    <div id="qr-container">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode($qrData) }}&bgcolor=ffffff&color=7A2B4A"
                             alt="QR Code" style="width:180px; height:180px;">
                    </div>
                    <div class="qr-card-id">
                        <div class="label">Member ID</div>
                        <div class="value">#{{ $memberId }}</div>
                    </div>
                    <div class="qr-tap-hint"><i class="fas fa-expand-alt" style="margin-right:3px;"></i>Tap to enlarge</div>
                </div>

                {{-- Member info --}}
                <div class="member-info">
                    <div class="member-avatar-wrap">
                        <div class="member-avatar" id="memberAvatar">
                            @if($hasAvatar)
                                <img src="{{ $avatarUrl }}" alt="Avatar" id="memberAvatarImg">
                            @else
                                <span id="memberAvatarLetter">{{ strtoupper(substr($member->name, 0, 1)) }}</span>
                            @endif
                        </div>
                        <button type="button" class="avatar-edit-btn" onclick="document.getElementById('avatarInput').click()" title="Ganti foto">
                            <i class="fas fa-camera"></i>
                        </button>
                        <input type="file" id="avatarInput" accept="image/*" style="display:none;" onchange="uploadAvatar(this)">
                    </div>

                    <div class="name" id="memberNameLabel">{{ $member->name }}</div>
                    <div class="email">{{ $member->email }}</div>

                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="dlabel"><i class="fas fa-phone"></i> Phone</div>
                            <div class="dvalue" id="memberPhoneLabel">{{ $member->phone_number ?? '—' }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="dlabel"><i class="fas fa-calendar"></i> Member Since</div>
                            <div class="dvalue">{{ $member->created_at->format('d M Y') }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="dlabel"><i class="fas fa-id-badge"></i> Member ID</div>
                            <div class="dvalue" style="font-family:'JetBrains Mono',monospace;">#{{ $memberId }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="dlabel"><i class="fas fa-qrcode"></i> QR Status</div>
                            <div class="dvalue">{{ $member->qr_active ? 'Active' : 'Inactive' }}</div>
                        </div>
                    </div>

                    @if($member->qr_active)
                        <span class="qr-badge active"><span class="dot"></span> QR Code Active</span>
                    @else
                        <span class="qr-badge inactive"><span class="dot"></span> QR Code Inactive</span>
                    @endif
                </div>
            </div>

            {{-- ══════════════════════════════════════
                 STATS
            ══════════════════════════════════════ --}}
            <div class="stats-grid">
                <div class="stat-card sc-pink">
                    <div class="sc-icon"><i class="fas fa-box-open"></i></div>
                    <div class="sc-label">Active Packages</div>
                    <div class="sc-value">{{ $member->orders()->whereIn('status', ['active', 'paid'])->count() }}</div>
                </div>
                <div class="stat-card sc-green">
                    <div class="sc-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="sc-label">Total Attendances</div>
                    <div class="sc-value">{{ $member->attendances()->count() }}</div>
                </div>
                <div class="stat-card sc-amber">
                    <div class="sc-icon"><i class="fas fa-ticket-alt"></i></div>
                    <div class="sc-label">Remaining Quota</div>
                    @if($activeOrder)
                        @php
                            $remaining = $activeOrder->remaining_quota ?? 0;
                            $total = $activeOrder->package->quota ?? 0;
                            $pct = $total > 0 ? round(($remaining / $total) * 100) : 0;
                            $barColor = $pct > 50 ? '#1A7A5E' : ($pct > 20 ? '#EE4E8B' : '#B22336');
                        @endphp
                        <div class="sc-value">{{ $remaining }}</div>
                        <div class="sc-sub">of {{ $total }} total</div>
                        <div class="quota-bar"><div class="quota-bar-fill" style="width:{{ $pct }}%; background:{{ $barColor }};"></div></div>
                    @else
                        <div class="sc-value" style="font-size:1rem; color:rgba(28,28,28,0.5);">No package</div>
                    @endif
                </div>
            </div>

            {{-- ══════════════════════════════════════
                 QR ACTIONS + QUICK LINKS
            ══════════════════════════════════════ --}}
            <div class="content-grid">
                {{-- QR Actions --}}
                <div class="content-card">
                    <div class="cc-title"><i class="fas fa-qrcode"></i> QR Code Actions</div>
                    <div class="qr-actions">
                        @if($member->qr_token && $member->qr_active)
                            <button onclick="downloadQR()" class="qr-action-btn btn-download" type="button">
                                <i class="fas fa-download"></i> Download QR Code
                            </button>
                            <button onclick="printQR()" class="qr-action-btn btn-print" type="button">
                                <i class="fas fa-print"></i> Print Member Card
                            </button>
                            <button onclick="regenerateQR(event)" class="qr-action-btn btn-regen" type="button">
                                <i class="fas fa-sync-alt"></i> Regenerate QR Code
                            </button>
                            <button onclick="disableQR(event)" class="qr-action-btn btn-disable" type="button">
                                <i class="fas fa-ban"></i> Disable QR Code
                            </button>
                        @else
                            <button onclick="generateQR(event)" class="qr-action-btn btn-generate" type="button">
                                <i class="fas fa-qrcode"></i> Generate QR Code
                            </button>
                        @endif
                    </div>
                    <div class="info-tip">
                        <i class="fas fa-info-circle"></i>
                        <span>Tunjukkan QR code di pintu masuk gym untuk check-in. Staff akan scan otomatis.</span>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div class="content-card">
                    <div class="cc-title"><i class="fas fa-link"></i> Akses Cepat</div>
                    <div class="quick-links">
                        <a href="{{ route('member.dashboard') }}" class="quick-link">
                            <span class="ql-icon"><i class="fas fa-home"></i></span>
                            Dashboard
                            <i class="fas fa-arrow-right ql-arrow"></i>
                        </a>
                        <a href="{{ url('/member/my-packages') }}" class="quick-link">
                            <span class="ql-icon"><i class="fas fa-box"></i></span>
                            My Packages
                            <i class="fas fa-arrow-right ql-arrow"></i>
                        </a>
                        <a href="{{ url('/member/book-class') }}" class="quick-link">
                            <span class="ql-icon"><i class="fas fa-calendar-plus"></i></span>
                            Book Class
                            <i class="fas fa-arrow-right ql-arrow"></i>
                        </a>
                        <a href="{{ url('/member/my-classes') }}" class="quick-link">
                            <span class="ql-icon"><i class="fas fa-dumbbell"></i></span>
                            My Classes
                            <i class="fas fa-arrow-right ql-arrow"></i>
                        </a>
                        <a href="{{ url('/member/transactions') }}" class="quick-link">
                            <span class="ql-icon"><i class="fas fa-receipt"></i></span>
                            Transactions
                            <i class="fas fa-arrow-right ql-arrow"></i>
                        </a>
                        <a href="{{ route('member.attendance') }}" class="quick-link">
                            <span class="ql-icon"><i class="fas fa-calendar-check"></i></span>
                            Attendance
                            <i class="fas fa-arrow-right ql-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- ══════════════════════════════════════
                 ACCOUNT SETTINGS + EMERGENCY CONTACT
            ══════════════════════════════════════ --}}
            <div class="content-grid">
                {{-- Account Settings --}}
                <div class="content-card">
                    <div class="cc-title"><i class="fas fa-user-cog"></i> Pengaturan Akun</div>

                    <div class="setting-row">
                        <div class="setting-row-info">
                            <div class="sr-title">Edit Profil</div>
                            <div class="sr-sub">Ubah nama dan nomor HP</div>
                        </div>
                        <button class="btn-cancel" style="flex:0; padding: 0.5rem 0.85rem;" onclick="openModal('editProfileModal')" type="button">
                            Edit
                        </button>
                    </div>

                    <div class="setting-row">
                        <div class="setting-row-info">
                            <div class="sr-title">Ubah Password</div>
                            <div class="sr-sub">Update password akun secara berkala</div>
                        </div>
                        <button class="btn-cancel" style="flex:0; padding: 0.5rem 0.85rem;" onclick="openModal('changePasswordModal')" type="button">
                            Ubah
                        </button>
                    </div>

                    <div class="setting-row">
                        <div class="setting-row-info">
                            <div class="sr-title">Foto Profil</div>
                            <div class="sr-sub">{{ $hasAvatar ? 'Foto sudah diunggah' : 'Belum ada foto' }}</div>
                        </div>
                        @if($hasAvatar)
                            <button class="btn-cancel" style="flex:0; padding: 0.5rem 0.85rem; color:#B22336; border-color:#FAD0D5;" onclick="removeAvatar()" type="button">
                                Hapus
                            </button>
                        @else
                            <button class="btn-cancel" style="flex:0; padding: 0.5rem 0.85rem;" onclick="document.getElementById('avatarInput').click()" type="button">
                                Upload
                            </button>
                        @endif
                    </div>

                    <div class="cc-title" style="margin-top: 1.25rem; margin-bottom: 0.85rem;"><i class="fas fa-bell"></i> Notifikasi</div>

                    <div class="setting-row">
                        <div class="setting-row-info">
                            <div class="sr-title">WhatsApp — Booking</div>
                            <div class="sr-sub">Konfirmasi booking kelas via WhatsApp</div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox" id="notifWaBooking" {{ ($member->notify_whatsapp_booking ?? true) ? 'checked' : '' }} onchange="saveNotifications()">
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="setting-row">
                        <div class="setting-row-info">
                            <div class="sr-title">WhatsApp — Pembayaran</div>
                            <div class="sr-sub">Notifikasi pembayaran berhasil/gagal</div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox" id="notifWaPayment" {{ ($member->notify_whatsapp_payment ?? true) ? 'checked' : '' }} onchange="saveNotifications()">
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="setting-row">
                        <div class="setting-row-info">
                            <div class="sr-title">Email — Promo & Newsletter</div>
                            <div class="sr-sub">Penawaran dan info terbaru via email</div>
                        </div>
                        <label class="toggle">
                            <input type="checkbox" id="notifEmailMarketing" {{ ($member->notify_email_marketing ?? false) ? 'checked' : '' }} onchange="saveNotifications()">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>

                {{-- Login History + Logout All --}}
                <div class="content-card">
                    <div class="cc-title"><i class="fas fa-history"></i> Riwayat Login</div>
                    <div style="font-size: 0.78rem; color: rgba(28,28,28,0.6); margin-bottom: 0.85rem;">
                        5 sesi login terakhir di akun Anda. Pantau kalau ada aktivitas mencurigakan.
                    </div>
                    <div class="lh-list" id="loginHistoryList">
                        <div style="font-size: 0.78rem; color: rgba(28,28,28,0.5); padding: 0.5rem 0;">Memuat riwayat login...</div>
                    </div>

                    <button class="btn-danger-outline" type="button" onclick="logoutAllDevices()">
                        <i class="fas fa-sign-out-alt"></i> Logout dari Semua Perangkat
                    </button>
                </div>
            </div>

        </div>
    </main>
</div>

{{-- ══════════════════════════════════════
     MODALS
══════════════════════════════════════ --}}

{{-- Edit Profile Modal --}}
<div id="editProfileModal" class="ftm-modal-overlay">
    <div class="ftm-modal-box">
        <button type="button" class="ftm-modal-close" onclick="closeModal('editProfileModal')">×</button>
        <h3 class="ftm-modal-title">Edit Profil</h3>
        <p class="ftm-modal-sub">Email tidak dapat diubah. Hubungi support jika perlu mengganti email.</p>
        <form id="formEditProfile" onsubmit="saveProfile(event)">
            <div class="ftm-form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" id="inputName" class="ftm-input" value="{{ $member->name }}" required>
            </div>
            <div class="ftm-form-group">
                <label>Nomor HP</label>
                <input type="tel" name="phone_number" id="inputPhone" class="ftm-input" value="{{ $member->phone_number }}" placeholder="08xxxxxxxxxx">
            </div>
            <div class="ftm-modal-actions">
                <button type="button" class="btn-cancel" onclick="closeModal('editProfileModal')">Batal</button>
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Change Password Modal --}}
<div id="changePasswordModal" class="ftm-modal-overlay">
    <div class="ftm-modal-box">
        <button type="button" class="ftm-modal-close" onclick="closeModal('changePasswordModal')">×</button>
        <h3 class="ftm-modal-title">Ubah Password</h3>
        <p class="ftm-modal-sub">Password minimal 8 karakter. Setelah berhasil, gunakan password baru di login berikutnya.</p>
        <form id="formChangePassword" onsubmit="savePassword(event)">
            <div class="ftm-form-group">
                <label>Password Saat Ini</label>
                <input type="password" name="current_password" class="ftm-input" required>
            </div>
            <div class="ftm-form-group">
                <label>Password Baru</label>
                <input type="password" name="password" class="ftm-input" minlength="8" required>
            </div>
            <div class="ftm-form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="ftm-input" minlength="8" required>
            </div>
            <div class="ftm-modal-actions">
                <button type="button" class="btn-cancel" onclick="closeModal('changePasswordModal')">Batal</button>
                <button type="submit" class="btn-submit">Update Password</button>
            </div>
        </form>
    </div>
</div>

{{-- QR Preview --}}
<div id="qr-preview-overlay" class="qr-preview-overlay">
    <div class="qr-preview-card">
        <button type="button" class="qp-close" onclick="closeQRPreview()">×</button>
        <div class="qp-inner">
            <div class="qp-header">
                <div class="qp-brand">FTM Society</div>
                <div class="qp-title">MEMBER CARD</div>
            </div>
            <div class="qp-qr-wrap">
                <div class="qp-qr-box">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=240x240&data={{ urlencode($qrData) }}&bgcolor=ffffff&color=7A2B4A" alt="QR">
                </div>
            </div>
            <div class="qp-member-info">
                <div class="qp-name">{{ $member->name }}</div>
                <div class="qp-id">Member ID: #{{ $memberId }}</div>
            </div>
            <div class="qp-status">
                <span class="qp-status-badge"><span class="qp-dot"></span> QR Active — Ready to Scan</span>
            </div>
        </div>
    </div>
</div>

{{-- Print modal --}}
<div id="print-modal" class="ftm-modal-overlay">
    <div class="ftm-modal-box">
        <button type="button" class="ftm-modal-close" onclick="closeModal('print-modal')">×</button>
        <h3 class="ftm-modal-title"><i class="fas fa-print" style="color:#EE4E8B; margin-right:6px;"></i>Print Member Card</h3>
        <div class="print-member-card">
            <div class="brand">FTM SOCIETY</div>
            <div class="card-type">MEMBER CARD</div>
            <div class="qr-wrap">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=170x170&data={{ urlencode($qrData) }}&color=7A2B4A" alt="QR" style="width:170px; height:170px; display:block;">
            </div>
            <div class="pmname">{{ $member->name }}</div>
            <div class="pmid">Member ID: #{{ $memberId }}</div>
        </div>
        <button onclick="window.print()" class="btn-print-now" type="button">
            <i class="fas fa-print"></i> Print Sekarang
        </button>
    </div>
</div>

{{-- Toast container --}}
<div class="toast-stack" id="toastStack"></div>

<script>
const csrfToken = '{{ csrf_token() }}';
const ROUTES = {
    qrGenerate:    '{{ route("member.api.qr.generate") }}',
    qrRegenerate:  '{{ route("member.api.qr.regenerate") }}',
    qrDisable:     '{{ route("member.api.qr.disable") }}',
    profileUpdate: '{{ route("member.api.profile.update") }}',
    profileAvatar: '{{ route("member.api.profile.avatar") }}',
    profileAvatarRemove: '{{ route("member.api.profile.avatar.remove") }}',
    profilePassword: '{{ route("member.api.profile.password") }}',
    profileNotifs: '{{ route("member.api.profile.notifications") }}',
    profileLoginHistory: '{{ route("member.api.profile.login-history") }}',
    profileLogoutAll: '{{ route("member.api.profile.logout-all") }}',
};

/* ════════════ TOAST ════════════ */
function toast(title, message = '', type = 'info') {
    const stack = document.getElementById('toastStack');
    const el = document.createElement('div');
    el.className = `toast ${type}`;
    const icon = type === 'success' ? 'fa-check-circle'
              : type === 'error'   ? 'fa-exclamation-circle'
              : 'fa-info-circle';
    el.innerHTML = `<i class="fas ${icon}"></i><div class="t-body"><div class="t-title">${title}</div>${message ? `<div class="t-msg">${message}</div>` : ''}</div>`;
    stack.appendChild(el);
    setTimeout(() => {
        el.style.transition = 'opacity .3s, transform .3s';
        el.style.opacity = '0';
        el.style.transform = 'translateX(20px)';
        setTimeout(() => el.remove(), 320);
    }, 4000);
}

/* ════════════ MODAL HELPERS ════════════ */
function openModal(id) {
    const el = document.getElementById(id);
    if (el) { el.classList.add('open'); document.body.style.overflow = 'hidden'; }
}
function closeModal(id) {
    const el = document.getElementById(id);
    if (el) { el.classList.remove('open'); document.body.style.overflow = ''; }
}
function openQRPreview()   { document.getElementById('qr-preview-overlay').classList.add('open'); document.body.style.overflow = 'hidden'; }
function closeQRPreview()  { document.getElementById('qr-preview-overlay').classList.remove('open'); document.body.style.overflow = ''; }
function printQR()         { openModal('print-modal'); }

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        ['editProfileModal','changePasswordModal','print-modal'].forEach(closeModal);
        closeQRPreview();
    }
});
document.querySelectorAll('.ftm-modal-overlay, .qr-preview-overlay').forEach(o => {
    o.addEventListener('click', e => {
        if (e.target === o) {
            o.classList.remove('open');
            document.body.style.overflow = '';
        }
    });
});

/* ════════════ FETCH HELPER ════════════ */
async function postJSON(url, payload = null, isFormData = false) {
    const opts = {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
        },
        credentials: 'include',
    };
    if (isFormData) {
        opts.body = payload;
    } else if (payload) {
        opts.headers['Content-Type'] = 'application/json';
        opts.body = JSON.stringify(payload);
    }
    const res = await fetch(url, opts);
    let data = {};
    try { data = await res.json(); } catch (_) {}
    return { ok: res.ok, status: res.status, data };
}

/* ════════════ QR ACTIONS ════════════ */
async function generateQR(ev) {
    if (ev) setLoading(ev, 'Generating...');
    const r = await postJSON(ROUTES.qrGenerate);
    if (r.ok && r.data.success) { toast('QR berhasil dibuat', '', 'success'); setTimeout(() => location.reload(), 800); }
    else toast('Gagal membuat QR', r.data.message || 'Coba lagi', 'error');
}
async function regenerateQR(ev) {
    if (!confirm('Ini akan menonaktifkan QR lama Anda. Lanjutkan?')) return;
    if (ev) setLoading(ev, 'Regenerating...');
    const r = await postJSON(ROUTES.qrRegenerate);
    if (r.ok && r.data.success) { toast('QR diregenerasi', '', 'success'); setTimeout(() => location.reload(), 800); }
    else toast('Gagal regenerate', r.data.message || '', 'error');
}
async function disableQR(ev) {
    if (!confirm('Disable QR Code? Anda tidak bisa check-in sampai diaktifkan kembali.')) return;
    if (ev) setLoading(ev, 'Disabling...');
    const r = await postJSON(ROUTES.qrDisable);
    if (r.ok && r.data.success) { toast('QR dinonaktifkan', '', 'success'); setTimeout(() => location.reload(), 800); }
    else toast('Gagal disable', r.data.message || '', 'error');
}
function downloadQR() {
    const img = document.querySelector('#qr-container img');
    if (!img) return toast('QR tidak ditemukan', '', 'error');
    const a = document.createElement('a');
    a.href = img.src;
    a.download = 'ftm-qr-{{ $memberId }}.png';
    a.click();
    toast('QR berhasil diunduh', '', 'success');
}
function setLoading(ev, msg) {
    const btn = ev.target.closest('button');
    if (btn) {
        btn.dataset.original = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = `<i class="fas fa-spinner spin"></i> ${msg}`;
    }
}

/* ════════════ PROFILE EDIT ════════════ */
async function saveProfile(ev) {
    ev.preventDefault();
    const form = ev.target;
    const submitBtn = form.querySelector('button[type=submit]');
    submitBtn.disabled = true; submitBtn.innerHTML = '<i class="fas fa-spinner spin"></i> Menyimpan...';

    const payload = {
        name:  form.name.value.trim(),
        phone_number: form.phone_number.value.trim(),
    };
    const r = await postJSON(ROUTES.profileUpdate, payload);
    submitBtn.disabled = false; submitBtn.innerHTML = 'Simpan';

    if (r.ok && r.data.success) {
        toast('Profil tersimpan', r.data.message, 'success');
        document.getElementById('memberNameLabel').textContent = payload.name;
        document.getElementById('memberPhoneLabel').textContent = payload.phone_number || '—';
        // Update inisial avatar kalau belum ada foto
        const letterEl = document.getElementById('memberAvatarLetter');
        if (letterEl) letterEl.textContent = payload.name.charAt(0).toUpperCase();
        closeModal('editProfileModal');
    } else {
        toast('Gagal menyimpan', r.data.message || 'Cek input Anda', 'error');
    }
}

async function savePassword(ev) {
    ev.preventDefault();
    const form = ev.target;
    const submitBtn = form.querySelector('button[type=submit]');

    if (form.password.value !== form.password_confirmation.value) {
        return toast('Password tidak cocok', 'Konfirmasi password berbeda', 'error');
    }

    submitBtn.disabled = true; submitBtn.innerHTML = '<i class="fas fa-spinner spin"></i> Menyimpan...';
    const payload = {
        current_password: form.current_password.value,
        password: form.password.value,
        password_confirmation: form.password_confirmation.value,
    };
    const r = await postJSON(ROUTES.profilePassword, payload);
    submitBtn.disabled = false; submitBtn.innerHTML = 'Update Password';

    if (r.ok && r.data.success) {
        toast('Password berhasil diubah', '', 'success');
        form.reset();
        closeModal('changePasswordModal');
    } else {
        const msg = r.data?.errors?.current_password?.[0] || r.data.message || 'Cek input';
        toast('Gagal mengubah password', msg, 'error');
    }
}

/* ════════════ AVATAR ════════════ */
async function uploadAvatar(input) {
    const file = input.files[0];
    if (!file) return;
    if (file.size > 2 * 1024 * 1024) return toast('Ukuran terlalu besar', 'Maksimal 2 MB', 'error');

    const fd = new FormData();
    fd.append('avatar', file);
    toast('Mengunggah foto...', '', 'info');

    const r = await postJSON(ROUTES.profileAvatar, fd, true);
    if (r.ok && r.data.success) {
        toast('Foto profil tersimpan', '', 'success');
        const avatarEl = document.getElementById('memberAvatar');
        avatarEl.innerHTML = `<img src="${r.data.data.avatar_url}?t=${Date.now()}" alt="Avatar" id="memberAvatarImg">`;
        setTimeout(() => location.reload(), 600);
    } else {
        toast('Gagal upload', r.data.message || '', 'error');
    }
}

async function removeAvatar() {
    if (!confirm('Hapus foto profil?')) return;
    const r = await postJSON(ROUTES.profileAvatarRemove);
    if (r.ok && r.data.success) {
        toast('Foto profil dihapus', '', 'success');
        setTimeout(() => location.reload(), 600);
    } else {
        toast('Gagal menghapus', r.data.message || '', 'error');
    }
}

/* ════════════ NOTIFICATIONS ════════════ */
let notifTimer = null;
function saveNotifications() {
    clearTimeout(notifTimer);
    notifTimer = setTimeout(async () => {
        const payload = {
            notify_whatsapp_booking: document.getElementById('notifWaBooking').checked,
            notify_whatsapp_payment: document.getElementById('notifWaPayment').checked,
            notify_email_marketing:  document.getElementById('notifEmailMarketing').checked,
        };
        const r = await postJSON(ROUTES.profileNotifs, payload);
        if (r.ok && r.data.success) toast('Preferensi disimpan', '', 'success');
        else toast('Gagal menyimpan preferensi', '', 'error');
    }, 400);
}

/* ════════════ LOGIN HISTORY ════════════ */
async function loadLoginHistory() {
    try {
        const res = await fetch(ROUTES.profileLoginHistory, {
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
            credentials: 'include',
        });
        const data = await res.json();
        const container = document.getElementById('loginHistoryList');
        if (!data.success || !data.data?.logs?.length) {
            container.innerHTML = '<div style="font-size:0.78rem;color:rgba(28,28,28,0.5);padding:0.5rem 0;">Belum ada riwayat login.</div>';
            return;
        }
        const deviceIcon = (d) => d === 'mobile' ? 'fa-mobile-alt' : d === 'tablet' ? 'fa-tablet-alt' : 'fa-desktop';
        container.innerHTML = data.data.logs.map(l => `
            <div class="lh-item">
                <div class="lh-icon"><i class="fas ${deviceIcon((l.device || '').toLowerCase())}"></i></div>
                <div class="lh-info">
                    <div class="lh-title">${l.device || 'Unknown'} — ${l.user_agent || ''}</div>
                    <div class="lh-sub">${l.ip || '—'} · ${l.logged_in_at || ''}</div>
                </div>
                <div class="lh-time">${l.ago || ''}</div>
            </div>
        `).join('');
    } catch (e) {
        document.getElementById('loginHistoryList').innerHTML =
            '<div style="font-size:0.78rem;color:rgba(28,28,28,0.5);padding:0.5rem 0;">Gagal memuat riwayat.</div>';
    }
}

async function logoutAllDevices() {
    if (!confirm('Logout dari semua perangkat? Anda akan diminta login ulang.')) return;
    const r = await postJSON(ROUTES.profileLogoutAll);
    if (r.ok && r.data.success) {
        toast('Berhasil logout', 'Mengarahkan ke halaman login...', 'success');
        setTimeout(() => window.location.href = r.data.data?.redirect || '/member/login', 1200);
    } else {
        toast('Gagal logout', r.data.message || '', 'error');
    }
}

/* ════════════ SIDEBAR MOBILE ════════════ */
function toggleSidebar() {
    const sidebar  = document.getElementById('sidebar');
    const overlay  = document.getElementById('sidebar-overlay');
    const hamburger = document.getElementById('hamburger-btn');
    if (!sidebar) return;
    sidebar.classList.toggle('open');
    overlay.classList.toggle('active');
    if (sidebar.classList.contains('open')) {
        document.body.style.overflow = 'hidden';
        hamburger.innerHTML = '<i class="fas fa-times text-lg"></i>';
    } else {
        document.body.style.overflow = '';
        hamburger.innerHTML = '<i class="fas fa-bars text-lg"></i>';
    }
}
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        const s = document.getElementById('sidebar'), o = document.getElementById('sidebar-overlay'), h = document.getElementById('hamburger-btn');
        s?.classList.remove('open'); o?.classList.remove('active');
        if (h) h.innerHTML = '<i class="fas fa-bars text-lg"></i>';
        document.body.style.overflow = '';
    }
});

/* ════════════ INIT ════════════ */
document.addEventListener('DOMContentLoaded', () => {
    loadLoginHistory();
});
</script>
@endsection
