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
        'board_id',
        'archive',
    ];


    /**
     * Get the board that for current column.
     */
    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    /**
     * Get all card that for current column.
     */
    public function cards()
    {
        return $this->hasMany(Card::class, 'column_id')->where('archive', '=', 1)->sorted();
    }
}
