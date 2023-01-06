<?php

namespace App\Services\Catalog;

use App\Domain\Catalog\RoutableModel;
use App\Models\Tecdoc\SeoCarRoute;

final  class GetRoutableModel{

    public function getRoutableModel($slug){
        if(!$carRoute = SeoCarRoute::where('slug', $slug)->first()){
            return null;
        }

        $routableModel = new RoutableModel($carRoute);

        return $routableModel;
    }
}
