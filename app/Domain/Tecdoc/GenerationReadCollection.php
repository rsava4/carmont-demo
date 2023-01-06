<?php

namespace App\Domain\Tecdoc;


use Illuminate\Support\Collection;
use App\Models\Tecdoc\SeoGeneration;
use App\Domain\Tecdoc\GenerationReadModel;

final class GenerationReadCollection{

    public static function fromArray(array $data): Collection
    {
        return  collect(array_map(fn(SeoGeneration $item) => GenerationReadModel::fromModel($item)->getCatalogGenerationAsObject(), $data));

    }
}
