<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularProduct extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'popular_products';
    public $timestamps = false;
}
