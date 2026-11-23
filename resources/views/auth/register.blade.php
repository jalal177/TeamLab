@extends('layouts.auth')

@section('title', 'Registrasi')

@section('content')
<div class="min-h-screen grid lg:grid-cols-2">
    {{-- Panel informasi --}}
    <section class="auth-bg relative hidden min-h-screen items-center justify-center overflow-hidden px-10 py-12 lg:flex">
        <div class="relative z-10 w-full max-w-md text-center">
            <a href="{{ url('/') }}" class="mb-6 inline-flex flex-col items-center" aria-label="TeamLab beranda">
                <img
                src="{{ asset('images/teamlab-logo.png') }}"
                alt="Logo TeamLab"
                class="h-20 w-auto mx-auto object-contain"
                >
            </a>
            <h1 class="mb-5 text-2xl font-extrabold tracking-tight md:text-3xl">Selamat Datang Kembali</h1>
            <p class="mx-auto max-w-sm text-sm leading-6 text-slate-800">
                Platform kolaborasi mahasiswa untuk mencari anggota tim lomba, menampilkan profil skill &amp; portofolio, serta mengelola slot formasi tim secara terstruktur
            </p>
            <ul class="mx-auto mt-6 max-w-sm space-y-3 text-left text-sm font-semibold text-cyan-800">
                <li class="flex items-center gap-2"><span class="text-lg">ⓥ</span> Transparansi skill, level &amp; pengalaman lomba</li>
                <li class="flex items-center gap-2"><span class="text-lg">ⓥ</span> Indikator slot anggota real-time</li>
                <li class="flex items-center gap-2"><span class="text-lg">ⓥ</span> Rekomendasi kandidat berbasis kecocokan skill</li>
            </ul>
        </div>
        <div class="pointer-events-none absolute -left-32 top-10 h-[28rem] w-[28rem] rounded-full bg-white/15 blur-2xl"></div>
        <div class="pointer-events-none absolute -bottom-48 -left-24 h-[34rem] w-[34rem] rounded-full bg-teal-900/10 blur-3xl"></div>
    </section>

    {{-- Form registrasi --}}
    <main class="flex min-h-screen items-center justify-center px-6 py-10 sm:px-10">
        <div class="w-full max-w-4xl">
            <div class="mb-7 lg:hidden">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xl font-extrabold">🧩 Team<span class="text-cyan-700">Lab</span></a>
            </div>
            <h2 class="text-2xl font-extrabold tracking-tight">Registrasi Mahasiswa Baru</h2>
            <p class="mt-2 text-sm text-slate-600">Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold text-teal-600 hover:text-teal-800">Masuk</a>
            </p>

            @if ($errors->any())
                <div class="mt-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <ul class="list-inside list-disc">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="mt-8 grid grid-cols-1 gap-x-4 gap-y-5 md:grid-cols-6">
                @csrf
                <div class="md:col-span-2">
                    <label for="first_name" class="auth-label">Nama Depan</label>
                    <input id="first_name" name="first_name" value="{{ old('first_name') }}" required class="auth-input" placeholder="Andi">
                </div>
                <div class="md:col-span-2">
                    <label for="last_name" class="auth-label">Nama Belakang</label>
                    <input id="last_name" name="last_name" value="{{ old('last_name') }}" required class="auth-input" placeholder="Pratama">
                </div>
                <div class="md:col-span-2">
                    <label for="email" class="auth-label">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" required class="auth-input" placeholder="nama@gmail.com">
                </div>

                <div class="md:col-span-3">
                    <label for="university" class="auth-label">Universitas</label>
                    <select id="university" name="university" required class="auth-input">
                        <option value="">Pilih universitas</option>
                        <option value="Universitas Muria Kudus" @selected(old('university') === 'Universitas Muria Kudus')>Universitas Muria Kudus</option>
                        <option value="Universitas lain" @selected(old('university') === 'Universitas lain')>Universitas lain</option>
                    </select>
                </div>
                <div class="md:col-span-3">
                    <label for="study_program" class="auth-label">Program Studi</label>
                    <select id="study_program" name="study_program" required class="auth-input">
                        <option value="">Pilih program studi</option>
                        @foreach (['Sistem Informasi','Teknik Informatika','Manajemen','Akuntansi','Ilmu Komunikasi','Lainnya'] as $program)
                            <option value="{{ $program }}" @selected(old('study_program') === $program)>{{ $program }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-3">
                    <label for="primary_skill" class="auth-label">Pilih Skill Utama</label>
                    <select id="primary_skill" name="primary_skill" required class="auth-input">
                        <option value="">Pilih skill utama</option>
                        @foreach (['UI/UX','Frontend Developer','Backend Developer','Mobile Developer','Data Analyst','Business Analyst','Graphic Designer','Public Speaking'] as $skill)
                            <option value="{{ $skill }}" @selected(old('primary_skill') === $skill)>{{ $skill }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-3">
                    <label for="primary_role" class="auth-label">Peran Utama</label>
                    <select id="primary_role" name="primary_role" required class="auth-input">
                        <option value="">Pilih peran utama</option>
                        @foreach (['Ketua Tim & Perekrut','Anggota Tim','Mentor'] as $role)
                            <option value="{{ $role }}" @selected(old('primary_role') === $role)>{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-3">
                    <label for="password" class="auth-label">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="auth-input" placeholder="Minimal 8 karakter">
                </div>
                <div class="md:col-span-3">
                    <label for="password_confirmation" class="auth-label">Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="auth-input" placeholder="Ulangi password">
                </div>

                <div class="md:col-span-6">
                    <button type="submit" class="auth-button">Buat Akun dan Ke Dashboard</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
