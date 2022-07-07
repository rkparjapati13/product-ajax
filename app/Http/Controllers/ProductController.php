<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartOrder;

class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $products = Product::when(request('category_id'), function ($q) {
                                return $q->where('category_id', request('category_id'));
                              })->paginate(5);

        $categories = Category::all();
        $cartOrders = CartOrder::all();
        if ($request->ajax()) {
            $data = view('product.list', compact('products'))->render();
            return response()->json(['html' =>$data]);
        }

        return view('product.index',compact('products', 'categories', 'cartOrders'));
    }

    public function store(Request $request)
    {
       CartOrder::create([
         'product_id' => $request->product_id,
         'quantity' => $request->qunatity,
       ]);
       $cartOrders = CartOrder::all();
       $data = view('product.model', compact('cartOrders'))->render();

       return response()->json([
         'data' => $cartOrders,
         'count' => count($cartOrders),
         'status' => true,
         'success' => 'Product added'
       ]);
    }
}
