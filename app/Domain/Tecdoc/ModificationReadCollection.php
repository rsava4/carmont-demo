<?php

namespace App\DataTransferObjects\Tecdoc;


use App\DataTransferObjects\Tecdoc\ModificationReadModel;
use App\Models\Tecdoc\SeoModification;
use Illuminate\Support\Collection;



final class ModificationReadCollection{

    public static function fromArray(array $data): Collection
    {
        return  collect(array_map(fn(SeoModification $item) => ModificationReadModel::fromModel($item), $data));

    }
}
