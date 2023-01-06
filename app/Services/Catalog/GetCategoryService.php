<?php

namespace App\Services\Catalog;

use App\DataTransferObjects\Tecdoc\CategoryReadCollection;
use App\Models\Tecdoc\SeoCategory;

class GetCategoryService{

    public function getAll(){
        $categories = CategoryReadCollection::fromArray(SeoCategory::orderBy('n_left')->enabled()->get()->all());
        return $this->getCategoriesTree($categories);
    }

    public function getPopular(){
        $categories = CategoryReadCollection::fromArray(SeoCategory::orderBy('n_left')->enabled()->popular()->get()->all());
        return $this->getCategoriesTree($categories);
    }

    private function getCategoriesTree($categories){
        $tree = [];
        $parent = 0;
        foreach ($categories as $category) {
            if($category->getLevel() == 1){
                $parent = $category->getId();
                $tree[$parent] = [
                    'category' => $category,
                    'childs' => []
                ];
            }elseif ($category->getLevel()>1 && $category->getHasProducts()){
                $tree[$parent]['childs'][] = $category;
            }
        }
        $sorted = collect($tree)->sortBy(function($item, $key){
            return $item['category']->position;
        });
        return $sorted->values()->all();

    }
}
