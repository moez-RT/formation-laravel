<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'detail' ,'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'article_category','article_id' ,'category_id');

    }
}
