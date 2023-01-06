<?php

namespace App\Domain\Tecdoc;

use App\Models\Tecdoc\SeoMaker;

final class MakerReadModel{
    /** @var $ID */
    private $ID;
    /** @var $name */
    public $name;
    /** @var $nameRu */
    public $nameRu;
    /** @var $slug */
    public $slug;
    /** @var $url */
   // public $url;

    public function __construct()
    {

    }
    /**
     * @param SeoMaker
     * @return MakerReadModel
     */
    public static function fromModel(SeoMaker $seoMaker): self
    {
        $maker = new self();
        $maker->ID = $seoMaker->id;
        $maker->name = $seoMaker->name;
        $maker->nameRu = $seoMaker->name_ru;
        $maker->slug = $seoMaker->slug;
        //$maker->url = implode('/',  ['', 'avtozapchasti', $seoMaker->slug]);
        return $maker;
    }
}
