<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class Userslogin extends Controller
{
    public function logs(Request $req){ 
        $req->validate([
            'email' => 'required|email|max:255',
            'password' => 'required | min:6'
        ]);

        $email = $req->input('email');
        $password = $req->input('password');
        $encpwd = md5(sha1($password));

        $data = DB::select('select * from logregdb where email=? and password=?',[$email, $encpwd]);
        if(count($data) > 0){
            //echo "Data exist in database ".count($data)." times";
            //echo $data[0]->name;
            $userid = $data[0]->id;
            $username = $data[0]->name;
            session()->put('userid', $userid);
            session()->put('username', $username);
            return redirect('dashboardval');
        }else{
            //echo "Data dose'nt exist in database.";
            $req->session()->flash('logerr', 'Invalid Email-id or Password.');
            return redirect('login');
        }
    }
}
