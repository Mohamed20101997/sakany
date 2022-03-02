<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Owners extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $fillable = ['name','email','password','age','mobile', 'image', 'id_image','statues'];

    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%")
                ->orWhere('email' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch

    public function getActive(){
        return $this->statues == 1 ? 'مفعل' : 'غير مفعل' ;
    }


}
