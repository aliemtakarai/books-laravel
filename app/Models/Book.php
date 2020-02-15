<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * define table name
     */
    protected $table = "books";

    /**
     * BelongsTo Relation to Book Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\BookCategory', 'book_category_id', 'id');
    }
}
