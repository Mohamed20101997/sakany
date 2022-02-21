<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{

    public function tag(){
        return $this->belongsTo(Tag::class,'tag_id');
    }
}
