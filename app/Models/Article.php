<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\ArticleTags;

class Article extends Model
{

 protected $fillable = ['name','description','image','category_id','admin_id','date','author_id','status','pinned'];

 protected $appends = ['image_path'];


  //Start of Relations
  public function category(){
      return $this->belongsTo(Category::class, 'category_id','id');
  }

  public function author(){
      return $this->belongsTo(Author::class, 'author_id','id');
  }

    public function tags(){
        return $this->belongsToMany( Tag::class ,ArticleTags::class, 'article_id', 'tag_id');
    }

    public function articleTags(){
        return $this->hasMany(ArticleTags::class ,'article_id');
    }


    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%") ;
        });

    } //end of scopeWhenSearch


    public function scopeWhenCategory($query , $category)
    {
        return $query->when($category , function($q) use($category) {

            return $q->whereHas('category', function($qu) use($category){
                return $qu->whereIn('category_id', (array)$category)
                    ->orWhereIn('name', (array)$category);
            });
        });
    } //scopeWhenCategory


    public function getImagePathAttribute(){

        return Storage::url('images/'. $this->image);

    } // end of getImagePathAttribute


    public function getViewAttribute($value){

      $view = (int)$value;
        if($view >= 1000 && $view < 9990000){
            $view /= 1000 ;
            $view = $view.'K';
        }elseif ($view >= 1000000)
        {
            $view /= 1000000;
            $view = $view.'M';
        }

        return $view;

    } // end of getImagePathAttribute

    public function status($value){
      $status = '';
      $value == 1 ? $status = 'Active' : $status = 'Not Active';

      return $status;
    }


    public function getTagId($art_id,$id){

      $articleTas = ArticleTags::where([['article_id',$art_id],['tag_id',$id]])->first();

      if($articleTas)
      {
          $id = $articleTas->tag_id ;
      }else{
          $id = null;
      }

      return $id;

    }

}
