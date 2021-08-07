<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--Font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="formdiv">
        <a class="topicon" href="dashboardval"><i class="fa fa-times topicon" aria-hidden="true"></i></a>
        <h1 class="lrgd"> Edit Profile </h1>
        <form action="edituser" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}"><br><br>
            <div class="field">
            <input type="text" name="name" value="{{ $name }}">
            @error('name')
            <div class="errormsg">{{ $message }}</div>
            @enderror
            </div>
            <div class="field">
            <input type="text" name="email" value="{{ $email }}">
            @error('email')
            <div class="errormsg">{{ $message }}</div>
            @enderror
            </div>
            <div class="field">
            <input type="text" name="phone" value="{{ $phone }}">
            @error('phone')
            <div class="errormsg">{{ $message }}</div>
            @enderror
            </div>
            <div class="field">
            <input type="file" name="user_img">
            </div>
            <div class="field">
                <button class="butone" type="submit" name="edtbutton">Update Profile</button>   
            </div>
            <div class="field">
                <h2 class="successmsg">{{ Session::get('editmsg') }}</h2>
            </div>
        </form>
    </div>
</body>
</html>