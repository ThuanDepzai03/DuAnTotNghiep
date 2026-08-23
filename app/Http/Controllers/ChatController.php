<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // =========================
    // KHÁCH GỬI TIN NHẮN
    // =========================
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $sessionId = $request->session()->getId();

        $conversation = Conversation::firstOrCreate(
            [
                'session_id' => $sessionId,
            ],
            [
                'last_message_at' => now(),
            ]
        );

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_type' => 'customer',
            'sender_id' => null,
            'message' => $request->message,
            'is_read' => false,
        ]);

        $conversation->update([
            'last_message_at' => now(),
        ]);

        return response()->json([
            'success' => true,
        ]);
    }


    // =========================
    // KHÁCH LẤY TIN NHẮN
    // =========================
   public function customerMessages(Request $request)
{
    $sessionId = $request->session()->getId();

    $conversation = Conversation::where('session_id', $sessionId)->first();

    if (!$conversation) {
        return response()->json([
            'messages' => []
        ]);
    }

    $messages = Message::where('conversation_id', $conversation->id)
        ->orderBy('created_at', 'asc')
        ->get();

    return response()->json([
        'messages' => $messages
    ]);
}


    // =========================
    // ADMIN - DANH SÁCH CHAT
    // =========================
    public function adminIndex()
    {
        $conversations = Conversation::with([
            'messages' => function ($query) {
                $query->latest();
            }
        ])
        ->orderByDesc('last_message_at')
        ->get();

        return view('admin.chat.index', compact('conversations'));
    }


    // =========================
    // ADMIN - ĐẾM TIN CHƯA ĐỌC
    // =========================
    public function unreadCount()
    {
        $count = Message::where(
            'sender_type',
            'customer'
        )
        ->where(
            'is_read',
            false
        )
        ->count();

        return response()->json([
            'count' => $count
        ]);
    }


    // =========================
    // ADMIN - LẤY TIN NHẮN
    // =========================
    public function adminMessages($id)
    {
        $conversation = Conversation::findOrFail($id);

        $messages = Message::where(
            'conversation_id',
            $conversation->id
        )
        ->orderBy('created_at', 'asc')
        ->get();

        // Đánh dấu tin khách đã đọc
        Message::where(
            'conversation_id',
            $conversation->id
        )
        ->where(
            'sender_type',
            'customer'
        )
        ->where(
            'is_read',
            false
        )
        ->update([
            'is_read' => true
        ]);

        return response()->json([
            'messages' => $messages
        ]);
    }


    // =========================
    // ADMIN TRẢ LỜI KHÁCH
    // =========================
    public function adminReply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $conversation = Conversation::findOrFail($id);

        $admin = session('admin');
        $customer = session('customer');
        $adminId = $admin['id'] ?? $customer['id'] ?? null;

        if (!$adminId || ((int) ($customer['role'] ?? 0) !== 1 && empty($admin))) {
            abort(403);
        }

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_type' => 'admin',
            'sender_id' => $adminId,
            'message' => $request->message,
            'is_read' => false,
        ]);

        $conversation->update([
            'last_message_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Đã gửi tin nhắn',
        ]);
    }
}