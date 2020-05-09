<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <link rel="stylesheet" href="css/style.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Admin Page</title>
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/popper.js" type="text/javascript"></script>
    <link href="css/admainr.css" rel="stylesheet" type="text/css"/>
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
</head>
<body style="background-image: url('img/l.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;position: relative">
    <a href="Student-SignUp" style="display: block;cursor: pointer; margin: 10px ">
        <p  style="background-color: #6abd49;color: white;border: 0;padding: 10px 15px;border-radius: 30px;background-color:#00cc00;color: white;position: absolute;z-index: 20;">
            Sign Up
        </p>
    </a>
    <center>
        @if (Session::has('nulls'))
            <div class="alert alert-success animated alerted-drop-down justify-content-center" role="alert">
                <h4 class="alert-heading">Warning !</h4>
                <p>{{ Session::get('nulls') }}.</p>
                <center><button class="button-alert">close</button></center>
            </div>
        @endif
        <i class="fas fa-question-circle vdi"></i>
        <div class="container v-d">
            <div class="row flex-row justify-content-center align-content-between align-items-center col-md-5 col-12 pd">
                    IF you Signed up before try to login with your National ID you signed up with before
                    <br><br>

                        <button style="margin-right: 20px;color :#52334a" class="btn tog">
                            Login with National ID
                        </button>

                </div>
            </div>
        <form action="stuv2" method="post" class="form2 animated">
                                    {{csrf_field()}}
                                    <input type="text" name="nat" class="form-control" placeholder="National ID">
                                    <br>
                                    <center><input type="submit" class="btn" style="background-color: #471c38;color: white"></center>
                                </form>
    </center>

