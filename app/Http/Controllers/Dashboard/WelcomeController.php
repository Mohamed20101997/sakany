<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\HomeReserve;
use App\Models\Owners;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index()
    {

        //get the latest 5 record on the [Doctor , Student] table
        $lat_users = User::orderBy('id', 'desc')->take(5)->get();
        $lat_owners = Owners::orderBy('id', 'desc')->take(5)->get();

        // get count of all records on the [doctor , student , subject ,  college] tables

        $users = User::get()->count();
        $homes = Home::get()->count();
        $homeReserve = HomeReserve::get()->count();
        $owners = Owners::get()->count();

        return view('dashboard.welcome',compact('lat_owners','lat_users','users','owners','homeReserve','homes'));

    } //end of index

} //end of controller
