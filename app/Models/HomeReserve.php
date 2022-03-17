<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class HomeReserve extends Model
{
    public $timestamps = false;
    protected $fillable= ['user_id','home_id'];

    public function user(){
        return $this->belongsTo(User::class , 'user_id', 'id');
    }
    public function home(){
        return $this->belongsTo(Home::class , 'home_id', 'id');
    }
}
