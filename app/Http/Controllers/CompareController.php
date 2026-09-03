<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompareController extends Controller
{
    // Hiển thị trang so sánh
    public function index()
    {
        return view('client.compare');
    }

    // Backend gọi trực tiếp Google Gemini AI
    public function compareWithAi(Request $request)
    {
        $products = $request->input('products');

        if (!$products || count($products) < 2) {
            return response()->json(['error' => 'Cần chọn đủ 2 sản phẩm!'], 400);
        }

        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            return response()->json(['error' => 'Chưa cấu hình GEMINI_API_KEY trong file .env'], 500);
        }

        $prompt = "Bạn là chuyên gia đánh giá và thẩm định điện thoại công nghệ của cửa hàng AE PHOENIC.
Hãy so sánh chi tiết giữa 2 dòng điện thoại sau:
- Sản phẩm 1: '{$products[0]['name']}'
- Sản phẩm 2: '{$products[1]['name']}'

Yêu cầu: Trả về kết quả DUY NHẤT ở định dạng JSON hợp lệ theo schema sau (không thêm ```json):
{
  \"products\": [
    {
      \"name\": \"Tên chuẩn xác sản phẩm 1\",
      \"price\": \"Khoảng giá bán hiện tại ở Việt Nam\",
      \"features\": [\"Màn hình: ...\", \"Chip & Hiệu năng: ...\", \"Camera: ...\", \"Pin & Sạc: ...\"],
      \"strengths\": [\"Điểm mạnh 1\", \"Điểm mạnh 2\"],
      \"weaknesses\": [\"Điểm yếu 1\", \"Điểm yếu 2\"]
    },
    {
      \"name\": \"Tên chuẩn xác sản phẩm 2\",
      \"price\": \"Khoảng giá bán hiện tại ở Việt Nam\",
      \"features\": [\"Màn hình: ...\", \"Chip & Hiệu năng: ...\", \"Camera: ...\", \"Pin & Sạc: ...\"],
      \"strengths\": [\"Điểm mạnh 1\", \"Điểm mạnh 2\"],
      \"weaknesses\": [\"Điểm yếu 1\", \"Điểm yếu 2\"]
    }
  ],
  \"verdict\": \"Lời khuyên ngắn gọn 3-4 câu: Máy nào nổi trội hơn ở điểm gì và ai nên chọn mua máy nào.\"
}";

        // Danh sách các model theo thứ tự ưu tiên (bị nghẽn thì tự chuyển)
        $models = [
            'gemini-3.5-flash-lite', 
            'gemini-3.1-flash-lite', 
            'gemini-3.6-flash'
        ];

        $lastError = '';

        foreach ($models as $model) {
            try {
                $response = Http::withoutVerifying()->withHeaders([
                    'Content-Type' => 'application/json'
                ])->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}", [
                    'contents' => [
                        ['parts' => [['text' => $prompt]]]
                    ],
                    'generationConfig' => [
                        'responseMimeType' => 'application/json'
                    ]
                ]);

                // Nếu thành công thì parse kết quả và trả về ngay
                if ($response->successful()) {
                    $rawText = $response->json()['candidates'][0]['content']['parts'][0]['text'];
                    return response()->json(json_decode($rawText, true));
                }

                // Nếu gặp 503 (quá tải) hoặc 404, ghi nhận lỗi và thử model tiếp theo
                $lastError = $response->body();
            } catch (\Exception $e) {
                $lastError = $e->getMessage();
            }
        }

        // Nếu tất cả các model đều gặp sự cố
        return response()->json(['error' => 'Hệ thống AI đang bảo trì, vui lòng thử lại sau giây lát: ' . $lastError], 500);
    }
}