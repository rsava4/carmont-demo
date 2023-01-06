<?php

namespace App\DataTransferObjects\Tecdoc;

use App\Models\Tecdoc\SeoModel;

final class ModelReadModel{
    /** @var $ID */
    private $ID;
    /** @var $name */
    private $name;
    /** @var $fullName */
    private $fullName;
    /** @var $image */
    private $image;
    /** @var $slug */
    private $slug;
    /** @var $url */
    private $url;

    public function __construct()
    {

    }
    /**
     * @param SeoModel
     * @return ModelReadModel
     */
    public static function fromModel(SeoModel $seoModel): self
    {
        $model = new self();
        $model->ID = $seoModel->id;
        $model->name = $seoModel->name;
        $model->fullName = $seoModel->fullname;
        $model->image = $seoModel->image;
        $model->slug = $seoModel->slug;
        $model->url = route('avtozapchasti.cars', ['slug' => $seoModel->slug]);
        return $model;
    }

    /**
     * @return object
     */
    public function getCatalogModelAsObject(){
        return (object)[
            'name' => $this->name,
            'fullName' => $this->fullName,
            'image' => $this->image,
            'slug' => $this->slug,
            'url' => $this->url,
        ];
    }
}
