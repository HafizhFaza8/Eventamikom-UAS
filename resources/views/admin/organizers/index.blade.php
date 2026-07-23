@extends('layouts.app')

@section('title', 'Superadmin - Pengawasan Kelayakan Penyelenggara')

@section('content')
<main class="max-w-7xl mx-auto px-6 py-12 space-y-10">
    <!-- Header Banner Superadmin -->
    <div class="bg-gradient-to-r from-rose-950 via-slate-900 to-indigo-950 text-white rounded-[2.5rem] p-8 md:p-10 shadow-2xl flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-rose-500/20 text-rose-300 border border-rose-500/30 rounded-full text-xs font-bold uppercase tracking-wider mb-3">
                <span>🛡️ Panel Pengawasan Superadmin</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-black">Kelayakan Organisasi & SaaS Marketplace</h1>
            <p class="text-slate-300 text-sm mt-1 max-w-xl">Mengawasi seluruh akun Kepanitiaan / HIMA terdaftar, memverifikasi kelayakan, dan memantau total omset platform secara menyeluruh.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.dashboard') }}" class="px-5 py-3.5 bg-white/10 hover:bg-white/20 text-white font-bold rounded-2xl border border-white/20 transition">
                &larr; Ke Dashboard Admin Utama
            </a>
        </div>
    </div>

    <!-- Platform Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Total Omset Platform SaaS</p>
            <h3 class="text-3xl font-extrabold text-indigo-600">Rp {{ number_format($totalPlatformRevenue, 0, ',', '.') }}</h3>
            <p class="text-xs text-slate-400 mt-2">dari seluruh organisasi</p>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Organisasi / HIMA Terdaftar</p>
            <h3 class="text-3xl font-extrabold text-slate-900">{{ $totalOrganizers }}</h3>
            <p class="text-xs text-slate-400 mt-2">penyelenggara aktif</p>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">Perlu Pengawasan</p>
            <h3 class="text-3xl font-extrabold text-amber-500">{{ $pendingCount }}</h3>
            <p class="text-xs text-slate-400 mt-2">menunggu persetujuan</p>
        </div>
    </div>

    <!-- Table Organizers -->
    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm space-y-6">
        <h3 class="text-xl font-bold text-slate-900">Daftar Organisasi / HIMA Terdaftar</h3>

        @if($organizers->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-4 px-4">Organisasi / HIMA</th>
                            <th class="py-4 px-4">Email Akun</th>
                            <th class="py-4 px-4">Total Event</th>
                            <th class="py-4 px-4">Status Kelayakan</th>
                            <th class="py-4 px-4 text-right">Tindakan Superadmin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm font-medium">
                        @foreach($organizers as $org)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-4">
                                    <p class="font-bold text-slate-800">{{ $org->name }}</p>
                                    <p class="text-xs text-slate-400">Slug: /organizer/{{ $org->slug }}</p>
                                </td>
                                <td class="py-4 px-4 text-slate-600">{{ $org->user->email ?? '-' }}</td>
                                <td class="py-4 px-4 font-bold text-indigo-600">{{ $org->events->count() }} Event</td>
                                <td class="py-4 px-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $org->status === 'approved' ? 'bg-emerald-100 text-emerald-800' : ($org->status === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                        {{ $org->status }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-right space-x-2">
                                    <form action="{{ route('admin.organizers.update-status', $org->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="px-3 py-1.5 bg-emerald-600 text-white hover:bg-emerald-700 rounded-lg text-xs font-bold transition">Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.organizers.update-status', $org->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="px-3 py-1.5 bg-rose-100 text-rose-700 hover:bg-rose-200 rounded-lg text-xs font-bold transition">Tangguhkan</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12 text-slate-400">
                <p class="font-bold">Belum ada organisasi yang mendaftar.</p>
            </div>
        @endif
    </div>
</main>
@endsection
