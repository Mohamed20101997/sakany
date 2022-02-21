<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Author extends Model
{
    protected $fillable = ['name','image','brief','social_links'];
    protected $appends = ['image_path'];



    public function getImagePathAttribute(){

        return Storage::url('images/'. $this->image);

    } // end of getImagePathAttribute



    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%") ;
        });

    } //end of scopeWhenSearch
}
