@extends('layouts.admin')
@section('title', 'Admin Dashboard Analytics')
@section('page_title', 'Dashboard Ringkasan & Grafik Analytics')

@section('content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
        </div>
        <p class="text-slate-400 text-xs font-bold uppercase mb-1">Total Pendapatan</p>
        <h3 class="text-2xl font-black text-slate-900">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
    </div>
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                </path>
            </svg>
        </div>
        <p class="text-slate-400 text-xs font-bold uppercase mb-1">Tiket Terjual</p>
        <h3 class="text-2xl font-black text-slate-900">{{ number_format($ticketsSold, 0, ',', '.') }}</h3>
    </div>
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <p class="text-slate-400 text-xs font-bold uppercase mb-1">Event Aktif</p>
        <h3 class="text-2xl font-black text-slate-900">{{ $activeEvents }} Event</h3>
    </div>
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <p class="text-slate-400 text-xs font-bold uppercase mb-1">Pesanan Pending</p>
        <h3 class="text-2xl font-black text-slate-900">{{ $pendingOrders }} Pesanan</h3>
    </div>
</div>

<!-- SECTION GRAFIK ANALYTICS (Pertumbuhan Pengguna & Penyelenggaraan Event) -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
    <!-- Chart 1: Pertumbuhan Pengguna Terdaftar -->
    <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-100 p-6 md:p-8 shadow-sm space-y-4">
        <div class="flex justify-between items-center">
            <div>
                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-[10px] font-bold uppercase tracking-wider">Trend Pertumbuhan</span>
                <h3 class="text-xl font-black text-slate-900 mt-1">Grafik Pertumbuhan Pengguna</h3>
            </div>
            <span class="text-xs text-slate-400 font-medium">Tahun {{ date('Y') }}</span>
        </div>
        <div class="relative h-72">
            <canvas id="userGrowthChart"></canvas>
        </div>
    </div>

    <!-- Chart 2: Distribusi Kategori Event -->
    <div class="bg-white rounded-3xl border border-slate-100 p-6 md:p-8 shadow-sm space-y-4">
        <div>
            <span class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-[10px] font-bold uppercase tracking-wider">Kategori Acara</span>
            <h3 class="text-xl font-black text-slate-900 mt-1">Distribusi Event</h3>
        </div>
        <div class="relative h-72 flex items-center justify-center">
            <canvas id="categoryDistributionChart"></canvas>
        </div>
    </div>
</div>

<!-- Chart 3: Pertumbuhan Penyelenggaraan Event per Bulan -->
<div class="bg-white rounded-3xl border border-slate-100 p-6 md:p-8 shadow-sm space-y-4 mb-10">
    <div class="flex justify-between items-center">
        <div>
            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase tracking-wider">Penyelenggaraan Event</span>
            <h3 class="text-xl font-black text-slate-900 mt-1">Grafik Pertumbuhan Penyelenggaraan Event</h3>
        </div>
        <span class="text-xs text-slate-400 font-medium">Total Akumulasi Akurasi</span>
    </div>
    <div class="relative h-64">
        <canvas id="eventGrowthChart"></canvas>
    </div>
</div>

<!-- Latest Sales Table -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="p-8 border-b flex justify-between items-center">
        <h3 class="font-black text-xl">Transaksi Terakhir</h3>
        <a href="{{ route('admin.transactions.index') }}" class="text-indigo-600 font-bold hover:underline">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-1/4">Tgl Transaksi</th>
                    <th class="px-8 py-4 w-1/4">Pembeli</th>
                    <th class="px-8 py-4 w-1/4">Event</th>
                    <th class="px-8 py-4 w-[10%]">Status</th>
                    <th class="px-8 py-4 text-right">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($recentTransactions as $trx)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-8 py-6 text-sm text-slate-600 max-w-xs break-all">{{ $trx->created_at->format('d M y - H:i') }}<br><span class="text-xs text-slate-400">{{ $trx->order_id }}</span></td>
                    <td class="px-8 py-6">
                        <p class="font-bold uppercase tracking-wide text-sm truncate max-w-[150px]">{{ $trx->customer_name }}</p>
                        <p class="text-xs text-slate-400 truncate max-w-[150px]">{{ $trx->customer_email }}</p>
                    </td>
                    <td class="px-8 py-6 font-medium text-slate-600 max-w-xs truncate">{{ $trx->event->title ?? '-' }}</td>
                    <td class="px-8 py-6 whitespace-nowrap">
                        @if($trx->status === 'settlement' || $trx->status === 'success')
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase">Success</span>
                        @elseif($trx->status === 'pending')
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase">Pending</span>
                        @else
                            <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-bold uppercase">{{ $trx->status }}</span>
                        @endif
                    </td>
                    <td class="px-8 py-6 font-black text-indigo-600 whitespace-nowrap text-right">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-10 text-center text-slate-500">Belum ada transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Chart.js Script Library & Config -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const monthLabels = {!! json_encode($months) !!};

        // 1. Chart Pertumbuhan Pengguna (Line Chart)
        const ctxUser = document.getElementById('userGrowthChart').getContext('2d');
        const userGradient = ctxUser.createLinearGradient(0, 0, 0, 300);
        userGradient.addColorStop(0, 'rgba(79, 70, 229, 0.4)');
        userGradient.addColorStop(1, 'rgba(79, 70, 229, 0.0)');

        new Chart(ctxUser, {
            type: 'line',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Pengguna Baru Terdaftar',
                    data: {!! json_encode($userGrowthData) !!},
                    borderColor: '#4f46e5',
                    borderWidth: 3,
                    backgroundColor: userGradient,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#4f46e5',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { borderDash: [4, 4] } },
                    x: { grid: { display: false } }
                }
            }
        });

        // 2. Chart Distribusi Kategori Event (Doughnut Chart)
        const ctxCategory = document.getElementById('categoryDistributionChart').getContext('2d');
        new Chart(ctxCategory, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($categoryLabels) !!},
                datasets: [{
                    data: {!! json_encode($categoryData) !!},
                    backgroundColor: ['#4f46e5', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6'],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11, weight: 'bold' } } }
                }
            }
        });

        // 3. Chart Pertumbuhan Penyelenggaraan Event (Bar Chart)
        const ctxEvent = document.getElementById('eventGrowthChart').getContext('2d');
        new Chart(ctxEvent, {
            type: 'bar',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Jumlah Event Diselenggarakan',
                    data: {!! json_encode($eventGrowthData) !!},
                    backgroundColor: '#10b981',
                    borderRadius: 8,
                    hoverBackgroundColor: '#059669'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { borderDash: [4, 4] } },
                    x: { grid: { display: false } }
                }
            }
        });
    });
</script>
@endsection
