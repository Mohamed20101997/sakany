<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        $howes  = Home::where([['state',1],['reserved',0]])->
        WhenSearch(Request()->country)->
        WhenSearch(Request()->city)->
        WhenSearch(Request()->floor)->
        WhenSearch(Request()->rent_type)->
        WhenSearch(Request()->garage)->
        get();
        return view('front.home',compact('howes'));
    }


    public function details($id)
    {
        $home = Home::find($id);
        $similar_home = Home::where('country', $home->country)->orWhere('city', $home->city)->get();
        if($home){
            return view('front.details',compact('home','similar_home'));
        }else{
            return redirect()->back()->with(['error'=>'لا يوجد شقق']);
        }
    }



    public function reserve(){

    }

}
