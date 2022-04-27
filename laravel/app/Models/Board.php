<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\TeamTenant;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    use TeamTenant;
    use HasUuid;

    protected $fillable = [
        'name',
        'identifier',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id')->first();
    }

    /**
     * Get all column for current boards.
     */
    public function columns()
    {
        return $this->hasMany(Column::class, 'board_id')->where('archive', '=', 1)->sorted();
    }

    /**
     * Get all cards for current boards.
     */
    public function cards()
    {
        return $this->hasManyThrough(Card::class, Column::class)->toSql();
    }
}
