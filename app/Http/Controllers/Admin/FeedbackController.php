<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Review;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10, ['*'], 'contacts_page');
        $reviews = Review::with('product')->latest()->paginate(10, ['*'], 'reviews_page');

        return view('admin.feedback.index', compact('contacts', 'reviews'));
    }

    public function updateContact(Request $request, $id)
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,processing,resolved'],
        ]);

        Contact::findOrFail($id)->update($data);

        return back()->with('success', 'Đã cập nhật trạng thái liên hệ.');
    }

    public function destroyContact($id)
    {
        Contact::findOrFail($id)->delete();

        return back()->with('success', 'Đã xóa yêu cầu liên hệ.');
    }

    public function updateReview(Request $request, $id)
    {
        $data = $request->validate([
            'status' => ['required', 'in:approved,hidden'],
        ]);

        Review::findOrFail($id)->update($data);

        return back()->with('success', 'Đã cập nhật trạng thái đánh giá.');
    }

    public function destroyReview($id)
    {
        Review::findOrFail($id)->delete();

        return back()->with('success', 'Đã xóa đánh giá.');
    }
}
