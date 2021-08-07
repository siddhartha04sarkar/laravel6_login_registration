<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    public function dashboardval(){

        //echo $urname;
        $urname = session('username');
        $urid = session('userid');
        $getdata = DB::select('select * from logregdb where id=?',[$urid]);
        $userid = $getdata[0]->id;
        $username = $getdata[0]->name;
        $useremail = $getdata[0]->email;
        $userphone = $getdata[0]->phone;
        $defaultuser = $getdata[0]->pimage;
        return view('dashboard', ['id'=>$userid, 'name'=>$username, 'email'=>$useremail, 'phone'=>$userphone, 'pimage'=>$defaultuser]);
    }

}
