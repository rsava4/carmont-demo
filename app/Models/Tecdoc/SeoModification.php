<?php

namespace App\Models\Tecdoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoModification extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'seo_modifications';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'fullname', 'construction_interval', 'image', 'attributes', 'seo_generation_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'attributes' => 'array',
    ];
}
