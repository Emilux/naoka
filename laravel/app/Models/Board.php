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
        'name'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

}
