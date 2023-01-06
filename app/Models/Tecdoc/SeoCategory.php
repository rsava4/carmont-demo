<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoCategory extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'seo_categories';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'slug', 'n_left', 'n_right', 'n_level', 'image', 'is_active', 'is_popular', 'has_products', 'parent_id'];

    /**
     * Scope a query to only include enabled categories
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnabled($query)
    {
        return $query->where('is_active', '=', true);
    }

    /**
     * Scope a query to only include popular categories
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopular($query)
    {
        return $query->where('is_popular', '=', true);
    }
}
