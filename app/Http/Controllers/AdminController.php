<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\fileExists;

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

    public function addProduct(): Response
    {
        $categories = Category::all();
        return response()->view('admin.addProduct', compact('categories'));
    }

    public function postAddProduct(Request $request): RedirectResponse
    {
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('products', $imagename);
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagename,
            'price' => $request->price,
            'category' => $request->category,
            'quantity' => $request->quantity
        ]);
        toastr()->closeButton()->addSuccess('Product Add Successfully');

        return redirect()->back();
    }

    public function viewProducts(): Response
    {
        $products = Product::paginate(3);
        return response()->view('admin.viewProducts', compact('products'));
    }

    public function deleteProduct(string $id): RedirectResponse
    {
        $product = Product::find($id);
        $imagePath = public_path("products/$product->image");
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();
        toastr()->closeButton()->addSuccess('Product Delete Successfully');

        return redirect()->back();
    }

    public function updateProduct(string $id): Response {
        $product = Product::find($id);
        $categories = Category::all();
        return response()->view('admin.updateProduct', compact('product', 'categories'));
    }

    public function postUpdateProduct(Request $request, string $id): RedirectResponse
    {
        $image = $request->image;

        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $imagePath = public_path("products/$product->image");
            $product->image = $imagename;
            if (file_exists($imagePath)) {
                Log::info('ada');
                unlink($imagePath);
            }
        }
        $product->update();
        toastr()->closeButton()->addSuccess('Product Update Successfully');

        return redirect('/admin/view-products');
    }

    public function searchProduct(Request $request): Response
    {
        $search = $request->search;
        $products = Product::where('title', 'LIKE', '%' . $search . '%')->paginate(3);

        return response()->view('admin.viewProducts', compact('products', 'search'));
    }
}
