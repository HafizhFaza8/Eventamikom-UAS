<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kepanitiaan/HIMA - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-900 text-white min-h-screen flex items-center justify-center p-6">

<div class="max-w-xl w-full bg-white text-slate-900 rounded-[2.5rem] p-8 md:p-10 shadow-2xl">
    <div class="text-center mb-8">
        <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4 shadow-lg shadow-indigo-200">
            AH
        </div>
        <h1 class="text-3xl font-black text-slate-900">Daftar Akun Kepanitiaan / HIMA</h1>
        <p class="text-slate-500 mt-2 text-sm">Bergabung dengan platform SaaS marketplace event AmikomEventHub untuk mengelola acara dan analitik pendapatan secara mandiri.</p>
    </div>

    @if(session('error'))
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6 font-bold text-sm text-center">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6 font-bold text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('organizer.register.post') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Organisasi / HIMA / Kepanitiaan</label>
            <input type="text" name="organization_name" placeholder="Contoh: HIMA Informatika Amikom" value="{{ old('organization_name') }}"
                   class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" required>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Email Organisasi</label>
            <input type="email" name="email" placeholder="himatif@amikom.ac.id" value="{{ old('email') }}"
                   class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" required>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Deskripsi Singkat Organisasi</label>
            <textarea name="description" rows="3" placeholder="Jelaskan mengenai HIMA / Kepanitiaan Anda..."
                      class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" placeholder="Minimal 6 karakter"
                       class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password"
                       class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" required>
            </div>
        </div>

        <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-200 transition">
            Daftarkan Organisasi & Masuk Dashboard
        </button>

        <p class="text-center text-xs text-slate-400 mt-4">
            Sudah memiliki akun? <a href="{{ route('organizer.login') }}" class="text-indigo-600 font-bold hover:underline">Login di sini &rarr;</a>
        </p>
    </form>
</div>

</body>
</html>
