<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
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

        if ($user = Auth::user()) {
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return response()->view('home.index', compact('products', 'count'));
    }

    public function productDetail(string $id): Response
    {
        $productDetail = Product::find($id);

        if ($user = Auth::user()) {
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return response()->view('home.productDetail', compact('productDetail', 'count'));
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

    public function viewCart(): Response
    {
        if ($user = Auth::user()) {
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
            $carts = Cart::where('user_id', $userId)->get();
        } else {
            $count = '';
        }

        return response()->view('home.carts', compact('count', 'carts'));
    }

    public function deleteCart(string $id): RedirectResponse
    {
        Cart::findOrFail($id)->delete();
        toastr()->closeButton()->addSuccess('Product Delete from the Cart Successfully');

        return redirect()->back();
    }

    public function confirmOrder(Request $request): RedirectResponse
    {
        $userId = Auth::user()->id;
        $carts = Cart::where('user_id', $userId)->get();
        foreach ($carts as $cart) {
            Order::create([
                'name' => $request->name,
                'rec_address' => $request->address,
                'phone' => $request->phone,
                'user_id' => $userId,
                'product_id' => $cart->product_id
            ]);
            Cart::find($cart->id)->delete();
        }
        return redirect()->back();
    }

    public function viewOrders(): Response {
        $userId = Auth::user()->id;
        $orders = Order::where('user_id', $userId)->get();
        if ($user = Auth::user()) {
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return response()->view('home.orders', compact('count', 'orders'));
    }
}
