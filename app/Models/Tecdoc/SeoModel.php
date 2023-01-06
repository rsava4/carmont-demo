<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'seo_models';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'fullname', 'slug', 'is_off', 'image', 'seo_maker_id'];

    public function maker()
    {
        return $this->belongsTo(SeoMaker::class, 'seo_maker_id', 'id')->enabled();
    }

    public function enabledGenerations(){
        return $this->hasMany(SeoGeneration::class, 'seo_model_id', 'id')->enabled();
    }

    public function carRoute()
    {
        return $this->morphOne(SeoCarRoute::class, 'routable');
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnabled($query)
    {
        return $query->where('is_off', '=', false);
    }
}
