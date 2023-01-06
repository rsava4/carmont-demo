<?php

namespace App\Domain\Tecdoc;

use App\Models\Tecdoc\SeoGeneration;

final class GenerationReadModel{
    /** @var $ID */
    public $ID;
    /** @var $name */
    public $name;
    /** @var $fullName */
    public $fullName;
    /** @var $bodyType */
    public $bodyType;
    /** @var $image */
    public $image;
    /** @var $startDate */
    public $startDate;
    /** @var $endDate */
    public  $endDate;
    /** @var $slug */
    public $slug;
    /** @var $url */
    public $url;


    public function __construct()
    {

    }
    /**
     * @param SeoGeneration
     * @return GenerationReadModel
     */
    public static function fromModel(SeoGeneration $seoGeneration): self
    {
        $generation = new self();
        $generation->ID = $seoGeneration->id;
        $generation->name = $seoGeneration->name;
        $generation->fullName = $seoGeneration->fullname;
        $generation->bodyType = $seoGeneration->body_type;
        $generation->image = $seoGeneration->image;
        $generation->startDate = $seoGeneration->start_date;
        $generation->endDate = $seoGeneration->end_date;
        $generation->slug = $seoGeneration->slug;
        $generation->url = route('avtozapchasti.cars', ['slug' => $seoGeneration->slug]);
        return $generation;
    }
}
