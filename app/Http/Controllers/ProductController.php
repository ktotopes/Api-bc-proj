<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidateRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductValidateRequest $request)
    {
        $filter = $request->input('filter');
        return response()->json([
            'products' => Product::query()->where(function (Builder $query) use ($filter) {
                if (isset($filter['category_id'])) {
                    $query->where('category_id', '=', $filter['category_id']);
                }

                $query->orWhere(function (Builder $query) use ($filter) {
                    if (isset($filter['min_price'])) {
                        $query->where('price', '>', $filter['min_price']);
                    }

                    if (isset($filter['max_price'])) {
                        $query->where('price', '<', $filter['max_price']);
                    }

                    return $query;
                });

                return $query;
            })->get(),
        ]);
    }

    public function show(Product $product)
    {
        return response()->json([
            'product' => $product,
        ]);
    }
}
