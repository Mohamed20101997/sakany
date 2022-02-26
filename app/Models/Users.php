<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = false;

    protected $fillable = ['name','email','password','age','mobile', 'image',];

    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%")
                ->orWhere('email' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch

}
