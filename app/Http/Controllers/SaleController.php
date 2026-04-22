<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        $products = Product::all();
        return view("sales", compact("sales","products"));
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
        $sale = new Sale;
        $sale->customer_name  = $request->nombre;
        $sale->quantity  = $request->cantidad;
        $sale->product_id  = $request->productos;
        $sale->user_id  = auth()->id();
        $sale->save();
        return redirect()->route("sales.index");
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
        $sale = Sale::find($id);
        $products = Product::all();
        return view("sales_edit", compact("sale", "products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $sale = Sale::find($id);
        $sale->customer_name  = $request->nombre;
        $sale->quantity  = $request->cantidad;
        $sale->product_id  = $request->productos;
        $sale->user_id  = auth()->id();
        $sale->save();
        return redirect()->route("sales.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        return redirect()->route("sales.index");
    }
}
