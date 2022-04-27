<?php

namespace App\Models\Traits;

use Auth;
use Illuminate\Database\Eloquent\Model;

Trait TeamTenant
{
    public static function bootTeamTenant(){
        static::creating(function (Model $model){
            $model->team_id = Auth::user()->currentTeam->id;
        });
    }
}
