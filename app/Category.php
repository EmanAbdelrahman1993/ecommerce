<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable = [
        'name',
        'parent_id',
        'user_id'

    ];
    public function Category()
    {
        return $this->hasMany('App\Category','parent_id','id');
    }
    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    public function parentName($parent_id)
    {
        $parent = Category::where('id',$parent_id)->get();

        return $parent->name;
    }


}
