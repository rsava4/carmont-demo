<?php

namespace App\DataTransferObjects\Tecdoc;

use App\DataTransferObjects\Tecdoc\CategoryReadModel;
use Illuminate\Support\Collection;
use App\Models\Tecdoc\SeoCategory;


final class CategoryReadCollection{

    public static function fromArray(array $data): Collection
    {
        return  collect(array_map(fn(SeoCategory $item) => CategoryReadModel::fromModel($item), $data));

    }
}
