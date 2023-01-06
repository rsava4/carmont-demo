<?php

namespace App\Models\Price;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceOffer extends Model
{
    use HasFactory;

    protected $table = 'price_offers';

    protected $fillable = ['delivery', 'base_price', 'price', 'is_opt', 'quantity', 'product_id', 'price_id', 'sku_slug', 'brand_slug'];
}
