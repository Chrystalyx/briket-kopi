<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalOrders = Transaksi::count();
        $totalRevenue = Transaksi::where('status_pembayaran', 'success')->sum('grand_total');
        $totalProducts = Product::count();

        $salesData = Transaksi::select(
            DB::raw('MONTH(tanggal_transaksi) as month'),
            DB::raw('SUM(grand_total) as total')
        )
            ->whereYear('tanggal_transaksi', date('Y'))
            ->where('status_pembayaran', 'success')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $salesLabels = [];
        $salesValues = [];
        $monthlySales = array_fill(1, 12, 0);
        foreach ($salesData as $sale) {
            $monthlySales[$sale->month] = (int)$sale->total;
        }

        $monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"];
        foreach ($monthlySales as $monthNum => $total) {
            $salesLabels[] = $monthNames[$monthNum - 1];
            $salesValues[] = $total;
        }

        $paymentData = Transaksi::select('metode_pembayaran', DB::raw('count(*) as count'))
            ->whereNotNull('metode_pembayaran')
            ->groupBy('metode_pembayaran')
            ->pluck('count', 'metode_pembayaran');

        $paymentLabels = $paymentData->keys()->toArray();
        $paymentValues = $paymentData->values()->toArray();

        $orderStatusData = Transaksi::select('status_pembayaran', DB::raw('count(*) as count'))
            ->groupBy('status_pembayaran')
            ->pluck('count', 'status_pembayaran');

        $orderStatusLabels = $orderStatusData->keys()->toArray();
        $orderStatusValues = $orderStatusData->values()->toArray();

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalOrders',
            'totalRevenue',
            'totalProducts',
            'salesLabels',
            'salesValues',
            'paymentLabels',
            'paymentValues',
            'orderStatusLabels',
            'orderStatusValues'
        ));
    }
}
