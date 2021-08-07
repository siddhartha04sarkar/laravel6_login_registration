<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--Font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="formdiv">
        <a class="topicon" href="/register"><i class="fa fa-user-plus" aria-hidden="true"></i></a> 
        <h1 class="lrgd"> Login </h1>
        <form action="logs" method="post">
            @csrf
            <div class="field">
                <input type="email" name="email" placeholder="Enter Email id">
                @error('email')
                <div class="errormsg">{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <input type="password" name="password" placeholder="Enter password">
                @error('password')
                <div class="errormsg">{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <button class="butone" type="submit" name="button">Login</button><br>
            </div>
            <div class="field">
                <h2 class="successmsg">{{ Session::get('msg') }}</h2>
                <h2 class="successmsg">{{ Session::get('logerr') }}</h2>
            </div>
        </form>
    </div>
</body>
</html>