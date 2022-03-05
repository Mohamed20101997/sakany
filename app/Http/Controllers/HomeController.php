<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $howes  = Home::where([['state',1],['reserved',0]])->get();
        return view('front.home',compact('howes'));
    }

    public function details($id)
    {
        $home = Home::find($id);
        if($home){
            return view('front.details',compact('home'));
        }else{
            return redirect()->back()->with(['error'=>'لا يوجد شقق']);
        }
    }


}
