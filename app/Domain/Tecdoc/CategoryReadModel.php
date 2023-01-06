<?php

namespace App\DataTransferObjects\Tecdoc;

use App\Models\Tecdoc\SeoCategory;

final class CategoryReadModel{
    /** @var $ID */
    private $ID;
    /** @var $name */
    public $name;
    /** @var $nameRu */
    public $image;
    /** @var $slug */
    public $slug;
    /** @var $url */
    public $url;
    public $position;

    private $nLKey;
    private $nRKey;
    private $nLevel;
    private $hasProducts;

    /**
     * @param SeoCategory
     * @return CategoryReadModel
     */
    public static function fromModel(SeoCategory $seoCategory): self
    {
        $category = new self();
        $category->ID = $seoCategory->id;
        $category->name = $seoCategory->name;
        $category->image = $seoCategory->image;
        $category->slug = $seoCategory->slug;
        $category->nLKey = $seoCategory->n_left;
        $category->nRKey = $seoCategory->n_right;
        $category->nLevel = $seoCategory->n_level;
        $category->hasProducts = (bool)$seoCategory->has_products;
        $category->position = (bool)$seoCategory->position;
        return $category;
    }

    public function getLeft(){
        return $this->nLKey;
    }

    public function getRight(){
        return $this->nRKey;
    }

    public function getLevel(){
        return $this->nLevel;
    }

    public function getId(){
        return $this->ID;
    }

    public function getHasProducts(){
        return $this->hasProducts;
    }

}
