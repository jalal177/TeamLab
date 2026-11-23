<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TeamLab') - TeamLab</title>

    {{-- Untuk prototipe. Jika project sudah memakai Tailwind melalui Vite,
         hapus CDN ini dan gunakan @vite(['resources/css/app.css','resources/js/app.js']). --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .auth-bg {
            background:
                radial-gradient(ellipse at 8% 20%, rgba(255,255,255,.18) 0 19%, transparent 19.2%),
                radial-gradient(ellipse at 83% 88%, rgba(255,255,255,.22) 0 23%, transparent 23.2%),
                linear-gradient(145deg, #d9fbf8 0%, #a8e1e1 48%, #51aeb5 100%);
        }
        .auth-input {
            width: 100%; border: 1px solid #d9e1e5; border-radius: 10px;
            padding: 11px 14px; color: #172033; background: white;
            box-shadow: 0 2px 3px rgba(15, 23, 42, .16);
            outline: none; transition: .18s;
        }
        .auth-input:focus { border-color: #1593a0; box-shadow: 0 0 0 3px rgba(21,147,160,.13); }
        .auth-label { display:block; margin-bottom:8px; color:#182337; font-size:12px; font-weight:600; }
        .auth-button {
            display:flex; justify-content:center; align-items:center; width:100%;
            border-radius:10px; background:#138895; color:white; padding:12px 16px;
            font-size:13px; font-weight:700; box-shadow:0 3px 4px rgba(0,0,0,.18);
            transition:background .2s, transform .2s;
        }
        .auth-button:hover { background:#0e7480; transform:translateY(-1px); }
        .auth-button:focus-visible { outline:3px solid rgba(19,136,149,.3); outline-offset:2px; }
    </style>
    @stack('head')
</head>
<body class="min-h-screen bg-[#effdfc] text-slate-900">
    @yield('content')
    @stack('scripts')
</body>
</html>
