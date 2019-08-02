<?php

namespace Liberty;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['id', 'title', 'content', 'price', 'user_id', 'category_id'];

    /*
    Un producto puede tener solo una Categoria
    */
    public function category()
    {
        return $this->belongsTo('Liberty\Category');
    }
}
