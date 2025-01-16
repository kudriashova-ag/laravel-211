<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ShopController extends Controller
{
    function category(Category $category)
    {
        $products = $category->products()->paginate(12);
        return view('shop.category', compact('category', 'products'));
    }

    function product(Product $product){
        return view('shop.product', compact('product'));
    }
}
