<?php

namespace App\Domain\Tecdoc;

use Illuminate\Support\Collection;
use App\Models\Tecdoc\SeoMaker;
use App\Domain\Tecdoc\MakerReadModel;

final class MakerReadCollection{

    public static function fromArray(array $data): Collection
    {
        return  collect(array_map(fn(SeoMaker $item) => MakerReadModel::fromModel($item), $data));

    }
}
