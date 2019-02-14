<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('App\Products', 'product_categories', 'category_id', 'product_id');
    }
}
