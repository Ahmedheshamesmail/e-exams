<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sorry !!</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        button:hover{
            cursor: pointer;
        }

    </style>
</head>
<body style="background-color: #e5e5e5;">
<nav style="background:linear-gradient(to left, #c8ffb3,#8cff91,#5cff74,#34ff5c,#06ff38);height: 12vh; color: white;">
                <h1 style="padding: 30px;font-size:35px;"><i>KFS</i></h1>
</nav>
<section>
    <div class="container">
        <div>

            <br><br><br><br><br><br><br><br><br><br><br><br>
            <p style="font-size: 50px;color: red;text-align: center;"> Sorry !</p><br>
            @yield('content')

            <a href="../Professor" style="text-decoration: none;text-align: center;margin-left:  630px;">
                <button style="border: 0;text-decoration:none;padding: 15px; color: #00aa88; border: 1px solid #00aa88;border-radius: 5px;font-size: 15px;outline: none">
                    Back
                </button>
            </a>
        </div>
    </div>
</section>
<!---
<button type="button" class="btn btn-primary">
    Profile <span class="badge badge-light">9</span>
    <span class="sr-only">unread messages</span>
</button>
<div class="alert alert-warning" role="alert">
    This is a warning alert—check it out!
</div>
<div class="alert alert-info" role="alert">
    This is a info alert—check it out!
  </div>
  <div class="alert alert-light" role="alert">
    This is a light alert—check it out!
  </div>
  <div class="alert alert-dark" role="alert">
    This is a dark alert—check it out!
  </div>
--->
<script src="../js/app.js" type="text/javascript"></script>
</body>
</html>
