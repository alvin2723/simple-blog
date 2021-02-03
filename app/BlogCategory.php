<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'category_title'
    ];
}
