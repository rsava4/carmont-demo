<?php


namespace App\Domain\Tecdoc;

use App\Domain\Tecdoc\ModelReadModel;
use Illuminate\Support\Collection;
use App\Models\Tecdoc\SeoModel;


final class ModelReadCollection
{

    public static function fromArray(array $data): Collection
    {
        return collect(array_map(fn(SeoModel $item) => ModelReadModel::fromModel($item)->getCatalogModelAsObject(), $data));

    }
}
