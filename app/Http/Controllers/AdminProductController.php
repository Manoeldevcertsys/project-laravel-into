<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index() {

        $products = Product::paginate(5);

        return view('admin.product', [
            'products' => $products
        ]);
    }

    public function create() {
        return view('admin.product_create');
    }

    public function store(ProductStoreRequest $request) {
        $inputs = $request->validated();

        $inputs['slug'] = Str::slug($inputs['name']);

        if(!empty($inputs['cover']) && $inputs['cover']->isValid()){
            $file = $inputs['cover'];
            $path = $file->store('products');
            $inputs['cover'] = $path;
        }

        Product::create($inputs);
        return redirect()->route('admin.product');
    }

    public function edit(Product $product) {
        return view('admin.product_edit', ['product' => $product]);
    }

    public function update(Product $product, ProductStoreRequest $request) {
        $inputs = $request->validated();

        if(!empty($inputs['cover']) && $inputs['cover']->isValid()){
            Storage::delete($product->cover ?? '');
            $file = $inputs['cover'];
            $path = $file->store('products');
            $inputs['cover'] = $path;
        }

        $inputs['slug'] = Str::slug($inputs['name']);

        $product->fill($inputs);
        $product->save();

        return redirect()->route('admin.product');
    }

    public function destroy(Product $product) {
        $product->delete();
        Storage::delete($product->cover ?? '');
        return redirect()->route('admin.product');
    }
}
