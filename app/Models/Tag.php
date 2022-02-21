<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['name'];
    protected $hidden = ['pivot'];

    public function articles(){
        return $this->hasMany(ArticleTags::class, 'tag_id');
    }


    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%") ;
        });

    } //end of scopeWhenSearch



}
