<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
