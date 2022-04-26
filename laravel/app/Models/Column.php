<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    /**
     * Get the post that owns the comment.
     */
    public function boards()
    {
        return $this->belongsTo(Board::class, 'boards_id')->first();
    }
}
