<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function list()
    {
        $products = Product::select('products.*')->Paginate(5);
        return view('product.list', [
            'products' => $products
        ]);
    }

    public function changeStatus($id, Request $request)
    {
        $product = Product::find($id);
        if ($product->status == 0) {
            $product->status = 1;
            $product->save();
        } else {
            $product->status = 0;
            $product->save();
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $products = Product::select('products.*')
            ->where('name', 'like', '%' . $request->keyword . '%')
            ->CursorPaginate(25);
        $count = $products->count();
        return view('product.list', [
            'products' => $products,
            'count' => $count
        ]);
    }

    public function addForm()
    {
        return view('product.add');
    }

    public function saveAdd(Request $request)
    {
        $product = new Product();

        $product->fill($request->all());

        if ($request->thumbnail_url) {
            $image = $request->thumbnail_url;
            $imageName = $image->hashName();
            $product->thumbnail_url = $image->storeAs('images/products', $imageName);
        } else {
            $product->thumbnail_url = '';
        }
        $product->save();
        return redirect()->route('products.list');
    }

    public function delete($id)
    {
       $product = Product::find($id);
       $product->delete();
       return redirect()->back();
    }
}
