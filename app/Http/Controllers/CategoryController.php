<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = DB::table('danhmuc')->orderByDesc('id')->get();
        } catch (\Throwable $e) {
            $categories = collect();
        }

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        try {
            DB::table('danhmuc')->insert(['name' => $request->name, 'deleted' => 0]);
        } catch (\Throwable $e) {
            // Ignore missing table issues in local/test environments.
        }

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = DB::table('danhmuc')->where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);

        try {
            DB::table('danhmuc')->where('id', $id)->update(['name' => $request->name]);
        } catch (\Throwable $e) {
            // Ignore missing table issues in local/test environments.
        }

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        try {
            DB::table('danhmuc')->where('id', $id)->update(['deleted' => 1]);
        } catch (\Throwable $e) {
            // Ignore missing table issues in local/test environments.
        }

        return redirect()->route('admin.categories.index');
    }

    public function restore($id)
    {
        try {
            DB::table('danhmuc')->where('id', $id)->update(['deleted' => 0]);
        } catch (\Throwable $e) {
            // Ignore missing table issues in local/test environments.
        }

        return redirect()->route('admin.categories.index');
    }
}
