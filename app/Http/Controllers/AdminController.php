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
        $categories= Category::all();
        return view('admin.category', compact('categories'));
    }

    public function addCategory(Request $request) {
        if (empty($request->category)) {
            toastr()->closeButton()->error('Category Required');
            return redirect()->back();
        }

        Category::create([
            'category' => $request->category
        ]);
        toastr()->closeButton()->addSuccess('Category Added Successfully');
        return redirect()->back();
    }

    public function deleteCategory(Request $request, string $id) {
        $response = Category::find($id);
        if ($response) {
            $response->delete();
            toastr()->closeButton()->addSuccess('Category Delete Successfully');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
