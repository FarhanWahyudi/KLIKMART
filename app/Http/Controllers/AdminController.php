<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function updateCategory(string $id): Response
    {
        $category = Category::findOrFail($id);
        return response()->view('admin.update', compact('category'));
    }

    public function postUpdateCategory(Request $request, string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->update();
        toastr()->closeButton()->addSuccess('Category Update Successfully');

        return redirect('/admin/view-category');
    }
}
