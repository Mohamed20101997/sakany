
<?php

use App\Models\Review;
use \App\Models\User;
use Illuminate\Support\Facades\DB;

define('PAGINATION_COUNT', 15);

function getFolder(){

    return  app()->getLocale() === 'ar' ? 'css-rtl' : 'css';

}

function parent($id){
    $paret  = \App\Models\Category::where('id', $id)->whereTranslation('locale','en')->get();
    foreach ($paret as $p)
    {
         return $p->name;
    }
}


function uploadImage($folder,$image){
    $image->store('/images', $folder);
    $filename = $image->hashName();
    return  $filename;
 }


function remove_previous($image)
 {
     if(!empty($image)){
         $image_path = public_path().'/uploads/images/'.$image;
         if(file_exists($image_path)){
             unlink($image_path);
         }
     }

 } //end of remove_previous function



function remove_image($folder,$image)
 {
    Storage::disk($folder)->delete($image);

 } //end of remove_previous function

function image_path($val)
 {
    return asset('uploads/images/'. $val);
 }


 function user(){
    return auth()->guard('users');
}

function average($id){
    $rating = Review::where('product_id', $id)->get();
    $count =  $rating->count();
    $sum = 0 ;
    foreach ($rating as $rat){
        $sum += $rat->rating;
    }
    if($count > 0){
        $average = floor($sum/$count);
    }else{
        $average = 0 ;
    }

    return $average;
}

function getUser($id){
    return User::find($id);
}


function getDistaincat($value){
        $dist = \App\Models\Home::distinct($value)->pluck($value)->toArray();


        return $dist;
    }

