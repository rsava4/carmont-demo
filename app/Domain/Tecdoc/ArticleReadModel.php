<?php

namespace App\DataTransferObjects\Tecdoc;

use App\Models\Tecdoc\Article;

class ArticleReadModel{
    /** @var $ID */
    private $ID;
    /** @var $name */
    public $name;
    /** @var $sku */
    public $sku;
    /** @var $brand */
    public $brand;
    /** @var $slug */
    public $slug;
    /** @var $brandSlug */
    public $brandSlug;
    /** @var $image */
    public $image;

    /**
     * @param Article
     * @return ArticleReadModel
     */
    public static function fromModel(Article $article): self
    {
        $product = new self();
        $product->ID = $article->id;
        $product->name = $article->name;
        $product->sku = $article->sku;
        $product->brand = $article->brand;
        $product->brandSlug = $article->brand_slug;
        $product->slug = $article->slug;
        $product->offers = $article->offers;
        $product->min_price = $article->min_price;
        $product->max_price = $article->max_price;
        $product->image = 'http://api.carmont.devel/public/parts/'.$article->image;
        return $product;
    }
}
