<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\WithBasket;
use App\Models\Basket;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    use WithBasket;

    public function addItem(Product $product, Request $request)
    {
        $basket = $this->activeBasket();

        if ($basket->products->contains($product)) {
            return response()->json([
                'error' => 'already in basket'
            ], 422);
        }

        Item::create([
            'basket_id' => $basket->id,
            'product_id' => $product->id,
        ]);

        return response()->json([
            'basket_id' => $basket->id,
            'items' => $basket->items->load('product'),
        ], 201);
    }


    public function updateItem(Item $item, Request $request)
    {
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:1']
        ]);

        $basket = $this->activeBasket();

        $quantity = $request->input('quantity');

        if (!$basket->items->contains($item)) {
            return response()->json([
                'error' => 'item not found'
            ], 422);
        }

        $item->update(['quantity' => $quantity]);

        return response()->json([
            'item_id' => $item->id,
        ], 200);
    }

    public function destroyItem(Item $item)
    {
        $basket = $this->activeBasket();

        if (!$basket->items->contains($item)) {
            return response()->json([
                'error' => 'item not found'
            ], 422);
        }

        $item->delete();

        return response()->json([
            'basket_id' => $basket->id,
        ], 200);
    }
}
