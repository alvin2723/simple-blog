<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'post_title', 'post_desc', 'category_id', 'img_url'
    ];
}
