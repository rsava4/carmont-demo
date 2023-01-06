<?php

namespace App\Scopes\Tecdoc;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class EnabledScope implements Scope{
    public function apply(Builder $builder, Model $model){
        $builder->where('is_off', false);
    }
}
