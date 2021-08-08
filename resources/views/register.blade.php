<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--Font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="formdiv">
        <a class="topicon" href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
        <h1 class="lrgd"> Registration </h1>
        <form action="store" method="post">
                @csrf
                <div class="field">
                    <input type="text" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    @error('name')
                    <div class="errormsg">{{ $message }}</div>
                    @enderror   
                </div>
                <div class="field">
                    <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="errormsg">{{ $message }}</div>
                    @enderror
                    <div class="errormsg">{{ Session::get('emailerrmsg') }}</div>
                </div>
                <div class="field">
                    <input type="text" name="phone" placeholder="Enter Phone no"  value="{{ old('phone') }}">
                    @error('phone')
                    <div class="errormsg">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="Enter password"  value="{{ old('password') }}">
                    @error('password')
                    <div class="errormsg">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field">
                    <input type="password" name="cpassword" placeholder="Confirm password"  value="{{ old('cpassword') }}">
                    @error('cpassword')
                    <div class="errormsg">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field">
                    <button class="butone" type="submit" name="button">Register</button> 
                </div>  
        </form>
    </div>
</body>
</html>