<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'tecdoc_brands';
    public $timestamps = false;

    protected $fillable = ['id', 'supplier_id', 'name', 'name_ru', 'slug', 'country', 'is_visible'];
}
