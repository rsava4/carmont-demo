<?php

namespace App\Services\Catalog;

use App\Models\Tecdoc\SeoMaker;
use App\DataTransferObjects\Tecdoc\MakerReadCollection;

final class GetMakerService{

    public static function getAll(){
        return MakerReadCollection::fromArray(SeoMaker::orderBy('name')->enabled()->get()->all());
    }

    public function getPopular(){
        return MakerReadCollection::fromArray(SeoMaker::orderBy('name')->enabled()->popular()->get()->all());
    }
}
