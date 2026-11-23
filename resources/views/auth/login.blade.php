@extends('layouts.auth')

@section('title', 'Masuk')

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

    {{-- Form login --}}
    <main class="flex min-h-screen items-center justify-center px-6 py-12 sm:px-10">
        <div class="w-full max-w-md">
            <div class="mb-8 lg:hidden">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xl font-extrabold">🧩 Team<span class="text-cyan-700">Lab</span></a>
            </div>
            <h2 class="text-2xl font-extrabold tracking-tight">Masuk ke Portal TeamLab</h2>
            <p class="mt-2 text-sm text-slate-600">Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold text-teal-600 hover:text-teal-800">Daftar sekarang</a>
            </p>

            @if (session('status'))
                <div class="mt-5 rounded-lg bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="mt-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <ul class="list-inside list-disc">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="mt-9 space-y-5">
                @csrf
                <div>
                    <label for="email" class="auth-label">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                           value="{{ old('email') }}" placeholder="nama@gmail.com" class="auth-input">
                </div>
                <div>
                    <label for="password" class="auth-label">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password"
                           required placeholder="Masukkan password" class="auth-input">
                </div>
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 text-slate-600">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                        Ingat saya
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="font-semibold text-teal-700 hover:underline">Lupa password?</a>
                    @endif
                </div>
                <button type="submit" class="auth-button">Masuk</button>
            </form>

            <div class="my-6 flex items-center gap-3 text-[11px] font-medium text-slate-400">
                <span class="h-px flex-1 bg-slate-200"></span><span>ATAU</span><span class="h-px flex-1 bg-slate-200"></span>
            </div>
            <button type="button" class="flex w-full items-center justify-center gap-3 rounded-[10px] border border-slate-200 bg-white px-4 py-3 text-xs font-semibold text-slate-800 shadow-[0_2px_3px_rgba(15,23,42,.16)] hover:bg-slate-50">
                <svg viewBox="0 0 48 48" class="h-4 w-4" aria-hidden="true"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.76 7.18l7.73 6C44.42 37.98 46.98 31.8 46.98 24.55z"/><path fill="#FBBC05" d="M10.53 28.59A14.4 14.4 0 0 1 9.75 24c0-1.59.27-3.13.76-4.59l-7.98-6.19A23.9 23.9 0 0 0 0 24c0 3.87.93 7.53 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.91-5.8l-7.73-6c-2.14 1.44-4.89 2.3-8.18 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
                Masuk dengan Google
            </button>
        </div>
    </main>
</div>
@endsection
