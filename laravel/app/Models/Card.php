<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AlexCrawford\Sortable\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
     * Get the column that for current card.
     */
    public function column()
    {
        return $this->belongsTo(Column::class, 'column_id');
    }


}
