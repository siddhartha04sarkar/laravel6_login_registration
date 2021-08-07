<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class Usersregister extends Controller
{
    public function store(Request $req){
        //echo "<pre>";
        //print_r($req->input());
        //echo "Welcome to the Controller";

        $req->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required | min:10 | numeric | digits:10',
            'password' => 'required | min:6',
            'cpassword' => 'required_with:password|same:password|min:6'
        ]);

        $name = $req->input('name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $password = $req->input('password');
        $cpassword = $req->input('cpassword');
        $defaultuser = 'user.png';

        $encpwd = md5(sha1($password));

        $emailpresent = DB::select('select * from logregdb where email=?',[$email]);

        if(count($emailpresent) > 0){
            //echo "data already exist";
            $req->session()->flash('emailerrmsg', 'Email id alredy exist.');
            return redirect('register');
        }else{
            $rdata = DB::insert('insert into logregdb(id,name,email,phone,password,cpassword,pimage) values(?,?,?,?,?,?,?)',[null, $name, $email, $phone, $encpwd, $cpassword, $defaultuser]);

            if($rdata){
                $req->session()->flash('msg', 'Successfully Registered.');
                return redirect('login');
            }
        }

        
    }
}
