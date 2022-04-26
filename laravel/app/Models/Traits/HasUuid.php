<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

Trait HasUuid
{
    public static function bootHasUuid(){
        static::creating(function  (Model $model)  {
            $model->uuid = (string) Str::uuid();
        });
    }
}
