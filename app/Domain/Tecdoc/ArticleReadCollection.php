<?php

namespace App\DataTransferObjects\Tecdoc;

use App\Models\Tecdoc\Article;
use Illuminate\Support\Collection;

class ArticleReadCollection{
    public static function fromArray(array $data): Collection
    {
        return  collect(array_map(fn(Article $item) => ArticleReadModel::fromModel($item), $data));

    }
}
