@extends('layout.public.public')

@push('style')
<style>
    body{
        background-image: url('../profile.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .profile-card {
        background: rgba(30,30,47,0.97);
        color: #fff;
        border-radius: 18px;
        padding: 40px 35px 30px 35px;
        max-width: 800px;
        margin: auto;
        box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255,255,255,0.12);
    }
    .profile-header {
        display: flex;
        align-items: center;
        gap: 28px;
        margin-bottom: 35px;
        border-bottom: 1px solid #333;
        padding-bottom: 24px;
    }
    .profile-header img {
        width: 110px;
        height: 110px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #ff6600;
        box-shadow: 0 2px 12px rgba(255,102,0,0.15);
    }
    .profile-title h2 {
        margin: 0 0 6px 0;
        color: #ff6600;
        font-weight: 700;
        font-size: 2rem;
    }
    .profile-title p {
        margin: 0;
        color: #bbb;
        font-size: 1.1rem;
    }
    .profile-info {
        display: flex;
        flex-wrap: wrap;
        gap: 0 40px;
        margin-top: 18px;
    }
    .profile-info-col {
        flex: 1 1 300px;
    }
    .info-row {
        display: flex;
        margin-bottom: 18px;
    }
    .info-label {
        width: 140px;
        font-weight: 600;
        color: #ffb380;
        flex-shrink: 0;
    }
    .info-value {
        color: #fff;
        font-weight: 400;
    }
    .btn-orange {
        background-color: #ff6600;
        color: white;
        border-radius: 8px;
        padding: 10px 28px;
        font-weight: 600;
        border: none;
        transition: background 0.2s;
    }
    .btn-orange:hover {
        background-color: #e65c00;
    }
    @media (max-width: 700px) {
        .profile-card { padding: 20px 10px; }
        .profile-header { flex-direction: column; align-items: flex-start; gap: 16px; }
        .profile-info { flex-direction: column; gap: 0; }
        .profile-info-col { width: 100%; }
        .info-label { width: 120px; }
    }
</style>
@endpush

@section('content')
<div style="margin-top: 5rem">
    <div class="container py-5">
        <div class="profile-card">
            <div class="profile-header">
               @if (auth()->user()->user_profile->foto)
                    <img src="{{ asset('storage/' . auth()->user()->user_profile->foto) }}" alt="User Photo">
                @elseif (auth()->user()->avatar)
                    <img src="{{ auth()->user()->avatar }}" alt="User Photo">
                @else
                    <img src="https://imgs.search.brave.com/DkxRxFg6OEhXbIGUQg14SHcmtPzWgVOKqolWbV9fESE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9wcmV2/aWV3LnJlZGQuaXQv/aW5zdGFncmFtLWRl/ZmF1bHQtdXNlci1w/cm9maWxlLXBpYy1m/bGlwLWZsb3BzLXYw/LWc5ODNvZmxmZWc0/ZDEuanBnP3dpZHRo/PTI2MiZmb3JtYXQ9/cGpwZyZhdXRvPXdl/YnAmcz1jNmVjMjMw/NTE5OWM2MzNmYzZk/NDYwMjM4ZDA0MDlm/NDE4MTJmZTc1" alt="User Photo">

               @endif
                <div class="profile-title">
                    <h2>{{ auth()->user()->name }}</h2>
                    <p>Siswa SMK</p>
                </div>
            </div>
            <div class="profile-info">
                <div class="profile-info-col">
                    <div class="info-row">
                        <div class="info-label">NIS</div>
                        <div class="info-value">{{ auth()->user()->user_profile->nis ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ auth()->user()->email }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Kelas</div>
                        <div class="info-value">{{ auth()->user()->user_profile->kelas ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Jurusan</div>
                        <div class="info-value">{{ auth()->user()->user_profile->jurusan->nama_jurusan ?? '-' }}</div>
                    </div>
                </div>
                <div class="profile-info-col">
                    <div class="info-row">
                        <div class="info-label">Tgl Lahir</div>
                        <div class="info-value">{{ auth()->user()->user_profile->tgl_lahir ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Asal Sekolah</div>
                        <div class="info-value">{{ auth()->user()->user_profile->sekolah->nama_sekolah ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Telepon</div>
                        <div class="info-value">{{ auth()->user()->user_profile->telepon ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Alamat</div>
                        <div class="info-value">{{ auth()->user()->user_profile->alamat ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="text-end mt-4">
                <a href="{{ route('public.myprofile.edit') }}" class="btn btn-orange">Edit Profil</a>
            </div>
        </div>
    </div>
</div>
@endsection
