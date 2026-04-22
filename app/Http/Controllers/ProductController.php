<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view("products", compact("products", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name  = $request->nombre;
        $product->price  = $request->precio;
        $product->category_id  = $request->categorias;
        $product->save();
        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view("products_edit", compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $product = Product::find($id);
        $product->name  = $request->nombre;
        $product->price  = $request->precio;
        $product->category_id  = $request->categorias;
        $product->save();
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->sale()->exists()){
            return redirect()->route("products.index")->with("error", "No se puede eliminar una producto porque tiene ventas asociadas");
        }
        $product->delete();
        return redirect()->route("products.index");
    }
}
