<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Products extends Model
{

    protected $table = 'products';

    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany('App\Categories', 'product_categories', 'product_id', 'category_id');
    }
}
