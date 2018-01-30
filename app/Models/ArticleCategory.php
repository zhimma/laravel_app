<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_categorys';
    protected $fillable = ['name', 'parent_id', 'description', 'status'];
}