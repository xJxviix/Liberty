<?php

namespace Liberty;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['id', 'nombre', 'descripcion', 'precio', 'image', 'category_id'];

    public $timestamps = true;

    /*
    Un producto puede tener solo una Categoria
    */
    public function category()
    {
        return $this->belongsTo('Liberty\Category');
    }

}
