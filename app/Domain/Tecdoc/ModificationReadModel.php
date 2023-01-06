<?php

namespace App\DataTransferObjects\Tecdoc;

use App\Models\Tecdoc\SeoModification;

final class ModificationReadModel{
    /** @var $ID */
    public $ID;
    /** @var $name */
    public $name;
    /** @var $fullName */
    public $fullName;
    /** @var $constructionInterval */
    public $constructionInterval;
    /** @var $image */
    public $image;
    /** @var $attributes */
    public $attributes;
    /** @var $slug */
    public $slug;
    /** @var $url */
    public $url;


    public function __construct()
    {

    }
    /**
     * @param SeoModification
     * @return ModificationReadModel
     */
    public static function fromModel(SeoModification $seoModification): self
    {
        $modification = new self();
        $modification->ID = $seoModification->id;
        $modification->name = $seoModification->name;
        $modification->fullName = $seoModification->fullname;
        $modification->image = $seoModification->image;
        $modification->constructionInterval = $seoModification->construction_interval;
        $modification->slug = $seoModification->id;
        $modification->url = route('avtozapchasti.cars', ['slug' => $modification->slug]);
        return $modification;
    }
}
