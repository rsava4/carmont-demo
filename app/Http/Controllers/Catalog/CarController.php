<?php

namespace App\Http\Controllers\Catalog;


use App\Http\Controllers\Controller;
use App\Models\Tecdoc\SeoGeneration;
use App\Models\Tecdoc\SeoMaker;
use App\Models\Tecdoc\SeoModel;
use App\Services\Catalog\GetMakerService;
use Illuminate\Http\Request;

use App\Models\Tecdoc\SeoCarRoute;

use App\Services\Catalog\GetRoutableModel;

use App\Domain\Tecdoc\MakerReadModel;
use App\Domain\Tecdoc\MakerReadCollection;
use App\Domain\Tecdoc\ModelReadModel;
use App\Domain\Tecdoc\ModelReadCollection;
use App\Domain\Tecdoc\GenerationReadModel;
use App\Domain\Tecdoc\GenerationReadCollection;
use App\Domain\Tecdoc\ModificationReadModel;
use App\Domain\Tecdoc\ModificationReadCollection;


class CarController extends Controller
{
    private $getMakerService;
    public function __construct(GetMakerService $getMakerService)
    {
        $this->getMakerService = $getMakerService;
    }

    public function makers(Request $request){
        $isPopular = (bool)$request->popular;

        $result = ['makers' => $isPopular? $this->getMakerService->getPopular() :$this->getMakerService->getAll()];
        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => ''
        ]);
    }

    public function list(Request $request, GetRoutableModel $getRoutableModel){
        $routableModel = $getRoutableModel->getRoutableModel($request->slug);
        $category = $request->category;
        switch ($routableModel->getModelType()){
            case 1:
                $maker = $routableModel->getModel();
                $result = [
                    'maker' => MakerReadModel::fromModel($maker)->getCatalogMakerAsObject(),
                    'list'=> ModelReadCollection::fromArray($maker->enabledModels->all())
                ];
                break;
            case 2:
                return $this->getGenerations($request, $routableModel->getModel());
                break;
            case 3:
                return $this->getModifications($request, $routableModel->getModel());
                break;
            default:
                abort(404);
                break;
        }
        
        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => ''
        ]);
    }

    public function getMakers(){
        $makers = MakerReadCollection::fromArray(SeoMaker::orderBy('name')->enabled()->get()->all());
        return $makers;
    }

    public function getModels(Request $request, SeoMaker $maker){
        $result = [
            'maker' => MakerReadModel::fromModel($maker)->getCatalogMakerAsObject(),
            'list'=> ModelReadCollection::fromArray($maker->enabledModels->all())
        ];
        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => ''
        ]);
    }

    public function getGenerations(Request $request, SeoModel $model){
        $result = [
            'model' => ModelReadModel::fromModel($model)->getCatalogModelAsObject(),
            'list'=> GenerationReadCollection::fromArray($model->enabledGenerations->all())
        ];
        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => ''
        ]);
    }

    public function getModifications(Request $request, SeoGeneration $generation){
        $result = [
            'model' => GenerationReadModel::fromModel($generation),
            'list'=> ModificationReadCollection::fromArray($generation->modifications->all())
        ];
        
        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => ''
        ]);
    }


}
