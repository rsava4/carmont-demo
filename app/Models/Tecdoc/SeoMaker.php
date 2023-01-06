<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMaker extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'seo_makers';
    public $timestamps = false;

    protected $fillable = ['name', 'name_ru', 'slug', 'is_off', 'is_popular', 'image'];

    public function carRoute()
    {
        return $this->morphOne(SeoCarRoute::class, 'routable');
    }

    public function enabledModels(){
        return $this->hasMany(SeoModel::class, 'seo_maker_id')->enabled();
    }

    /**
     * Scope a query to only include enabled makers
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnabled($query)
    {
        return $query->where('is_off', '=', false);
    }

    /**
     * Scope a query to only include enabled makers
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopular($query)
    {
        return $query->where('is_popular', '=', true);
    }
}
