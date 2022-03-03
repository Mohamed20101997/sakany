<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeImage extends Model
{
    public $timestamps = false;
    protected $fillable = ['image', 'home_id'];


//    Relation
    public function home(){
        return $this->belongsTo(Home::class , 'home_id' ,'id');
    }
}
