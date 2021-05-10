<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;

class ProductController extends Controller
{
    
    public function index()
    {
        // if (request('search')) {

            //     return Product::where('name', 'like', '%'. request('search') .'%')
            //     ->orderBy('id', 'desc')->get();

            // }else{

            //     return Product::orderBy('id', 'desc')->get();
        // }

        // $products = Product::query();
            // if (request('search')) {

            //     return $products->where('name', 'like', '%'. request('search') .'%')
            //     ->orderBy('id', 'desc')->get();

            // }else{

            //     return $products->orderBy('id', 'desc')->get();
        // }

        return Product::when(request('search') , function($query) {
            $query->where('name', 'like', '%'. request('search') .'%');
        })->orderBy('id', 'desc')->paginate(5);

    }

    
    public function store(ProductCreateRequest $request)
    {
        // $post = new Product();
            // $post->name = $request->name;
            // $post->price = $request->price;
            // $post->save();

            // Product::create([
            //     'name' => $request->name,
            //     'price' => $request->price
            // ]);

            // request သီးသန့်လုပ်ပြီး ပြောင်းထား
            // $request->validate([
            //     'name' => 'required|string',
            //     'price' => 'required|numeric'
            // ],
            // [ 
            //     'name.required' => 'ပစ္စည်းအမည် ဖြည့်သွင်းပါ။',
            //     'price.required' => '‌ဈေးနှုန်း ဖြည့်သွင်းပါ။',
            //     'name.string' => 'ပစ္စည်းအမည်ကို စာဖြင့် ဖြည့်သွင်းပါ။',
            //     'price.numeric' => 'ဈေးနှုန်းကို ဂဏန်းဖြင့် ဖြည့်သွင်းပါ။',
            // ]);

        $product = Product::create($request->only('name', 'price'));
        // Product::create($request->all());
        return $product;

    }

    
    public function show(Product $product)
    {
        return $product;
    }

    
    public function update(ProductEditRequest $request, Product $product)
    {

        $product->update($request->only('name', 'price'));
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->save();
        return $product;

    }

    
    public function destroy(Product $product)
    {
        $product->delete();

        return $product;
    }
}
