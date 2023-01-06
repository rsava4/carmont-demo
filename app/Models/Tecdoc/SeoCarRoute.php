<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Relation;

use App\Models\RouteTypeMetaTemplate;


class SeoCarRoute extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'seo_car_routes';


    protected $fillable = ['routable_type', 'routable_id', 'slug', 'path'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function routable()
    {
        return $this->morphTo(__FUNCTION__, 'routable_type', 'routable_id')->where('is_off', false);
    }

    public function typeMetaTemplate(){
        return $this->hasOne(\App\Models\RouteTypeMetaTemplate::class, 'routable_type', 'routable_type');
    }

    protected static function boot() {
        parent::boot();

        Relation::morphMap([
            1 => SeoMaker::class,
            2 => SeoModel::class,
            3 => SeoGeneration::class,
        ]);
    }
}
