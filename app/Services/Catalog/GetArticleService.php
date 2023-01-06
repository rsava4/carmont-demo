<?php

namespace App\Services\Catalog;

use App\DataTransferObjects\Tecdoc\ArticleReadCollection;
use App\Models\Tecdoc\Article;

class GetArticleService{
    public function getPopular(){
        return ArticleReadCollection::fromArray(
            Article::select('tecdoc_articles.sku', 'tecdoc_articles.slug', 'tecdoc_articles.name', 'tecdoc_articles.image','tecdoc_articles.supplier_id')
                ->selectRaw('price_offers.product_id, MIN(price_offers.price) as min_price, MAX(price_offers.price) as max_price, COUNT(distinct price_offers.id) as offers')
                ->selectRaw('tecdoc_brands.slug as brand_slug, tecdoc_brands.name as brand')
                ->join('price_offers', function ($join){
                    $join->on('price_offers.sku_slug', '=', 'tecdoc_articles.found_string')->on('price_offers.supplier_id', '=', 'tecdoc_articles.supplier_id');
                })
                ->join('tecdoc_brands', 'tecdoc_brands.supplier_id', '=', 'tecdoc_articles.supplier_id')
                ->where('price_offers.is_opt', false)
                ->popular()->groupBy('tecdoc_articles.sku')->groupBy('tecdoc_articles.supplier_id')
                ->get()->all()
        );
    }
}
