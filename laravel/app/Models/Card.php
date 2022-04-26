<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AlexCrawford\Sortable\SortableTrait;

class Card extends Model
{
    use HasFactory;
    use SortableTrait;

    protected $fillable = [
        'name',
        'description',
        'position',
        'column_id',
        'archive',
        'count',
    ];

    /**
     * 
     */
    public function column()
    {
        return $this->belongsTo(Column::class, 'board_id')->get();
    }


}
