<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;

class AdminController extends Controller
{
    public function index(Request $request)
{
    $from = $request->from;
    $to = $request->to;

    // Thống kê
    $stats = [
        'orders' => Order::count(),
        'products' => DB::table('products')->count(),
        'users' => DB::table('nguoidung')->count(),
    ];

    // Hôm nay
    $revenueToday = Order::where('status', 'completed')
        ->whereDate('created_at', today())
        ->sum('total_price');

    // Tháng này
    $revenueMonth = Order::where('status', 'completed')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->sum('total_price');

    // Query doanh thu
    $query = Order::where('status', 'completed');

    if ($from) {
        $query->whereDate('created_at', '>=', $from);
    }

    if ($to) {
        $query->whereDate('created_at', '<=', $to);
    }

    $revenueTotal = $query->sum('total_price');

    // Biểu đồ 7 ngày gần nhất
    $chart = Order::selectRaw("
            DATE(created_at) as ngay,
            SUM(total_price) as tong
        ")
        ->where('status', 'completed')
        ->groupBy(DB::raw("DATE(created_at)"))
        ->orderBy(DB::raw("DATE(created_at)"))
        ->limit(7)
        ->get();

    $chartLabels = [];
    $chartData = [];

    foreach ($chart as $row) {

        $chartLabels[] = date('d/m', strtotime($row->ngay));
        $chartData[] = $row->tong;

    }

    // Top 5 bán chạy
    $bestSellingProducts = OrderItem::selectRaw("
            product_variant_id,
            SUM(quantity) as total_sold
        ")
        ->groupBy('product_variant_id')
        ->orderByDesc('total_sold')
        ->with('variant.product')
        ->take(5)
        ->get();

    return view('admin.dashboard', compact(
        'stats',
        'revenueToday',
        'revenueMonth',
        'revenueTotal',
        'chartLabels',
        'chartData',
        'bestSellingProducts',
        'from',
        'to'
    ));
}
}