<?php

namespace App\Models;

use App\Enum\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'status' => OrderStatus::class,
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }

}
