<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PHPUnit\Event\Telemetry\Duration;

class ProductController extends Controller
{
    public function get()
    {
        return Product::with(['category', 'store'])->get();
    }

    public function getById($id)
    {
        return Product::find($id);
    }

    public function create(Request $request)
    {
        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->category_id = $request->category_id;
        $product->store_id = $request->store_id;
        $product->save();
        return $product;
    }

    public function delete($id)
    {
        $product = Product::find($id)->delete();
        return $product;
    }

    public function update(Request $request, $product)
    {
        $product = Product::find($product);
        $product->code = $request->code;
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->category_id = $request->category_id;
        $product->store_id = $request->store_id;
        $product->save();
        return $product;
    }
}
