<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student</title>

    <!-- Bootstrap Core CSS -->

   <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="css/shop-homepage.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery-3.4.1.min.js"></script>
   <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <script src="js/custom.js"></script>

</head>

<body>
    @foreach($r as $v)
    {{$v}}<br>
    @endforeach
    <div style="width: 400px;height: 400px;">
        <img src="img/photo-of-three-people-smiling-while-having-a-meeting-3184338.jpg" style="width: 400px;height: 400px;background-color: green;width: 400px;border-radius: 10% 70% 70% 10%/10% 20% 10% 20%;" alt=""/>
    </div>
</body>


</html>
