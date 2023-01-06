<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteTypeMetaTemplate extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'route_type_meta_templates';

    protected $fillable = ['routable_type', 'meta', 'top_page_content', 'bottom_page_content', 'empty_result_content'];

    protected $casts = [
        'meta' => 'object'
    ];
}
