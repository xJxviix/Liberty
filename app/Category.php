<?php

namespace Liberty;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['id', 'name'];

    /*
    Una Categoria puede pertenecer a muchos productos
    */
    public function products()
    {
        return $this->hasMany('Liberty\Product');
    }

}
