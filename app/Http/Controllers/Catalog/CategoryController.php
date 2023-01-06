<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Services\Catalog\GetCategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $getCategoryService;
    public function __construct(GetCategoryService $getCategoryService)
    {
        $this->getCategoryService = $getCategoryService;
    }

    public function categories(Request $request){
        $isPopular = (bool)$request->popular;
        $result = ['categories' => $isPopular? $this->getCategoryService->getPopular() :$this->getCategoryService->getAll()];
        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => ''
        ]);
    }
}
