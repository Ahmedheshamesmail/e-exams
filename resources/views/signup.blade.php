<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Exam</title>
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/popper.js" type="text/javascript"></script>
    <link href="css/sign.css" rel="stylesheet" type="text/css"/>
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    @if (Session::has('nulls'))
    <div class="alert alert-success animated alerted-drop-down justify-content-center col-3" role="alert" >
            <h4 class="alert-heading">Warning !</h4>
            <p>{{ Session::get('nulls') }}.</p>
            <center><button class="button-alert">close</button></center>
        </div>
    @endif
    <section style="width: 100%" class="d-flex justify-content-center">
        <section class="back2">
            <p class="formp">
                        IF you Signed up before check login page and login with your National ID you signed up with before
                    </p>
                    <div class="formcon">
                <i><h1>Sign Up</h1></i><hr>
                <form action="signdata" method="post">
                    {{csrf_field()}}<br>
                    <label for="name">Name : </label><br>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Name .. ">
                    @error('name')
                        <div style="color: red;font-size: 13px;padding-top: -10px">{{$message}}</div>
                    @enderror
                    <br>
                    <label for="natid">National ID : </label><br>
                    <input class="form-control" type="tel" id="natid" name="Nationalid" placeholder="National ID .. ">
                    @error('Nationalid')
                        <div style="color: red;font-size: 13px;padding-top: -10px">{{$message}}</div>
                    @enderror
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="level">Level</label>
                        </div>
                        <select class="custom-select dynamic" id="level" name="level" data-dependent="depart">
                            <option value="0" selected>Choose...</option>
                            @foreach($rowl as $l)
                            <option value="{{$l->id}}">
                                    {{$l->name}}
                                </option>
                                @endforeach
                        </select>
                    </div>
                    @error('level')
                        <div style="color: red;font-size: 13px;padding-top: -10px">{{$message}}</div>
                    @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="result">Department</label>
                    </div>
                    <select class="custom-select" id="depart" name="depart">
                        <option value="0" selected>Choose...</option>
                    </select>
                </div>
                    @error('depart')
                        <div style="color: red;font-size: 13px;padding-top: -10px">{{$message}}</div>
                    @enderror
                    <input type="submit" class="btn" style="background-color: #D42BC6;color: white;margin-right: 155px" value="Sign Up">
                    <a href="r">
                        <input type="button" class="btn btn-success" value="Login" style="margin-top:5px">
                    </a>
                </form>
            </div>
        </section>
        <section class="backs col-12">
        </section>
    </section>
    <script>
        $(document).ready(function(){
            $('#level').change(function(){
                var s = $(this).val();
                $.ajax({
                    url:'ajax1',
                    method:'GET',
                    data:{z:s},
                    dataType:'text',
                    success:function(data){
                        $('#depart').html(data);
                    }

                });

            });

        });
    </script>
    <script src="js/app.js">
        </script>
</body>
</html>
