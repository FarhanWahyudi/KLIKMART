<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function viewCategory()
    {
        return view('admin.category');
    }

    public function addCategory(Request $request) {
        Category::create([
            'category' => $request->category
        ]);
        return redirect()->back();
    }
}
