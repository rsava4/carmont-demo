<?php

namespace App\Domain\Catalog;

use App\Models\Tecdoc\SeoCarRoute;

final class RoutableModel{
    /** @var model*/
    private $model;
    /** @var modelName*/
    private $modelType;

    public function __construct(SeoCarRoute $carRoute)
    {
        if(empty($carRoute)){
            return false;
        }

        $this->modelType = $carRoute->routable_type;
        $this->model = $carRoute->routable;

    }


    public function getModel(){
        return $this->model;
    }

    public function getModelType(){
        return $this->modelType;
    }
}
