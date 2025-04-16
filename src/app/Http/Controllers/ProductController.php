<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);//仮で表示
        return view('products.index',compact('products'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name','like',"%{$keyword}%")->paginate(6);
        return view('products.index',compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');
        }

        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->season = isset($validated['season']) ? implode(',',$validated['season']) : null;
        $product->description = $validated['description'] ?? null;
        $product->image_path = $imagePath;
        $product->save();

        return redirect()->route('products.index')->with('success','商品を登録しました！');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }

}
