<?php

namespace App\Http\Controllers\Traits;

use App\Models\Basket;
use Illuminate\Support\Facades\Cache;

trait WithBasket
{
    function activeBasket(): Basket
    {
        $basketKey = sha1(request()->userAgent() . request()->ip());

        if (Cache::has($basketKey) && ($basket = Basket::find(cache($basketKey)))) {
            return $basket;
        }

        $basket = new Basket();
        $basket->user_id = request()->user()?->id ?? null;
        $basket->save();

        Cache::forever($basketKey, $basket->id);

        return $basket;
    }
}
