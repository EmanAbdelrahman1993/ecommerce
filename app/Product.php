<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=[
        'name',
        'price',
        'size',
        'color',
        'file',
        'image',
        'cat_id',
        'user_id'

    ];

    public function Category()
    {
        return $this->hasOne('App\Category','id','cat_id');
    }


    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
