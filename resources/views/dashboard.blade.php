<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
</head>
<body>
    <div class="dbfield">
        <h1>Dashboard</h1><br>
        <div class="imgdiv">
            <img width="150px" src="{{ asset('uploads/'.$pimage)}}" alt="Profile Picture"> <br>
        </div>
        <br>
        <hr>
        <div class="nemseg">
            <h2>Name : {{ $name }}</h2><br>
            <h2>Email id : {{ $email }}</h2>  <br>
            <h2>Phone no  : {{ $phone }}</h2>  <br>
        </div>
        
        <div class="butsec">
            <a class="butone" href="editval">Edit profile</a>    <a class="butone" href="/logout">Logout</a>
        </div>
    </div>
</body>
</html>