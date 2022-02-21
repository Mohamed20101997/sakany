<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [ 'user_id', 'article_id','comment'];

    //Relations

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id','id');

    } /*end of users relation*/


    public function article()
    {
        return $this->belongsTo(Article::class , 'user_id','id');

    } /*end of users relation*/
}
