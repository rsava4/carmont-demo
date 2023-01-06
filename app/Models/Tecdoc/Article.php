<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tecdoc_articles';
    public $timestamps = false;

    protected $fillable = ['supplier_id', 'sku', 'found_string', 'name', 'slug', 'image', 'product_id'];

    public function supplier(){
        return $this->hasOne(Brands::class, 'supplier_id', 'supplier_id');
    }

    /**
     * Scope a query to only include enabled makers
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopular($query)
    {
        return $query->join('popular_products', function ($join){
            $join->on('popular_products.sku_slug', '=', 'tecdoc_articles.found_string')->on('popular_products.supplier_id', '=', 'tecdoc_articles.supplier_id');
        })->orderBy('popular_products.offers', 'DESC');
    }
}
