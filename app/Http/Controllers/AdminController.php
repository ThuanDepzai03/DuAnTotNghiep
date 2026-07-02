<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'orders' => $this->safeCount('hoadon'),
            'products' => $this->safeCount('sanpham', [['deleted', '=', 0]]),
            'users' => $this->safeCount('nguoidung'),
        ];

        $revenueToday = $this->safeSum('hoadon', 'tongtien', [['trangthai', '=', 2], ['ngaygiodat', '>=', now()->startOfDay()->toDateTimeString()]]);
        $revenueMonth = $this->safeSum('hoadon', 'tongtien', [['trangthai', '=', 2], ['ngaygiodat', '>=', now()->subDays(30)->startOfDay()->toDateTimeString()]]);
        $revenueTotal = $this->safeSum('hoadon', 'tongtien', [['trangthai', '=', 2]]);

        $chartData = $this->getRevenueSeries();

        return view('admin.dashboard', compact(
            'stats',
            'revenueToday',
            'revenueMonth',
            'revenueTotal',
            'chartData'
        ));
    }

    private function safeCount(string $table, array $conditions = []): int
    {
        try {
            $query = DB::table($table);

            foreach ($conditions as $condition) {
                if (count($condition) === 3) {
                    $query->where($condition[0], $condition[1], $condition[2]);
                }
            }

            return (int) $query->count();
        } catch (\Throwable $e) {
            return 0;
        }
    }

    private function safeSum(string $table, string $column, array $conditions = []): int
    {
        try {
            $query = DB::table($table)->selectRaw("COALESCE(SUM($column), 0) as total");

            foreach ($conditions as $condition) {
                if (count($condition) === 3) {
                    $query->where($condition[0], $condition[1], $condition[2]);
                }
            }

            return (int) $query->value('total');
        } catch (\Throwable $e) {
            return 0;
        }
    }

    private function getRevenueSeries(): array
    {
        try {
            $rows = DB::table('hoadon')
                ->selectRaw("DATE_FORMAT(ngaygiodat, '%Y-%m') as month, SUM(tongtien) as total")
                ->where('trangthai', 2)
                ->where('ngaygiodat', '>=', now()->subMonths(6)->startOfMonth()->toDateString())
                ->groupByRaw("DATE_FORMAT(ngaygiodat, '%Y-%m')")
                ->orderByRaw("DATE_FORMAT(ngaygiodat, '%Y-%m')")
                ->get();

            $labels = [];
            $values = [];

            foreach ($rows as $row) {
                $labels[] = 'Th ' . (int) substr($row->month, 5, 2);
                $values[] = (int) $row->total;
            }

            return ['labels' => $labels, 'values' => $values];
        } catch (\Throwable $e) {
            return ['labels' => [], 'values' => []];
        }
    }
}
