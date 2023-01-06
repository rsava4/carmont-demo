<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Catalog\GetArticleService;

class ProductController extends Controller
{
    private $getArticleService;
    public function __construct(GetArticleService $getArticleService)
    {
        $this->getArticleService = $getArticleService;
    }

    //
    public function popularProducts(){
        $result = ['products' => $this->getArticleService->getPopular()];

        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => ''
        ]);
    }
}
