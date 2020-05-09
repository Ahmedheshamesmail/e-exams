<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

        <meta name="description" content="">
    <meta name="author" content="">
   <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="../css/shop-homepage.css" rel="stylesheet" type="text/css"/>
    <script src="../js/jquery-3.4.1.min.js"></script>

   <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
       <script src="../js/popper.js"></script>

        <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.css">
        <title>الصفحه الرئيسيه</title>
    </head>
    <body style="margin: 0;">
	<div class="violent">
  <a href="Home"  style="float:right;margin:10px;font-size:20px;color:white">
         <img src="../img/en.png" width="30" height="20">
    </a>
            <div class="img">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="img/fci/1f02c22e0fdf604c321f85e045662e00.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="img/fci/1.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="img/fci/2.jpg" alt="Third slide">
                </div>
                  <div class="carousel-item">
                  <img class="d-block w-100" src="img/photo-of-three-people-smiling-while-having-a-meeting-3184338.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev text-danger" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            </div>
            <div class="content">
            <p style="font-size: 20px;color: white;">
  <i style="padding:15px 10px;background-color: white;border-radius: 180px;margin-right: 3px;color: darkviolet;font-size: 20px">KFS </i>University</p>
			<div class="list">
                    <a href="../Professora" class="one"><div>
                أستاذ
                        </div></a>
                    <a href="../ra" class="one"><div>طالب</div></a>
		</div>
		<div class="text">
    <br><br><br><br><br><br>
                    <p>

			كلية الحاسبات والمعلومات
                    </p>
		</div>
            </div>
	</div>
	<div class="animated btns d-flex justify-content-center align-content-center align-items-center flex-column">
            <p class="d-flex justify-content-center align-content-center align-items-center"><span class="span"><i class="fab fa-facebook-f fass"></i></span></p>
            <p class="d-flex justify-content-center align-content-center align-items-center"><span class="span"><i class="fab fa-youtube you"></i></span></p>
            <p class="d-flex justify-content-center align-content-center align-items-center"><span class="span"><i class="fab fa-twitter twi"></i></span></p>
	</div>
        <script>
        $(document).ready(function(){
            $('.carousel').carousel();
            $('.btn').addClass('bounceInRight');
        });
        </script>
    </body>
</html>
