<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $perPage = $request->query('per_page', 5);
        return new ProductCollection( Product::paginate( $perPage ) );
    }
}
