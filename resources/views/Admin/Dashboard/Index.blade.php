@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    {{-- ===================================================================== --}}
    {{-- 1. SKELETON LOADER (TAMPIL SAAT LOADING)                           --}}
    {{-- ===================================================================== --}}
    <div id="skeleton-loader" role="status" class="animate-pulse">
        {{-- Skeleton Header --}}
        <div class="h-8 bg-slate-200 rounded-md w-48 mb-6"></div>
        
        {{-- Skeleton Card Statistik --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @for ($i = 0; $i < 4; $i++)
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between">
                <div>
                    <div class="h-4 bg-slate-200 rounded-full w-32 mb-3"></div>
                    <div class="h-8 bg-slate-200 rounded-md w-24"></div>
                </div>
                <div class="w-14 h-14 bg-slate-200 rounded-full"></div>
            </div>
            @endfor
        </div>

        {{-- Skeleton Grid untuk Chart --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            {{-- Skeleton untuk chart besar (line chart) --}}
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                <div class="h-6 bg-slate-200 rounded-md w-1/3 mb-4"></div>
                <div class="h-72 bg-slate-200 rounded-lg"></div>
            </div>
            {{-- Skeleton untuk dua chart kecil (doughnut charts) --}}
            @for ($i = 0; $i < 2; $i++)
            <div class="bg-white p-6 rounded-xl shadow-md">
                <div class="h-6 bg-slate-200 rounded-md w-1/3 mb-4"></div>
                <div class="h-72 bg-slate-200 rounded-lg"></div>
            </div>
            @endfor
        </div>
        <span class="sr-only">Loading...</span>
    </div>


    {{-- ===================================================================== --}}
    {{-- 2. KONTEN ASLI (SEMBUNYI SECARA DEFAULT)                              --}}
    {{-- ===================================================================== --}}
    <div id="real-content" style="display: none;">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-slate-800">Dashboard</h1>
        </div>

        {{-- Grid Card Statistik --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between"><div><h3 class="text-lg font-medium text-slate-500">Total Pengguna</h3><p class="text-3xl font-bold text-slate-800 mt-1">1,250</p></div><div class="p-3 bg-indigo-100 rounded-full"><svg class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg></div></div>
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between"><div><h3 class="text-lg font-medium text-slate-500">Total Pesanan</h3><p class="text-3xl font-bold text-slate-800 mt-1">340</p></div><div class="p-3 bg-green-100 rounded-full"><svg class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg></div></div>
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between"><div><h3 class="text-lg font-medium text-slate-500">Total Pendapatan</h3><p class="text-3xl font-bold text-slate-800 mt-1">Rp22.500</p></div><div class="p-3 bg-blue-100 rounded-full"><svg class="h-7 w-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 12v-2m0 2v.01M12 12v-2m0 2v.01M12 12h.01M12 12h-2m2 0h.01M12 12h-2m2 0h.01M12 12v.01M12 12v-2m2 2h.01M12 12h-2m2 0h.01M12 12v.01M12 12v-2m0 2v.01M12 12h.01" /><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01" /></svg></div></div>
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center justify-between"><div><h3 class="text-lg font-medium text-slate-500">Total Pengeluaran</h3><p class="text-3xl font-bold text-slate-800 mt-1">Rp15.000</p></div><div class="p-3 bg-orange-100 rounded-full"><svg class="h-7 w-7 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg></div></div>
        </div>

        {{-- Grid untuk Chart --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            {{-- Chart 1: Penjualan Bulanan (Line) --}}
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-bold text-slate-800 mb-4">Grafik Penjualan Bulanan</h2>
                <div class="h-80"><canvas id="salesChart"></canvas></div>
            </div>
            
            {{-- Chart 2: Metode Pembayaran (Doughnut) --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-bold text-slate-800 mb-4">Metode Pembayaran</h2>
                <div class="h-80"><canvas id="paymentMethodChart"></canvas></div>
            </div>

            {{-- Chart 3: Status Pesanan (Doughnut) --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-bold text-slate-800 mb-4">Status Pesanan</h2>
                <div class="h-80"><canvas id="orderStatusChart"></canvas></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Konfigurasi umum untuk tooltip
    const tooltipConfig = {
        backgroundColor: '#1E293B', titleFont: { size: 14, family: 'Inter' },
        bodyFont: { size: 12, family: 'Inter' }, padding: 12,
    };
    
    // ================== FUNGSI-FUNGSI RENDER CHART ==================
    
    // Chart 1: Penjualan (Line)
    function renderSalesChart() {
        const ctx = document.getElementById('salesChart'); if (!ctx) return;
        new Chart(ctx, { 
            type: 'line', 
            data: { 
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul"], 
                datasets: [{ 
                    label: 'Penjualan', 
                    data: [31000, 40000, 28000, 51000, 42000, 109000, 100000], 
                    borderColor: '#6366F1', 
                    backgroundColor: (context) => { 
                        const {ctx, chartArea} = context.chart; if (!chartArea) return null; 
                        const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top); 
                        gradient.addColorStop(0, 'rgba(99, 102, 241, 0)'); 
                        gradient.addColorStop(1, 'rgba(99, 102, 241, 0.5)'); 
                        return gradient; 
                    }, 
                    fill: true, 
                    tension: 0.4, 
                    borderWidth: 2, 
                    pointBackgroundColor: '#6366F1', 
                    pointRadius: 4, 
                    pointHoverRadius: 6, 
                }] 
            }, 
            options: { 
                responsive: true, 
                maintainAspectRatio: false, 
                scales: { 
                    y: { 
                        beginAtZero: true, 
                        ticks: { 
                            color: '#6B7280', 
                            callback: (value) => 'Rp ' + value / 1000 + 'k' 
                        }, 
                        grid: { 
                            color: '#E5E7EB', 
                            borderDash: [5, 5] 
                        } 
                    }, 
                    x: { 
                        ticks: { 
                            color: '#6B7280' 
                        }, 
                        grid: { 
                            display: false 
                        } 
                    } 
                }, 
                plugins: { 
                    legend: { 
                        display: false 
                    }, 
                    tooltip: { 
                        ...tooltipConfig, 
                        callbacks: { 
                            label: (context) => `${context.dataset.label || ''}: ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(context.parsed.y)}` 
                        } 
                    } 
                } 
            } 
        });
    }

    // Chart 2: Metode Pembayaran (Doughnut)
    function renderPaymentMethodChart() {
        const ctx = document.getElementById('paymentMethodChart'); if (!ctx) return;
        new Chart(ctx, { 
            type: 'doughnut', 
            data: { 
                labels: ['Transfer Bank', 'Cash (COD)'], 
                datasets: [{ 
                    label: 'Transaksi', 
                    data: [82, 18], // Data dalam persen
                    backgroundColor: ['#3B82F6', '#10B981'], 
                    hoverOffset: 4 
                }] 
            }, 
            options: { 
                responsive: true, 
                maintainAspectRatio: false, 
                plugins: { 
                    legend: { 
                        position: 'bottom', 
                        labels: { 
                            color: '#6B7280', 
                            font: { 
                                family: 'Inter' 
                            } 
                        } 
                    }, 
                    tooltip: { 
                        ...tooltipConfig, 
                        callbacks: { 
                            label: (context) => `${context.label}: ${context.raw}%` 
                        } 
                    } 
                } 
            } 
        });
    }

    // Chart 3: Status Pesanan (Doughnut)
    function renderOrderStatusChart() {
        const ctx = document.getElementById('orderStatusChart'); if (!ctx) return;
        new Chart(ctx, { 
            type: 'doughnut', 
            data: { 
                labels: ['Selesai', 'Tertunda', 'Dikirim', 'Dibatalkan'], 
                datasets: [{ 
                    label: 'Pesanan', 
                    data: [210, 50, 75, 5], 
                    backgroundColor: ['#22C55E', '#F97316', '#3B82F6', '#EF4444'], 
                    hoverOffset: 4 
                }] 
            }, 
            options: { 
                responsive: true, 
                maintainAspectRatio: false, 
                plugins: { 
                    legend: { 
                        position: 'bottom', 
                        labels: { 
                            color: '#6B7280', 
                            font: { 
                                family: 'Inter' 
                            } 
                        } 
                    }, 
                    tooltip: { 
                        ...tooltipConfig, 
                        callbacks: { 
                            label: (context) => `${context.label}: ${context.raw}` 
                        } 
                    } 
                } 
            } 
        });
    }

    // ================== LOGIKA UTAMA ==================
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            document.getElementById('skeleton-loader').style.display = 'none';
            document.getElementById('real-content').style.display = 'block';

            // Panggil semua fungsi render chart
            renderSalesChart();
            renderPaymentMethodChart();
            renderOrderStatusChart();
        }, 1000);
    });
</script>
@endpush