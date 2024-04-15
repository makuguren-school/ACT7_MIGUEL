<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'category' => 'nullable|string',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $filename = NULL;
        $path = NULL;

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/products/';
            $file->move($path, $filename);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $path.$filename,
        ]);

        return redirect('products')->with('message', 'Products Created Successfully!');
    }

    public function edit(int $product_id){
        $product = Product::findOrfail($product_id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, int $product_id){
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'category' => 'nullable|string',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $product = Product::findOrFail($product_id);

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/products/';
            $file->move($path, $filename);

            if(File::exists($product->image)){
                File::delete($product->image);
            }
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $path.$filename,
        ]);

        return redirect('products')->with('message', 'Products Updated Successfully!');
    }

    public function destroy(int $product_id){
        $product = Product::findOrFail($product_id);
        if(File::exists($product->image)){
            File::delete($product->image);
        }

        $product->delete();

        return redirect()->back()->with('message', 'Products Deleted Successfully!');
    }
}
