<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\HomeReserve;
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

        $reserved = 0;
        if(auth()->guard('user')->check()){
            $user_id = auth()->guard('user')->user()->id;
            $homeReserve = HomeReserve::where([['user_id',$user_id],['home_id',$id]])->first();
            if($homeReserve){
                $reserved = 1;
            }
        }

        $home = Home::find($id);
        $similar_home = Home::where('country', $home->country)->orWhere('city', $home->city)->get();
        if($home){
            return view('front.details',compact('home','similar_home','reserved'));
        }else{
            return redirect()->back()->with(['error'=>'لا يوجد شقق']);
        }
    }


    public function reserve($id){

        try{
        $user_id = auth()->guard('user')->user()->id;
        $homeReserv = HomeReserve::where([['user_id',$user_id],['home_id',$id]])->first();

        if(!$homeReserv){
            $data = [];
            $data['user_id'] =  $user_id;
            $data['home_id'] =  $id ;

            HomeReserve::create($data);

            session()->flash('success', 'تم طلب الحجز بنجاح');

            return redirect()->back();
        }else{
            session()->flash('success', 'لقد طلبت الحجز من قبل');

            return redirect()->back();
        }

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'هناك مشكله']);
        }
    }


    public function show_reserv(){
        $owner_id = auth()->guard('owner')->user()->id;

        $homeReserved = HomeReserve::whereHas('home',function ($q) use($owner_id){
            return $q->where('owner_id', $owner_id);
        })->with(['user','home'])->paginate(5);

        return view('front.show_reserve',compact('homeReserved'));
    }


    public function delete_reserved($id){
        try{

            $homeReserve = HomeReserve::find($id);
            if($homeReserve){
                $homeReserve->delete();
                session()->flash('success', 'تم الحذف بنجاح');
                return redirect()->back();
            }else{
                return redirect()->back()->with(['error'=>'لا يوجد حجوزات']);
            }

      }catch(\Exception $e){
      return redirect()->back()->with(['error'=>'هناك مشكله']);}

    }
}
