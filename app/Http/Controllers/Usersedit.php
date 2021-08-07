<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class Usersedit extends Controller
{
    public function editval(){
        //echo $urname;
        $urid = session('userid');
        $getdata = DB::select('select * from logregdb where id=?',[$urid]);
        $userid = $getdata[0]->id;
        $username = $getdata[0]->name;
        $useremail = $getdata[0]->email;
        $userphone = $getdata[0]->phone;
        return view('editprofile', ['id'=>$userid, 'name'=>$username, 'email'=>$useremail, 'phone'=>$userphone]);
    }

    public function edituser(Request $req){
        $req->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required | min:10 | numeric | digits:10'
        ]);

        $id = $req->input('id');
        $name = $req->input('name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $user_img = $req->file('user_img');

        if($user_img == ""){
            $edtdata = DB::table('logregdb')->where('id',$id)->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone
            ]);
            $req->session()->flash('editmsg', 'Successfully Updated Data.');
            return redirect('editval');

        }else{
            $fileName = time().'.'.$req->file('user_img')->extension(); 
            $req->file('user_img')->move(public_path('uploads'), $fileName);


            $edtdata = DB::table('logregdb')->where('id',$id)->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'pimage' => $fileName
            ]);
            $req->session()->flash('editmsg', 'Successfully Edited Data.');
            return redirect('editval');
        }

    }
}