<section>

    <div class="container"  style="overflow: hidden">

        <div class="row flex-row justify-content-between align-content-center align-items-center flex-wrap"  style="overflow: hidden">

            <form  action="stuv" method="post" class="form1">
                {{csrf_field()}}
                <div class="svgContainer">
                    <div>
                        <svg class="mySVG" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 200">
                            <defs>
                                <circle id="armMaskPath" cx="100" cy="100" r="100"/>
                            </defs>
                            <clipPath id="armMask">
                                <use xlink:href="#armMaskPath" overflow="visible"/>
                            </clipPath>
                            <circle cx="100" cy="100" r="100" fill="#fff"/>
                            <g class="body">
                                <polygon fill="#fff" points="82.8,171.7 100.4,200 118,171.7 136.8,141.5 130.7,138.4 100.4,163 70.1,138.4 64.1,141.5 	"/>
                                <path fill="#6C6C6C" d="M3.4,200l12.1-33.9c1.9-4.1,5.1-7.4,9.2-9.2L64,141.4l36.4,58.5L3.4,200z"/>
                                <path fill="#6C6C6C" d="M197.4,200l-12.1-33.9c-1.9-4.1-5.2-7.4-9.2-9.2l-39.3-15.5L100.4,200H197.4z"/>
                                <polygon fill="black" points="55,144.6 88.3,200 100.4,200 95.9,192.7 64.1,141.5 	"/>
                                <polygon fill="black" points="145.9,144.6 112.6,200 100.4,200 105,192.7 136.8,141.5 	"/>
                                <path fill="bk=lack" d="M127.7,156.9l-20.4,9.4c-3.2-3.9-8.9-4.4-12.7-1.1c-0.4,0.3-0.8,0.7-1.1,1.1l-20.3-9.4v30.8l20.4-9.4
		c3.2,3.9,8.9,4.4,12.7,1.1c0.4-0.3,0.8-0.7,1.1-1.1l20.4,9.4L127.7,156.9L127.7,156.9z"/>

                                <g>
                                    <path fill="#F9BDBD" d="M108.8,126H92.2c-2.7,0-5.2-1.2-7-3.2l-16-12.7v27.7l31.1,25.3l0,0l31.3-25.3v-27.7l-16,12.7
			C114.1,124.8,111.5,126,108.8,126z"/>
                                </g>
                            </g>
                            <path class="chin" d="M84.1,121.6c2.7,2.9,29.7,2.1,29.2,0.1" fill="none" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <g class="face">
                                <g>
                                    <!-- Face -->
                                    <path fill="#FBC8C8" d="M149.5,68.7c-5.3,3-5.4,6.1-5.4,11.6V84h-6.2l0,0h-0.1V45.9c-28.3,7.4-49.2,3.4-61.6-1.2
					c-3.8-1.3-7.4-3-10.7-5c-0.5-0.3-1-0.6-1.4-0.9c-0.6-0.4-1-0.7-1.2-0.8c0,0-0.1,0-0.1-0.1v46h-6.2l0,0l0,0c0,0,0-0.1,0-0.2v-3.5
					c0-5.2,0-8.3-4.7-11.1c-1.3-0.4-2.7-0.1-3.7,1.5c-4.2,6.3,1.1,21.6,4.5,26l1.7,1.5c1,0.8,1.7,1.3,2.9,1.6l1.8,0.3l9.9,25.3
					L85,138c1.8,2,4.3,3.2,7,3.2h16.6c2.7,0,5.2-1.2,7-3.2l16-12.7l10-25.4c8.9-0.7,11.9-14.3,11.9-24.6
					C153.4,72.5,151.9,70,149.5,68.7z"/>
                                    <!-- Hair -->
                                    <path fill="black" d="M56.6,80.3v3.5V84l0,0h6.2V38l0,0c0,0,0,0,0.1,0.1c0.2,0.1,0.5,0.4,1.2,0.8c0.4,0.2,0.9,0.5,1.4,0.9
					c2.2,1.3,5.8,3.2,10.7,5c12.5,4.6,33.4,8.6,61.6,1.2h0.1v38.1l0,0h6.2v-3.7c0-5.5,0-8.6,5.4-11.6c0.3-0.2,0.6-0.3,0.9-0.5V42
					c5-2,9.2-4.3,12.5-6.9C156.8-7,56.7-9.9,56.7,28.7v-0.1c-3.9,2.2-6.2,6.4-6.3,10.9v28.7c0.6,0.3,1.1,0.6,1.6,0.9
					C56.6,72,56.6,75.1,56.6,80.3z"/>

                                    <!-- Glasses -->
                                    <path fill="black" d="M120.6,55.4c-4.6,0-9,1.9-12.3,5.2c-5.1-2.6-11.1-2.6-16.1,0c-6.7-6.9-17.5-7-24.3-0.2S61,78.2,67.7,85.1
		s17.5,7,24.3,0.2c3.3-3.3,5.1-7.8,5.1-12.5c0-2.8-1.6-6.9-2.8-9.3c2.9-2.1,8.9-2.2,12.4,0c-1.2,2.4-3.3,6.5-3.3,9.3
		c0,9.6,7.7,17.5,17.2,17.5s17.2-7.8,17.2-17.5S130.1,55.4,120.6,55.4L120.6,55.4z"/>
                                    <ellipse fill="#EAEAEA" cx="80" cy="72.9" rx="15" ry="15.3"/>
                                    <ellipse fill="#EAEAEA" cx="120.6" cy="72.9" rx="15" ry="15.3"/>
                                </g>
                            </g>
                            <g class="eyeL">
                                <path fill="#3E3E3F" d="M86.5,72.8c0-3-2.5-5.6-5.3-5.5l0,0c0,0.1-5.4-0.4-5.3,5.6l0,0c0.1,3,2.4,5.4,5.4,5.4
	C84.2,78.3,86.5,75.8,86.5,72.8L86.5,72.8z"/>
                                <!-- <circle cx="85.5" cy="78.5" r="3.5" fill="#3a5e77"/>
                                <circle cx="84" cy="76" r="1" fill="#fff"/> -->
                            </g>
                            <g class="eyeR">
                                <path fill="#3E3E3F" d="M123.5,72.8c0-3-2.5-5.6-5.3-5.5l0,0c0,0.1-5.4-0.4-5.3,5.6l0,0c0.1,3,2.4,5.4,5.4,5.4
	C121.2,78.3,123.5,75.8,123.5,72.8L123.5,72.8z">
                                    <!-- <circle cx="114.5" cy="78.5" r="3.5" fill="#3a5e77"/>
                                    <circle cx="113" cy="76" r="1" fill="#fff"/> -->
                            </g>
                            <path class="mouth" fill="#F79392" d="M84.6,104.7h31.2c0,0,0,9.5-15.6,9.5S84.6,104.7,84.6,104.7z"/>
                            <path class="nose" d="M96.7,82.9h4.7c1.9,0,3,2.2,1.9,3.7l-2.3,3.3c-0.9,1.3-2.9,1.3-3.8,0l-2.3-3.3C93.6,85,94.7,82.9,96.7,82.9z" fill="#FBC8C8"/>
                            <g class="arms" clip-path="url(#armMask)">
                                <g class="armL">
                                    <path fill="#FBD7D7" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="0.25" d="M137.8,118.4l-25.5-30.9l30.9-25.7l33.3,24.4L137.8,118.4z"/>
                                    <path fill="#FBD7D7" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="0.25" d="M131,72.1l15.4-12.8c2.2-1.8,5.3-1.4,7,0.6c1.8,2.2,1.4,5.3-0.6,7l-8.2,6.8 M165,82.9l15.5-12.8
	c2.2-1.8,5.3-1.4,7,0.6c1.8,2.2,1.4,5.3-0.6,7l-14.6,12.1 M158.6,75.1L177,59.8c2.2-1.8,5.3-1.4,7,0.6c1.8,2.2,1.4,5.3-0.6,7
	L165,82.8 M148.4,70.6l20.7-17.2c2.2-1.8,5.3-1.4,7,0.6c1.8,2.2,1.4,5.3-0.6,7l-17,14.1"/>
                                    <path fill="#FFF" d="M180.6,73.7l1.7-1.5c0.9-0.7,2.1-0.6,2.8,0.3s0.6,2.1-0.3,2.8l-1.7,1.5L180.6,73.7z M177.3,63.5L179,62
	c0.9-0.7,2.1-0.6,2.8,0.3s0.6,2.1-0.3,2.8l-1.7,1.5L177.3,63.5z M169.3,57.1l1.7-1.5c0.9-0.7,2.1-0.6,2.8,0.3
	c0.7,0.9,0.6,2.1-0.3,2.8l-1.7,1.5C171.8,60.2,169.3,57.1,169.3,57.1z M145.7,61.9l1.7-1.5c0.9-0.7,2.1-0.6,2.8,0.3
	c0.7,0.9,0.6,2.1-0.3,2.8l-1.7,1.5C148.2,64.9,145.7,61.9,145.7,61.9z"/>
                                    <path fill="#6C6C6C" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="0.25" d="M139.6,116.9c-31.4,30.8-63.6,63-83.5,77.5l-34.7-41.6c26.3-23,58.4-45,92.5-66.6"/>
                                </g>
                                <g class="armR">
                                    <path fill="#FBD7D7" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="0.25" d="M250.7,117.4l25.5-30.9l-30.9-25.7L212,85.2L250.7,117.4z"/>
                                    <path fill="#FBD7D7" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="0.25" d="M257.6,71.1l-15.4-12.8c-2.2-1.8-5.3-1.4-7,0.6c-1.8,2.2-1.4,5.3,0.6,7l8.2,6.8 M223.6,81.9l-15.5-12.8
		c-2.2-1.8-5.3-1.4-7,0.6c-1.8,2.2-1.4,5.3,0.6,7l14.6,12.1 M229.9,74.1l-18.4-15.3c-2.2-1.8-5.3-1.4-7,0.6c-1.8,2.2-1.4,5.3,0.6,7
		l18.4,15.3 M240.2,69.6l-20.7-17.2c-2.2-1.8-5.3-1.4-7,0.6c-1.8,2.2-1.4,5.3,0.6,7l17,14.1"/>
                                    <path fill="#FFF" d="M208,72.7l-1.7-1.5c-0.9-0.7-2.1-0.6-2.8,0.3s-0.6,2.1,0.3,2.8l1.7,1.5L208,72.7z M211.3,62.5l-1.7-1.5
		c-0.9-0.7-2.1-0.6-2.8,0.3c-0.7,0.9-0.6,2.1,0.3,2.8l1.7,1.5L211.3,62.5z M219.3,56.1l-1.7-1.5c-0.9-0.7-2.1-0.6-2.8,0.3
		c-0.7,0.9-0.6,2.1,0.3,2.8l1.7,1.5C216.8,59.2,219.3,56.1,219.3,56.1z M242.8,60.9l-1.7-1.5c-0.9-0.7-2.1-0.6-2.8,0.3
		c-0.7,0.9-0.6,2.1,0.3,2.8l1.7,1.5C240.3,63.9,242.8,60.9,242.8,60.9z"/>
                                    <path fill="#6C6C6C" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="0.25" d="M249,116.9c31.4,30.8,63.6,63,83.5,77.5l34.7-41.6c-26.3-23-58.4-45-92.5-66.6"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="inputGroup inputGroup1">
                    <label for="email">ID</label>
                    <input type="text" id="email" name="nid" class="email" maxlength="256"/>
                    <p class="helper helper1">12345678</p>
                    <span class="indicator"></span>
                </div>
                <div class="inputGroup inputGroup2">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="password" />
                </div>
                <div class="inputGroup inputGroup3">
                    <button id="login" type="submit">Log in</button>
                </div>
            </form>

        </div>
    </div>
</section>

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js'></script>
<script  src="js/index.js"></script>
<script src="js/app.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
       $('.vdi').click(function(){
          $('.v-d').toggle();
       });
       $('.tog').click(function(){
          $('.form2').toggle();
       });
       $('.form2').toggleClass('bounceInDown');
    });
    </script>
</body>
</html>
