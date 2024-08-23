<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <div class="container">
    <div class="card card-body" style="margin-left: 40px">
        <h3>E-mail verififcation</h3></br>
        we have send to you this email to check if this email:
        <a href="#">{{$user->email}}</a>
        <a style="font-weight: bold; color:blue"
        target="-blank" href="http://127.0.0.1:8000/check_email/{{$user->remember_token}}">
  check my Email
        </a>
        <p>Verify this email</p>
    </div>

   </div>
</body>
</html>