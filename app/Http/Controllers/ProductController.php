<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, Product $product)
    {
        //  $request->validate([
        //     'name' => 'sometimes|string',
        //     'price' => 'sometimes|numeric'
        // ],
        // [ 
        //     'name.required' => 'ပစ္စည်းအမည် ဖြည့်သွင်းပါ။',
        //     'price.required' => '‌ဈေးနှုန်း ဖြည့်သွင်းပါ။',
        //     'name.string' => 'ပစ္စည်းအမည်ကို စာဖြင့် ဖြည့်သွင်းပါ။',
        //     'price.numeric' => 'ဈေးနှုန်းကို ဂဏန်းဖြင့် ဖြည့်သွင်းပါ။',
        // ]);

        $product->update($request->only('name', 'price'));
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->save();
        return $product;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $product;
    }
}
