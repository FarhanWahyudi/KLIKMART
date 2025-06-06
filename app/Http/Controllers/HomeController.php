<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(): Response
    {
        $products = Product::all();
        return response()->view('home.index', compact('products'));
    }

    public function productDetail(string $id): Response
    {
        $productDetail = Product::find($id);
        return response()->view('home.productDetail', compact('productDetail'));
    }

    public function addCart(string $id): RedirectResponse
    {
        $user = Auth::user();
        $product = Product::find($id);

        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id
        ]);

        toastr()->closeButton()->addSuccess('Product Added to the Cart Successfully');

        return redirect('/');
    }
}
