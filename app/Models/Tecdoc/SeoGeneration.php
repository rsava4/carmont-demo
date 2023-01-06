<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoGeneration extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'seo_generations';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'fullname', 'slug', 'body_type', 'start_date', 'end_date', 'image', 'seo_model_id', 'is_off'];

    public function model()
    {
        return $this->belongsTo(SeoModel::class, 'seo_model_id', 'id')->where('is_off', false);
    }

    public function carRoute()
    {
        return $this->morphOne(SeoCarRoute::class, 'routable');
    }

    public function modifications(){
        return $this->hasMany(SeoModification::class, 'seo_generation_id');
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
