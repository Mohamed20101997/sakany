<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public $timestamps = false;

    protected $fillable = ['country','city','rent_type','cover','address','description','floor' , 'number_of_bathroom'
                            ,'number_of_bedroom' ,'number_of_beds','home_space','maximum_period', 'price_for_home',
                            'price_for_bedroom','price_for_bed','reserved','state','garage','owner_id','price_for_day'];



    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('country' , 'like' , "%$search%")
                ->orWhere('city' , 'like' , "%$search%")
                ->orWhere('floor' , 'like' , "%$search%")
                ->orWhere('number_of_bathroom' , 'like' , "%$search%")
                ->orWhere('number_of_bedroom' , 'like' , "%$search%")
                ->orWhere('number_of_beds' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch

    public function getActive(){
        return $this->state == 1 ? 'مفعل' : 'غير مفعل' ;
    }

    public function getReserved(){
        return $this->reserved == 1 ? 'محجوز' : 'غير محجوز' ;
    }

    public function getGarage(){
        return $this->garage == 1 ? 'متاح' : 'غير متاح' ;
    }



//    Relation
    public function owner(){
        return $this->belongsTo(Owners::class , 'owner_id' ,'id');
    }


    //    Relation
    public function images(){
        return $this->hasMany(HomeImage::class , 'home_id' ,'id');
    }


    public function getRentTypeAttribute($value){
       if($value == 'home'){
           return 'شقه';
       }elseif ($value == 'bed'){
           return 'سرير';
       }elseif ($value == 'period_of_time'){
           return 'فتره زمنيه';
       }
    }

}
