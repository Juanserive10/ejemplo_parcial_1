<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;
use App\Models\Category;

class Product_category
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $products = Product::count();
        $categoies = Product::count();
        if($products > 0 and $categoies > 0){
            return $next($request);
        }else{
            return abort(403);
        }
    }
}
