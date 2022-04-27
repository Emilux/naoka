<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlexCrawford\Sortable\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Column extends Model
{
    use HasFactory;
    use SortableTrait;


    protected $fillable = [
        'name',
        'position',
        'board_id'
    ];


    /**
     * Get the post that owns the comment.
     */
    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    /**
     * Get the card that owns the comment.
     */
    public function cards()
    {
        return $this->hasMany(Card::class, 'column_id')->sorted();
    }
}
