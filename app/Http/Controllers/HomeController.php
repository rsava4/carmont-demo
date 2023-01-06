<?php

namespace App\Http\Controllers;

use App\Services\Catalog\GetMakerService;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    private $getMakerService;
    public function __construct(GetMakerService $getMakerService)
    {
        $this->getMakerService = $getMakerService;
    }
    public function popularMakers(){
        $result = ['makers' => $this->getMakerService->getPopular()];
        return response()->json([
            'success' => true,
            'result' => $result,
            'message' => ''
        ]);
    }
}
