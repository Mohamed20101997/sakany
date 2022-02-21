<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $fillable = ['name','email','website','comment','save','article_id'];

    public function article(){
        return $this->belongsTo(Article::class, 'article_id');
    }


    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
                $q->where('name' , 'like' , "%$search%");
            return $q->orWhere('comment' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch



    public function scopeWhenArticle($query , $article)
    {
        return $query->when($article, function($q) use($article) {
            return $q->whereHas('article', function($qu) use($article){
                return $qu->where('article_id', $article);
//                    ->orWhereIn('name', (array)$article);
            });
        });
    } //scopeWhenCategory

}
