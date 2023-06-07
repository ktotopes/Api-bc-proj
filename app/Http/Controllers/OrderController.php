<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\WithBasket;
use App\Http\Requests\OrderRequest;
use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use WithBasket;

    public function index()
    {
        return response()->json([
            'orders' => auth()->user()?->orders,
        ]);
    }

    public function store(OrderRequest $request)
    {
       $basket = $this->activeBasket();

        if (!$basket?->items->count()) {
            return response()->json([
                'error' => 'basket is empty'
            ], 422);
        }

        $total = 0;

        foreach ($basket->items as $item) {
            $total += $item->product->price * $item->quantity;
        }

        $order = new Order([
            ...$request->validated(),
            'user_id' => $request->user()?->id,
            'total' => $total,
        ]);
        $order->save();

        //старая запись
//        foreach ($basket->items as $item){
//            $item->update([
//                'basket_id' => null,
//                'order_id' => $order->id,
//            ]);
//        }


//новая запись
        $basket->items->each(fn($item) => $item->update([
            'basket_id' => null,
            'order_id' => $order->id,
        ]));

        return response()->json([
            'order' => $order,
        ], 201);
    }
}
